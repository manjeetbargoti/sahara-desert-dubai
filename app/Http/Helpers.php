<?php

use App\Models\Role;
use Illuminate\Support\Facades\Auth;

function activeGuard($except = array()){

    foreach(array_keys(config('auth.guards')) as $guard){
        if(!in_array($guard, $except)){
            if(auth()->guard($guard)->check()) return $guard;
        }
    }

    return null;
}

if (!function_exists('roleIdByType')) {
    function roleIdByType($type)
    {
        $role = Role::where('user_type', $type)->first(['id']);
        // $roleId = $role->id;
        return $role->id;
    }
}