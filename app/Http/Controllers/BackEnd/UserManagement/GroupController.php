<?php

namespace App\Http\Controllers\BackEnd\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserGroupRequest;
use App\Models\Auth\Component;
use App\Models\Auth\Module;
use App\Models\Auth\Permission;
use App\Models\Auth\Role;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function index(Request $request)
    {
        $data_query = Role::query();
        if($request->search != ""){
            $data_query->where('name','like','%'.$request->search.'%');
        }
        $data = $data_query->orderBy('id','desc')->paginate(50);
        return view('backends.user_management.roles.index',[
            'data'=>$data,
            'search'=>$request->search
        ]);
    }



    public function create()
    {
        $modules = Module::with('permissions')->where(['is_active' => 1])->get();
        $components = Component::with('module')->where(['is_active' => 1])->get();

        return view('backends.user_management.roles.create',[
            'modules'=>$modules,
            'components'=>$components,
        ]);
    }


    public function store(CreateUserGroupRequest $request)
    {
        try{
            if(isset($request->permission_id)){

                $role = \Spatie\Permission\Models\Role::create([
                    'name' => strtolower($request->name),
                    'flag'=>$request->flag,
                    'guard_name'=>'web'
                ]);

                $permissions = [];
                foreach ($request->permission_id as $permissionName) {
                    $permission = Permission::where('id', $permissionName)->first();
                    if ($permission) {
                        $permissions[] = $permission->name;
                    }
                }

                $role->syncPermissions($permissions);

                session()->flash('success','Staff Group Created Successfully');
                return redirect()->route('staff-groups.index');
            }else{
                session()->flash('error','Please Select Your Role permission.');
                return redirect()->back();
            }

        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->route('staff-groups.create');
        }
    }



    public function edit($id)
    {
        $data = \Spatie\Permission\Models\Role::with('permissions')->find($id);
        $permissionIds = null;
        $moduleids = null;
        $submodulesIds = null;

        if(!is_null($data->permissions)){
            $permissionIds = $data->permissions->pluck('id')->toArray();
            $moduleids = $data->permissions->pluck('module_id')->toArray();
            $submodulesIds = $data->permissions->pluck('component_id')->toArray();
        }

        $modules = Module::with('permissions')
            ->where(['is_active' => 1])
            ->get();


        $components = Component::with('module')
            ->where(['is_active' => 1])
            ->get();

        $role = Role::find($id);

        $flagList = [
            'admin',
            'user'
        ];

        return view('backends.user_management.roles.edit',[
            'data'=>$data,
            'role'=>$role,
            'modules'=>$modules,
            'components'=>$components,
            'moduleIds'=>$moduleids,
            'submodulesIds'=>$submodulesIds,
            'permissionIds'=>$permissionIds,
            'flagList'=>$flagList,
        ]);
    }


    public function update(Request $request,$id)
    {

        try{
            if(isset($request->permission_id)){

                $role = \Spatie\Permission\Models\Role::find($id);
                $role->name = strtolower($request->name);
                $role->flag = $request->flag;
                $role->update();


                $permissions = [];
                foreach ($request->permission_id as $permissionName) {
                    $permission = Permission::where('id', $permissionName)->first();
                    if ($permission) {
                        $permissions[] = $permission->name;
                    }
                }

                $role->syncPermissions($permissions);

                session()->flash('success','Staff Group Updated Successfully');
                return redirect()->route('staff-groups.index');

            }else{
                session()->flash('error','Please Select Your Role permission.');
                return redirect()->back();
            }
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }



    public function destroy($id)
    {
        Role::where(['id'=>$id])->delete();
        session()->flash('success',"Staffs Group deleted successfully.");
        return redirect()->route('staff-groups.index');
    }


}
