<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = [];

    public static function havePermission($teamId, $namespace, $controller) {

        return Permission::where(['role_id' => $teamId, 'namespace' => $namespace,  'controller' => $controller])->first();
    }
}
