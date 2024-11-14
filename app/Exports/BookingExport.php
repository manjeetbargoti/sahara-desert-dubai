<?php

namespace App\Exports;

use App\Models\Booking;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromQuery;
// use Maatwebsite\Excel\Concerns\Exportable;

class BookingExport implements FromView
{

    protected $filter = ['id'=>''];

    public function __construct($data){
        $this->filter['id'] = isset($id) ? $id : '';
    }

    public function view(): View {
        $id = $this->filter['id'];
        $bookings = Booking::all();
        // dd($bookings);
        return view('exports.bookings', [
            'bookings' => $bookings
        ]);
    }
}
