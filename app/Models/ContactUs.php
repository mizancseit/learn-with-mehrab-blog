<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = "contacts";

    protected $fillable = [
        'name','email','mobile','subject','message'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
