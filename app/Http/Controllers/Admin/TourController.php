<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\TourCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Upload;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    public function index(){
        $tours = Tour::latest()->paginate(30);
        // dd($tours);
        return view('admin.tours.index', compact('tours'));
    }

    public function create(Request $request){
        DB::beginTransaction();
        try{
            if($request->isMethod('POST')){
                $request->validate([
                    'name' => 'required|string|max:255',
                    'type' => 'required',
                    'category' => 'required',
                    'subtitle' => 'string',
                    'org_price' => 'required',
                    'sale_price' => 'required',
                    'child_price' => 'required',
                    'infant_price' => 'required',
                    'fixed_charges' => 'required',
                    'fixed_charges_text' => 'string',
                    'short_description' => 'string',
                    'description' => 'string',
                    'what_this_tour' => 'string',
                    'important_information' => 'string',
                    'itenarary_description' => 'string',
                    'useful_information' => 'string',
                    'faq_details' => 'string',
                    'terms_condition' => 'string',
                    'cancellation_policy_name' => 'string',
                    'cancellation_policy_description' => 'string',
                    'child_cacellation_policy_name' => 'string',
                    'child_cacellation_policy_description' => 'string',
                    'thumbnail_img' => 'image|mimes:jpeg,png,jpg|max:1024',
                    'banner' => 'image|mimes:jpeg,png,jpg|max:1024',
                    'photo' => 'image|mimes:jpeg,png,jpg|max:1024',
                    // 'reporting_time' => '',
                    // 'start_time' => '',
                    'duration' => 'string',
                    'season' => 'string',
                    'max_guest' => 'string',
                    'departure_point' => 'string',
                    'child_age' => 'string',
                    'infant_age' => 'string',
                    'infant_count' => 'string',
                    'is_slot' => 'required',
                    'cut_off_time' => 'required|string',
                    'only_child' => 'required',
                    'latitude' => 'string',
                    'longitude' => 'string',
                    'google_map' => 'string',
                    'meal' => 'required',
                    'status' => 'required',
                    'featured' => 'required',
                    'admin_approval' => 'required'
                ]);
    
                if($request->org_price > $request->sale_price){
                    $discount = (($request->org_price - $request->sale_price)/$request->org_price)*100;
                    if($discount > 1){
                        $discount = $discount;
                    }else{
                        $discount = 0;
                    }
                }else{
                    $discount = 0;
                }
    
                $tour = new Tour();
                $tour->name     = $request->name;
                $tour->type     = $request->type;
                $tour->category = $request->category;
                $tour->subtitle = $request->subtitle;
                $tour->slug     = Str::slug($request->name);
                $tour->original_price   = round($request->org_price,2);
                $tour->sell_price       = round($request->sale_price,2);
                $tour->child_price      = round($request->child_price,2);
                $tour->infant_price     = round($request->infant_price,2);
                $tour->fixed_charges    = round($request->fixed_charges,2);
                $tour->fixed_charges_text       = round($request->fixed_charges_text,2);
                $tour->discount                 = round($discount);
                $tour->discount_type            = 'percent';
                $tour->short_description        = $request->short_description;
                $tour->description              = $request->description;
                $tour->tour_inclusion           = $request->tour_inclusion;
                $tour->what_this_tour           = $request->what_this_tour;
                $tour->important_information    = $request->important_information;
                $tour->itenarary_description    = $request->itenarary_description;
                $tour->useful_information       = $request->useful_information;
                $tour->faq_details              = $request->faq_details;
                $tour->terms_condition          = $request->terms_condition;
                $tour->cancellation_policy_name             = $request->cancellation_policy_name;
                $tour->cancellation_policy_description      = $request->cancellation_policy_description;
                $tour->child_cacellation_policy_name        = $request->child_cacellation_policy_name;
                $tour->child_cacellation_policy_description = $request->child_cacellation_policy_description;
                $tour->reporting_time   = $request->reporting_time;
                $tour->duration         = $request->duration;
                $tour->season           = $request->season;
                $tour->max_guest        = $request->max_guest;
                $tour->departure_point  = $request->departure_point;
                $tour->child_age        = $request->child_age;
                $tour->infant_age       = $request->infant_age;
                $tour->infant_count     = $request->infant_count;
                $tour->is_slot          = $request->is_slot;
                $tour->cut_off_time     = $request->cut_off_time;
                $tour->only_child       = $request->only_child;
                $tour->latitude         = $request->latitude;
                $tour->longitude        = $request->longitude;
                $tour->google_map       = $request->google_map;
                $tour->start_time       = $request->start_time;
                $tour->meal             = $request->meal;
                $tour->status           = $request->status;
                $tour->featured         = $request->featured;
                $tour->admin_approval   = $request->admin_approval;
    
                // Upload Thumbnail Image
                if($request->hasFile('thumbnail_img')){
                    $thumb_img = $request->file('thumbnail_img');
    
                    $extension = $thumb_img->getClientOriginalExtension();
                    $image_size = $thumb_img->getSize();
                    $file_name = "sdd-thumb-" . Str::random(36).'.'.$extension;
                    $path = public_path("/uploads/tours/tours/thumb");
                    
                    // Create directory if not exist
                    if(!File::isDirectory($path)){
                        File::makeDirectory($path, 0777, true, true);
                    }
    
                    try{
                        if(!empty(basename($thumb_img))){
                            copy($thumb_img, $path . "/" . $file_name);
                            // dd($thumb_img->getClientOriginalName());
    
                            $upload = new Upload();
                            $upload->file_original_name = @$thumb_img->getClientOriginalName();
                            $upload->file_name = '/uploads/tours/tours/thumb/'. $file_name;
                            $upload->user_id = Auth::user()->id;
                            $upload->file_size = $image_size ?? null;
                            $upload->extension = $extension ?? null;
                            $upload->type = 'image';
    
                            $upload->save();
                            $uploadedThumbImg = $upload->id;
                        }
                    }catch(\Exception $et){
                        dd($et);
                    }
                }

                // Upload Gallery Images
                if($request->hasFile('photos')){
                    $gal_img = $request->file('photos');
    
                    $extension = $gal_img->getClientOriginalExtension();
                    $image_size = $gal_img->getSize();
                    $file_name = "sdd-gal-" . Str::random(36).'.'.$extension;
                    $path = public_path("/uploads/tours/tours/gallery");
                    
                    // Create directory if not exist
                    if(!File::isDirectory($path)){
                        File::makeDirectory($path, 0777, true, true);
                    }
    
                    try{
                        if(!empty(basename($gal_img))){
                            copy($gal_img, $path . "/" . $file_name);
                            // dd($gal_img->getClientOriginalName());
    
                            $upload = new Upload();
                            $upload->file_original_name = @$gal_img->getClientOriginalName();
                            $upload->file_name = '/uploads/tours/tours/gallery/'. $file_name;
                            $upload->user_id = Auth::user()->id;
                            $upload->file_size = $image_size ?? null;
                            $upload->extension = $extension ?? null;
                            $upload->type = 'image';
    
                            $upload->save();
                            $uploadedGalImg = $upload->id;
                        }
                    }catch(\Exception $eg){
                        dd($eg);
                    }
                }

                // Upload Banner Images
                if($request->hasFile('banner')){
                    $banner_img = $request->file('banner');
    
                    $extension = $banner_img->getClientOriginalExtension();
                    $image_size = $banner_img->getSize();
                    $file_name = "sdd-banner-" . Str::random(36).'.'.$extension;
                    $path = public_path("/uploads/tours/tours/banner");
                    
                    // Create directory if not exist
                    if(!File::isDirectory($path)){
                        File::makeDirectory($path, 0777, true, true);
                    }
    
                    try{
                        if(!empty(basename($banner_img))){
                            copy($banner_img, $path . "/" . $file_name);
                            // dd($banner_img->getClientOriginalName());
    
                            $upload = new Upload();
                            $upload->file_original_name = @$banner_img->getClientOriginalName();
                            $upload->file_name = '/uploads/tours/tours/banner/'. $file_name;
                            $upload->user_id = Auth::user()->id;
                            $upload->file_size = $image_size ?? null;
                            $upload->extension = $extension ?? null;
                            $upload->type = 'image';
    
                            $upload->save();
                            $uploadedBannerImg = $upload->id;
                        }
                    }catch(\Exception $eb){
                        dd($eb);
                    }
                }
    
                $tour->thumbnail_img = $uploadedThumbImg;
                $tour->photos = $uploadedGalImg;
                $tour->banner = $uploadedBannerImg;
                
                $tour->save();

                DB::commit();
                return redirect()->route('admin.tours.index')->with('success', 'Tour Created Successfully!');
            }
        }catch(\Exception $ex){
            DB::rollBack();
            return redirect()->back()->with('error', $ex->getMessage().', '.$ex->getLine());
        }
        
        $tourCategories = TourCategory::where('status', 1)->get();
        return view('admin.tours.create', compact('tourCategories'));
    }

    public function edit(Request $request){
        DB::beginTransaction();
        try{
            $tour = Tour::where(['id' => $request->id])->first();
            if($request->isMethod('POST')){
                $request->validate([
                    'name' => 'required|string|max:255',
                    'type' => 'required',
                    'category' => 'required',
                    'subtitle' => 'string',
                    'org_price' => 'required',
                    'sale_price' => 'required',
                    'child_price' => 'required',
                    'infant_price' => 'required',
                    'fixed_charges' => 'required',
                    'fixed_charges_text' => 'string',
                    'short_description' => 'string',
                    'description' => 'string',
                    'what_this_tour' => 'string',
                    'important_information' => 'string',
                    'itenarary_description' => 'string',
                    'useful_information' => 'string',
                    'faq_details' => 'string',
                    'terms_condition' => 'string',
                    'cancellation_policy_name' => 'string',
                    'cancellation_policy_description' => 'string',
                    'child_cacellation_policy_name' => 'string',
                    'child_cacellation_policy_description' => 'string',
                    'thumbnail_img' => 'image|mimes:jpeg,png,jpg|max:1024',
                    'banner' => 'image|mimes:jpeg,png,jpg|max:1024',
                    'photo' => 'image|mimes:jpeg,png,jpg|max:1024',
                    // 'reporting_time' => '',
                    // 'start_time' => '',
                    'duration' => 'string',
                    'season' => 'string',
                    'max_guest' => 'string',
                    'departure_point' => 'string',
                    'child_age' => 'string',
                    'infant_age' => 'string',
                    'infant_count' => 'string',
                    'is_slot' => 'required',
                    'cut_off_time' => 'required|string',
                    'only_child' => 'required',
                    'latitude' => 'string',
                    'longitude' => 'string',
                    'google_map' => 'string',
                    'meal' => 'required',
                    'status' => 'required',
                    'featured' => 'required',
                    'admin_approval' => 'required'
                ]);

                if($request->org_price > $request->sale_price){
                    $discount = (($request->org_price - $request->sale_price)/$request->org_price)*100;
                    if($discount > 1){
                        $discount = $discount;
                    }else{
                        $discount = 0;
                    }
                }else{
                    $discount = 0;
                }

                $tour->name     = $request->name;
                $tour->type     = $request->type;
                $tour->category = $request->category;
                $tour->subtitle = $request->subtitle;

                if($tour->name !=  $request->name){
                    $tour->slug  = Str::slug($request->name);
                }

                $tour->original_price   = round($request->org_price,2);
                $tour->sell_price       = round($request->sale_price,2);
                $tour->child_price      = round($request->child_price,2);
                $tour->infant_price     = round($request->infant_price,2);
                $tour->fixed_charges    = round($request->fixed_charges,2);
                $tour->fixed_charges_text       = round($request->fixed_charges_text,2);
                $tour->discount                 = round($discount);
                $tour->discount_type            = 'percent';
                $tour->short_description        = $request->short_description;
                $tour->description              = $request->description;
                $tour->tour_inclusion           = $request->tour_inclusion;
                $tour->what_this_tour           = $request->what_this_tour;
                $tour->important_information    = $request->important_information;
                $tour->itenarary_description    = $request->itenarary_description;
                $tour->useful_information       = $request->useful_information;
                $tour->faq_details              = $request->faq_details;
                $tour->terms_condition          = $request->terms_condition;
                $tour->cancellation_policy_name             = $request->cancellation_policy_name;
                $tour->cancellation_policy_description      = $request->cancellation_policy_description;
                $tour->child_cacellation_policy_name        = $request->child_cacellation_policy_name;
                $tour->child_cacellation_policy_description = $request->child_cacellation_policy_description;
                $tour->reporting_time   = $request->reporting_time;
                $tour->duration         = $request->duration;
                $tour->season           = $request->season;
                $tour->max_guest        = $request->max_guest;
                $tour->departure_point  = $request->departure_point;
                $tour->child_age        = $request->child_age;
                $tour->infant_age       = $request->infant_age;
                $tour->infant_count     = $request->infant_count;
                $tour->is_slot          = $request->is_slot;
                $tour->cut_off_time     = $request->cut_off_time;
                $tour->only_child       = $request->only_child;
                $tour->latitude         = $request->latitude;
                $tour->longitude        = $request->longitude;
                $tour->google_map       = $request->google_map;
                $tour->start_time       = $request->start_time;
                $tour->meal             = $request->meal;
                $tour->status           = $request->status;
                $tour->featured         = $request->featured;
                $tour->admin_approval   = $request->admin_approval;

                // Upload Thumbnail Image
                if($request->hasFile('thumbnail_img')){
                    $thumb_img = $request->file('thumbnail_img');
    
                    $extension = $thumb_img->getClientOriginalExtension();
                    $image_size = $thumb_img->getSize();
                    $file_name = "sdd-thumb-" . Str::random(36).'.'.$extension;
                    $path = public_path("/uploads/tours/tours/thumb");
                    
                    // Create directory if not exist
                    if(!File::isDirectory($path)){
                        File::makeDirectory($path, 0777, true, true);
                    }
    
                    try{
                        if(!empty(basename($thumb_img))){
                            copy($thumb_img, $path . "/" . $file_name);
                            // dd($thumb_img->getClientOriginalName());
    
                            $upload = new Upload();
                            $upload->file_original_name = @$thumb_img->getClientOriginalName();
                            $upload->file_name = '/uploads/tours/tours/thumb/'. $file_name;
                            $upload->user_id = Auth::user()->id;
                            $upload->file_size = $image_size ?? null;
                            $upload->extension = $extension ?? null;
                            $upload->type = 'image';
                            
                            if($upload->save()){
                                $uploadedThumbImg = $upload->id;
                                Upload::where('id', $tour->thumbnail_img)->delete();
                                // unlink($oldBannerImage->file_name);
                                // $oldBannerImage->delete();
                            }
                        }
                    }catch(\Exception $et){
                        dd($et);
                    }
                }

                // Upload Gallery Images
                if($request->hasFile('photos')){
                    $gal_img = $request->file('photos');
    
                    $extension = $gal_img->getClientOriginalExtension();
                    $image_size = $gal_img->getSize();
                    $file_name = "sdd-gal-" . Str::random(36).'.'.$extension;
                    $path = public_path("/uploads/tours/tours/gallery");
                    
                    // Create directory if not exist
                    if(!File::isDirectory($path)){
                        File::makeDirectory($path, 0777, true, true);
                    }

                    try{
                        if(!empty(basename($gal_img))){
                            copy($gal_img, $path . "/" . $file_name);
                            // dd($gal_img->getClientOriginalName());
    
                            $upload = new Upload();
                            $upload->file_original_name = @$gal_img->getClientOriginalName();
                            $upload->file_name = '/uploads/tours/tours/gallery/'. $file_name;
                            $upload->user_id = Auth::user()->id;
                            $upload->file_size = $image_size ?? null;
                            $upload->extension = $extension ?? null;
                            $upload->type = 'image';
                            
                            if($upload->save()){
                                $uploadedGalImg = $upload->id;
                                Upload::where('id', $tour->photos)->delete();
                                // unlink($oldBannerImage->file_name);
                                // $oldBannerImage->delete();
                            }
                        }
                    }catch(\Exception $eg){
                        dd($eg);
                    }
                }

                // Upload Banner Images
                if($request->hasFile('banner')){
                    $banner_img = $request->file('banner');
    
                    $extension = $banner_img->getClientOriginalExtension();
                    $image_size = $banner_img->getSize();
                    $file_name = "sdd-banner-" . Str::random(36).'.'.$extension;
                    $path = public_path("/uploads/tours/tours/banner");
                    
                    // Create directory if not exist
                    if(!File::isDirectory($path)){
                        File::makeDirectory($path, 0777, true, true);
                    }
    
                    try{
                        if(!empty(basename($banner_img))){
                            copy($banner_img, $path . "/" . $file_name);
                            // dd($banner_img->getClientOriginalName());
    
                            $upload = new Upload();
                            $upload->file_original_name = @$banner_img->getClientOriginalName();
                            $upload->file_name = '/uploads/tours/tours/banner/'. $file_name;
                            $upload->user_id = Auth::user()->id;
                            $upload->file_size = $image_size ?? null;
                            $upload->extension = $extension ?? null;
                            $upload->type = 'image';

                            if($upload->save()){
                                $uploadedBannerImg = $upload->id;
                                Upload::where('id', $tour->banner)->delete();
                                // unlink($oldBannerImage->file_name);
                                // $oldBannerImage->delete();
                            }
                        }
                    }catch(\Exception $eb){
                        dd($eb);
                    }
                }
    
                $tour->thumbnail_img = $uploadedThumbImg ?? $request->thumbnail_img_old;
                $tour->photos = $uploadedGalImg ?? $request->photos_old;
                $tour->banner = $uploadedBannerImg ?? $request->banner_old;

                $tour->save();

                DB::commit();

                return redirect()->route('admin.tours.index')->with('success', 'Tour Updated Successfully!');
            }

        }catch(\Exception $ex){
            DB::rollBack();
            return redirect()->back()->with('error', $ex->getMessage().', '.$ex->getLine());
        }

        $tourCategories = TourCategory::where('status', 1)->get();
        return view('admin.tours.edit', compact('tourCategories', 'tour'));
    }

    public function delete(Request $reqest){
        return 'coming soon...';
    }
}
