@extends('admin.layouts.main')
@section('content')

    <div class="nk-block-head">
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Booking Reference <strong
                        class="text-primary small">#{{ @$booking->booking_reference }}</strong></h3>
                <div class="nk-block-des text-soft">
                    <ul class="list-inline">
                        <li>Booking Date: <span class="text-base">{{ date('d M, Y h:i A', strtotime($booking->created_at)) }}</span></li>
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
        @endif
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
                                    <option value="1" {{ $booking->status == 1 ? 'selected' : '' }}>Completed
                                    </option>
                                    <option value="0" {{ $booking->status == 0 ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="2" {{ $booking->status == 2 ? 'selected' : '' }}>Canceled</option>
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
