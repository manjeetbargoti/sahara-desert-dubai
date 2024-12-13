<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // Admin dashboard
    public function dashboard(Request $request){

        // Booking revenue stats
        $thisMonthGrandTotal = Booking::where(['status'=>1])->whereBetween('created_at', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])->sum('grand_total');
        $thisMonthCustomCommission = Booking::where(['status'=>1])->whereBetween('created_at', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])->sum('custom_commission');
        $thisMonthRevenue = $thisMonthGrandTotal - $thisMonthCustomCommission;

        $thisWeekGrandTotal = Booking::where(['status'=>1])->whereBetween('created_at', [Carbon::now()->subMonth()->startOfWeek(), Carbon::now()->subMonth()->endOfWeek()])->sum('grand_total');
        $thisWeekCustomCommission = Booking::where(['status'=>1])->whereBetween('created_at', [Carbon::now()->subMonth()->startOfWeek(), Carbon::now()->subMonth()->endOfWeek()])->sum('custom_commission');
        $thisWeekRevenue = $thisWeekGrandTotal - $thisWeekCustomCommission;

        // Booking number stats
        $pendingBookings = Booking::where(['status'=>2])->count();
        $completeBookings = Booking::where(['status'=>1])->count();

        // $pendingBookingsBwDates = Booking::where(['status'=>2])->whereBetween('created_at', [Carbon::now()->startOfMonth()->subMonth(3), Carbon::now()->startOfMonth()->subMonth(2)])->get()->toArray();
        // $completeBookingsBwDates = Booking::where(['status'=>1])->whereBetween('created_at', [Carbon::now()->startOfMonth()->subMonth(2), Carbon::now()->startOfMonth()->subMonth(1)])->get()->toArray();
        $monthlyPendingBookingData = Booking::where(['status'=>0])->select(DB::raw("(COUNT(*)) as count"),DB::raw("MONTHNAME(created_at) as month_name"))->whereYear('created_at', date('Y'))->groupBy('month_name')->get()->toArray();
        $monthlyCompleteBookingData = Booking::where(['status'=>1])->select(DB::raw("(COUNT(*)) as count"),DB::raw("MONTHNAME(created_at) as month_name"))->whereYear('created_at', date('Y'))->groupBy('month_name')->get()->toArray();
        $monthlyCanceledBookingData = Booking::where(['status'=>2])->select(DB::raw("(COUNT(*)) as count"),DB::raw("MONTHNAME(created_at) as month_name"))->whereYear('created_at', date('Y'))->groupBy('month_name')->get()->toArray();

        // Booking history
        $bookingHistory = Booking::latest()->limit(5)->get();

        return view('admin.dashboard', compact('pendingBookings','completeBookings','monthlyPendingBookingData','monthlyCompleteBookingData','monthlyCanceledBookingData','thisMonthRevenue','thisWeekRevenue','bookingHistory'));
    }
}
