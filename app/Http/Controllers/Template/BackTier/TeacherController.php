<?php

namespace App\Http\Controllers\Template\BackTier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Template\CreateCourseCategoryRequest;
use App\Http\Requests\Template\UpdateCourseContentRequest;
use App\Models\LMS\CourseCategory;
use App\Models\LMS\Teacher;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class TeacherController extends Controller
{

    public function index(Request $request)
    {
        $data_query = Teacher::query();

        if($request->search != ""){
            $data_query->where('name','like','%'.$request->search.'%')
                ->orWhere('mobile','like','%'.$request->search.'%');
        }

        $data = $data_query->paginate(20);

        return view('template.pages.backends.teachers.index',[
            'datas'=>$data,
            'search'=>$request->search
        ]);
    }



    public function create()
    {
        $statusList = [
            ['id'=>0,'name'=>'Disable'],
            ['id'=>1,'name'=>'Enable'],
        ];
        return view('template.pages.backends.teachers.create',[
            'statusList'=>$statusList
        ]);
    }




    public function store(Request $request)
    {
        $inputs = $request->only("name","mobile","email","address","about_details","fb_link","twitter_link","linkedin_link","experts","work_designation","company_name","comments","is_active");

        try {

            if($request->hasFile('thumbnail')){
                $manager = new ImageManager(new Driver());
                $image = $request->file('thumbnail');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $location = public_path('uploads/lms/teachers/'.$imageName);
                $manager->read($image)->resize(250, 250, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location);
                $inputs['picture'] = $imageName;
            }

            Teacher::create($inputs);
            session()->flash('success','Data saved successfully');
            return redirect()->route('admin.course-teachers.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $data = Teacher::findOrFail($id);
        $statusList = [
            ['id'=>0,'name'=>'Disable'],
            ['id'=>1,'name'=>'Enable'],
        ];
        return view('template.pages.backends.teachers.edit',[
            'statusList'=>$statusList,
            'data'=>$data,
            'id'=>$id
        ]);
    }

    public function update(Request $request,$id)
    {
        $inputs = $request->only("name","mobile","email","address","about_details","fb_link","twitter_link","linkedin_link","experts","work_designation","company_name","comments","is_active");

        try {

            if($request->hasFile('thumbnail')){
                $manager = new ImageManager(new Driver());
                $image = $request->file('thumbnail');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $location = public_path('uploads/lms/teachers/'.$imageName);
                $manager->read($image)->resize(250, 250, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location);
                $inputs['picture'] = $imageName;
            }

            Teacher::where(['id'=>$id])->update($inputs);
            session()->flash('success','Data updated successfully');
            return redirect()->route('admin.course-teachers.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            Teacher::where(['id'=>$id])->delete();
            session()->flash('success','Data deleted successfully');
            return redirect()->route('admin.course-teachers.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }

}
