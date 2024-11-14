@extends("admin.layouts.main")
@section("content")

<div class="components-preview wide-lg mx-auto">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Booking List</h4>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('admin.bookings.export') }}" class="btn btn-dim btn-outline-info"><em class="icon ni ni-plus"></em><span>Export Bookings</span></a>
                    <a href="{{ route('admin.bookings.create') }}" class="btn btn-dim btn-outline-primary"><em class="icon ni ni-plus"></em><span>Create New Booking</span></a>
                </div>
            </div>
        </div>

        @if(session('status'))
        <div class="alert alert-success alert-icon">
            <em class="icon ni ni-check-circle"></em> {{ session('status') }}
        </div>
        @endif

        <div class="card card-bordered card-preview">
            <table class="table table-tranx">
                <thead>
                    <tr>
                        <th width="5%">{{ __('#') }}</th>
                        <th width="15%">{{  __('Reference') }}</th>
                        <th width="15%">{{  __('Time Slot') }}</th>
                        <th width="17%">{{  __('Customer') }}</th>
                        <th width="12%">{{  __('Amount') }}</th>
                        <th width="8%">{{  __('Payment') }}</th>
                        <th width="8%">{{  __('Status') }}</th>
                        <th width="15%">{{  __('Date') }}</th>
                        <th width="5%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $key => $booking)
                    <tr class="tb-tnx-item">
                        <td>
                            <span>{{ ($key+1) + ($bookings->currentPage() - 1)*$bookings->perPage() }}</span>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-sm-10">
                                    <span class="title text-primary fw-bold">{{ @$booking->booking_reference }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="title text-info">{{ date('d M, Y', strtotime(@$booking->booking_date)) }}</span><br>
                            <span class="title text-info">{{ date('h:i A', strtotime(@$booking->time_slot)) }}</span>
                        </td>
                        <td>
                            <span class="title">{{ @$booking->name }}</span>
                        </td>
                        <td>
                            <span class="title text-success fw-bold">{{ single_price(@$booking->grand_total) }}</span>
                        </td>
                        <td>
                            @if(@$booking->payment_status == 'paid')
                            <span class="badge badge-dim badge-outline-success">{{ __('Paid') }}</span>
                            @else
                            <span class="badge badge-dim badge-outline-danger">{{ __('Unpaid') }}</span>
                            @endif
                        </td>
                        <td>
                            @if(@$booking->status == 1)
                            <span class="badge badge-dim badge-outline-success">{{ __('Completed') }}</span>
                            @else
                            <span class="badge badge-dim badge-outline-warning">{{ __('Pending') }}</span>
                            @endif
                        </td>
                        <td>
                            <span class="title text-info">{{ date('d M, Y', strtotime(@$booking->created_at)) }}</span><br>
                            <span class="title text-info">{{ date('h:i A', strtotime(@$booking->created_at)) }}</span>
                        </td>
                        <td class="tb-tnx-action">
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li><a href="{{ route('admin.bookings.view', @$booking->booking_reference) }}" class="text-info">{{ __('View') }}</a></li>
                                        <li><a href="{{ route('admin.bookings.edit', @$booking->booking_reference) }}" class="text-primary">{{ __('Edit') }}</a></li>
                                        <li><a href="{{ route('admin.bookings.email_sent', @$booking->id) }}" class="text-primary">{{ __('Send Email') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- .card-preview -->
    </div><!-- nk-block -->
</div><!-- .components-preview -->

@endsection