<?php

namespace App\Http\Controllers\BackEnd\UserManagement;

use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        return view('backends.user_management.users.index');
    }

}
