<?php

namespace App\Http\Controllers\BackEnd\Dashboard;

use App\Http\Controllers\Controller;

class Auth2FAuthenticationController extends Controller
{
    public function enable2FAuth(){

        return view('backends.auth.2f-enable-form');

    }

}
