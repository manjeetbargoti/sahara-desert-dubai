<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;

class HomepageController extends Controller
{
    public function index(){

        $popularTours = Tour::where(['status'=>1,'admin_approval'=>1, 'featured' => 1])->latest()->limit(10)->get();
        $recentTours = Tour::where(['status'=>1,'admin_approval'=>1])->latest()->limit(10)->get();

        return view('frontend.homepage_new', compact('popularTours', 'recentTours'));
    }

    public function tourList(){
        $tour_count = Tour::where(['status'=>1,'admin_approval'=>1])->count();
        $tours = Tour::where(['status'=>1,'admin_approval'=>1])->latest()->cursorPaginate(20);

        return view('frontend.tours.tour_list', compact('tours', 'tour_count'));
    }

    public function tourDetail(Request $request){
        $tour = Tour::where(['slug'=>$request->slug, 'status' => 1, 'admin_approval' => 1])->first();
        if(!empty($tour)){
            $related_tours = Tour::where(['status'=>1,'admin_approval'=>1])->latest()->limit(10)->get();
            return view('frontend.tours.detail', compact('tour','related_tours'));
        }else{
            return redirect()->route('home');
        }
    }

    public function contactUs(){
        return view('frontend.contact_us');
    }
}
