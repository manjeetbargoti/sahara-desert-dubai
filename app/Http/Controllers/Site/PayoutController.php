<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\AdminPayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayoutController extends Controller
{
    // Payout List
    public function index(){
        $adminPayoutTranx = AdminPayout::where(['user_id' => Auth::user()->id])->latest()->paginate(25);
        $adminPayoutBalance = Auth::user()->dues_to_admin;

        return view('frontend.seller.payouts.index', compact('adminPayoutTranx','adminPayoutBalance'));
    }
}
