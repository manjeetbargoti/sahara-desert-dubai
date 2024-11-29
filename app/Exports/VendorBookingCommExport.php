<?php

namespace App\Exports;

use App\Models\Booking;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;

class VendorBookingCommExport implements FromView
{
    protected $filter = ['id'=>''];

    public function __construct($data, $id){
        $this->filter['id'] = isset($id) ? $id : '';
    }

    public function view(): View {
        $id = $this->filter['id'];
        $bookings = Booking::where(['vendor_id' => $id])->get();
        // dd($bookings);
        return view('exports.vendor_comm_bookings', [
            'bookings' => $bookings
        ]);
    }
}
