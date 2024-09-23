@extends("frontend.seller.layouts.main")
@section("content")

<div class="nk-block-head">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Booking Reference <strong class="text-primary small">#{{ @$booking->booking_reference }}</strong></h3>
            <div class="nk-block-des text-soft">
                <ul class="list-inline">
                    <li>Booking Date: <span class="text-base">{{ date('d M, Y h:i A', strtotime($booking->created_at)) }}</span></li>
                </ul>
            </div>
        </div>
        <div class="nk-block-head-content">
            <a href="{{ route('admin.bookings.list') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
            <a href="{{ route('admin.bookings.list') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div>
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="invoice">
        <div class="invoice-action">
        </div><!-- .invoice-actions -->
        <div class="invoice-wrap">
            <div class="invoice-head">
                <div class="invoice-contact">
                    <div class="invoice-contact-info">
                        <h4 class="title">{{ @$booking->name }}</h4>
                        <ul class="list-plain">
                            <li><em class="icon ni ni-map-pin-fill"></em><span>{{ @$booking->address }}</span></li>
                            <li><em class="icon ni ni-call-fill"></em><span>{{ @$booking->country_code.' '.@$booking->phone }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="">
                    <ul class="list-plain">
                        <li class="">
                            <span>Booking Status: </span>
                            @if(@$booking->status == 1)
                            <span class="text-success fw-bold">Fulfilled</span>
                            @else
                            <span class="text-warning fw-bold">Unfulfilled</span>
                            @endif
                        </li>
                        <li class="">
                            <span>Payment Status: </span>
                            @if(@$booking->payment_status == 'paid')
                            <span class="text-success fw-bold">Paid</span>
                            @else
                            <span class="text-danger fw-bold">Unpaid</span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div><!-- .invoice-head -->
            <div class="invoice-bills">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="15%">Item ID</th>
                                <th width="40%">Description</th>
                                <th width="15%">Price (excl. VAT)</th>
                                <th width="15%">VAT (5%)</th>
                                <th width="15%">Amount (incl. VAT)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ @$booking->tour->tour_ref }}</td>
                                <td>
                                    {{ @$booking->tour->name }}<br>
                                    @if(@$booking->adult_count > 0)
                                    <span class="text-info fw-bold"><strong>Adult:</strong> {{ single_price(@$booking->adult_price) }} x{{ @$booking->adult_count }}</span><br>
                                    @endif
                                    @if(@$booking->child_count > 0)
                                    <span class="text-success fw-bold">Child: {{ single_price(@$booking->child_price) }} x{{ @$booking->child_count }}</span><br>
                                    @endif
                                    @if(@$booking->infant_count > 0)
                                    <span class="text-primary fw-bold">Infant: {{ single_price(@$booking->infant_price) }} x{{ @$booking->infant_count }}</span><br>
                                    @endif
                                    @if(@$booking->fixed_charges > 0)
                                    <span class="text-warning fw-bold">{{ @$booking->fixed_charges_type }}: {{ single_price(@$booking->fixed_charges) }}</span><br>
                                    @endif
                                    <span class="fw-bold">Activity Date: {{ date('d M, Y', strtotime(@$booking->booking_date)) }}</span><br>
                                    <span class="fw-bold">Time Slot: {{ date('h:i A', strtotime(@$booking->time_slot)) }}</span>
                                </td>
                                <td class="text-info fw-bold">{{ single_price(@$booking->subtotal) }}</td>
                                <td>{{ single_price(@$booking->total_vat) }}</td>
                                <td>{{ single_price(@$booking->grand_total) }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2" class="text-right fw-normal">Subtotal <small>(excl. VAT)</small></td>
                                <td class="fw-normal">{{ single_price(@$booking->subtotal) }}</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2" class="text-right">VAT (5%)</td>
                                <td>{{ single_price(@$booking->total_vat) }}</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2" class="text-right fw-bold">Grand Total <small>(incl. VAT)</small></td>
                                <td class="fw-bold">{{ single_price(@$booking->grand_total) }}</td>
                            </tr>
                            {{-- <tr>
                                <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="#" target="_blank"><em class="icon ni ni-printer-fill"></em></a>
                            </tr> --}}
                        </tfoot>
                       
                    </table>
                    <div class="nk-notes ff-italic fs-12px text-soft"> Invoice was created on a computer and is valid without the signature and seal. </div>
                </div>
            </div><!-- .invoice-bills -->
        </div><!-- .invoice-wrap -->
    </div><!-- .invoice -->
</div><!-- .nk-block -->

@endsection