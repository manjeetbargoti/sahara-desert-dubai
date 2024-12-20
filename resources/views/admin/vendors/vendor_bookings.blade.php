@extends('admin.layouts.main')
@section('content')

    <div class="components-preview wide-lg mx-auto">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Booking List</small></h4>
                    </div>
                    <div class="nk-block-head-content">
                        <a href="{{ route('admin.bookings.create') }}" class="btn btn-dim btn-outline-primary"><em
                                class="icon ni ni-plus"></em><span>Create New Booking</span></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="font-weight-bold text-muted">Vendor Name</td>
                                <td class="text-info">{{ @$vendor->name }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-muted">Business Name</td>
                                <td class="text-info">{{ @$vendor->shop->name }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-muted">Business Address</td>
                                <td class="text-info">{{ @$vendor->shop->city . ', ' . @$vendor->shop->country }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-7 text-right">
                    <a href="{{ route('admin.vendor.bookings.comm_export', ['id' => @$vendor->id, 'inputs' => request()->input()]) }}"
                        class="btn btn-dim btn-outline-info"><em class="icon ni ni-download"></em><span>Commission
                            Report</span></a>
                    <a href="{{ route('admin.vendor.bookings.export', ['id' => @$vendor->id, 'inputs' => request()->input()]) }}"
                        class="btn btn-dim btn-outline-info"><em class="icon ni ni-download"></em><span>Export
                            Bookings</span></a>
                </div>
            </div>

            <div class="card card-bordered card-preview">
                <div class="card-header">
                    <form class="booking-search" id="bookingSearch" method="get"
                        action="{{ route('admin.vendor.bookings', @$vendor->id) }}">
                        {{-- @csrf --}}
                        <div class="row">
                            <div class="col-sm-3">
                                <select name="payment_status" id="paymentStatus" class="form-control">
                                    <option value="">By Payment Status</option>
                                    <option value="paid" {{ @$payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                    <option value="unpaid" {{ @$payment_status == 'unpaid' ? 'selected' : '' }}>Unpaid
                                    </option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select name="status" id="bookingStatus" class="form-control">
                                    <option value="">By Status</option>
                                    <option value="1" {{ @$status == '1' ? 'selected' : '' }}>Completed</option>
                                    <option value="2" {{ @$status == '2' ? 'selected' : '' }}>Pending</option>
                                    <option value="0" {{ @$status == '0' ? 'selected' : '' }}>Canceled</option>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="search"
                                        @isset($sort_search) value="{{ $sort_search }}" @endisset
                                        name="search" placeholder="{{ __('Type Booking reference or customer name') }}">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dim btn-outline-success d-block">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="cord-body">
                    <table class="table table-tranx">
                        <thead>
                            <tr>
                                <th width="5%">{{ __('#') }}</th>
                                <th width="15%">{{ __('Reference') }}</th>
                                <th width="15%">{{ __('Time Slot') }}</th>
                                <th width="17%">{{ __('Customer') }}</th>
                                <th width="12%">{{ __('Amount') }}</th>
                                <th width="8%">{{ __('Payment') }}</th>
                                <th width="8%">{{ __('Status') }}</th>
                                <th width="15%">{{ __('Date') }}</th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($bookings->count() > 0)
                                @foreach ($bookings as $key => $booking)
                                    <tr class="tb-tnx-item">
                                        <td>
                                            <span>{{ $key + 1 + ($bookings->currentPage() - 1) * $bookings->perPage() }}</span>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <span
                                                        class="title text-primary fw-bold">{{ @$booking->booking_reference }}</span><br>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span
                                                class="title text-info">{{ date('d M, Y', strtotime(@$booking->booking_date)) }}</span><br>
                                            <span
                                                class="title text-info">{{ date('h:i A', strtotime(@$booking->time_slot)) }}</span>
                                        </td>
                                        <td>
                                            <span class="title">{{ @$booking->name }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="title text-success fw-bold">{{ single_price(@$booking->grand_total) }}</span>
                                        </td>
                                        <td>
                                            @if (@$booking->payment_status == 'paid')
                                                <span
                                                    class="badge badge-dim badge-outline-success">{{ __('Paid') }}</span>
                                            @else
                                                <span
                                                    class="badge badge-dim badge-outline-danger">{{ __('Unpaid') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (@$booking->status == 1)
                                                <span
                                                    class="badge badge-dim badge-outline-success">{{ __('Completed') }}</span>
                                            @elseif (@$booking->status == 2)
                                                <span
                                                    class="badge badge-dim badge-outline-warning">{{ __('Pending') }}</span>
                                            @elseif (@$booking->status == 0)
                                                <span
                                                    class="badge badge-dim badge-outline-danger">{{ __('Canceled') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span
                                                class="title text-info">{{ date('d M, Y', strtotime(@$booking->created_at)) }}</span><br>
                                            <span
                                                class="title text-info">{{ date('h:i A', strtotime(@$booking->created_at)) }}</span>
                                        </td>
                                        <td class="tb-tnx-action">
                                            <div class="dropdown">
                                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger"
                                                    data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                    <ul class="link-list-plain">
                                                        <li><a href="{{ route('admin.bookings.view', @$booking->booking_reference) }}"
                                                                class="text-info">{{ __('View') }}</a></li>
                                                        <li><a href="#" class="text-primary">{{ __('Edit') }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="tb-tnx-item">
                                    <td colspan="9">
                                        <p class="text-center font-weight-bold text-muted"><em
                                                class="icon ni ni-cross-circle-fill text-danger"></em> No Booking found!</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div><!-- .card-preview -->
        </div><!-- nk-block -->
    </div><!-- .components-preview -->

@endsection
