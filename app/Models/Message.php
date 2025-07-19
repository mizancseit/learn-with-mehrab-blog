<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "messages";

    protected $fillable = [
        'name','designation','image','description','sort_by','is_active'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
