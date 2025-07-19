<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Models\LMS\CourseStudent;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function dashboard()
    {
        return view('template.pages.font-tier.student.dashboard');
    }


    public function coursePurchase(Request $request)
    {
        $request->validate([
            'course_id'=>'required',
            'batch_id'=>'required',
        ]);

        try {

            CourseStudent::create([
                'course_id'=>$request->course_id,
                'batch_id'=>$request->batch_id,
                'user_id'=>auth()->user()->id,
                'name'=>auth()->user()->name,
                'email'=>auth()->user()->email,
                'mobile'=>auth()->user()->mobile,
                'fee'=>$request->fee,
                'discount'=>$request->discount,
                'advanced'=>$request->advanced,
            ]);

            session()->flash('success','Course Purchase Successfully');
            return redirect()->back();
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }

    }

}
