<?php

namespace App\Exports;

use App\Models\Booking;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromQuery;
// use Maatwebsite\Excel\Concerns\Exportable;

class BookingExport implements FromView
{

    protected $filter = ['id'=>'','search'=>'','payment_status'=>'','status'=>''];

    public function __construct($data){
        $this->filter['id'] = isset($id) ? $id : '';
        $this->filter['search'] = isset($data['search']) ? $data['search'] : '';
        $this->filter['payment_status'] = isset($data['payment_status']) ? $data['payment_status'] : '';
        $this->filter['status'] = isset($data['status']) ? $data['status'] : '';
    }

    public function view(): View {
        $id = $this->filter['id'];
        $paymentStatus = $this->filter['payment_status'];
        $bookingStatus = $this->filter['status'];
        $searchQuery = $this->filter['search'];

        // $bookings = Booking::all();
        $bookings = Booking::when($paymentStatus != null, function($ps) use($paymentStatus){
            $ps->where('payment_status', $paymentStatus);
        })->when($bookingStatus != null, function($s) use($bookingStatus){
            $s->where('status', $bookingStatus);
        })->when($searchQuery != null, function($se) use($searchQuery){
            $se->where('booking_reference',$searchQuery)->orWhere('name', 'LIKE','%'.$searchQuery.'%');
        });

        $bookings = $bookings->latest()->get();
        // dd($bookings);
        return view('exports.bookings', [
            'bookings' => $bookings
        ]);
    }
}
