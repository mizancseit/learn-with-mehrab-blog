<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    protected $table = "roles";

    const PAGINATE = 50;

    protected $fillable = [
        "name","guard_name","is_active","flag"
    ];

    protected $hidden = [
        "created_at","updated_at"
    ];

}
