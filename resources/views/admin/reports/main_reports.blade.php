@extends("admin.layouts.main")
@section("content")

<div class="components-preview wide-lg mx-auto">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Booking Report</h4>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('admin.bookings.export') }}" class="btn btn-dim btn-outline-info"><em class="icon ni ni-arrow-to-down"></em><span>Download Report</span></a>
                </div>
            </div>
        </div>

        <div class="card card-bordered card-preview">
            <table class="table table-tranx">
                <thead>
                    <tr>
                        <th width="5%">{{ __('#') }}</th>
                        <th width="15%">{{  __('Reference') }}</th>
                        <th width="20%">{{  __('Vendor') }}</th>
                        <th width="15%">{{  __('Amount') }}</th>
                        <th width="15%">{{  __('Payment') }}</th>
                        <th width="10%">{{  __('Status') }}</th>
                        <th width="15%">{{  __('Date') }}</th>
                        <th width="5%"></th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($bookingReport))
                        @foreach(@$bookingReport as $key => $br)
                        <tr class="tb-tnx-item">
                            <td>{{ ($key+1) + ($bookingReport->currentPage() - 1)*$bookingReport->perPage() }}</td>
                            <td>
                                <span class="title text-primary fw-bold">{{ @$br->booking_reference }}</span>
                            </td>
                            <td>
                                <span class="title">{{ @$br->vendor->name }}</span>
                            </td>
                            <td>
                                <span class="title text-success fw-bold">{{ single_price(@$br->grand_total) }}</span>
                            </td>
                            <td>
                                @if(@$br->payment_status == 'paid')
                                <span class="badge badge-dim badge-outline-success">{{ __('Paid') }}</span>
                                @else
                                <span class="badge badge-dim badge-outline-danger">{{ __('Unpaid') }}</span>
                                @endif

                                @if(@$br->payment_method == 'cash')
                                <span class="badge badge-dim badge-outline-primary">{{ __('Cash') }}</span>
                                @else
                                <span class="badge badge-dim badge-outline-info">{{ __('Credit/Debit') }}</span>
                                @endif
                                
                            </td>
                            <td>
                                @if(@$br->status == 1)
                                <span class="badge badge-dim badge-outline-success">{{ __('Completed') }}</span>
                                @else
                                <span class="badge badge-dim badge-outline-warning">{{ __('Pending') }}</span>
                                @endif
                            </td>
                            <td>
                                <span class="title text-info">{{ date('d M, Y', strtotime(@$br->created_at)) }}</span><br>
                                <span class="title text-info">{{ date('h:i A', strtotime(@$br->created_at)) }}</span>
                            </td>
                            <td class="tb-tnx-action">
                                <div class="dropdown">
                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                        <ul class="link-list-plain">
                                            <li><a href="{{ route('admin.bookings.view', @$br->booking_reference) }}" class="text-info">{{ __('View') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection