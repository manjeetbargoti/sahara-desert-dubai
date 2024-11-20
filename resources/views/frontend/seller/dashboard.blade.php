@extends('frontend.seller.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Vendor Dashboard</h3>
                            <div class="nk-block-des text-soft">
                                <p>Welcome to Sahara Desert Dubai Vendor Dashboard.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-md-4">
                            <div class="card card-bordered card-full">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-0">
                                        <div class="card-title">
                                            <h6 class="subtitle">Total Bookings</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip"
                                                data-placement="left" title="Total Bookings"></em>
                                        </div>
                                    </div>
                                    <div class="card-amount">
                                        <span class="amount font-weight-bold"> {{ @$vendorBookingsCount }} <span class="currency currency-usd">Bookings</span>
                                        </span>
                                    </div>
                                    <div class="invest-data">
                                        <div class="invest-data-amount g-2">
                                            <div class="invest-data-history">
                                                <div class="title">Completed</div>
                                                <div class="amount text-success">{{ @$vendorBookingsCompleted }} 
                                                </div>
                                            </div>
                                            <div class="invest-data-history">
                                                <div class="title">Pending</div>
                                                <div class="amount text-danger">{{ @$vendorBookingsPending }} 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invest-data-ck">
                                            <canvas class="iv-data-chart" id="totalDeposit"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-md-4">
                            <div class="card card-bordered card-full">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-0">
                                        <div class="card-title">
                                            <h6 class="subtitle">Total Revenue</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip"
                                                data-placement="left" title="Total Withdraw"></em>
                                        </div>
                                    </div>
                                    <div class="card-amount">
                                        <span class="amount"> 49,595.34 <span class="currency currency-usd">USD</span>
                                        </span>
                                        <span class="change down text-danger"><em
                                                class="icon ni ni-arrow-long-down"></em>1.93%</span>
                                    </div>
                                    <div class="invest-data">
                                        <div class="invest-data-amount g-2">
                                            <div class="invest-data-history">
                                                <div class="title">This Month</div>
                                                <div class="amount">2,940.59 <span class="currency currency-usd">USD</span>
                                                </div>
                                            </div>
                                            <div class="invest-data-history">
                                                <div class="title">This Week</div>
                                                <div class="amount">1,259.28 <span class="currency currency-usd">USD</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invest-data-ck">
                                            <canvas class="iv-data-chart" id="totalWithdraw"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-md-4">
                            <div class="card card-bordered  card-full">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-0">
                                        <div class="card-title">
                                            <h6 class="subtitle">Balance in Wallet</h6>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip"
                                                data-placement="left" title="Total Balance in Wallet"></em>
                                        </div>
                                    </div>
                                    <div class="card-amount">
                                        <span class="amount text-info font-weight-bold">{{ single_price(@$vendorWalletBalance) }}
                                        </span>
                                    </div>
                                    <div class="invest-data">
                                        <div class="invest-data-amount g-2">
                                            <div class="invest-data-history">
                                                <div class="title">Total Credit</div>
                                                <div class="amount text-success">{{ single_price(@$vendorTotalCredit) }}</div>
                                            </div>
                                            <div class="invest-data-history">
                                                <div class="title">Total Debit</div>
                                                <div class="amount text-danger">{{ single_price(@$vendorTotalDebit) }}</div>
                                            </div>
                                        </div>
                                        <div class="invest-data-ck">
                                            <canvas class="iv-data-chart" id="totalWalletBalance"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        
                        <div class="col-xl-12 col-xxl-8">
                            <div class="card card-bordered card-full">
                                <div class="card-inner border-bottom">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Recent Bookings</h6>
                                        </div>
                                        <div class="card-tools">
                                            <a href="{{ route('vendor.bookings.list') }}" class="link">View All</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-tb-list">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col"><span>{{ __('#') }}</span></div>
                                        <div class="nk-tb-col tb-col-md"><span>{{ __('Reference') }}</span></div>
                                        <div class="nk-tb-col tb-col-lg"><span>{{ __('Time Slot') }}</span></div>
                                        <div class="nk-tb-col"><span>{{ __('Customer') }}</span></div>
                                        <div class="nk-tb-col"><span>{{ __('Amount') }}</span></div>
                                        <div class="nk-tb-col"><span>{{ __('Payment') }}</span></div>
                                        <div class="nk-tb-col"><span>{{ __('Status') }}</span></div>
                                        <div class="nk-tb-col"><span>{{ __('Date') }}</span></div>
                                    </div>
                                    @foreach(@$vendorBookings as $key => $vBooking)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col">
                                            <div class="align-center">
                                                <span>{{ ($key+1) }}</span>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="title text-primary fw-bold">{{ @$vBooking->booking_reference }}</span><br>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="title text-info">{{ date('d M, Y', strtotime(@$vBooking->booking_date)) }}</span><br>
                                            <span class="title text-info">{{ date('h:i A', strtotime(@$vBooking->time_slot)) }}</span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="title">{{ @$vBooking->name }}</span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="title text-success fw-bold">{{ single_price(@$vBooking->grand_total) }}</span>
                                        </div>
                                        <div class="nk-tb-col">
                                            @if(@$vBooking->payment_status == 'paid')
                                            <span class="badge badge-success">{{ __('Paid') }}</span>
                                            @else
                                            <span class="badge badge-danger">{{ __('Unpaid') }}</span>
                                            @endif
                                        </div>
                                        <div class="nk-tb-col">
                                            @if(@$vBooking->status == 1)
                                            <span class="badge badge-success">{{ __('Fulfilled') }}</span>
                                            @else
                                            <span class="badge badge-warning">{{ __('Unfulfilled') }}</span>
                                            @endif
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="title text-info">{{ date('d M, Y', strtotime(@$booking->created_at)) }}</span><br>
                                            <span class="title text-info">{{ date('h:i A', strtotime(@$booking->created_at)) }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
