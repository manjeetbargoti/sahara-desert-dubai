<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use App\Mail\SendBookingEmail;
use App\Mail\AdminBookingEmail;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    // Generate Booking Reference
    public function generateBookingReference($length){
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        $booking_ref = 'SB'.$randomString;

        $checkDb = Booking::where('booking_reference', $booking_ref)->exists();

        if($checkDb){
            $this->generateBookingReference(10);
        }else{
            return $booking_ref;
        }
    }

    public function submitBooking(Request $request){
        if($request->isMethod('POST')){
            try{
                $request->validate([
                    'tour_id' => 'required',
                    'ip_address' => 'required',
                    'request_page' => 'required',
                    'adult_price' => 'required',
                    'child_price' => 'required',
                    'infant_price' => 'required',
                    'booking_date' => 'required',
                    'name' => 'required|string',
                    'email' => 'required|email',
                    'phone' => 'required',
                    'adult_count' => 'required',
                    'child_count' => 'required',
                    'infant_count' => 'required'
                ]);

                // Get Booking Reference
                $booking_reference = $this->generateBookingReference(10);

                // CONSTANTS
                $adultAmt = $request->adult_price * $request->adult_count;
                $childAmt = $request->child_price * $request->child_count;
                $infantAmt = $request->infant_price * $request->infant_count;
                $fixedCharges = $request->fixed_charges;

                $grandTotal = $adultAmt + $childAmt + $infantAmt + $fixedCharges;
                $subtotal = ($grandTotal / 105) * 100;          // Without VAT
                $vatOnSubtotal = $subtotal * 0.05;              // Vat rate 5%

                // Create Booking
                $booking = new Booking();
                $booking->tour_id               = $request->tour_id;
                $booking->booking_reference     = $booking_reference;
                $booking->ip_address            = $request->ip_address;
                $booking->request_page          = $request->request_page;           
                $booking->adult_price           = round($request->adult_price, 2);
                $booking->child_price           = round($request->child_price, 2);
                $booking->infant_price          = round($request->infant_price, 2);
                $booking->fixed_charges         = round($request->fixed_charges, 2);
                $booking->fixed_charges_type    = $request->fixed_charges_type;
                $booking->booking_date          = date('Y-m-d', strtotime($request->booking_date));
                $booking->time_slot             = $request->time_slot;
                $booking->adult_count           = $request->adult_count;
                $booking->child_count           = $request->child_count;
                $booking->infant_count          = $request->infant_count;
                $booking->subtotal              = round($subtotal, 2);
                $booking->total_vat             = round($vatOnSubtotal, 2);
                $booking->grand_total           = round($grandTotal, 2);
                $booking->vendor_id             = $request->vendor_id;
                $booking->status                = 2;
                $booking->name                  = $request->name;
                $booking->email                 = $request->email;
                $booking->phone                 = @$request->country_code.' '.$request->phone;
                $booking->location              = $request->location;
                $booking->address               = $request->address;
                $booking->payment_status        = 'unpaid';
                $booking->payment_method        = 'cash';
                $booking->payment_date          = NULL;

                $booking->save();

                // Send Confirmation Email to Customer
                $mail_info = Mail::to($booking->email)->send(new SendBookingEmail($booking));

                // Send Booking Email to Admin
                $admin_mail_info = Mail::to(get_setting('admin_email'))->send(new AdminBookingEmail(@$booking));

                return $this->bookingThankyou(@$booking_reference);

                // return redirect()->back()->with(['success'=>'Booking is Successful. Your booking reference is '.$booking_reference.'.', 'data' => $booking]);
            }catch(\Exception $e){
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    // Booking Thank you
    public function bookingThankyou($booking_reference){
        $booking = Booking::where('booking_reference', $booking_reference)->first();
        return view('frontend.booking_thank_you', compact('booking'));
    }

    // List all vendor bookings
    public function vendorBookings(Request $request){
        $bookings = Booking::where('vendor_id', Auth::user()->id)->latest()->paginate(25);
        return view('frontend.seller.bookings.index', compact('bookings'));
    }

    // View booking detail
    public function viewVendorBookings(Request $request){
        $vendors = User::where(['user_type' => 'vendor', 'status' => 1, 'ban' => 0])->get(['id','name']);
        $booking = Booking::where(['booking_reference' => $request->reference])->first();
        return view('frontend.seller.bookings.view',compact('booking', 'vendors'));
    }
}
