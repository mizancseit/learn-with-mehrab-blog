<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\ContactUs;
use App\Models\LMS\CourseCategory;
use App\Models\LMS\CourseLevel;
use App\Models\LMS\CourseType;
use App\Models\LMS\Teacher;
use Illuminate\Http\Request;

class FrontTierController extends Controller
{

    public function allCourse()
    {
        $course_category = CourseCategory::where(['is_active'=>1])->get();
        $courseLevels = CourseLevel::where(['is_active'=>1])->get();
        $courseTypes = CourseType::where(['is_active'=>1])->get();

        return view('template.pages.course.all-course',[
            'course_categories'=>$course_category,
            'courseLevels'=>$courseLevels,
            'courseTypes'=>$courseTypes
        ]);

    }


    public function courseByCategory($slug)
    {
        $course_category = CourseCategory::where(['is_active'=>1])->get();
        $courseLevels = CourseLevel::where(['is_active'=>1])->get();
        $courseTypes = CourseType::where(['is_active'=>1])->get();

        $single_category = CourseCategory::where(['slug'=>$slug])->first();
        if(is_null($single_category)){
            abort(404);
        }

        return view('template.pages.course.course-by-category',[
            'course_categories'=>$course_category,
            'courseLevels'=>$courseLevels,
            'courseTypes'=>$courseTypes,
            'single_category'=>$single_category
        ]);
    }




    public function search(Request $request)
    {
        $course_category = CourseCategory::where(['is_active'=>1])->get();
        $courseLevels = CourseLevel::where(['is_active'=>1])->get();
        $courseTypes = CourseType::where(['is_active'=>1])->get();

        return view('template.pages.course.search',[
            'course_categories'=>$course_category,
            'courseLevels'=>$courseLevels,
            'courseTypes'=>$courseTypes,
            'search'=>$request->search
        ]);
    }


    public function freeCourse()
    {
        return view('template.pages.course.free-course');
    }


    public function blog()
    {
        $blogs = BlogPost::with('category','author')->paginate(30);
        return view('template.pages.blog.blog',[
            'blogs'=>$blogs
        ]);
    }


    public function blogDetails($slug)
    {

        $blogs = BlogPost::with('category','author')
            ->where(['slug'=>$slug])->first();

        return view('template.pages.blog.blog-details',[
            'blog'=>$blogs
        ]);
    }






    public function instructors()
    {
        $teachers = Teacher::where(['is_active'=>1])->paginate(100);
        return view('template.pages.font-tier.instructors',[
            'teachers'=>$teachers
        ]);
    }

    public function contactUs()
    {
        return view('template.pages.font-tier.contact-us');
    }


    public function aboutUs()
    {
        return view('template.pages.font-tier.about-us');
    }


    public function photoGallery()
    {
        return view('template.pages.font-tier.photo-gallery');
    }


    public function freeResource()
    {
        return view('template.pages.font-tier.free-resource');
    }

    public function freeTools()
    {
        return view('template.pages.font-tier.free-tools');
    }


    public function contactUsSubmit(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);
        try{
            $inputs = $request->only('email','mobile','subject','message');
            $inputs['name'] = $request->first_name.' '.$request->last_name;
            ContactUs::create($inputs);
            session()->flash('success',"Message send successfully");
            return redirect()->back();
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }

}
