<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class ComponentRole extends Model
{
    protected $table = "component_roles";

    protected $fillable = [
        "role_id","component_id"
    ];

    protected $hidden = [
        "created_at","updated_at"
    ];

}
