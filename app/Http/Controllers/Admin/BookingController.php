<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;

class BookingController extends Controller
{
    // List all bookings
    public function index(Request $request){
        $bookings = Booking::latest()->paginate(25);
        return view('admin.bookings.index', compact('bookings'));
    }

    // View booking detail
    public function view(Request $request){
        $vendors = User::where(['user_type' => 'vendor', 'status' => 1, 'ban' => 0])->get(['id','name']);
        $booking = Booking::where(['booking_reference' => $request->reference])->first();
        return view('admin.bookings.view',compact('booking', 'vendors'));
    }

    // Update booking info
    public function update(Request $request){
        if($request->isMethod('POST')){
            $booking = Booking::where('id', $request->id)->first();
            if(!empty($booking)){
                $booking->name = $request->name;
                $booking->email = $request->email;
                // $booking->phone = $request->phone;
                $booking->address = $request->address;
                $booking->status = $request->status;
                $booking->payment_status = $request->payment_status;
                $booking->vendor_id = $request->vendor;

                $booking->save();

                return redirect()->route("admin.bookings.view", $booking->booking_reference)->with('success', 'Booking Updated Successfully!');
            }
        }
    }
}
