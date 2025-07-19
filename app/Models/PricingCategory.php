<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingCategory extends Model
{
    protected $table = "pricing_categories";

    protected $fillable = [
        'title','slug','is_active','comments'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

}
