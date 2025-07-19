<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginActivity extends Model
{

    protected $table = "login_activities";

    protected $fillable = [
        'ip_address','browser','platform','user_id'
    ];

    //ip_address

    protected $hidden = [
        'created_at','updated_at'
    ];

}
