@extends('frontend.layouts.main')
@section('content')

<div class="container pt-5 pt-xl-8">
    <div class="row mb-5 mb-md-8 mt-xl-1 pb-md-1">
        {{-- <div class="col-lg-4 col-xl-3 order-lg-1 width-md-50">
            @include('frontend.tours.tour_list_filter')
        </div> --}}
        <div class="col-lg-12 col-xl-12 order-md-2 order-lg-3">
            <!-- Shop-control-bar Title -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="font-size-21 font-weight-bold mb-0 text-lh-1">{{ @$tour_count }} <small>Tours Results Showing</small></h3>
                <ul class="nav tab-nav-shop flex-nowrap" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link font-size-22 p-0" id="pills-three-example1-tab" data-toggle="pill" href="#pills-three-example1" role="tab" aria-controls="pills-three-example1" aria-selected="true">
                            <div class="d-md-flex justify-content-md-center align-items-md-center">
                                <i class="fa fa-list"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-size-22 p-0 ml-2 active" id="pills-one-example1-tab" data-toggle="pill" href="#pills-one-example1" role="tab" aria-controls="pills-one-example1" aria-selected="false">
                            <div class="d-md-flex justify-content-md-center align-items-md-center">
                                <i class="fa fa-th"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End shop-control-bar Title -->

            <!-- Slick Tab carousel -->
            <div class="u-slick__tab">
                @if(!empty($tours))
                <!-- Tab Content -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="pills-three-example1" role="tabpanel" aria-labelledby="pills-three-example1-tab" data-target-group="groups">
                        <ul class="d-block list-unstyled products-group prodcut-list-view">
                            @foreach($tours as $key => $tour)
                            <li class="card mb-5 overflow-hidden">
                                <div class="product-item__outer w-100">
                                    <div class="row">
                                        <div class="col-md-5 col-xl-4">
                                            <div class="product-item__header">
                                                <div class="position-relative">
                                                    <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3"
                                                        data-slides-show="1"
                                                        data-slides-scroll="1"
                                                        data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic v4 u-slick__arrow-classic--v4 u-slick__arrow-centered--y rounded-circle"
                                                        data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left"
                                                        data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right">
                                                        <div class="js-slide">
                                                            <a href="{{ route('tour.detail', @$tour->slug) }}" class="d-block gradient-overlay-half-bg-gradient-v5"><img class="img-fluid min-height-230" src="{{ uploaded_asset(@$tour->thumbnail_img) }}"></a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-xl-5 flex-horizontal-center">
                                            <div class="w-100 position-relative m-4 m-md-0">
                                                <div class="mb-2 pb-1">
                                                    @if(@$tour->featured == 1)
                                                    <span class="badge badge-pill bg-blue-1 text-white px-4 py-1 font-size-14 font-weight-normal text-lh-1dot6 mb-1">Featured</span>
                                                    @endif
                                                    @if(@$tour->discount > 1)
                                                    <span class="badge badge-pill bg-success text-white px-3 py-1 font-size-14 font-weight-normal text-lh-1dot6 mb-1 ml-2">{{ @$tour->discount }}% OFF</span>
                                                    @endif
                                                </div>
                                                <a href="{{ route('tour.detail', @$tour->slug) }}">
                                                    <span class="font-weight-bold font-size-17 text-dark d-flex mb-1">{{ @$tour->name }}</span>
                                                </a>
                                                <div class="card-body p-0">
                                                    <a href="{{ route('tour.detail', @$tour->slug) }}" class="d-block mb-3">
                                                        <div class="d-flex flex-wrap flex-xl-nowrap align-items-center font-size-14 text-gray-1">
                                                            <span class="fas fa-cloud-sun-rain"></span>&nbsp; {{ @$tour->season }}
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col col-xl-3 align-self-center py-4 py-xl-0 border-top border-xl-top-0">
                                            <div class="border-xl-left border-color-7">
                                                <div class="ml-md-4 ml-xl-0">
                                                    <div class="text-center text-md-left text-xl-center d-flex flex-column mb-2 pb-1 ml-md-3 ml-xl-0">
                                                        <div class="d-flex flex-column mb-2">
                                                            {{-- <span class="font-weight-normal font-size-14 text-gray-1 mb-2 pb-1 ml-md-2 ml-xl-0">Multi-day Tours</span> --}}
                                                            <span class="font-weight-normal font-size-14 text-gray-1"><i class="icon flaticon-clock-circular-outline mr-2 text-muted font-size-14"></i> {{ @$tour->duration }}</span>
                                                        </div>
                                                        <div class="mb-0">
                                                            @if(@$tour->child_price > 1)
                                                            <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                            <span class="font-weight-bold font-size-22 text-success">{{ single_price(@$tour->child_price) }}</span>
                                                            @else
                                                            <span class="mr-1 font-size-14 text-gray-1">From</span>
                                                            <span class="font-weight-bold font-size-22 text-success">{{ single_price(@$tour->sell_price) }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center justify-content-md-start justify-content-xl-center">
                                                        <a href="{{ route('tour.detail', @$tour->slug) }}" class="btn btn-outline-primary d-flex align-items-center justify-content-center font-weight-bold min-height-50 border-radius-3 border-width-2 px-2 px-5 py-2">View Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-pane fade show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                        <div class="row">
                            @foreach($tours as $key => $tour)
                            <div class="col-md-3 col-xl-3 mb-3 mb-md-4 pb-1">
                                <div class="card mb-1 transition-3d-hover shadow-hover-2 tab-card h-100">
                                    <div class="position-relative mb-2">
                                        <a href="{{ route('tour.detail', @$tour->slug) }}" class="d-block gradient-overlay-half-bg-gradient-v5">
                                            <img class="min-height-230 bg-img-hero card-img-top" src="{{ uploaded_asset($tour->thumbnail_img) }}" alt="img">
                                        </a>
                                        <div class="position-absolute top-0 left-0 pt-5 pl-3">
                                            @if(@$tour->featured == 1)
                                            <span class="badge badge-pill bg-white text-primary px-4 py-2 font-size-14 font-weight-normal">Featured</span>
                                            @endif
                                            @if(@$tour->discount > 1)
                                            <span class="badge badge-pill bg-white text-danger px-3 ml-3 py-2 font-size-14 font-weight-normal">{{ @$tour->discount }}% OFF</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-body px-4 py-2">
                                        <a href="{{ route('tour.detail', @$tour->slug) }}" class="d-block">
                                            <div class="mb-1 d-flex align-items-center font-size-14 text-primary">
                                                <span class="fas fa-cloud-sun-rain"></span>&nbsp; {{ @$tour->season }}
                                            </div>
                                        </a>
                                        <a href="{{ route('tour.detail', @$tour->slug) }}" class="card-title font-size-17 font-weight-bold mb-0 text-dark" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;min-height: 3em;">{{ @$tour->name }}</a>
                                        <div class="font-size-14 text-muted pt-2">
                                            <i class="icon flaticon-clock-circular-outline mr-2 text-muted font-size-14"></i> {{ @$tour->duration }}
                                        </div>

                                        <div class="bottom-0 left-0 right-0">
                                            <div class="pb-2">
                                                @if(@$tour->child_price > 1)
                                                <h2 class="h5 text-success mb-0 font-weight-bold font-size-17"><small class="mr-2">From</small>{{ single_price(@$tour->child_price) }}</h2>
                                                @else
                                                <h2 class="h5 text-success mb-0 font-weight-bold font-size-17"><small class="mr-2">From</small>{{ single_price(@$tour->sell_price) }}</h2>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- End Tab Content -->
                @endif
            </div>
            {{ @$tours->links() }}
            <!-- Slick Tab carousel -->
        </div>
    </div>
</div>

@endsection
