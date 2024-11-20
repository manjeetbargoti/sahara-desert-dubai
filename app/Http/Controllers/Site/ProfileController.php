<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Models\Wallet;

class ProfileController extends Controller
{
    public function dashboard(){
        $vendorBookings = Booking::where(['vendor_id'=>Auth::user()->id])->latest()->limit(10)->get();
        $vendorBookingsCount = Booking::where(['vendor_id' => Auth::user()->id])->count();
        $vendorBookingsCompleted = Booking::where(['vendor_id' => Auth::user()->id, 'status' => 1])->count();
        $vendorBookingsPending = Booking::where(['vendor_id' => Auth::user()->id, 'status' => 2, 'payment_status' => 'unpaid'])->count();

        $vendorWalletBalance = Auth::user()->balance;
        $vendorTotalCredit = Wallet::where(['user_id' => Auth::user()->id, 'tranx_type' => 'credit'])->sum('tranx_amount');
        $vendorTotalDebit = Wallet::where(['user_id' => Auth::user()->id, 'tranx_type' => 'debit'])->sum('tranx_amount');

        return view('frontend.seller.dashboard', compact('vendorBookings', 'vendorBookingsCount', 'vendorBookingsCompleted', 'vendorBookingsPending', 'vendorWalletBalance', 'vendorTotalCredit', 'vendorTotalDebit'));
    }

    /**
     * Edit vendor profile information
     */
    public function edit(Request $request)
    {
        $vendor = User::where(['user_type' => 'vendor', 'id' => Auth::user()->id])->first();

        if(!empty($vendor)){
            if($request->isMethod('post')){
                $vendor->name                   = $request->name;
                $vendor->phone_country_code     = $request->country_code;
                $vendor->phone                  = $request->phone;
                $vendor->email                  = $request->email;
                $vendor->address                = $request->address;
                $vendor->country                = $request->country;
                $vendor->state                  = $request->state;
                $vendor->city                   = $request->city;
                $vendor->postal_code            = $request->postal_code;
    
                $vendor->save();

                flash()->success('Profile updated successfully!');
    
                return view('frontend.seller.settings.account', compact('vendor'));
            }

            return view('frontend.seller.settings.account', compact('vendor'));
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
