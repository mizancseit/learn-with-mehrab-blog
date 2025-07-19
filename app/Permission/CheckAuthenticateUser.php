<?php

namespace App\Permission;

class CheckAuthenticateUser
{
    public static function canAccess($action, $user)
    {
        $permissions = $user->getDirectPermissions()->pluck('action')->toArray();

//        echo $action;
//        dd($permissions);

        if(!in_array($action,$permissions)){
            return false;
        }
        return true;
    }

}
