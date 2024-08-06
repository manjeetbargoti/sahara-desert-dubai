<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){
        return view('frontend.homepage');
    }

    public function tourDetail(Request $request){
        return view('frontend.tours.detail');
    }
}
