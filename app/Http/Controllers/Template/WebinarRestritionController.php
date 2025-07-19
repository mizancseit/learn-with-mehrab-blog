<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\Template\FrontTier\WebinarResitrationRequest;
use App\Models\LMS\WebinarStudent;
use Illuminate\Http\Request;

class WebinarRestritionController extends Controller
{

    public function register(WebinarResitrationRequest $request)
    {
        try{
            $inputs = $request->only('course_id',"webinar_id","name","email","mobile");
            WebinarStudent::create($inputs);
            session()->flash('success','Registration complete successfully');
            return redirect()->back();
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }

}
