<?php

use App\Models\Role;
use App\Models\Upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

// Return file uploaded via uploader
if (!function_exists('uploaded_asset')) {
    function uploaded_asset($id)
    {
        if (($asset = Upload::find($id)) != null) {
            return my_asset(@$asset->file_name);
        }else{
            return $url = url('/uploads/dummy-img.jpg');
        }
    }
}


if (! function_exists('my_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function my_asset($path, $secure = null)
    {
        if(env('FILESYSTEM_DRIVER') == 's3'){
            return Storage::disk('s3')->url($path);
        }
        else {
            // return app('url')->asset('/'.$path, $secure);
            if(file_exists(public_path($path))){
                $url = env('APP_URL').@$path;
            }else{
                $url = asset('/uploads/dummy-img.jpg');
            }

            return $url;
        }
    }
}