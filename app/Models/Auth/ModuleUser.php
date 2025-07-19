<?php

namespace App\Models\Auth;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ModuleUser extends Model
{
    protected $table = "module_users";

    protected $fillable = [
        "user_id","module_id"
    ];

    protected $hidden = [
        "created_at","updated_at"
    ];


    public function module() : HasOne{
        return $this->hasOne(Module::class,'id','module_id');
    }

    public function componentUser() : HasMany{
        return $this->hasMany(ComponentUser::class,'user_id','user_id');
    }


    public function modules() : HasMany{
        return $this->hasMany(Module::class,'id','module_id');
    }

}
