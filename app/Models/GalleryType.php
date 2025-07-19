<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryType extends Model
{

    protected $table = "gallery_types";

    protected $fillable = [
        'title','sort_by','is_active'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

}
