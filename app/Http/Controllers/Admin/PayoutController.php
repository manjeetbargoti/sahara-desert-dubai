<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AdminPayout;

class PayoutController extends Controller
{
    // Transaction List
    public function index(Request $request){
        $adminPayoutTranx = AdminPayout::where(['user_id' => $request->id])->latest()->paginate(25);
        $vendorUser = User::where(['id'=>$request->id])->first();
        $adminPayoutBalance = $vendorUser->dues_to_admin;

        return view('admin.vendors.payouts.index', compact('adminPayoutTranx','adminPayoutBalance', 'vendorUser'));
    }

    // Payout Status Update
    public function payoutStatus(Request $request){
        $payout = AdminPayout::where(['id' => $request->id])->first();

        if($request->isMethod('POST')){
            if($request->payment_status == 1){
                $transfer_to_admin = 1;
            }elseif($request->payment_status == 0){
                $transfer_to_admin = 0;
            }

            $payout->payment_status     = $request->payment_status;
            $payout->transfer_to_admin  = $transfer_to_admin;
            $payout->payment_date       = date('Y-m-d', strtotime($request->payment_date)) ?? NULL;
            $payout->save();

            flash()->success('Payout Status Updated Successfully!');
            return redirect()->route('admin.vendor.payout.list', $payout->user_id);
        }

        return view('admin.vendors.payouts.update_status', compact('payout'));
    }

    // Add New Tranx
    public function addNewTranx(Request $request){
        $vendorUser = User::where(['id'=>$request->vendor_id])->first();

        if($request->isMethod('POST')){

            $request->validate([
                'amount' => 'required',
                'tranx_reference' => 'required',
                'payment_type' => 'required',
                'payment_status' => 'required',
                'payment_date' => 'required',
                'tranx_remark' => 'required'
            ]);

            if($request->payment_type == 'credit'){
                $transfer_to_admin = 0;
            }elseif($request->payment_type == 'debit'){
                $transfer_to_admin = 1;
            }

            $payoutTranx = new AdminPayout();
            $payoutTranx->user_id           = $vendorUser->id;
            $payoutTranx->amount            = $request->amount;
            $payoutTranx->booking_reference = $request->tranx_reference;
            $payoutTranx->payment_type      = $request->payment_type;
            $payoutTranx->payment_status    = $request->payment_status;
            $payoutTranx->payment_date      = date('Y-m-d', strtotime($request->payment_date)) ?? NULL;
            $payoutTranx->tranx_remark      = $request->tranx_remark;
            $payoutTranx->transfer_to_admin = $transfer_to_admin;
            
            $payoutTranx->save();

            if($request->payment_status == 1){
                if($request->payment_type == 'credit'){
                    $vendorUser->dues_to_admin += $request->amount;
                    $vendorUser->save();
                }elseif($request->payment_type == 'debit'){
                    $vendorUser->dues_to_admin -= $request->amount;
                    $vendorUser->save();
                }
            }

            flash()->success('Transaction Added Successfully!');
            return redirect()->route('admin.vendor.payout.list', $vendorUser->id); 
        }
        return view('admin.vendors.payouts.add_new_tranx', compact('vendorUser'));
    }

    public function payoutView(Request $request){
        $payout = AdminPayout::where(['id' => $request->id])->first();
        $vendor = User::where(['id'=>$payout->user_id])->first();
        return view('admin.vendors.payouts.view', compact('payout', 'vendor'));
    }
}
