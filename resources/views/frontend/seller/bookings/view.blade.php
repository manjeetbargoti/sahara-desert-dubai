@extends("frontend.seller.layouts.main")
@section("content")

    <div class="nk-block-head">
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Booking Reference <strong
                        class="text-primary small">#{{ @$booking->booking_reference }}</strong></h3>
                <div class="nk-block-des text-soft">
                    <ul class="list-inline">
                        <li>Created at: <span class="text-base">{{ date('d M, Y h:i A', strtotime($booking->created_at)) }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="nk-block-head-content">
                <a href="{{ route('vendor.bookings.list') }}"
                    class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                        class="icon ni ni-arrow-left"></em><span>Back</span></a>
                <a href="{{ route('vendor.bookings.list') }}"
                    class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                        class="icon ni ni-arrow-left"></em></a>
            </div>
        </div>
    </div><!-- .nk-block-head -->

    <div class="nk-block-head">
        <div class="row">
            <div class="col-sm-7">
                <table class="table table-bordered table-hover bg-white">
                    <tr>
                        <td><span class="text-muted font-weight-bold">Booking Details:</span></td>
                        <td class="text-right">
                            @if(@$booking->status == 1)
                            <span class="badge badge-dim badge-outline-success font-weight-bold">Completed</span>
                            @elseif(@$booking->status == 0)
                            <span class="badge badge-dim badge-warning font-weight-bold">Pending</span>
                            @elseif(@$booking->status == 2)
                            <span class="badge badge-dim badge-danger font-weight-bold">Canceled</span>
                            @endif
                        </td>
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
                        <td width="30%">Activity Time Slot</td>
                        <td>{{ !empty(@$booking->time_slot) ? date('h:i A', strtotime(@$booking->time_slot)) : '' }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Adults</td>
                        @if(@$booking->adult_price > 0)
                        <td>{{ @$booking->adult_count.' x '.single_price(@$booking->adult_price).' = '.single_price(@$booking->adult_price*@$booking->adult_count) }}</td>
                        @else
                        <td>{{ @$booking->adult_count }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td width="30%">Child</td>
                        @if(@$booking->child_price > 0)
                        <td>{{ @$booking->child_count.' x '.single_price(@$booking->child_price).' = '.single_price(@$booking->child_price*@$booking->child_count) }}</td>
                        @else
                        <td>{{ @$booking->child_count }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td width="30%">Infant <small class="text-danger"><i>(max. {{ @$booking->tour->infant_count }})</i></small></td>
                        @if(@$booking->infant_price > 0)
                        <td>{{ @$booking->infant_count.' x '.single_price(@$booking->infant_price).' = '.single_price(@$booking->infant_price*@$booking->infant_count) }}</td>
                        @else
                        <td>{{ @$booking->infant_count }}</td>
                        @endif
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
                    <tr class="font-weight-bold">
                        <td width="30%">Grand Total</td>
                        <td>{{ single_price(@$booking->grand_total) }}</td>
                    </tr>
                </table>

                <table class="table table-bordered table-hover bg-white">
                    <tr>
                        <td><span class="text-muted font-weight-bold">Activities Inclueded:</span></td>
                    </tr>
                    <tr>
                        <td>
                            {!! @$booking->custom_activity !!}
                        </td>
                    </tr>
                </table>

                <div class="invoice-download-btn">
                    <a href="{{ route('admin.bookings.invoice.download', @$booking->id) }}" class="btn btn-outline-info btn-dim"><em
                        class="icon ni ni-arrow-to-down"></em><span>Customer Invoice</span></a>

                    {{-- <a href="#" class="btn btn-outline-info btn-dim"><em
                            class="icon ni ni-arrow-to-down"></em><span>Tax Invoice</span></a> --}}
                </div>
            </div>
            <div class="col-sm-5">
                <table class="table table-bordered bg-white">
                    <tr>
                        <td class="font-weight-bold text-muted">Vendor Name</td>
                        <td class="text-info">{{ @$booking->vendor->name }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold text-muted">Vendor Phone</td>
                        <td class="text-info">{{ '+'.@$booking->vendor->phone_country_code.' '.@$booking->vendor->phone }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold text-muted">Vendor Email</td>
                        <td class="text-info">{{ @$booking->vendor->email }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold text-muted">Business Name</td>
                        <td class="text-info">{{ @$booking->vendor->shop->name }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold text-muted">Business Address</td>
                        <td class="text-info">{{ @$booking->vendor->shop->city . ', ' . @$booking->vendor->shop->country }}
                        </td>
                    </tr>
                </table>

                <table class="table table-bordered bg-white">
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
                            <td>{{ '+'.@$booking->phone }}</td>
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

                <table class="table table-bordered bg-white">
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

@endsection
