<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\AboutCompany;
use App\Models\BlogPost;
use App\Models\ContactUs;
use App\Models\Pricing;
use App\Models\Team;
use App\Models\Testmonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){

        $teams = Team::where(['is_active'=>1])->paginate(10);

        $testimonials = Testmonial::where(['is_active'=>1])->orderBy('id','desc')->paginate(20);

        $pricing = Pricing::where(['is_active'=>1])->orderBy('id','desc')->paginate(3);

        $blogs = BlogPost::with('author','category')->where(['is_active'=>1])->orderBy('id','desc')->paginate(3);

        return view('frontends.index',[
            'teams'=>$teams,
            'testimonials'=>$testimonials,
            'pricing'=>$pricing,
            'blogs'=>$blogs,
        ]);

    }




    public function aboutUs(){
        return view('frontends.about-us');
    }



    public function missionAndVision()
    {
        return view('frontends.mission-and-vision');
    }


    public function whyDataRecovery()
    {
        return view('frontends.why-data-recovery');
    }


    public function companyProfile()
    {
        return view('frontends.company-profile');
    }

    public function dataRecoveryProcess()
    {
        return view('frontends.data-recovery-process');
    }



    public function contactUs()
    {
        return view('frontends.contact-us');
    }






    public function sendMessage(Request $request)
    {
        $inputs = $request->only('name','email','subject','message');
        try{
            ContactUs::create($inputs);
            session()->flash('success','Message send successfully');
            return redirect()->route('home');
        }catch (\Exception $exception){
            dd($exception->getMessage());
            session()->flash('error',$exception->getMessage());
            return redirect()->route('home');
        }
    }


    public function sendContactUsMessage(Request $request)
    {
        $inputs = $request->only('name','email','subject','message');

        try{
            ContactUs::create($inputs);
            session()->flash('success','Message send successfully');
            return redirect()->route('contact.us.page');

        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->route('home');
        }
    }


}
