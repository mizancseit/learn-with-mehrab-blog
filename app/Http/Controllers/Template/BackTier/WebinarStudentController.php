<?php

namespace App\Http\Controllers\Template\BackTier;

use App\Http\Controllers\Controller;
use App\Models\LMS\Course;
use App\Models\LMS\Webinar;
use App\Models\LMS\WebinarStudent;
use Illuminate\Http\Request;

class WebinarStudentController extends Controller
{
    public function index(Request $request)
    {
        $data_query = WebinarStudent::with('course','webinar');

        if($request->course_id != ""){
            $data_query->where(['course_id'=>$request->course_id]);
        }

        if($request->webinar_id != ""){
            $data_query->where(['webinar_id'=>$request->webinar_id]);
        }

        if($request->search != ""){
            $data_query->where('name','like','%'.$request->search.'%')
            ->orWhere('email','like','%'.$request->search.'%')
                ->orWhere('mobile','like','%'.$request->search.'%');
        }

        $data = $data_query->paginate(50);


        $courses = Course::where(['is_active'=>1])->get(['id','title']);
        $webinars = Webinar::where(['is_active'=>1])->get(['id','title']);

        return view('template.pages.backends.webinar-students.index',[
            'datas'=>$data,
            'search'=>$request->search,
            'course_id'=>$request->course_id,
            'webinar_id'=>$request->webinar_id,
            'webinars'=>$webinars,
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
