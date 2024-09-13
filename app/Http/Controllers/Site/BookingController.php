<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function submitBooking(Request $request){
        if($request->isMethod('POST')){
            dd($request->all());
        }
    }
}
