<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Models\LMS\Batch;
use App\Models\LMS\BatchTeacher;
use App\Models\LMS\CorporateClient;
use App\Models\LMS\CourseCategory;
use App\Models\LMS\CourseContent;
use App\Models\LMS\Teacher;
use App\Models\LMS\Webinar;
use App\Models\LMS\WebinarStudent;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $course_category = CourseCategory::where(['is_active'=>1])->get();

        $teachers = Teacher::where(['is_active'=>1])->paginate(20);

        $corporate_clients = CorporateClient::where(['is_active'=>1])->paginate(20);

        $webinars = Webinar::where(['is_active'=>1])->paginate(20);

        //dd($course_category);
        return view('template.pages.home.home',[
            'course_categories'=>$course_category,
            'teachers'=>$teachers,
            'corporate_clients'=>$corporate_clients,
            'webinars'=>$webinars,
        ]);
    }


    public function courseDetails($slug,$batch=null)
    {

        if ($batch == null){
            abort(404,"Please add Batch No");
        }

        $batch = Batch::with('course','course.courseContent','course.courseContent.contentDetails')
            ->where(['batch_ID'=>$batch])
            ->first();

        if(is_null($batch)){
            abort(404,"Your Batch No is not valid.");
        }

        $batchTeacherIds =  BatchTeacher::where(['course_id'=>$batch->course_id,'batch_id'=>$batch->id])
            ->pluck('teacher_id')
            ->toArray();

        $batchTeachers = Teacher::with('teacherCourse')->whereIn('id',$batchTeacherIds)->get();

       // $course_content = CourseContent::with()->where(['course_id'=>$batch->course_id])->first();

        return view('template.pages.course.details',[
            'batch'=>$batch,
            'batchTeachers'=>$batchTeachers
        ]);
    }

    public function trainerDetails($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('template.pages.teacher.details',[
            'teacher'=>$teacher
        ]);
    }



    public function webinarDetails($id)
    {
        $webinar = Webinar::findOrFail($id);
        $webinarStudentCount = WebinarStudent::where(['webinar_id'=>$id])->count();
        return view('template.pages.font-tier.webinar.details',[
            'webinar'=>$webinar,
            'webinarStudentCount'=>$webinarStudentCount,
        ]);
    }




}
