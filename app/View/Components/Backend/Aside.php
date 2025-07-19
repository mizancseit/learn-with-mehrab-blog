<?php

namespace App\View\Components\Backend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Aside extends Component
{
    /**
     * Create a new component instance.
     */
    public $userComponents = array();

    public function __construct()
    {
//        $permissions = auth()->user()->getDirectPermissions()->pluck('id')->toArray();
//

//
//        $clickableModule = \App\Models\Auth\Module::with('components:id,title,is_dropdown,professional_name,slug,action,module_id,icons','components.componet_permissions')
//            ->where(['slug'=>$moduleslug])
//            ->first();
//
//        $user_componets = array();
//        $component_permissions = array();
//        if(!is_null($clickableModule)){ //&& isset($url_slug[1])
//            $user_componets = $clickableModule->components;
//        }
//
//        $this->user_componets = $user_componets;
//        $this->submodule_ids = $submodule_ids;


        $submodule_ids = \App\Models\Auth\ComponentUser::where(['user_id'=>auth()->user()->id])
            ->pluck('component_id')
            ->toArray();


        $this->userComponents = \App\Models\Auth\Component::where(['is_active'=>1])->whereIn('id',$submodule_ids)->get();

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {


        return view('components.backend.aside');
    }
}
