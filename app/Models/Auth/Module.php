<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    protected $table = "modules";

    const PAGINATE = 50;

    protected $fillable = [
        "title","is_active","slug","comments","sorting","action_url","icon"
    ];

    protected $hidden = [
        "created_at","updated_at"
    ];


    public function permissions(): HasMany{
        return $this->hasMany(Permission::class,'module_id','id');
    }

    public function getPermission($sub_module_id){
        return Permission::where(['component_id'=>$sub_module_id])->get();
    }


    public function components() : HasMany{
        return $this->hasMany(Component::class,'module_id','id');
    }

    public function scopeIsActive($query){
        return $query->where('is_active',1);
    }


}
