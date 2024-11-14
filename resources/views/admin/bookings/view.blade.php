@extends('admin.layouts.main')
@section('content')

    <div class="nk-block-head">
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Booking Reference <strong
                        class="text-primary small">#{{ @$booking->booking_reference }}</strong></h3>
                <div class="nk-block-des text-soft">
                    <ul class="list-inline">
                        <li>Booking Date: <span
                                class="text-base">{{ date('d M, Y h:i A', strtotime($booking->created_at)) }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="nk-block-head-content">
                <a href="{{ route('admin.bookings.list') }}"
                    class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                        class="icon ni ni-arrow-left"></em><span>Back</span></a>
                <a href="{{ route('admin.bookings.list') }}"
                    class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                        class="icon ni ni-arrow-left"></em></a>
            </div>
        </div>

        @if (Auth::guard()->name == 'admin')
            <div class="nk-block-between g-3">
                <div class="nk-block-head-content">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#updateBookingForm">Update Booking</button>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-5">
                    <table class="table table-bordered">
                        <tr>
                            <td class="font-weight-bold text-muted">Vendor Name</td>
                            <td class="text-info">{{ @$booking->vendor->name }}</td>
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
                </div>
            </div>
        @endif
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
                                <li><em
                                        class="icon ni ni-call-fill"></em><span>{{ @$booking->country_code . ' ' . @$booking->phone }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="">
                        <ul class="list-plain">
                            <li class="">
                                <span>Booking Status: </span>
                                @if (@$booking->status == 1)
                                    <span class="text-success fw-bold">Fulfilled</span>
                                @else
                                    <span class="text-warning fw-bold">Unfulfilled</span>
                                @endif
                            </li>
                            <li class="">
                                <span>Payment Status: </span>
                                @if (@$booking->payment_status == 'paid')
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
                                        @if (@$booking->adult_count > 0)
                                            <span class="text-info fw-bold"><strong>Adult:</strong>
                                                {{ single_price(@$booking->adult_price) }}
                                                x{{ @$booking->adult_count }}</span><br>
                                        @endif
                                        @if (@$booking->child_count > 0)
                                            <span class="text-success fw-bold">Child:
                                                {{ single_price(@$booking->child_price) }}
                                                x{{ @$booking->child_count }}</span><br>
                                        @endif
                                        @if (@$booking->infant_count > 0)
                                            <span class="text-primary fw-bold">Infant:
                                                {{ single_price(@$booking->infant_price) }}
                                                x{{ @$booking->infant_count }}</span><br>
                                        @endif
                                        @if (@$booking->fixed_charges > 0)
                                            <span class="text-warning fw-bold">{{ @$booking->fixed_charges_type }}:
                                                {{ single_price(@$booking->fixed_charges) }}</span><br>
                                        @endif
                                        <span class="fw-bold">Activity Date:
                                            {{ date('d M, Y', strtotime(@$booking->booking_date)) }}</span><br>
                                        <span class="fw-bold">Time Slot:
                                            {{ date('h:i A', strtotime(@$booking->time_slot)) }}</span>
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
                                    <td colspan="2" class="text-right fw-bold">Grand Total <small>(incl. VAT)</small>
                                    </td>
                                    <td class="fw-bold">{{ single_price(@$booking->grand_total) }}</td>
                                </tr>
                                {{-- <tr>
                                <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="#" target="_blank"><em class="icon ni ni-printer-fill"></em></a>
                            </tr> --}}
                            </tfoot>

                        </table>
                        <div class="nk-notes ff-italic fs-12px text-soft"> Invoice was created on a computer and is valid
                            without the signature and seal. </div>
                    </div>
                </div><!-- .invoice-bills -->
            </div><!-- .invoice-wrap -->
        </div><!-- .invoice -->
    </div><!-- .nk-block -->

    {{-- Assign Vendor Modal --}}
    <div class="modal fade" id="updateBookingForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Booking</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.bookings.update', @$booking->id) }}" method="POST"
                        class="form-validate is-alter">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="customerName">Customer Name</label>
                            <div class="form-control-wrap">
                                <input type="text" name="name" value="{{ @$booking->name }}" class="form-control"
                                    id="customerName" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="customerEmail">Customer Email</label>
                            <div class="form-control-wrap">
                                <input type="email" name="email" value="{{ @$booking->email }}"
                                    class="form-control" id="customerEmail" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="customerPhone">Customer Phone</label>
                            <div class="form-control-wrap">
                                <input type="text" name="phone" value="{{ @$booking->phone }}"
                                    class="form-control" id="customerPhone">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="customerAddress">Customer Address</label>
                            <div class="form-control-wrap">
                                <textarea name="address" class="form-control" id="customerAddress" cols="30" rows="2">{{ @$booking->address }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="assignVendor">Assign Vendor</label>
                            <div class="form-control-wrap">
                                <select name="vendor"
                                    class="form-select form-control @error('vendor') is-invalid @enderror"
                                    data-search="off" id="assignVendor" data-placeholder="Please select vendor">
                                    <option value=""></option>
                                    @if (!empty($vendors))
                                        @foreach ($vendors as $key => $vendor)
                                            <option value="{{ $vendor->id }}"
                                                {{ $vendor->id == $booking->vendor_id ? 'selected' : '' }}>
                                                {{ $vendor->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="bookingStatus">Booking Status</label>
                            <div class="form-control-wrap">
                                <select name="status"
                                    class="form-select form-control @error('status') is-invalid @enderror"
                                    data-search="off" id="bookingStatus" data-placeholder="Please select booking status">
                                    <option value=""></option>
                                    <option value="1" {{ $booking->status == 1 ? 'selected' : '' }}>Fullfilled
                                    </option>
                                    <option value="2" {{ $booking->status == 2 ? 'selected' : '' }}>UnFullfilled
                                    </option>
                                    <option value="3" {{ $booking->status == 3 ? 'selected' : '' }}>Canceled</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="paymentStatus">Payment Status</label>
                            <div class="form-control-wrap">
                                <select name="payment_status"
                                    class="form-select form-control @error('payment_status') is-invalid @enderror"
                                    data-search="off" id="paymentStatus" data-placeholder="Please select payment status">
                                    <option value=""></option>
                                    <option value="paid" {{ $booking->payment_status == 'paid' ? 'selected' : '' }}>Paid
                                    </option>
                                    <option value="unpaid" {{ $booking->payment_status == 'unpaid' ? 'selected' : '' }}>
                                        Unpaid</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
