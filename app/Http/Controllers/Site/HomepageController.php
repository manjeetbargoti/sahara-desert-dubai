<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;

class HomepageController extends Controller
{
    public function index(){

        $popularTours = Tour::where(['status'=>1,'admin_approval'=>1])->latest()->limit(10)->get();

        return view('frontend.homepage', compact('popularTours'));
    }

    public function tourDetail(Request $request){
        return view('frontend.tours.detail');
    }
}
