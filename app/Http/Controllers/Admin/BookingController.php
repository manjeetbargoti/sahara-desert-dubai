<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendBookingEmail;
use App\Mail\AdminBookingEmail;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\AdminPayout;
use App\Models\User;
use App\Models\Tour;
use App\Exports\BookingExport;
use App\Exports\VendorBookingExport;
use App\Exports\VendorBookingCommExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

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

    // List all bookings
    public function index(Request $request)
    {
        $bookings = Booking::latest()->paginate(25);
        return view('admin.bookings.index', compact('bookings'));
    }

    // View booking detail
    public function view(Request $request)
    {
        $vendors = User::where(['user_type' => 'vendor', 'status' => 1, 'ban' => 0])->get(['id', 'name']);
        $booking = Booking::where(['booking_reference' => $request->reference])->first();
        return view('admin.bookings.view', compact('booking', 'vendors'));
    }

    // Create booking
    public function createBooking(Request $request){
        if($request->isMethod("POST")){
            // dd($request->all());
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
                $booking->time_slot             = date('H:i', strtotime($request->time_slot));
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
                $booking->payment_status        = 'unpaid';
                $booking->payment_method        = 'cash';
                $booking->payment_date          = NULL;
                $booking->address               = $request->address;

                $booking->save();

                // Send Confirmation Email to Customer
                $mail_info = Mail::to($booking->email)->send(new SendBookingEmail($booking));

                flash()->success('Booking created successfully!');
                return redirect()->route('admin.bookings.list');

            }catch(\Exception $e){
                return redirect()->back()->with('error', $e->getMessage());
            }
        }

        $vendors = User::where(['user_type' => 'vendor', 'status' => 1, 'ban' => 0])->get(['id', 'name']);
        $tours = Tour::latest()->get();
        return view('admin.bookings.create', compact('tours', 'vendors'));
    }

    // Get tour by id for booking
    public function tourById(Request $request){
        $tour = Tour::where('id', $request->id)->first();
        return $tour;
    }

    // Update booking info
    public function update(Request $request)
    {
        if ($request->isMethod('POST')) {
            $booking = Booking::where('id', $request->id)->first();
            // dd($booking, $request->all());
            if (!empty($booking)) {
                $booking->name = $request->name;
                $booking->email = $request->email;
                // $booking->phone = $request->phone;
                $booking->address = $request->address;
                $booking->status = $request->status;
                $booking->payment_status = $request->payment_status;
                $booking->vendor_id = $request->vendor;

                $booking->save();

                if(@$request->status == 1){
                    $adminPayout = new AdminPayout();
                    $adminPayout->user_id = @$booking->vendor_id;
                    $adminPayout->booking_id = $booking->id;
                    $adminPayout->booking_reference = $booking->booking_reference;
                    $adminPayout->payment_type = 'credit';
                    $adminPayout->amount = $booking->grand_total;
                    $adminPayout->transfer_to_admin = 0;
                    $adminPayout->tranx_remark = "Amount to be paid for Booking Reference: ".$booking->booking_reference;
                    $adminPayout->save();

                    if(!empty($booking->vendor_id)){
                        $vendorUser = User::where(['id' => @$booking->vendor_id])->first();
                        $vendorUser->dues_to_admin += $booking->grand_total;
                        $vendorUser->save();
                    }
                }

                flash()->success('Booking Updated Successfully!');
                return redirect()->route("admin.bookings.view", $booking->booking_reference);
            }
        }
    }

    // Edit Booking
    public function editBooking(Request $request){
        $vendors = User::where(['user_type' => 'vendor', 'status' => 1, 'ban' => 0])->get(['id', 'name']);
        $tours = Tour::latest()->get();
        $booking = Booking::where(['booking_reference' => $request->reference])->first();

        if($request->isMethod('POST')){
            try{
                $request->validate([
                    'tour_id' => 'required',
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

                // CONSTANTS
                $adultAmt = $request->adult_price * $request->adult_count;
                $childAmt = $request->child_price * $request->child_count;
                $infantAmt = $request->infant_price * $request->infant_count;
                $fixedCharges = $request->fixed_charges;

                $grandTotal = $adultAmt + $childAmt + $infantAmt + $fixedCharges;
                $subtotal = ($grandTotal / 105) * 100;          // Without VAT
                $vatOnSubtotal = $subtotal * 0.05;              // Vat rate 5%

                // dd($request->all());
                $booking->tour_id               = $request->tour_id;          
                $booking->adult_price           = round($request->adult_price, 2);
                $booking->child_price           = round($request->child_price, 2);
                $booking->infant_price          = round($request->infant_price, 2);
                $booking->fixed_charges         = round($request->fixed_charges, 2);
                $booking->fixed_charges_type    = $request->fixed_charges_type;
                $booking->booking_date          = date('Y-m-d', strtotime($request->booking_date));
                $booking->time_slot             = date('H:i', strtotime($request->time_slot));
                $booking->adult_count           = $request->adult_count;
                $booking->child_count           = $request->child_count;
                $booking->infant_count          = $request->infant_count;
                $booking->subtotal              = round($subtotal, 2);
                $booking->total_vat             = round($vatOnSubtotal, 2);
                $booking->grand_total           = round($grandTotal, 2);
                $booking->custom_commission     = round($request->custom_commission, 2);
                $booking->vendor_id             = $request->vendor;
                $booking->status                = $request->status;
                $booking->name                  = $request->name;
                $booking->email                 = $request->email;
                $booking->phone                 = @$request->country_code.' '.$request->phone;
                $booking->location              = $request->location;
                $booking->payment_status        = $request->payment_status;
                $booking->payment_method        = $request->payment_method;
                $booking->payment_date          = NULL;
                $booking->address               = $request->address;
                $booking->custom_remarks        = $request->custom_remarks;
                $booking->custom_activity       = $request->custom_activity;

                $booking->save();

                flash()->success('Booking updated successfully!');
                return redirect()->route('admin.bookings.list');

            }catch(\Exception $e){
                return redirect()->back()->with('error', $e->getMessage());
            }
        }

        return view('admin.bookings.edit', compact('booking','vendors','tours'));
    }

    public function sendBookingEmail(Request $request)
    {
        $booking = Booking::where(['id' => $request->id])->first();

        if (!empty($booking)) {
            // Send Confirmation Email to Customer
            $mail_info = Mail::to($booking->email)->send(new SendBookingEmail($booking));

            // Send Booking Email to Admin
            $admin_mail_info = Mail::to(get_setting('admin_email'))->send(new AdminBookingEmail(@$booking));

            if ($mail_info) {
                flash()->success('Email sent successfully!');
                return redirect()->back();
            } else {
                flash()->error('Something went wrong. Please try again later.');
                return redirect()->back();
            }
        } else {
            flash()->error('Something went wrong. Please try again later.');
            return redirect()->back();
        }
    }

    // Download all bookings
    public function exportBooking(Request $request){
        return Excel::download(new BookingExport($request->all()), 'bookings.xlsx');
    }

    // Download vendor bookings
    public function exportVendorBooking(Request $request){
        return Excel::download(new VendorBookingExport($request->all(), $request->id), 'vendor_bookings_'.$request->id.'.xlsx');
    }

    // Download vendor bookings
    public function exportCommVendorBooking(Request $request){
        return Excel::download(new VendorBookingCommExport($request->all(), $request->id), 'vendor_bookings_comm_'.$request->id.'.xlsx');
    }

    // Download reports
    public function reports(){
        $bookingReport = Booking::latest()->paginate(25);
        return view('admin.reports.main_reports', compact('bookingReport'));
    }

    // Download Commission Reports
    public function commissionReports(){
        $bookingReport = Booking::latest()->paginate(25);
        return view('admin.reports.main_reports', compact('bookingReport'));
    }

    // Invoice Download
    public function bookingInvoiceDownload(Request $request){
        $bookingInfo = Booking::where(['id' => $request->booking_id])->first();

        if(!empty($bookingInfo)){
            $pdf = Pdf::loadView('invoices.booking', ['data' => $bookingInfo]);

            return $pdf->download('Booking-'.@$bookingInfo->booking_reference.'.pdf');
        }
    }
}
