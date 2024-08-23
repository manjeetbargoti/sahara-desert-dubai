<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourCategory;
use App\Models\Upload;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TourCategoryController extends Controller
{
    public function index(){
        $toursCategories = TourCategory::latest()->paginate(30);
        return view('admin.tours.category.index', compact('toursCategories'));
    }

    public function create(Request $request){
        if($request->isMethod('POST')){
            $request->validate([
                'name' => 'required|string|max:255',
                'thumbnail_img' => 'image|mimes:jpeg,png,jpg|max:1024',
                'banner' => 'image|mimes:jpeg,png,jpg|max:1024',
                'status' => 'required'
            ]);

            $tourCategory = new TourCategory();
            $tourCategory->name = $request->name;
            $tourCategory->slug = Str::slug($request->name);
            $tourCategory->status = $request->status;

            // Upload Thumbnail Image
            if($request->hasFile('thumbnail_img')){
                $thumb_img = $request->file('thumbnail_img');

                $extension = $thumb_img->getClientOriginalExtension();
                $image_size = $thumb_img->getSize();
                $file_name = "sdd-thumb-" . Str::random(36).'.'.$extension;
                $path = public_path("/uploads/tours/category/thumb");
                
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
                        $upload->file_name = '/uploads/tours/category/thumb/'. $file_name;
                        $upload->user_id = Auth::user()->id;
                        $upload->file_size = $image_size ?? null;
                        $upload->extension = $extension ?? null;
                        $upload->type = 'image';

                        $upload->save();
                        $uploadedThumbImg = $upload->id;
                    }
                }catch(\Exception $e){
                    dd($e);
                }
            }

            // Upload Banner Image
            if($request->hasFile('banner')){
                $banner_img = $request->file('banner');

                $extension = $banner_img->getClientOriginalExtension();
                $image_size = $banner_img->getSize();
                $file_name = "sdd-banner-" . Str::random(36).'.'.$extension;
                $path = public_path("/uploads/tours/category/banner");

                // Create directory if not exist
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }

                try{
                    if(!empty(basename($banner_img))){
                        copy($banner_img, $path . "/" . $file_name);

                        $upload = new Upload();
                        $upload->file_original_name = @$banner_img->getClientOriginalName();
                        $upload->file_name = '/uploads/tours/category/banner/'.$file_name;
                        $upload->user_id = Auth::user()->id;
                        $upload->file_size = $image_size ?? null;
                        $upload->extension = $extension ?? null;
                        $upload->type = 'image';

                        $upload->save();
                        $uploadedBannerImg = $upload->id;
                    }
                }catch(\Exception $e){
                    dd($e);
                }
            }

            $tourCategory->thumbnail_img = $uploadedThumbImg ?? null;
            $tourCategory->banner = $uploadedBannerImg ?? null;

            $tourCategory->save();
            return redirect()->route('admin.tours.category.index')->with('success', 'Tour Category Created Successfully!');
        }

        return view('admin.tours.category.create');
    }
}