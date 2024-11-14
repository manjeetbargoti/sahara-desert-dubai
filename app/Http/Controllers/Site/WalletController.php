<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    // Wallet transaction list
    public function index(){
        $walletTranx = Wallet::where(['user_id' => Auth::user()->id])->latest()->paginate(25);
        $walletBalance = Auth::user()->balance;

        return view('frontend.seller.wallet.index', compact('walletTranx','walletBalance'));
    }

    // Transaction detail
    public function detail(Request $request){
        $tranx = Wallet::where(['id' => $request->id])->first();

        return view('frontend.seller.wallet.view', compact('tranx'));
    }
}
