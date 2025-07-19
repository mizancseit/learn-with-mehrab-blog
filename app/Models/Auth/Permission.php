<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Permission extends Model
{

    protected $table = "permissions";

    const PAGINATE = 50;

    protected $fillable = [
        "name","guard_name","module_id","component_id","action","professional_name","url","is_show_menu"
    ];

    protected $hidden = [
        "created_at","updated_at"
    ];

    public function module() : HasOne{
        return $this->hasOne(Module::class,'id','module_id');
    }

    public function component() : HasOne{
        return $this->hasOne(Component::class,'id','component_id');
    }

}
