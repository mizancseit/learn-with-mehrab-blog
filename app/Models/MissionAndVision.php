<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MissionAndVision extends Model
{
    protected $table = "mission_and_visions";

    protected $fillable = [
        'title','description','type','sort_by','is_active'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
