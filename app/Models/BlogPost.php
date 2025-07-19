<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPost extends Model
{
    protected $table = "blogs";

    protected $fillable = [
        'title','slug','thumbnail','description','category_id','author_id','is_active','meta_keyword','meta_description'
    ];



    protected $hidden = [
        'created_at','updated_at'
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class,'category_id');

    }


    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class,'author_id');

    }

}
