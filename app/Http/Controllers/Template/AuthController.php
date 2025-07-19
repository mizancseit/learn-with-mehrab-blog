<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        return view("template.pages.auth.login");
    }


    public function loginSubmit(Request $request)
    {

    }


    public function register(Request $request)
    {
        return view("template.pages.auth.register");
    }


    public function registerSubmit(Request $request)
    {

        $request->validate([
            'name'=>'required|max:255',
            'mobile'=>'required|min:11',
            'email'=>'required|email',
            'password'=>'required|min:4|max:20|confirmed'
        ]);

        try{

            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'mobile'=>$request->mobile,
                'password'=>bcrypt($request->password),
                'flag'=>'user',
                'role_id'=>2
            ]);

            session()->flash('success','Account Create successfully.');
            return redirect()->route('login');

        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back()->onlyInput('name','email','mobile');
        }

    }

}
