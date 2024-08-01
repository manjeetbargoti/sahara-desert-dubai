<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function update(Request $request, $teamId){

        $controllers = [];
        $notShowControllers = [
            'AuthController',
            'LoginController',
            'RegisteredUserController'
        ];

        foreach(Route::getRoutes()->getRoutes() as $route){
            $action = $route->getAction();
            
            if(array_key_exists('controller', $action)){
                $namespace = explode('\\', $action['namespace']);
                $namespace = end($namespace);
                if(in_array($namespace, ['Admin', 'Site', 'Common'])){
                    // echo $action['controller'].'<br>';
                    $namespace = $namespace.'||'.$action['namespace'];
                    $explodedata = explode('@', $action['controller']);

                    $oicArray = explode('\\', $explodedata[0]);
                    $cont = count($oicArray);
                    $cName = $oicArray[$cont - 1];

                    if (!in_array($cName, $notShowControllers)) {
                        $controllers[$namespace][$cName][] = $explodedata[1];
                    }
                }
            }
        }

        ksort($controllers);
        foreach($controllers as &$value) {
                ksort($value);
        }

        if($request->isMethod('POST')){
            
            DB::beginTransaction();

            try{
                // dd(Auth::guard(activeGuard()));
                if($request->has('routes')){
                    $routes = $request->routes;
                    Permission::where(['role_id' => $teamId])->delete();

                    if(!empty($routes)){
                        foreach($routes as $key => $route){
                            if(isset($route['type'])){
                                if($route['type'] == 'custom'){
                                    if(!isset($route['actions'])){
                                        $route['type'] = 'all';
                                    }
                                }

                                $data = [
                                    'role_id' => (int) $teamId,
                                    'namespace' => $route['namespace'],
                                    'controller' => $route['controller']
                                ];

                                $where = $data;

                                if($route['type'] == 'custom'){
                                    $data['permission_type'] = 'custom';
                                    $data['actions'] = implode(",", $route['actions']);
                                }elseif($route['type'] == 'all'){
                                    $actions = [];
                                    foreach(Route::getRoutes()->getRoutes() as $r){
                                        $action = $r->getAction();
                                        if(array_key_exists('controller', $action)){
                                            if($action['namespace'] == $route['namespace']){
                                                $explodedata = explode('@', $action['controller']);
                                                if($explodedata[0] == $route['namespace'].'\\'.$route['controller']){
                                                    $actions[] = $explodedata[1];
                                                }
                                            }
                                        }
                                    }

                                    $data['permission_type'] = 'all';
                                    $data['actions'] = implode(',', $actions);
                                }
                                
                                Permission::create($data);
                            }
                        }
                    }

                    DB::commit();
                }
                return back()->with('success', 'Permission Updated Successfully!');
            }catch(\Illuminate\Database\QueryException $e){
                DB::rollback();
                return back()->with('error', $e->getMessage())->withInput();
            }catch(\Exception $ec){
                DB::rollback();
                return back()->with('error', $ec->getMessage())->withInput();
            }
        }

        return view('admin.role-permission.permission.update', compact('controllers', 'teamId'));
    }
}
