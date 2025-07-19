<?php

namespace App\Http\Controllers\Template\BackTier;

use App\Http\Controllers\Controller;
use App\Models\LMS\Batch;
use App\Models\LMS\Course;
use App\Models\LMS\CourseStudent;
use Illuminate\Http\Request;

class CourseStudentController extends Controller
{
    public function index(Request $request)
    {
        $data_query = CourseStudent::with('course','batch');

        if($request->course_id != ""){
            $data_query->where(['course_id'=>$request->course_id]);
        }

        if($request->batch_id != ""){
            $data_query->where(['batch_id'=>$request->batch_id]);
        }

        if($request->search != ""){
            $data_query->where('name','like','%'.$request->search.'%')
                ->orWhere('email','like','%'.$request->search.'%')
                ->orWhere('mobile','like','%'.$request->search.'%');
        }

        $data = $data_query->orderBy('id','desc')->paginate(50);


        $courses = Course::where(['is_active'=>1])->get(['id','title']);
        $batches = Batch::all(['id','batch_name']);

        return view('template.pages.backends.course-students.index',[
            'datas'=>$data,
            'search'=>$request->search,
            'course_id'=>$request->course_id,
            'batch_id'=>$request->batch_id,
            'batches'=>$batches,
            'courses'=>$courses,
        ]);

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }


    public function edit($id)
    {

    }

    public function update(Request $request,$id)
    {

    }

    public function destroy($id)
    {

    }

}
