<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = "blog_categories";

    protected $fillable = [
        'title','slug','is_active','comments'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
