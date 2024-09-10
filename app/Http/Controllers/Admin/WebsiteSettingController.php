<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteSettings;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Upload;
use Illuminate\Support\Facades\Auth;

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
                    $homepageBanner = '';
                    $websiteIcon = '';
                    $websiteLogo = '';
                    if($type == 'homepage_banner'){
                        // Upload Homepage Banner
                        if($request->hasFile('homepage_banner')){
                            $home_banner = $request->file('homepage_banner');
                            $extension = $home_banner->getClientOriginalExtension();
                            $image_size = $home_banner->getSize();
                            $file_name = "sdd-home-banner-" . Str::random(36).'.'.$extension;
                            $path = public_path("/uploads/website/settings/general");
                            
                            // Create directory if not exist
                            if(!File::isDirectory($path)){
                                File::makeDirectory($path, 0777, true, true);
                            }
            
                            try{
                                if(!empty(basename($home_banner))){
                                    copy($home_banner, $path . "/" . $file_name);
                                    // dd($home_banner->getClientOriginalName());
            
                                    $upload = new Upload();
                                    $upload->file_original_name = @$home_banner->getClientOriginalName();
                                    $upload->file_name = '/uploads/website/settings/general/'. $file_name;
                                    $upload->user_id = Auth::user()->id;
                                    $upload->file_size = $image_size ?? null;
                                    $upload->extension = $extension ?? null;
                                    $upload->type = 'image';
                                    
                                    $upload->save();
                                    // $homepageBanner .= $upload->id;
                                    // dd($homepageBanner);
                                }
                            }catch(\Exception $et){
                                dd($et);
                            }
                        }
                        
                        $homepageBanner .= $upload->id;
                    }
                    if($type == 'website_icon'){
                        $websiteIcon .= 11;
                    }
                    if($type == 'website_logo'){
                        $websiteLogo .= 12;
                    }
                    // dd($homepageBanner);
                    $request['homepage_banner'] .= $homepageBanner;
                    $request['website_icon'] .= $websiteIcon;
                    $request['website_logo'] .= $websiteLogo;
                    // dd($request);
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
