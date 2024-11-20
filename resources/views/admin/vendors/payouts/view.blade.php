@extends('admin.layouts.main')
@section('content')
    <div class="nk-block-head">
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Payout <strong
                        class="text-primary small">#{{ @$payout->booking_reference }}</strong></h3>
                <div class="nk-block-des text-soft">
                    <ul class="list-inline">
                        <li>Booking Date: <span
                                class="text-base">{{ date('d M, Y h:i A', strtotime($payout->created_at)) }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="nk-block-head-content">
                <a href="{{ route('admin.vendor.payout.list', @$payout->user_id) }}"
                    class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                        class="icon ni ni-arrow-left"></em><span>Back</span></a>
                <a href="{{ route('admin.vendor.payout.list', @$payout->user_id) }}"
                    class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                        class="icon ni ni-arrow-left"></em></a>
            </div>
        </div>

        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <a type="button" class="btn btn-dim btn-outline-primary">Edit</a>
            </div>
        </div>
    </div><!-- .nk-block-head -->


    <div class="nk-block-head">
        <div class="row">
            <div class="col-sm-7">
                <table class="table table-bordered table-hover bg-white">
                    <tr>
                        <td><span class="text-muted font-weight-bold">Payout Details:</span></td>
                        <td class="text-right">
                            @if(@$payout->payment_status == 1)
                            <span class="badge badge-dim badge-outline-success font-weight-bold">Completed</span>
                            @elseif(@$payout->payment_status == 0)
                            <span class="badge badge-dim badge-warning font-weight-bold">Pending</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">Reference</td>
                        <td class="font-weight-bold">{{ @$payout->booking_reference }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Payment Type</td>
                        <td>
                            @if (@$payout->payment_type == 'credit')
                                <span class="badge badge-dim badge-outline-danger">Debit</span>
                            @else
                                <span class="badge badge-dim badge-outline-success">Credit</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">Amount</td>
                        <td>{{ date('d M, Y', strtotime(@$payout->booking_date)) }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Payment Status</td>
                        <td>
                            @if (@$payout->payment_status == 1)
                            <span class="badge badge-dim badge-outline-success">Success</span>
                            @else
                            <span class="badge badge-dim badge-outline-danger">Pending</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">Payment Date</td>
                        <td>{{ !empty(@$payout->payment_date) ? date('d M, Y', strtotime(@$payout->payment_date)) : '' }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Transfer to SDD</td>
                        <td>
                            @if(@$payout->transfer_to_admin == 1)
                            <span class="badge badge-dim badge-outline-success">Yes</span>
                            @else
                            <span class="badge badge-dim badge-outline-danger">No</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">Remarks</td>
                        <td>{{ @$payout->tranx_remark }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-5">
                <table class="table table-bordered table-hover bg-white">
                    <tr>
                        <td colspan="2"><span class="text-muted font-weight-bold">Vendor Details:</span></td>
                    </tr>
                    <tr>
                        <td width="30%">Vendor Name</td>
                        <td class="font-weight-bold">{{ @$vendor->name }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Vendor Phone</td>
                        <td class="font-weight-bold">{{ '+'.@$vendor->phone_country_code.' '.@$vendor->phone }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Vendor Email</td>
                        <td class="font-weight-bold">{{ @$vendor->email }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Business Name</td>
                        <td class="font-weight-bold">{{ @$vendor->shop->name }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Business Phone</td>
                        <td class="font-weight-bold">{{ '+'.@$vendor->shop->country_code.' '.@$vendor->shop->phone }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Business Email</td>
                        <td class="font-weight-bold">{{ $vendor->shop->email }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
