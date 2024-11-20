@extends("frontend.seller.layouts.main")
@section("content")

<div class="col-xl-12">
    <div class="row g-4">
        <div class="col-sm-3 col-xs-12 m-auto">
            <div class="nk-order-ovwg-data buy bg-white">
                <div class="title text-center"><em class="icon ni ni-sign-usd-alt mr-0 text-muted"></em> Balance Due To Admin</div>
                <div class="amount text-center">
                    @if (@$adminPayoutBalance > 0)
                       <span class="text-danger">{{ single_price($adminPayoutBalance) }}</span>
                    @elseif (@$adminPayoutBalance < 0)
                        <span class="text-success">{{ single_price($adminPayoutBalance) }}</span>
                    @else
                        <span class="text-primary">{{ single_price($adminPayoutBalance) }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12 col-xxl-8 mt-2">
    <div class="card card-bordered card-full">
        <div class="card-inner border-bottom">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Payout Transactions</h6>
                </div>
                <div class="card-tools">
                    {{-- <a href="#" class="link">View All</a> --}}
                </div>
            </div>
        </div>
        <div class="nk-tb-list">
            <div class="nk-tb-item nk-tb-head">
                <div class="nk-tb-col"><span>Tranx Amount</span></div>
                <div class="nk-tb-col"><span>Booking Reference</span></div>
                <div class="nk-tb-col tb-col-sm"><span>Trans Type</span></div>
                <div class="nk-tb-col tb-col-lg"><span>Remark</span></div>
                <div class="nk-tb-col"><span>Payout Status</span></div>
                <div class="nk-tb-col tb-col-sm"><span>Payout Date</span></div>
                <div class="nk-tb-col"><span>&nbsp;</span></div>
            </div>
            @if (!empty($adminPayoutTranx))
                @foreach($adminPayoutTranx as $key => $tranx)
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <span class="tb-sub tb-amount">{{ single_price($tranx->amount) }}</span></span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-sub tb-amount text-primary">{{ @$tranx->booking_reference }}</span></span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            @if ($tranx->payment_type == 'debit')
                                <span class="tb-lead text-danger"><em class="icon ni ni-upload"></em> {{ __('Debit') }}</span>
                            @elseif ($tranx->payment_type == 'credit')
                                <span class="tb-lead text-success"><em class="icon ni ni-download"></em> {{ __('Credit') }}</span> 
                            @endif
                        </div>
                        <div class="nk-tb-col tb-col-lg">
                            <span class="tb-sub truncate-2">{{ Str::limit(@$tranx->tranx_remark, 25) }}</span>
                        </div>
                        <div class="nk-tb-col">
                            @if (@$tranx->payment_status == 0)
                                <span class="badge badge-dot badge-danger">Pending</span></span>
                            @elseif(@$tranx->payment_status == 1)
                                <span class="badge badge-dot badge-success">Success</span></span>
                            @endif
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            @if(!empty($tranx->payment_date))
                            <span class="tb-sub">{{ date('d M, Y', strtotime($tranx->payment_date)) }}</span><br>
                            <span class="tb-sub">{{ date('h:i A', strtotime($tranx->payment_date)) }}</span>
                            @endif
                        </div>
                        <div class="nk-tb-col nk-tb-col-action">
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-chevron-right"></em></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li><a href="{{ route('vendor.wallet.tranx.view', $tranx->id) }}">View</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div><!-- .card -->
    @if(!empty($walletTranx))
    <div class="m-2">
        {{ $walletTranx->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div><!-- .col -->

@endsection