<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    // Edit vendor profile information
    public function edit(Request $request)
    {
        $shop = Shop::where(['user_id' => Auth::user()->id])->first();

        if (@$request->isMethod('post')) {
            if (!empty($shop)) {
                $shop->name             = $request->name;
                $shop->slug             = Str::slug($request->name);
                $shop->country_code     = $request->country_code;
                $shop->phone            = $request->phone;
                $shop->email            = $request->email;
                $shop->address          = $request->address;
                $shop->country          = $request->country;
                $shop->state            = $request->state;
                $shop->city             = $request->city;
                $shop->postal_code      = $request->postal_code;
                $shop->facebook         = $request->facebook;
                $shop->twitter          = $request->twitter;
                $shop->youtube          = $request->youtube;
                $shop->google           = $request->google;
                $shop->instagram        = $request->instagram;

                $shop->save();

                flash()->success('Shop updated successfully!');

                return view('frontend.seller.settings.shop', compact('shop'));
            } else {
                $shop = new Shop();
                $shop->user_id          = Auth::user()->id;
                $shop->name             = $request->name;
                $shop->slug             = Str::slug($request->name);
                $shop->country_code     = $request->country_code;
                $shop->phone            = $request->phone;
                $shop->email            = $request->email;
                $shop->address          = $request->address;
                $shop->country          = $request->country;
                $shop->state            = $request->state;
                $shop->city             = $request->city;
                $shop->postal_code      = $request->postal_code;
                $shop->facebook         = $request->facebook;
                $shop->twitter          = $request->twitter;
                $shop->youtube          = $request->youtube;
                $shop->google           = $request->google;
                $shop->instagram        = $request->instagram;

                $shop->save();

                flash()->success('Shop updated successfully!');

                return view('frontend.seller.settings.shop', compact('shop'));
            }
        }

        return view('frontend.seller.settings.shop', compact('shop'));
    }
}
