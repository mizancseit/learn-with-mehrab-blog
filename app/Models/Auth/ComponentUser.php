<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class ComponentUser extends Model
{
    protected $table = "component_users";

    protected $fillable = [
        "user_id","component_id"
    ];

    protected $hidden = [
        "created_at","updated_at"
    ];

}
