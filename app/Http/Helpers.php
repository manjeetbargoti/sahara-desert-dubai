<?php

use App\Models\Role;
use App\Models\Upload;
use App\Models\WebsiteSettings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

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

if (! function_exists('single_price')) {
    function single_price($price)
    {
        return format_price(convert_price($price));
    }
}

//formats currency
if (! function_exists('format_price')) {
    function format_price($price)
    {
        // if(BusinessSetting::where('type', 'symbol_format')->first()->value == 1){
        //     return currency_symbol().' '.number_format($price, 2);
        // }
        // return number_format($price, 2).currency_symbol();
        return currency_symbol().' '.number_format($price, 2);
    }
}

//converts currency to home default currency
if (! function_exists('convert_price')) {
    function convert_price($price)
    {
        $price = floatval($price);

        return $price;
    }
}

if (! function_exists('currency_symbol')) {
    function currency_symbol()
    {
        if(Session::has('locale')){
            $locale = Session::get('locale', Config::get('app.locale'));
            if($locale == 'ae') {
                $currency_symbol = 'درهم';
            }else{
                $currency_symbol = 'AED';
            }
        }
        else{
            $currency_symbol = 'AED';
        }

        return $currency_symbol;
    }
}

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        $setting = WebsiteSettings::where('type', $key)->first();
        return $setting == null ? $default : $setting->value;
    }
}