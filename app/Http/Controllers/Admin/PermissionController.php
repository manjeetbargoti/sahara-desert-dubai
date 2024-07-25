<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function update(Request $request, $teamId){

        $controllers = [];
        $notShowControllers = [];

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

        // dd($controllers);

        if($request->isMethod('POST')){
            
            DB::beginTransaction();

            try{

                dd($request->all());

            }catch(\Exception $e){

            }
        }

        return view('admin.role-permission.permission.update', compact('controllers', 'teamId'));
    }
}
