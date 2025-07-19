<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Component extends Model
{
    protected $table = "components";

    const PAGINATE = 50;

    protected $fillable = [
        "title","professional_name","slug","action","icons","comments","is_active","module_id","is_dropdown"
    ];

    protected $hidden = [
        "created_at","updated_at"
    ];

    public function module() : HasOne{
        return $this->hasOne(Module::class,'id','module_id');
    }


    public function permissions() : HasMany{
        return $this->hasMany(\Spatie\Permission\Models\Permission::class,'id','component_id');
    }

    public function componet_permissions(): HasMany{
        return $this->hasMany(Permission::class,'component_id','id');
    }

    public function scopeIsActive($query){
        return $query->where('is_active',1);
    }

}
