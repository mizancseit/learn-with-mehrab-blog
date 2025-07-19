<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testmonial extends Model
{
    protected $table = "testimonials";

    protected $fillable = [
        'customer_name','company_name','designation','comments','is_active','image'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

}
