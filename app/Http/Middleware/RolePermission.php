<?php

namespace App\Http\Middleware;

use Closure;
use \App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RolePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->authorize1();
        return $next($request);
    }

    public function authorize1(){
        $action = app('request')->route()->getAction();

        $controller = class_basename($action['controller']);
        $namespace = $action['namespace'];

        $allowed = ['admin.logout'];

        if(in_array($action['as'], $allowed)){
            return 1;
        }

        list($controller, $action) = explode('@', $controller);

        $havePermission = Permission::where(['controller' => $controller, 'namespace' => $namespace, 'role_id' => Auth::guard(activeGuard())->user()->role_id])->first();
        
        if (Auth::guard(activeGuard())->user()->role_id == roleIdByType('admin'))
            return 1;

        if (!$havePermission)
            abort('401');

        if ($havePermission->permission_type == 'all')
            return 1;

        $allaction = explode(',', $havePermission->actions);

        if (in_array($action, $allaction))
            return 1;
        
        abort('401');
    }
}
