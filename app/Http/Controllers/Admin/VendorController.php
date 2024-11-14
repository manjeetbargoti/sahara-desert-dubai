<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\Shop;
use App\Models\Seller;
use App\Models\Wallet;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    // Get Vendor List
    public function vendorList(Request $request){
        $vendors = User::where(['user_type' => 'vendor'])->paginate(25);
        return view('admin.vendors.index', compact('vendors'));
    }

    // Get Vendor Bookings
    public function vendorBookings(Request $request){
        $vendor = User::where(['user_type' => 'vendor'])->first();
        $bookings = Booking::where(['vendor_id' => $request->id])->paginate(25);
        return view('admin.vendors.vendor_bookings', compact('bookings','vendor'));
    }

    // Vendor Profile or Information
    public function vendorProfile(Request $request){
        $vendor = User::where(['id'=>$request->id])->first();
        return view('admin.vendors.profile', compact('vendor'));
    }

    // Edit Vendor
    public function vendorEdit(Request $request){
        $vendor = User::where(['id'=>$request->id])->first();
        return view('admin.vendors.edit', compact('vendor'));
    }

    // Update Basic Information
    public function updateBasicInfo(Request $request){
        if($request->isMethod('POST')){
            // dd($request->all());
            $vendor = User::where(['id' => $request->id])->first();

            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string',
                'phone' => 'required',
                'address' => 'string',
                'city' => 'string',
                'state' => 'string',
                'country' => 'string',
                'postal_code' => 'string',
                'status' => 'required',
                'ban' => 'required'
            ]);

            if(!empty($request->password)){
                $request->validate([
                    'password' => 'nullable|string|min:8|max:20'
                ]);

                $vendor->password = Hash::make($request->password);
            }
            
            $vendor->name                   = $request->name;
            $vendor->email                  = $request->email;
            $vendor->phone                  = $request->phone;
            $vendor->phone_country_code     = $request->vendor_country_code;
            $vendor->address                = $request->address;
            $vendor->city                   = $request->city;
            $vendor->state                  = $request->state;
            $vendor->country                = $request->country;
            $vendor->save();

            flash()->success('Basic infromation updated successfully!');
            return redirect()->route('admin.vendor.list');
        }
    }

    // Update Business Information
    public function updateBusinessInfo(Request $request){
        if($request->isMethod('POST')){
            // dd($request->all());
            $shop = Shop::where(['user_id' => $request->id])->first();

            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string',
                'phone' => 'required',
                'business_country_code' => 'required',
                'address' => 'string',
                'city' => 'string',
                'state' => 'string',
                'country' => 'string',
                'postal_code' => 'string',
                'commission_fixed' => 'string',
                'commission_percent' => 'string'
            ]);

            $shop->name                 = $request->name;
            $shop->slug                 = Str::slug($request->name);
            $shop->email                = $request->email;
            $shop->phone                = $request->phone;
            $shop->country_code         = $request->business_country_code;
            $shop->address              = $request->address;
            $shop->city                 = $request->city;
            $shop->state                = $request->state;
            $shop->country              = $request->country;
            $shop->postal_code          = $request->postal_code;
            $shop->commission_fixed     = $request->commission_fixed;
            $shop->commission_percent   = $request->commission_percent;
            $shop->save();

            flash()->success('Business infromation updated successfully!');
            return redirect()->route('admin.vendor.list');
        }
    }

    // Update Bank Information
    public function updateBankInfo(Request $request){
        if($request->isMethod('POST')){
            // dd($request->all());

            $seller = Seller::where(['user_id' => $request->id])->first();

            $request->validate([
                'bank_name' => 'required|string',
                'bank_acc_name' => 'required|string',
                'bank_acc_number' => 'required|string',
                'iban_number' => 'string',
                'bank_routing_number' => 'string',
                'bank_payment_status' => 'string'
            ]);

            $seller->bank_name              = $request->bank_name;
            $seller->bank_acc_name          = $request->bank_acc_name;
            $seller->bank_acc_number        = $request->bank_acc_number;
            $seller->iban_number            = $request->iban_number;
            $seller->bank_routing_number    = $request->bank_routing_number;
            $seller->bank_payment_status    = $request->bank_payment_status;
            $seller->save();

            flash()->success('Bank infromation updated successfully!');
            return redirect()->route('admin.vendor.list');
        }
    }

    // Update Wallet Balance
    public function updateWalletBalances(Request $request){
        if($request->isMethod('POST')){
            DB::beginTransaction();
            try{
                // dd($request->all());
            
                $user = User::where(['id' => $request->id])->first();
                $seller = Seller::where(['user_id' => $request->id])->first();

                if($request->tranx_type == 'debit'){
                    $user->balance -= $request->tranx_amount;
                    $seller->balance -= $request->tranx_amount;
                }elseif($request->tranx_type == 'credit'){
                    $user->balance += $request->tranx_amount;
                    $seller->balance += $request->tranx_amount;
                }

                $wallet = new Wallet();
                $wallet->user_id = $user->id;
                $wallet->tranx_type = $request->tranx_type;
                $wallet->tranx_amount = $request->tranx_amount;
                $wallet->tranx_remark = $request->tranx_remark;
                $wallet->save();

                $user->save();
                $seller->save();

                DB::commit();

                flash()->success('Wallet balance updated successfully!');
                return redirect()->route('admin.vendor.list');
            }catch(\Exception $e){
                DB::rollBack();
                flash()->error($e->getMessage().', '.$e->getLine());
                return redirect()->route('admin.vendor.list');
            }

        }
    }
}
