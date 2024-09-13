<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteSettings;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WebsiteSettingController extends Controller
{
    public function generalSettings(){
        return view('admin.website-settings.general_settings');
    }

    public function updateGeneral(Request $request){
        foreach ($request->types as $key => $type) {
            $website_settings = WebsiteSettings::where('type', $type)->first();
            if($website_settings!=null){
                if(gettype($request[$type]) == 'array'){
                    $website_settings->value = json_encode($request[$type]);
                }
                else {
                    $website_settings->value = $request[$type];
                }
                $website_settings->save();
            }else{
                $website_settings = new WebsiteSettings;
                $website_settings->type = $type;
                if(gettype($request[$type]) == 'array'){
                    $website_settings->value = json_encode($request[$type]);
                }else {
                    $website_settings->value = $request[$type];
                }
                $website_settings->save();
            }
        }
        
        return redirect()->back()->with('success', 'Settings Updated Successfully!');
    }

    public function imagesUpdate(Request $request){
        // dd($request->all());
        DB::beginTransaction();
        try{
            if($request->isMethod('POST')){
                // Upload Banner Images
                if($request->hasFile('website_logo')){
                    $website_logo = $request->file('website_logo');
    
                    $extension = $website_logo->getClientOriginalExtension();
                    $image_size = $website_logo->getSize();
                    $file_name = "sdd-logo-" . Str::random(36).'.'.$extension;
                    $path = public_path("/uploads/website/settings/general");
                    
                    // Create directory if not exist
                    if(!File::isDirectory($path)){
                        File::makeDirectory($path, 0777, true, true);
                    }
    
                    try{
                        if(!empty(basename($website_logo))){
                            copy($website_logo, $path . "/" . $file_name);
                            // dd($website_logo->getClientOriginalName());
    
                            $upload = new Upload();
                            $upload->file_original_name = @$website_logo->getClientOriginalName();
                            $upload->file_name = '/uploads/website/settings/general/'. $file_name;
                            $upload->user_id = Auth::user()->id;
                            $upload->file_size = $image_size ?? null;
                            $upload->extension = $extension ?? null;
                            $upload->type = 'image';
    
                            $upload->save();
                            $uploadedWebLogo = $upload->id;
                        }
                    }catch(\Exception $eb){
                        dd($eb);
                    }
                }

                // Upload Website Fevicon
                if($request->hasFile('website_icon')){
                    $website_icon = $request->file('website_icon');
    
                    $extension = $website_icon->getClientOriginalExtension();
                    $image_size = $website_icon->getSize();
                    $file_name = "sdd-icon-" . Str::random(36).'.'.$extension;
                    $path = public_path("/uploads/website/settings/general");
                    
                    // Create directory if not exist
                    if(!File::isDirectory($path)){
                        File::makeDirectory($path, 0777, true, true);
                    }
    
                    try{
                        if(!empty(basename($website_icon))){
                            copy($website_icon, $path . "/" . $file_name);
                            // dd($website_icon->getClientOriginalName());
    
                            $upload = new Upload();
                            $upload->file_original_name = @$website_icon->getClientOriginalName();
                            $upload->file_name = '/uploads/website/settings/general/'. $file_name;
                            $upload->user_id = Auth::user()->id;
                            $upload->file_size = $image_size ?? null;
                            $upload->extension = $extension ?? null;
                            $upload->type = 'image';
    
                            $upload->save();
                            $uploadedWebIcon = $upload->id;
                        }
                    }catch(\Exception $ei){
                        dd($ei);
                    }
                }

                // Upload Homepage Banner
                if($request->hasFile('homepage_banner')){
                    $homepage_banner = $request->file('homepage_banner');
    
                    $extension = $homepage_banner->getClientOriginalExtension();
                    $image_size = $homepage_banner->getSize();
                    $file_name = "sdd-icon-" . Str::random(36).'.'.$extension;
                    $path = public_path("/uploads/website/settings/general");
                    
                    // Create directory if not exist
                    if(!File::isDirectory($path)){
                        File::makeDirectory($path, 0777, true, true);
                    }
    
                    try{
                        if(!empty(basename($homepage_banner))){
                            copy($homepage_banner, $path . "/" . $file_name);
                            // dd($homepage_banner->getClientOriginalName());
    
                            $upload = new Upload();
                            $upload->file_original_name = @$homepage_banner->getClientOriginalName();
                            $upload->file_name = '/uploads/website/settings/general/'. $file_name;
                            $upload->user_id = Auth::user()->id;
                            $upload->file_size = $image_size ?? null;
                            $upload->extension = $extension ?? null;
                            $upload->type = 'image';
    
                            $upload->save();
                            $uploadedHomepageBanner = $upload->id;
                        }
                    }catch(\Exception $eh){
                        dd($eh);
                    }
                }

                WebsiteSettings::where(['type' => 'website_logo'])->update(['value' => $uploadedWebLogo ?? $request->website_logo_old]);
                WebsiteSettings::where(['type' => 'website_icon'])->update(['value' => $uploadedWebIcon ?? $request->website_icon_old]);
                WebsiteSettings::where(['type' => 'homepage_banner'])->update(['value' => $uploadedHomepageBanner ?? $request->homepage_banner_old]);

                DB::commit();
                return redirect()->back()->with('success', 'Settings updated successfully!');
            }

        }catch(\Exception $el){
            DB::rollBack();
            return redirect()->back()->with('error', $el->getMessage().', '.$el->getLine());
        }
    }

    // Update social settings
    public function socialUpdate(Request $request){
        foreach ($request->types as $key => $type) {
            $website_settings = WebsiteSettings::where('type', $type)->first();
            if($website_settings!=null){
                if(gettype($request[$type]) == 'array'){
                    $website_settings->value = json_encode($request[$type]);
                }
                else {
                    $website_settings->value = $request[$type];
                }
                $website_settings->save();
            }else{
                $website_settings = new WebsiteSettings;
                $website_settings->type = $type;
                if(gettype($request[$type]) == 'array'){
                    $website_settings->value = json_encode($request[$type]);
                }else {
                    $website_settings->value = $request[$type];
                }
                $website_settings->save();
            }
        }
        
        return redirect()->back()->with('success', 'Settings Updated Successfully!');
    }
}
