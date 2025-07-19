<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{

    protected $table = "about_sections";

    protected $fillable = [
        'title','description','media'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

}
