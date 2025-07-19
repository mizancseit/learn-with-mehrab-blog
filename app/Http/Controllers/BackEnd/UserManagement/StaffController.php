<?php

namespace App\Http\Controllers\BackEnd\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateClientRequest;
use App\Http\Requests\Admin\CreateStaffRequest;
use App\Http\Requests\Admin\UpdateClientRequest;
use App\Http\Requests\Admin\UpdateStaffRequest;
use App\Models\Auth\Component;
use App\Models\Auth\Module;
use App\Models\Auth\Permission;
use App\Models\Auth\Role;
use App\Models\Balance\Balance;
use App\Models\User;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\Actions\EnableTwoFactorAuthentication;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $client_query = User::where(['flag'=>'admin']);
        if($request->search != ""){
            $client_query->where(function ($query) use($request){
                $query->orWhere('company_name','like','%'.$request->search.'%')
                    ->orWhere('contact_person','like','%'.$request->search.'%')
                    ->orWhere('mobile','like','%'.$request->search.'%')
                    ->orWhere('email','like','%'.$request->search.'%')
                    ->orWhere('user_name','like','%'.$request->search.'%');
            });
        }

        $clients = $client_query->orderBy('id','desc')
            ->paginate(50);

        return view('backends.user_management.users.index',[
            'clients'=>$clients,
            'search'=>$request->search
        ]);
    }


    public function create()
    {
        $roles = Role::where(['is_active'=>1])->paginate(100);
        return view('backends.user_management.users.create',[
            'roles'=>$roles
        ]);
    }


    public function store(CreateStaffRequest $request,NotificationService $notificationService,EnableTwoFactorAuthentication $enable)
    {

        $role_has_permission = DB::table('role_has_permissions')
            ->where(['role_id'=>$request->role_id])
            ->pluck('permission_id')
            ->toArray();

        $permissions = Permission::whereIn('id',$role_has_permission)->get();

        if(count($permissions) == 0){
            session()->flash('error',"Do not have Any Module or Sub-Module in this Role.");
            return redirect()->route('staffs.create');
        }


        $db_role = DB::table('roles')
            ->where(['id'=>$request->role_id])
            ->first();

        try{

            DB::beginTransaction();
            $employee_code = uniqid();
            $create_user = User::create([
                'code'=>$employee_code,
                'name'=>$request->name,
                'mobile'=>$request->mobile,
                'email'=>$request->email,
                'user_name'=>$request->user_name,
                'password'=>bcrypt($request->password),
                'pin'=>$request->pin,
                'flag'=>'admin',
                'role_id'=>$request->role_id,
                'notes'=>$request->notes,
            ]);

            /***********************************
             * Role Management
             **************************************/
            $role = \Spatie\Permission\Models\Role::findById($request->role_id);
            $user = User::find($create_user->id);
            $user->assignRole($role->name);

            $modules = [];
            $submodules = [];
            //module assign and submodule
            foreach ($permissions as $pp){
                $modules[] = $pp->module_id;
                $submodules[] = $pp->component_id;
            }
            //Direct Assign Permission
            $user->syncPermissions($permissions->pluck('name')->toArray());
            $unique_modules = array_unique($modules);
            $unique_sub_modules = array_unique($submodules);

            foreach ($unique_modules as $module){
                DB::table('module_users')->insert([
                    'user_id'=>$create_user->id,
                    'module_id'=>$module,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);
            }

            foreach ($unique_sub_modules as $submodule){
                DB::table('component_users')->insert([
                    'user_id'=>$create_user->id,
                    'component_id'=>$submodule,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);
            }
            //set Permission


            //Enable for 2f authentication
            $enable($create_user, false);

            //Save notification
            $notificationService->saveNotification("","Client Create","Client create successfully.");

            DB::commit();
            session()->flash('success',"Staffs created successfully.");
            return redirect()->route('staffs.index');

        }catch (\Exception $exception){
            DB::rollBack();
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }

    }



    public function show($id){

        $systemModulesIds = Module::pluck('id')->toArray();
//        $systemComponentIds = Component::whereIn('module_id',$systemModulesIds)
//            ->pluck('component_id')
//            ->toArray();

        $fnd_user = User::with('role')->find($id);

       // dd($fnd_user);

        $user = $fnd_user->getDirectPermissions();

        $role_name = $fnd_user->roles->first()->name;
        $permissionIds = $user->pluck('id')->toArray();
        $moduleids = $user->pluck('module_id')->toArray();
        $submodulesIds = $user->pluck('component_id')->toArray();

        return view('backends.user_management.users.permissions',[
            'allPermissions'=>$user,
            'moduleIds'=>$moduleids,
            'submodulesIds'=>$submodulesIds,
            'permissionIds'=>$permissionIds,
            'user_id'=>$id,
            'role_name'=>$role_name,
            'user'=>$fnd_user,
            'modules'=>Module::whereIn('id',$systemModulesIds)->get(),
        ]);
    }



    public function permissionEditSubmit(Request $request,$user_id){

        try{

            DB::beginTransaction();

            $user = User::find($user_id);

            $permissionName = Permission::whereIn('id',$request->permission_id)
                ->pluck('name')
                ->toArray();

            $user->syncPermissions($permissionName);
            //update user permission

            $permissions = Permission::whereIn('id',$request->permission_id)
                ->get();


            $modules = [];
            $submodules = [];
            foreach ($permissions as $permission){
                $modules[] = $permission->module_id;
                $submodules[] = $permission->component_id;
            }

            $unique_modules = array_unique($modules);
            $unique_sub_modules = array_unique($submodules);


            //module insert
            DB::table('module_users')->where(['user_id'=>$user_id])->delete();
            foreach ($unique_modules as $module){
                DB::table('module_users')->insert([
                    'user_id'=>$user_id,
                    'module_id'=>$module,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);
            }

            // submodules
            DB::table('component_users')->where(['user_id'=>$user_id])->delete();
            foreach ($unique_sub_modules as $submodule){
                DB::table('component_users')->insert([
                    'user_id'=>$user_id,
                    'component_id'=>$submodule,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);
            }

            DB::commit();
            session()->flash('success',"Update user permission Successfully.");
            return redirect()->route('staffs.index');
        }catch (\Exception $exception){
            DB::rollback();
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function edit($id)
    {

        $data = User::findOrFail($id);

        $roles = Role::where(['is_active'=>1])->paginate(100);
        $status = [
            ['id'=>1,'text'=>'Enabled'],
            ['id'=>0,'text'=>'Disabled'],
        ];
        return view('backends.user_management.users.edit',[
            'data'=>$data,
            'id'=>$id,
            'user_id'=>$id,
            'roles'=>$roles,
            'status'=>$status,
        ]);
    }


    public function update(UpdateStaffRequest $request,$id, NotificationService $notificationService)
    {

        $role_has_permission = DB::table('role_has_permissions')
            ->where(['role_id'=>$request->role_id])
            ->pluck('permission_id')
            ->toArray();

        $permissions = Permission::whereIn('id',$role_has_permission)->get();

        if(count($permissions) == 0){
            session()->flash('error',"Do not have Any Module or Sub-Module in this Role.");
            return redirect()->route('staffs.create');
        }


//        $db_role = DB::table('roles')
//            ->where(['id'=>$request->role_id])
//            ->first();

        try{

            User::where(['id'=>$id])->update([
                'name'=>$request->name,
                'mobile'=>$request->mobile,
                'email'=>$request->email,
                'user_name'=>$request->user_name,
                'password'=>bcrypt($request->password),
                'pin'=>$request->pin,
                'flag'=>'admin',
                'role_id'=>$request->role_id,
                'notes'=>$request->notes,
            ]);

            /***********************************
             * Role Management
             **************************************/
            $role = \Spatie\Permission\Models\Role::findById($request->role_id);
            $user = User::find($id);
            $user->assignRole($role->name);

            $modules = [];
            $submodules = [];
            //module assign and submodule
            foreach ($permissions as $pp){
                $modules[] = $pp->module_id;
                $submodules[] = $pp->component_id;
            }
            //Direct Assign Permission
            $user->syncPermissions($permissions->pluck('name')->toArray());
            $unique_modules = array_unique($modules);
            $unique_sub_modules = array_unique($submodules);


            if(count($unique_modules) > 0){
                DB::table('module_users')->where(['user_id'=>$id])->delete();
                foreach ($unique_modules as $module){
                    DB::table('module_users')->insert([
                        'user_id'=>$id,
                        'module_id'=>$module,
                        'created_at'=>now(),
                        'updated_at'=>now(),
                    ]);
                }
            }

            if(count($unique_sub_modules) > 0){
                DB::table('component_users')->where(['user_id'=>$id])->delete();
                foreach ($unique_sub_modules as $submodule){
                    DB::table('component_users')->insert([
                        'user_id'=>$id,
                        'component_id'=>$submodule,
                        'created_at'=>now(),
                        'updated_at'=>now(),
                    ]);
                }
            }
            //set Permission



            //Save notification
            $notificationService->saveNotification("","Client Update","Client update successfully.");

            //DB::commit();
            session()->flash('success',"Staffs updated successfully.");
            return redirect()->route('staffs.index');

        }catch (\Exception $exception){
            //DB::rollBack();
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }



    public function destroy($id)
    {
        User::where(['id'=>$id])->delete();
        session()->flash('success',"Staffs deleted successfully.");
        return redirect()->route('staffs.index');
    }


}
