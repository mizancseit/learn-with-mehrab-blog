<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = "galleries";

    protected $fillable = [
        'title','type','gallery_category_id','sort_by','is_active'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
