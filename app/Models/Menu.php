<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menus";

    protected $fillable = [
        'title','slug','is_main_menu','main_menu_id','sort_by','is_active','is_highlight'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

    public function subMenu(){
        return $this->belongsTo(Menu::class,'main_menu_id');
    }


    public function dropdown(){
        return $this->hasMany(Menu::class,'main_menu_id','id');
    }


}
