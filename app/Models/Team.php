<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = "teams";

    protected $fillable = [
        'name','designation','image','fb_link','twiter_link','linkedin_link','instagram_link','sort_by','is_active'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
