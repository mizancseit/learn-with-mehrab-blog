<?php

namespace App\Http\Controllers\Template\BackTier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Template\CreateCourseCategoryRequest;
use App\Http\Requests\Template\UpdateCourseContentRequest;
use App\Http\Requests\Template\UpdateCourseLevelRequest;
use App\Models\LMS\CourseCategory;
use App\Models\LMS\CourseLevel;
use Illuminate\Http\Request;

class CourseLevelController extends Controller
{
    public function index(Request $request)
    {
        $data_query = CourseLevel::query();

        if($request->search != ""){
            $data_query->where('title','like','%'.$request->search.'%');
        }

        $data = $data_query->paginate(20);

        return view('template.pages.backends.course-levels.index',[
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
        return view('template.pages.backends.course-levels.create',[
            'statusList'=>$statusList
        ]);
    }

    public function store(CreateCourseCategoryRequest $request)
    {
        $inputs = $request->only('title','is_active','comments');

        try {
            CourseLevel::create($inputs);
            session()->flash('success','Data saved successfully');
            return redirect()->route('admin.course-levels.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $data = CourseLevel::findOrFail($id);
        $statusList = [
            ['id'=>0,'name'=>'Disable'],
            ['id'=>1,'name'=>'Enable'],
        ];
        return view('template.pages.backends.course-levels.edit',[
            'statusList'=>$statusList,
            'data'=>$data,
            'id'=>$id
        ]);
    }

    public function update(UpdateCourseLevelRequest $request,$id)
    {
        $inputs = $request->only('title','is_active','comments');

        try {
            CourseLevel::where(['id'=>$id])->update($inputs);
            session()->flash('success','Data updated successfully');
            return redirect()->route('admin.course-levels.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        try {
            CourseLevel::where(['id'=>$id])->delete();
            session()->flash('success','Data deleted successfully');
            return redirect()->route('admin.course-levels.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }
}
