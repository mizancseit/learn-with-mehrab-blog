<?php

namespace App\Http\Controllers;



use App\Models\User;

class ProfileController extends Controller
{

    public function profile($user_id)
    {
        //$user = User::find(auth()->user()->id);

        return view('profile');
    }

}
