<?php

namespace App\Http\Controllers\Template\BackTier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Template\CreateCourseCategoryRequest;
use App\Http\Requests\Template\UpdateCourseContentRequest;
use App\Models\LMS\Course;
use App\Models\LMS\CourseCategory;
use App\Models\LMS\CourseContent;
use App\Models\LMS\CourseContentDetails;
use Illuminate\Http\Request;

class CourseContentDetailsController extends Controller
{
    public function index(Request $request)
    {

        $data_query = CourseContentDetails::with('course',"courseContent","courseContent.course");

        if($request->search != ""){
            $data_query->where('title','like','%'.$request->search.'%');
        }

        if($request->course_id != ""){
            $data_query->where(['course_id'=>$request->course_id]);
        }

        if($request->course_content_id != ""){
            $data_query->where(['course_content_id'=>$request->course_content_id]);
        }

        $data = $data_query->paginate(20);

        $courses = Course::where(['is_active'=>1])->get();
        $courseContents = CourseContent::with('course')->get();

        return view('template.pages.backends.course-content-details.index',[
            'datas'=>$data,
            'search'=>$request->search,
            'courses'=>$courses,
            'courseContents'=>$courseContents,
            'course_id'=>$request->course_id,
            'course_content_id'=>$request->course_content_id,
        ]);
    }

    public function create()
    {
        $statusList = [
            ['id'=>0,'name'=>'Disable'],
            ['id'=>1,'name'=>'Enable'],
        ];

        $courses = Course::where(['is_active'=>1])->get();
        $courseContents = CourseContent::with('course')->get();

        return view('template.pages.backends.course-content-details.create',[
            'statusList'=>$statusList,
            'courses'=>$courses,
            'courseContents'=>$courseContents,
        ]);
    }

    public function store(Request $request)
    {

        $inputs = $request->only("course_id","course_content_id","icon","title","subtitle");
        $inputs['description'] = $request->details;

        try {
            CourseContentDetails::create($inputs);
            session()->flash('success','Data saved successfully');
            return redirect()->route('admin.course-content-details.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $data = CourseContentDetails::findOrFail($id);
        $statusList = [
            ['id'=>0,'name'=>'Disable'],
            ['id'=>1,'name'=>'Enable'],
        ];

        $courses = Course::where(['is_active'=>1])->get();
        $courseContents = CourseContent::all();

        return view('template.pages.backends.course-content-details.edit',[
            'statusList'=>$statusList,
            'data'=>$data,
            'id'=>$id,
            'courses'=>$courses,
            'courseContents'=>$courseContents,
        ]);
    }


    public function update(Request $request,$id)
    {
        $inputs = $request->only("course_id","course_content_id","icon","title","subtitle","description");
        try {
            CourseContentDetails::where(['id'=>$id])->update($inputs);
            session()->flash('success','Data updated successfully');
            return redirect()->route('admin.course-content-details.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }



    public function destroy($id)
    {
        try {
            CourseContentDetails::where(['id'=>$id])->delete();
            session()->flash('success','Data deleted successfully');
            return redirect()->route('admin.course-content-details.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }

}
