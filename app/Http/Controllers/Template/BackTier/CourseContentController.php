<?php

namespace App\Http\Controllers\Template\BackTier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CreateCategoryRequest;
use App\Http\Requests\Blog\UpdateCategoryRequest;
use App\Models\BlogCategory;
use App\Models\LMS\Course;
use App\Models\LMS\CourseContent;
use Illuminate\Http\Request;

class CourseContentController extends Controller
{


    public function index(Request $request)
    {
        $data_query = CourseContent::with('course');

        if($request->course_id != ""){
            $data_query->where(['course_id'=>$request->course_id]);
        }

        $data = $data_query->paginate(20);
        $courses = Course::where(['is_active'=>1])->get(['id','title']);
        return view('template.pages.backends.course-contents.index',[
            'datas'=>$data,
            'course_id'=>$request->course_id,
            'courses'=>$courses
        ]);
    }



    public function create()
    {
        $courses = Course::where(['is_active'=>1])->get(['id','title']);

        return view('template.pages.backends.course-contents.create',[
            'courses'=>$courses
        ]);
    }



    public function store(Request $request)
    {
        $request->validate([
            'course_id'=>'required'
        ]);

        $inputs = $request->only('course_id','total_week','total_time','total_class',"total_live_class","total_quiz","total_assignment");

        try {
            CourseContent::create($inputs);
            session()->flash('success','Data saved successfully');
            return redirect()->route('admin.course-contents.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $data = CourseContent::findOrFail($id);
        $courses = Course::where(['is_active'=>1])->get();
        return view('template.pages.backends.course-contents.edit',[
            'courses'=>$courses,
            'data'=>$data,
            'id'=>$id
        ]);
    }



    public function update(Request $request,$id)
    {
        $request->validate([
            'course_id'=>'required'
        ]);

        $inputs = $request->only('course_id','total_week','total_time','total_class',"total_live_class","total_quiz","total_assignment");

        try {
            CourseContent::where(['id'=>$id])->update($inputs);
            session()->flash('success','Data updated successfully');
            return redirect()->route('admin.course-contents.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }



    public function destroy($id)
    {
        try {
            CourseContent::where(['id'=>$id])->delete();
            session()->flash('success','Data deleted successfully');
            return redirect()->route('admin.course-contents.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }
}
