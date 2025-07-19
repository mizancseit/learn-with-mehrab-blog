<?php

namespace App\Http\Controllers\BackEnd\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backends.dashboard.admin_dashboard');
    }


    public function changePassword(ChangePasswordRequest $request){

    }

}
