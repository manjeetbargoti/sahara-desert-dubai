@extends('frontend.layouts.main')
@section('content')
    <div class="container pt-5 pt-xl-8">
        <div class="row mb-5 mb-md-8 mt-xl-1 pb-md-1">
            <div class="col-lg-12 col-xl-12 order-md-2 order-lg-3">
                <h1 class="text-center font-weight-bold font-size-28 text-primary">Thank You!</h1>
                <p class="text-center font-size-20 mb-0 text-success">Your booking has been confirmed.</p>
                <p class="text-center font-size-20 text-success">We look forward to seeing you!</p>

                <div class="booking_details">
                    <div class="row">
                        <div class="col-sm-8">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td colspan="2"><span class="text-muted font-weight-bold font-size-20">Booking Details:</span></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Booking Reference</td>
                                        <td class="font-weight-bold">{{ @$booking->booking_reference }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Activity Name</td>
                                        <td>{{ @$booking->tour->name }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Activity Date</td>
                                        <td>{{ date('d M, Y', strtotime(@$booking->booking_date)) }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Time Slot</td>
                                        <td>{{ !empty(@$booking->time_slot) ? date('h:i A', strtotime(@$booking->time_slot)) : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Adults</td>
                                        <td>{{ @$booking->adult_count.' x '.single_price(@$booking->adult_price).' = '.single_price(@$booking->adult_price*@$booking->adult_count) }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Child</td>
                                        <td>{{ @$booking->child_count.' x '.single_price(@$booking->child_price).' = '.single_price(@$booking->child_price*@$booking->child_count) }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Infant <small class="text-danger"><i>(max. {{ @$booking->tour->infant_count }})</i></small></td>
                                        <td>{{ @$booking->infant_count.' x '.single_price(@$booking->infant_price).' = '.single_price(@$booking->infant_price*@$booking->infant_count) }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">{{ @$booking->fixed_charges_type }}</td>
                                        <td>{{ single_price(@$booking->fixed_charges) }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Subtotal <small><i>(excl. VAT)</i></small></td>
                                        <td>{{ single_price(@$booking->subtotal) }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">VAT (5%)</td>
                                        <td>{{ single_price(@$booking->total_vat) }}</td>
                                    </tr>
                                    <tr class="font-weight-bold bg-gray-2 font-size-20">
                                        <td width="30%">Grand Total</td>
                                        <td>{{ single_price(@$booking->grand_total) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-4">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td colspan="2"><span class="text-muted font-weight-bold font-size-20">Customer Details:</span></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Name</td>
                                        <td>{{ @$booking->name }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Phone</td>
                                        <td>{{ @$booking->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Email</td>
                                        <td>{{ @$booking->email }}</td>
                                    </tr>
                                    @if(!empty(@$booking->address))
                                    <tr>
                                        <td width="30%">Address</td>
                                        <td>{{ @$booking->address }}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td colspan="2"><span class="text-muted font-weight-bold font-size-20">Payment Details:</span></td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Payment Status</td>
                                        <td>
                                            @if(@$booking->payment_status == 'paid')
                                            <span class="text-success">Paid</span>
                                            @else
                                            <span class="text-danger">Unpaid</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Payment Method</td>
                                        <td>
                                            @if(@$booking->payment_method == 'cash')
                                            <span class="text-primary">Cash</span>
                                            @else
                                            <span class="text-success">Credit/Debit Card</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <a href="{{ route('home') }}" class="btn btn-sm btn-primary">Return to Homepage</a>
            </div>
        </div>
    </div>
@endsection
