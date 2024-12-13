@extends("admin.layouts.main")
@section("content")

    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Sales Overview</h3>
                <div class="nk-block-des text-soft">
                    <p>Welcome to Sahara Desert Dubai dashboard.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            {{-- <li>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span class="d-none d-md-inline">Last</span> 30 Days</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#"><span>Last 30 Days</span></a></li>
                                            <li><a href="#"><span>Last 6 Months</span></a></li>
                                            <li><a href="#"><span>Last 1 Years</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li> --}}
                            <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Reports</span></a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="row g-gs">
            <div class="col-xxl-6">
                <div class="row g-gs">
                    <div class="col-lg-6 col-xxl-12">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-title-group align-start mb-2">
                                    <div class="card-title">
                                        <h6 class="title">Sales Revenue</h6>
                                        <p>In last 30 days revenue from Bookings.</p>
                                    </div>
                                    <div class="card-tools">
                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Revenue from subscription"></em>
                                    </div>
                                </div>
                                <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                                    <div class="nk-sale-data-group flex-md-nowrap g-4">
                                        <div class="nk-sale-data">
                                            <span class="amount">{{ single_price(@$thisMonthRevenue) }}
                                            <span class="change down text-danger">
                                                <em class="icon ni ni-arrow-long-down"></em>16.93%
                                            </span></span>
                                            <span class="sub-title">This Month</span>
                                        </div>
                                        <div class="nk-sale-data">
                                            <span class="amount">{{ single_price(@$thisWeekRevenue) }} 
                                            <span class="change up text-success">
                                                <em class="icon ni ni-arrow-long-up"></em>4.26%
                                            </span></span>
                                            <span class="sub-title">This Week</span>
                                        </div>
                                    </div>
                                    <div class="nk-sales-ck sales-revenue">
                                        <canvas class="sales-bar-chart" id="salesRevenue"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .col -->
                    <div class="col-lg-6 col-xxl-12">
                        <div class="row g-gs">
                            <div class="col-sm-6 col-lg-12 col-xxl-6">
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <div class="card-title-group align-start mb-2">
                                            <div class="card-title">
                                                <h6 class="title">Pending Bookings</h6>
                                            </div>
                                            <div class="card-tools">
                                                <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total active subscription"></em>
                                            </div>
                                        </div>
                                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                            <div class="nk-sale-data">
                                                <span class="amount">{{ @$pendingBookings }}</span>
                                                <span class="sub-title"><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span>since last month</span>
                                            </div>
                                            <div class="nk-sales-ck">
                                                <canvas class="sales-bar-chart" id="activeSubscription"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-sm-6 col-lg-12 col-xxl-6">
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <div class="card-title-group align-start mb-2">
                                            <div class="card-title">
                                                <h6 class="title">Completed Bookings</h6>
                                            </div>
                                            <div class="card-tools">
                                                <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Daily Avg. subscription"></em>
                                            </div>
                                        </div>
                                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                            <div class="nk-sale-data">
                                                <span class="amount">{{ @$completeBookings }}</span>
                                                <span class="sub-title">
                                                    <span class="change up text-success"><em class="icon ni ni-arrow-long-up"></em>2.45%</span>since last month
                                                </span>
                                            </div>
                                            <div class="nk-sales-ck">
                                                <canvas class="sales-bar-chart" id="totalSubscription"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .col -->
            
            <div class="col-xxl-8">
                <div class="card card-bordered card-full">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title"><span class="mr-2">Latest Bookings</span> <a href="{{ route('admin.bookings.list') }}" class="link d-none d-sm-inline">See History</a></h6>
                            </div>
                            {{-- <div class="card-tools">
                                <ul class="card-tools-nav">
                                    <li><a href="#"><span>Paid</span></a></li>
                                    <li><a href="#"><span>Pending</span></a></li>
                                    <li class="active"><a href="#"><span>All</span></a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-inner p-0 border-top">
                        <div class="nk-tb-list nk-tb-orders">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col"><span>Booking Reference</span></div>
                                <div class="nk-tb-col tb-col-sm"><span>Customer</span></div>
                                <div class="nk-tb-col tb-col-md"><span>Booking Date</span></div>
                                <div class="nk-tb-col"><span>Amount</span></div>
                                <div class="nk-tb-col tb-col-lg"><span>Payment</span></div>
                                <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span></div>
                                <div class="nk-tb-col"><span>&nbsp;</span></div>
                            </div>
                            @if(!empty($bookingHistory))
                            @foreach($bookingHistory as $key => $booking)
                            <div class="nk-tb-item">
                                <div class="nk-tb-col">
                                    <span class="tb-lead"><a href="#">{{ @$booking->booking_reference }}</a></span>
                                </div>
                                <div class="nk-tb-col tb-col-sm">
                                    <div class="user-card">
                                        <div class="user-avatar user-avatar-sm bg-purple">
                                            <span>{{ substr(@$booking->name,0,1) }}</span>
                                        </div>
                                        <div class="user-name">
                                            <span class="tb-lead">{{ @$booking->name }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span class="tb-sub">{{ date('d M, Y', strtotime(@$booking->created_at)) }}</span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="tb-sub tb-amount">{{ single_price(@$booking->grand_total) }}</span>
                                </div>
                                <div class="nk-tb-col">
                                    @if(@$booking->payment_status == 'paid')
                                    <span class="badge badge-dim badge-outline-success">Paid</span>
                                    @else
                                    <span class="badge badge-dim badge-outline-danger">Unpaid</span>
                                    @endif
                                </div>
                                <div class="nk-tb-col">
                                    @if (@$booking->status == 1)
                                    <span class="badge badge-dim badge-outline-success">Completed</span>
                                    @elseif (@$booking->status == 2)
                                    <span class="badge badge-dim badge-outline-warning">Pending</span>
                                    @elseif(@$booking->status == 0)
                                    <span class="badge badge-dim badge-outline-danger">Canceled</span>
                                    @endif
                                </div>
                                <div class="nk-tb-col nk-tb-col-action">
                                    <div class="dropdown">
                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                            <ul class="link-list-plain">
                                                <li><a href="{{ route('admin.bookings.view', @$booking->booking_reference) }}">View</a></li>
                                                <li><a href="{{ route('admin.bookings.invoice.download', @$booking->id) }}">Invoice</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="card-inner-sm border-top text-center d-sm-none">
                        <a href="{{ route('admin.bookings.list') }}" class="btn btn-link btn-block">See History</a>
                    </div>
                </div><!-- .card -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .nk-block -->
@endsection
