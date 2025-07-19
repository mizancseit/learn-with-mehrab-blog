<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pricing extends Model
{
    protected $table = "pricing";

    protected $fillable = [
        'title','amount','slug','pricing_category_id','short_description','long_description','is_view_long_description','is_active','meta_keyword','meta_description'
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(PricingCategory::class,'pricing_category_id');
    }

    protected $hidden = [
        'created_at','updated_at'
    ];

}
