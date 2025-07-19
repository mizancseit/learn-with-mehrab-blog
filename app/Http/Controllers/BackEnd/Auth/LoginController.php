<?php

namespace App\Http\Controllers\BackEnd\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function loginForm()
    {
        return view('backends.auth.login');
    }


}
