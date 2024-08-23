<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\TourCategory;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index(){
        $tours = Tour::latest()->paginate(30);
        return view('admin.tours.index', compact('tours'));
    }

    public function create(Request $request){
        if($request->isMethod('POST')){
            dd($request->all());
        }

        $tourCategories = TourCategory::where('status', 1)->get();
        return view('admin.tours.create', compact('tourCategories'));
    }

    public function edit(Request $request){
        return 'coming soon...';
    }

    public function delete(Request $reqest){
        return 'coming soon...';
    }
}
