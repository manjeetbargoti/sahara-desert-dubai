@extends("frontend.layouts.main")
@section("content")

<!-- ========== HERO ========== -->
<div class="bg-img-hero-bottom min-height-600 space-top-lg-3 space-2" style="background-image: url({{ uploaded_asset(get_setting('homepage_banner')) }});">
    <div class="container">
        <div class="d-md-flex align-items-lg-center text-center">
            <div class="row justify-content-md-center w-100 pt-4">
                <!-- Info -->
                {{-- <div class="mx-3 mb-xl-3 mt-xl-4 mb-2">
                  <h1 class="font-size-60 font-size-xs-30 text-white font-weight-bold  mb-0">Find Next Place To Visit</h1>
                  <p class="font-size-20 font-weight-normal text-white ml-3">Discover amzaing places at exclusive deals</p>
                </div> --}}
                <!-- End Info -->
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                        <form class="js-validate">
                          <div class="row nav-select d-block d-lg-flex mb-lg-3 px-3">
                            <div class="col-sm-12 col-xl-3dot7 mb-4 mb-xl-0 ">
                                <!-- Input -->
                                <span class="d-block text-gray-1 font-weight-normal mb-0">Destination</span>
                                <select class="js-select selectpicker dropdown-select tab-dropdown col-12 pl-0 flaticon-pin-1 d-flex align-items-center text-primary font-weight-semi-bold" title="Where are you going?"
                                data-style=""
                                data-live-search="true"
                                data-searchbox-classes="input-group-sm">
                                    <option class="border-bottom border-color-1" value="project1" data-content='
                                        <span class="d-flex align-items-center">
                                            <span class="font-size-16">London, United Kingdom</span>
                                        </span>'>
                                        London, United Kingdom
                                    </option>
                                    <option class="border-bottom border-color-1" value="project2" data-content='
                                        <span class="d-flex align-items-center">
                                            <span class="font-size-16">New York, United States</span>
                                        </span>'>
                                        New York, United States
                                    </option>
                                    <option  class="border-bottom border-color-1" value="project3" data-content='
                                        <span class="d-flex align-items-center">
                                            <span class="font-size-16">New South Wales, Australia</span>
                                        </span>'>
                                        New South Wales, Australia
                                    </option>
                                    <option class="border-bottom border-color-1" value="project4" data-content='
                                        <span class="d-flex align-items-center">
                                            <span class="font-size-16">Istanbul, Turkey</span>
                                        </span>'>
                                        Istanbul, Turkey
                                    </option>
                                    <option class="" value="project4" data-content='
                                        <span class="d-flex align-items-center">
                                            <span class="font-size-16">Reykjavík, Iceland</span>
                                        </span>'>
                                        Reykjavík, Iceland
                                    </option>
                                </select>
                                <!-- End Input -->
                            </div>

                            <div class="col-sm-12 col-lg-5 col-xl-3dot6 mb-4 mb-lg-0 ">
                                <!-- Input -->
                                <span class="d-block text-gray-1 font-weight-normal mb-0">From - To</span>
                                <div class="border-bottom border-width-2 border-color-1">
                                    <div id="datepickerWrapperFrom" class="u-datepicker input-group">
                                        <div class="input-group-prepend">
                                            <span class="d-flex align-items-center mr-2">
                                              <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
                                            </span>
                                        </div>
                                        <input class="js-range-datepicker font-size-lg-16 shadow-none font-weight-bold form-control hero-form bg-transparent  border-0" type="date"
                                             data-rp-wrapper="#datepickerWrapperFrom"
                                             data-rp-type="range"
                                             data-rp-date-format="M d / Y"
                                             data-rp-default-date='["Jul 7 / 2020", "Aug 25 / 2020"]'>
                                    </div>
                                <!-- End Datepicker -->
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-sm-12 col-lg-4 col-xl-2dot8 mb-4 mb-lg-0">
                                <!-- Input -->
                                <span class="d-block text-gray-1 font-weight-normal mb-0">Trip Type</span>
                                <div class="js-focus-state">
                                    <div class="d-flex border-bottom border-width-2 border-color-1">
                                        <i class="flaticon-backpack d-flex align-items-center mr-2 text-primary font-weight-semi-bold"></i>
                                        <select class="js-select selectpicker dropdown-select">
                                            <option value="2 Rooms - 3 Guests" selected>City Tour</option>
                                            <option value="2 Rooms - 3 Guests">2 Rooms - 4 Guests</option>
                                            <option value="2 Rooms - 3 Guests">3 Rooms - 6 Guests</option>
                                            <option value="2 Rooms - 3 Guests">1 Rooms - 2 Guests</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-sm-12 col-lg-3 col-xl-1dot8 align-self-lg-end text-center text-md-right">
                                <button type="submit" class="btn btn-primary btn-md mb-xl-0 mb-lg-1 transition-3d-hover w-100 w-md-auto w-lg-100"><i class="flaticon-magnifying-glass mr-2"></i>Search</button>
                            </div>
                          </div>
                          <!-- End Checkbox -->
                        </form>
                    </div>
                </div>
                <!-- End Search Jobs Form -->
            </div>
        </div> --}}
    </div>
    <!-- ========== Start TripAdvisor ========== -->
    <div id="TA_cdsratingsonlywide505" class="TA_cdsratingsonlywide" style="position: relative; top: 25em;">
        <ul id="q7wq7QwB" class="TA_links BOaGe6">
            <li id="BmZFaPz" class="KEJsAPi">
                <a target="_blank" href="https://www.tripadvisor.com/Attraction_Review-g295424-d26678366-Reviews-Sahara_Desert_Dubai-Dubai_Emirate_of_Dubai">
                    <img src="https://www.tripadvisor.com/img/cdsi/img2/branding/v2/Tripadvisor_lockup_horizontal_secondary_registered-18034-2.svg" width="100" alt="TripAdvisor" />
                </a>
            </li>
        </ul>
    </div>
    <script async src="https://www.jscache.com/wejs?wtype=cdsratingsonlywide&amp;uniq=505&amp;locationId=26678366&amp;lang=en_US&amp;border=true&amp;display_version=2" data-loadtrk onload="this.loadtrk=true"></script>
    <!-- ========== End TripAdvisor ========== -->
</div>
<!-- ========== END HERO ========== -->

<!-- Icon Block v1 -->
<div class="icon-block-left icon-left-v1 border-bottom border-color-8 pb-2 pt-4 mt-1">
    <div class="container">
        <div class="row">
            <!-- Icon Block Left Align -->
            <div class="col-md-4">
                <div class="media pr-xl-14">
                    <i class="flaticon-placeholder-2 text-primary font-size-50 text-lh-1 mb-3 mr-3"></i>
                    <div class="media-body">
                        <h5 class="font-size-19 text-dark font-weight-bold mb-1"><a href="#">2000+ Destinations</a></h5>
                        <p class="text-gray-1 text-lh-inherit">Our expert team handpicked all destinations in this site</p>
                    </div>
                </div>
            </div>
            <!-- End Icon Block Left Align -->

            <!-- Icon Block Left Align -->
            <div class="col-md-4">
                <div class="media pr-xl-14">
                    <i class="flaticon-price-1 text-primary font-size-50 text-lh-1 mb-3 mr-3"></i>
                    <div class="media-body">
                        <h5 class="font-size-19 text-dark font-weight-bold mb-1"><a href="#">Best Price Guarantee</a></h5>
                        <p class="text-gray-1 text-lh-inherit">Price match within 48 hours of order confirmation</p>
                    </div>
                </div>
            </div>
            <!-- End Icon Block Left Align -->

            <!-- Icon Block Left Align -->
            <div class="col-md-4">
                <div class="media pr-xl-14">
                    <i class="flaticon-customer-service text-primary font-size-50 text-lh-1 mb-3 mr-3"></i>
                    <div class="media-body">
                        <h5 class="font-size-19 text-dark font-weight-bold mb-1"><a href="#">Top Notch 24x7 Support</a></h5>
                        <p class="text-gray-1 text-lh-inherit">We are here to help, before, during, and even after your trip.</p>
                    </div>
                </div>
            </div>
            <!-- End Icon Block Left Align -->
        </div>
    </div>
</div>
<!-- End Icon Block v1 -->

<!-- Destinantion v5 -->
{{-- <div class="destination-block destination-v5 border-bottom border-color-8">
    <div class="container space-1">
        <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5 mt-3">
            <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Popular Destination</h2>
        </div>
        <div class="row">
            <!-- Card Block -->
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient transition-3d-hover shadow-hover-2" style="background-image: url(assets/frontend/img/630x350/img1.jpg);">
                        <header class="w-100 d-flex justify-content-between mb-3">
                            <div>
                                <div class="pb-3 text-lh-1">
                                    <a href="{{ route('tour.detail', 'test-route') }}" class="text-white font-weight-bold font-size-21">United Kingdom</a>
                                </div>
                                <div class="d-inline-flex px-3 py-1 rounded-pill bg-white">
                                    <a href="#" class="font-size-14">15 Tour</a>
                                </div>
                            </div>
                        </header>
                    </div>
                </div>
            <!-- End Card Block -->

            <!-- Card Block -->
                <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                    <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient transition-3d-hover shadow-hover-2" style="background-image: url(assets/frontend/img/300x350/img6.jpg);">
                        <header class="w-100 d-flex justify-content-between mb-3">
                            <div>
                                <div class="pb-3 text-lh-1">
                                    <a href="#" class="text-white font-weight-bold font-size-21">Turkey</a>
                                </div>
                                <div class="d-inline-flex px-3 py-1 rounded-pill bg-white">
                                    <a href="#" class="font-size-14">88 Tour</a>
                                </div>
                            </div>
                        </header>
                    </div>
                </div>
            <!-- End Card Block -->


            <!-- Card Block -->
                <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                    <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient transition-3d-hover shadow-hover-2" style="background-image: url(assets/frontend/img/300x350/img5.jpg);">
                        <header class="w-100 d-flex justify-content-between mb-3">
                            <div>
                                <div class="pb-3 text-lh-1">
                                    <a href="#" class="text-white font-weight-bold font-size-21">Norway</a>
                                </div>
                                <div class="d-inline-flex px-3 py-1 rounded-pill bg-white">
                                    <a href="#" class="font-size-14">92 Tour</a>
                                </div>
                            </div>
                        </header>
                    </div>
                </div>
            <!-- End Card Block -->


            <!-- Card Block -->
                <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                    <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient transition-3d-hover shadow-hover-2" style="background-image: url(assets/frontend/img/300x350/img1.jpg);">
                        <header class="w-100 d-flex justify-content-between mb-3">
                            <div>
                                <div class="pb-3 text-lh-1">
                                    <a href="#" class="text-white font-weight-bold font-size-21">United States</a>
                                </div>
                                <div class="d-inline-flex px-3 py-1 rounded-pill bg-white">
                                    <a href="#" class="font-size-14">75 Tour</a>
                                </div>
                            </div>
                        </header>
                    </div>
                </div>
            <!-- End Card Block -->


            <!-- Card Block -->
                <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                    <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient transition-3d-hover shadow-hover-2" style="background-image: url(assets/frontend/img/300x350/img3.jpg);">
                        <header class="w-100 d-flex justify-content-between mb-3">
                            <div>
                                <div class="pb-3 text-lh-1">
                                    <a href="#" class="text-white font-weight-bold font-size-21">Ukraine</a>
                                </div>
                                <div class="d-inline-flex px-3 py-1 rounded-pill bg-white">
                                    <a href="#" class="font-size-14">05 Tour</a>
                                </div>
                            </div>
                        </header>
                    </div>
                </div>
            <!-- End Card Block -->


            <!-- Card Block -->
                <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                    <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient transition-3d-hover shadow-hover-2" style="background-image: url(assets/frontend/img/300x350/img2.jpg);">
                        <header class="w-100 d-flex justify-content-between mb-3">
                            <div>
                                <div class="pb-3 text-lh-1">
                                    <a href="#" class="text-white font-weight-bold font-size-21">France</a>
                                </div>
                                <div class="d-inline-flex px-3 py-1 rounded-pill bg-white">
                                    <a href="#" class="font-size-14">05 Tour</a>
                                </div>
                            </div>
                        </header>
                    </div>
                </div>
            <!-- End Card Block -->

            <!-- Card Block -->
                <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                    <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient transition-3d-hover shadow-hover-2" style="background-image: url(assets/frontend/img/300x350/img4.jpg);">
                        <header class="w-100 d-flex justify-content-between mb-3">
                            <div>
                                <div class="pb-3 text-lh-1">
                                    <a href="#" class="text-white font-weight-bold font-size-21">India</a>
                                </div>
                                <div class="d-inline-flex px-3 py-1 rounded-pill bg-white">
                                    <a href="#" class="font-size-14">65 Tour</a>
                                </div>
                            </div>
                        </header>
                    </div>
                </div>
            <!-- End Card Block -->
        </div>
    </div>
</div> --}}
<!-- End Destinantion v5 -->

@if(!empty($popularTours))
<!-- Product Cards -->
<div class="product-card-block product-card-v1 border-bottom border-color-8">
    <div class="container space-1">
        <div class="w-md-80 w-lg-50 text-center mx-md-auto mt-3">
            <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Popular Tours</h2>
        </div>
        <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3 mb-4" data-slides-show="4" data-slides-scroll="1" data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-classic--v2 u-slick__arrow-centered--y rounded-circle" data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-xl-n8" data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-xl-n8" data-pagi-classes="d-lg-none text-center u-slick__pagination mt-4" data-responsive='[ { "breakpoint": 1025, "settings": { "slidesToShow": 3 } }, { "breakpoint": 992, "settings": { "slidesToShow": 2 } }, { "breakpoint": 768, "settings": { "slidesToShow": 1 } }, { "breakpoint": 554, "settings": { "slidesToShow": 1 } } ]'>
            @foreach($popularTours as $key => $tour)
            <div class="js-slide mt-5">
                <div class="card mb-1 transition-3d-hover shadow-hover-2 w-100">
                    <div class="position-relative mb-2">
                        <a href="{{ route('tour.detail', @$tour->slug) }}" class="d-block gradient-overlay-half-bg-gradient-v5">
                            <img class="card-img-top" src="{{ uploaded_asset(@$tour->thumbnail_img) }}" alt="{{ @$tour->name }}">
                        </a>
                        <div class="position-absolute top-0 left-0 pt-5 pl-3">
                            @if(@$tour->featured == 1)
                            <a href="{{ route('tour.detail', @$tour->slug) }}">
                                <span class="badge badge-pill bg-white text-primary px-4 py-2 font-size-14 font-weight-normal">Featured</span>
                            </a>
                            @endif
                            @if(@$tour->discount > 1)
                            <a href="{{ route('tour.detail', @$tour->slug) }}">
                            <span class="badge badge-pill bg-white text-danger px-3 ml-3 py-2 font-size-14 font-weight-normal">{{ @$tour->discount }}% OFF</span>
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body px-4 pt-2 pb-3">
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
<!-- End Product Cards -->
@endif

<!--Banner v4-->
<div class="banner-block banner-v4 gradient-overlay-half-bg-blue-light bg-img-hero space-3 space-top-lg-4 space-bottom-lg-3" style="background-image: url({{ uploaded_asset(get_setting('homepage_video_banner')) }});background-attachment:fixed;">
    <div class="text-center mt-xl-2">
        <h5 class="text-white font-size-41 font-weight-bold mb-2">Travelling Highlights</h5>
        <h6 class="text-white font-size-21 font-weight-bold mb-3 mb-lg-5 opacity-7">Your New Travelling Idea</h6>
        <!-- Fancybox -->
        <a class="js-fancybox d-inline-block u-media-player" href="javascript:;"
        data-src="//vimeo.com/167434033" data-speed="700" data-animate-in="zoomIn" data-animate-out="zoomOut" data-caption="MyTravel - Responsive Website Template">
            <span class="u-media-player__icon u-media-player__icon--lg bg-transparent text-white">
                <span class="flaticon-multimedia font-size-60 u-media-player__icon-inner"></span>
            </span>
        </a>
        <!-- End Fancybox -->
    </div>
</div>
<!--End Banner v4-->

@if(!empty($recentTours))
<!-- Product Cards -->
<div class="product-card-block product-card-v1 border-bottom border-color-8">
    <div class="container space-1">
        <div class="w-md-80 w-lg-50 text-center mx-md-auto mt-3">
            <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Recent Tours</h2>
        </div>
        <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3 mb-4" data-slides-show="4" data-slides-scroll="1" data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-classic--v2 u-slick__arrow-centered--y rounded-circle" data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-xl-n8" data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-xl-n8" data-pagi-classes="d-lg-none text-center u-slick__pagination mt-4" data-responsive='[ { "breakpoint": 1025, "settings": { "slidesToShow": 3 } }, { "breakpoint": 992, "settings": { "slidesToShow": 2 } }, { "breakpoint": 768, "settings": { "slidesToShow": 1 } }, { "breakpoint": 554, "settings": { "slidesToShow": 1 } } ]'>
            @foreach($recentTours as $key => $rTour)
            <div class="js-slide mt-5">
                <div class="card mb-1 transition-3d-hover shadow-hover-2 w-100">
                    <div class="position-relative mb-2">
                        <a href="{{ route('tour.detail', @$rTour->slug) }}" class="d-block gradient-overlay-half-bg-gradient-v5">
                            <img class="card-img-top" src="{{ uploaded_asset(@$rTour->thumbnail_img) }}" alt="{{ @$rTour->name }}">
                        </a>
                        <div class="position-absolute top-0 left-0 pt-5 pl-3">
                            @if(@$rTour->featured == 1)
                            <a href="{{ route('tour.detail', @$rTour->slug) }}">
                                <span class="badge badge-pill bg-white text-primary px-4 py-2 font-size-14 font-weight-normal">Featured</span>
                            </a>
                            @endif
                            @if(@$rTour->discount > 1)
                            <a href="{{ route('tour.detail', @$rTour->slug) }}">
                            <span class="badge badge-pill bg-white text-danger px-3 ml-3 py-2 font-size-14 font-weight-normal">{{ @$rTour->discount }}% OFF</span>
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body px-4 pt-2 pb-3">
                        <a href="{{ route('tour.detail', @$rTour->slug) }}" class="d-block">
                            <div class="mb-1 d-flex align-items-center font-size-14 text-primary">
                                <span class="fas fa-cloud-sun-rain"></span>&nbsp; {{ @$rTour->season }}
                            </div>
                        </a>
                        <a href="{{ route('tour.detail', @$rTour->slug) }}" class="card-title font-size-17 font-weight-bold mb-0 text-dark" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;min-height: 3em;">{{ @$rTour->name }}</a>
                        <div class="font-size-14 text-muted pt-2">
                            <i class="icon flaticon-clock-circular-outline mr-2 text-muted font-size-14"></i> {{ @$rTour->duration }}
                        </div>
                        
                        <div class="bottom-0 left-0 right-0">
                            <div class="pb-2">
                                @if(@$rTour->child_price > 1)
                                <h2 class="h5 text-success mb-0 font-weight-bold font-size-17"><small class="mr-2">From</small>{{ single_price(@$rTour->child_price) }}</h2>
                                @else
                                <h2 class="h5 text-success mb-0 font-weight-bold font-size-17"><small class="mr-2">From</small>{{ single_price(@$rTour->sell_price) }}</h2>
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
<!-- End Product Cards -->
@endif

<div class="container">
    <div class="w-100 bg-dark-gradient rounded-border py-5 px-xl-8 px-3">
        <span class="text-muted">Why go with US?</span>
        <h2 class="text-white font-size-30 font-weight-bold mb-0">For The Unforgettable Experiences!</h2>
        <p class="text-white mb-4">If you’re looking for an unforgettable experience in Dubai, a desert safari is a must-do. And there’s no better company to do it with than Sahara Desert Dubai. We offer both private and group tours, so whether you’re traveling solo or with a group of friends or family, we can accommodate you. Our experienced guides will take you on an exciting journey through the desert, where you’ll see all the amazing sights and sounds that the Sahara has to offer.We also offer city tours, so if you want to explore all that Dubai has to offer, we can show you around. From the iconic Burj Khalifa to the beautiful beaches, we’ll make sure you see everything that this amazing city has to offer. So whether you’re looking for an adventure in the desert or a tour of the city, Sahara Desert Dubai is the perfect company for you. We guarantee that you’ll have an unforgettable experience with us.</p>
        <div class="d-flex align-items-center gap-5 flex-wrap">
            <div class="rounded-pill px-3 py-3 bg-custom d-flex align-items-center gap-3">
                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1116_20)">
                    <path d="M11.2069 22.43C9.53616 22.4298 7.88657 22.0563 6.37871 21.3367C4.87085 20.6172 3.54281 19.5699 2.49167 18.2712C1.44053 16.9726 0.692845 15.4555 0.303265 13.8308C-0.0863137 12.2061 -0.107942 10.5149 0.239962 8.88082C0.587866 7.24671 1.29651 5.71098 2.3141 4.38589C3.33169 3.06079 4.6325 1.97982 6.12147 1.22198C7.61044 0.46413 9.24993 0.0485644 10.9201 0.00565293C12.5903 -0.0372585 14.249 0.293568 15.7749 0.973953C15.8949 1.0274 16.0031 1.10395 16.0935 1.19924C16.1839 1.29453 16.2546 1.40668 16.3016 1.5293C16.3487 1.65192 16.3711 1.78261 16.3676 1.91389C16.3641 2.04518 16.3348 2.17449 16.2814 2.29445C16.2279 2.41442 16.1514 2.52268 16.0561 2.61305C15.9608 2.70343 15.8487 2.77416 15.726 2.82119C15.6034 2.86822 15.4727 2.89064 15.3415 2.88717C15.2102 2.8837 15.0809 2.8544 14.9609 2.80095C13.8333 2.30118 12.6168 2.03296 11.3836 2.01221C10.1503 1.99146 8.92552 2.21859 7.78173 2.68014C6.63795 3.14169 5.59851 3.82826 4.72508 4.69911C3.85165 5.56996 3.16201 6.60736 2.69707 7.74977C2.23213 8.89218 2.00137 10.1163 2.01847 11.3496C2.03557 12.5829 2.30019 13.8002 2.79662 14.9293C3.29305 16.0583 4.01119 17.0762 4.90843 17.9225C5.80568 18.7688 6.86375 19.4263 8.01989 19.856C9.41185 20.3696 10.9073 20.5395 12.379 20.351C13.8507 20.1625 15.2551 19.6213 16.4726 18.7734C17.6902 17.9255 18.6849 16.7961 19.3722 15.4811C20.0594 14.1662 20.4189 12.7047 20.4199 11.221V10.282C20.4199 10.0167 20.5252 9.76238 20.7128 9.57485C20.9003 9.38731 21.1547 9.28195 21.4199 9.28195C21.6851 9.28195 21.9395 9.38731 22.127 9.57485C22.3145 9.76238 22.4199 10.0167 22.4199 10.282V11.221C22.4151 14.1938 21.2316 17.0434 19.1288 19.1448C17.0261 21.2463 14.1757 22.428 11.2029 22.431L11.2069 22.43Z" fill="white"></path>
                    <path d="M11.2128 14.273C10.9476 14.2729 10.6933 14.1675 10.5058 13.98L7.44282 10.917C7.26066 10.7284 7.15987 10.4758 7.16215 10.2136C7.16443 9.95136 7.26959 9.70055 7.455 9.51514C7.64041 9.32973 7.89122 9.22456 8.15342 9.22229C8.41562 9.22001 8.66822 9.3208 8.85682 9.50296L11.2128 11.859L20.7128 2.34496C20.8057 2.25205 20.9159 2.17834 21.0372 2.12803C21.1586 2.07772 21.2886 2.0518 21.42 2.05176C21.5513 2.05171 21.6814 2.07754 21.8028 2.12776C21.9241 2.17798 22.0344 2.25162 22.1273 2.34446C22.2202 2.43731 22.2939 2.54754 22.3443 2.66887C22.3946 2.79021 22.4205 2.92026 22.4205 3.05161C22.4206 3.18296 22.3947 3.31303 22.3445 3.43439C22.2943 3.55576 22.2207 3.66605 22.1278 3.75896L11.9198 13.979C11.8271 14.072 11.7169 14.1459 11.5956 14.1963C11.4743 14.2468 11.3442 14.2728 11.2128 14.273Z" fill="white"></path>
                    </g>
                    <defs>
                    <clipPath id="clip0_1116_20">
                    <rect width="22.423" height="22.431" fill="white"></rect>
                    </clipPath>
                    </defs>
                </svg>
                <span class="text-white font-size-14">Group Tours</span>                                    
            </div>
            <div class="rounded-pill px-3 py-3 bg-custom d-flex align-items-center gap-3">
                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1116_20)">
                    <path d="M11.2069 22.43C9.53616 22.4298 7.88657 22.0563 6.37871 21.3367C4.87085 20.6172 3.54281 19.5699 2.49167 18.2712C1.44053 16.9726 0.692845 15.4555 0.303265 13.8308C-0.0863137 12.2061 -0.107942 10.5149 0.239962 8.88082C0.587866 7.24671 1.29651 5.71098 2.3141 4.38589C3.33169 3.06079 4.6325 1.97982 6.12147 1.22198C7.61044 0.46413 9.24993 0.0485644 10.9201 0.00565293C12.5903 -0.0372585 14.249 0.293568 15.7749 0.973953C15.8949 1.0274 16.0031 1.10395 16.0935 1.19924C16.1839 1.29453 16.2546 1.40668 16.3016 1.5293C16.3487 1.65192 16.3711 1.78261 16.3676 1.91389C16.3641 2.04518 16.3348 2.17449 16.2814 2.29445C16.2279 2.41442 16.1514 2.52268 16.0561 2.61305C15.9608 2.70343 15.8487 2.77416 15.726 2.82119C15.6034 2.86822 15.4727 2.89064 15.3415 2.88717C15.2102 2.8837 15.0809 2.8544 14.9609 2.80095C13.8333 2.30118 12.6168 2.03296 11.3836 2.01221C10.1503 1.99146 8.92552 2.21859 7.78173 2.68014C6.63795 3.14169 5.59851 3.82826 4.72508 4.69911C3.85165 5.56996 3.16201 6.60736 2.69707 7.74977C2.23213 8.89218 2.00137 10.1163 2.01847 11.3496C2.03557 12.5829 2.30019 13.8002 2.79662 14.9293C3.29305 16.0583 4.01119 17.0762 4.90843 17.9225C5.80568 18.7688 6.86375 19.4263 8.01989 19.856C9.41185 20.3696 10.9073 20.5395 12.379 20.351C13.8507 20.1625 15.2551 19.6213 16.4726 18.7734C17.6902 17.9255 18.6849 16.7961 19.3722 15.4811C20.0594 14.1662 20.4189 12.7047 20.4199 11.221V10.282C20.4199 10.0167 20.5252 9.76238 20.7128 9.57485C20.9003 9.38731 21.1547 9.28195 21.4199 9.28195C21.6851 9.28195 21.9395 9.38731 22.127 9.57485C22.3145 9.76238 22.4199 10.0167 22.4199 10.282V11.221C22.4151 14.1938 21.2316 17.0434 19.1288 19.1448C17.0261 21.2463 14.1757 22.428 11.2029 22.431L11.2069 22.43Z" fill="white"></path>
                    <path d="M11.2128 14.273C10.9476 14.2729 10.6933 14.1675 10.5058 13.98L7.44282 10.917C7.26066 10.7284 7.15987 10.4758 7.16215 10.2136C7.16443 9.95136 7.26959 9.70055 7.455 9.51514C7.64041 9.32973 7.89122 9.22456 8.15342 9.22229C8.41562 9.22001 8.66822 9.3208 8.85682 9.50296L11.2128 11.859L20.7128 2.34496C20.8057 2.25205 20.9159 2.17834 21.0372 2.12803C21.1586 2.07772 21.2886 2.0518 21.42 2.05176C21.5513 2.05171 21.6814 2.07754 21.8028 2.12776C21.9241 2.17798 22.0344 2.25162 22.1273 2.34446C22.2202 2.43731 22.2939 2.54754 22.3443 2.66887C22.3946 2.79021 22.4205 2.92026 22.4205 3.05161C22.4206 3.18296 22.3947 3.31303 22.3445 3.43439C22.2943 3.55576 22.2207 3.66605 22.1278 3.75896L11.9198 13.979C11.8271 14.072 11.7169 14.1459 11.5956 14.1963C11.4743 14.2468 11.3442 14.2728 11.2128 14.273Z" fill="white"></path>
                    </g>
                    <defs>
                    <clipPath id="clip0_1116_20">
                    <rect width="22.423" height="22.431" fill="white"></rect>
                    </clipPath>
                    </defs>
                </svg>
                <span class="text-white font-size-14">Private Tours</span>                                    
            </div>
            <div class="rounded-pill px-3 py-3 bg-custom d-flex align-items-center gap-3">
                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1116_20)">
                    <path d="M11.2069 22.43C9.53616 22.4298 7.88657 22.0563 6.37871 21.3367C4.87085 20.6172 3.54281 19.5699 2.49167 18.2712C1.44053 16.9726 0.692845 15.4555 0.303265 13.8308C-0.0863137 12.2061 -0.107942 10.5149 0.239962 8.88082C0.587866 7.24671 1.29651 5.71098 2.3141 4.38589C3.33169 3.06079 4.6325 1.97982 6.12147 1.22198C7.61044 0.46413 9.24993 0.0485644 10.9201 0.00565293C12.5903 -0.0372585 14.249 0.293568 15.7749 0.973953C15.8949 1.0274 16.0031 1.10395 16.0935 1.19924C16.1839 1.29453 16.2546 1.40668 16.3016 1.5293C16.3487 1.65192 16.3711 1.78261 16.3676 1.91389C16.3641 2.04518 16.3348 2.17449 16.2814 2.29445C16.2279 2.41442 16.1514 2.52268 16.0561 2.61305C15.9608 2.70343 15.8487 2.77416 15.726 2.82119C15.6034 2.86822 15.4727 2.89064 15.3415 2.88717C15.2102 2.8837 15.0809 2.8544 14.9609 2.80095C13.8333 2.30118 12.6168 2.03296 11.3836 2.01221C10.1503 1.99146 8.92552 2.21859 7.78173 2.68014C6.63795 3.14169 5.59851 3.82826 4.72508 4.69911C3.85165 5.56996 3.16201 6.60736 2.69707 7.74977C2.23213 8.89218 2.00137 10.1163 2.01847 11.3496C2.03557 12.5829 2.30019 13.8002 2.79662 14.9293C3.29305 16.0583 4.01119 17.0762 4.90843 17.9225C5.80568 18.7688 6.86375 19.4263 8.01989 19.856C9.41185 20.3696 10.9073 20.5395 12.379 20.351C13.8507 20.1625 15.2551 19.6213 16.4726 18.7734C17.6902 17.9255 18.6849 16.7961 19.3722 15.4811C20.0594 14.1662 20.4189 12.7047 20.4199 11.221V10.282C20.4199 10.0167 20.5252 9.76238 20.7128 9.57485C20.9003 9.38731 21.1547 9.28195 21.4199 9.28195C21.6851 9.28195 21.9395 9.38731 22.127 9.57485C22.3145 9.76238 22.4199 10.0167 22.4199 10.282V11.221C22.4151 14.1938 21.2316 17.0434 19.1288 19.1448C17.0261 21.2463 14.1757 22.428 11.2029 22.431L11.2069 22.43Z" fill="white"></path>
                    <path d="M11.2128 14.273C10.9476 14.2729 10.6933 14.1675 10.5058 13.98L7.44282 10.917C7.26066 10.7284 7.15987 10.4758 7.16215 10.2136C7.16443 9.95136 7.26959 9.70055 7.455 9.51514C7.64041 9.32973 7.89122 9.22456 8.15342 9.22229C8.41562 9.22001 8.66822 9.3208 8.85682 9.50296L11.2128 11.859L20.7128 2.34496C20.8057 2.25205 20.9159 2.17834 21.0372 2.12803C21.1586 2.07772 21.2886 2.0518 21.42 2.05176C21.5513 2.05171 21.6814 2.07754 21.8028 2.12776C21.9241 2.17798 22.0344 2.25162 22.1273 2.34446C22.2202 2.43731 22.2939 2.54754 22.3443 2.66887C22.3946 2.79021 22.4205 2.92026 22.4205 3.05161C22.4206 3.18296 22.3947 3.31303 22.3445 3.43439C22.2943 3.55576 22.2207 3.66605 22.1278 3.75896L11.9198 13.979C11.8271 14.072 11.7169 14.1459 11.5956 14.1963C11.4743 14.2468 11.3442 14.2728 11.2128 14.273Z" fill="white"></path>
                    </g>
                    <defs>
                    <clipPath id="clip0_1116_20">
                    <rect width="22.423" height="22.431" fill="white"></rect>
                    </clipPath>
                    </defs>
                </svg>
                <span class="text-white font-size-14">Experienced guides</span>                                    
            </div>
            <div class="rounded-pill px-3 py-3 bg-custom d-flex align-items-center gap-3">
                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1116_20)">
                    <path d="M11.2069 22.43C9.53616 22.4298 7.88657 22.0563 6.37871 21.3367C4.87085 20.6172 3.54281 19.5699 2.49167 18.2712C1.44053 16.9726 0.692845 15.4555 0.303265 13.8308C-0.0863137 12.2061 -0.107942 10.5149 0.239962 8.88082C0.587866 7.24671 1.29651 5.71098 2.3141 4.38589C3.33169 3.06079 4.6325 1.97982 6.12147 1.22198C7.61044 0.46413 9.24993 0.0485644 10.9201 0.00565293C12.5903 -0.0372585 14.249 0.293568 15.7749 0.973953C15.8949 1.0274 16.0031 1.10395 16.0935 1.19924C16.1839 1.29453 16.2546 1.40668 16.3016 1.5293C16.3487 1.65192 16.3711 1.78261 16.3676 1.91389C16.3641 2.04518 16.3348 2.17449 16.2814 2.29445C16.2279 2.41442 16.1514 2.52268 16.0561 2.61305C15.9608 2.70343 15.8487 2.77416 15.726 2.82119C15.6034 2.86822 15.4727 2.89064 15.3415 2.88717C15.2102 2.8837 15.0809 2.8544 14.9609 2.80095C13.8333 2.30118 12.6168 2.03296 11.3836 2.01221C10.1503 1.99146 8.92552 2.21859 7.78173 2.68014C6.63795 3.14169 5.59851 3.82826 4.72508 4.69911C3.85165 5.56996 3.16201 6.60736 2.69707 7.74977C2.23213 8.89218 2.00137 10.1163 2.01847 11.3496C2.03557 12.5829 2.30019 13.8002 2.79662 14.9293C3.29305 16.0583 4.01119 17.0762 4.90843 17.9225C5.80568 18.7688 6.86375 19.4263 8.01989 19.856C9.41185 20.3696 10.9073 20.5395 12.379 20.351C13.8507 20.1625 15.2551 19.6213 16.4726 18.7734C17.6902 17.9255 18.6849 16.7961 19.3722 15.4811C20.0594 14.1662 20.4189 12.7047 20.4199 11.221V10.282C20.4199 10.0167 20.5252 9.76238 20.7128 9.57485C20.9003 9.38731 21.1547 9.28195 21.4199 9.28195C21.6851 9.28195 21.9395 9.38731 22.127 9.57485C22.3145 9.76238 22.4199 10.0167 22.4199 10.282V11.221C22.4151 14.1938 21.2316 17.0434 19.1288 19.1448C17.0261 21.2463 14.1757 22.428 11.2029 22.431L11.2069 22.43Z" fill="white"></path>
                    <path d="M11.2128 14.273C10.9476 14.2729 10.6933 14.1675 10.5058 13.98L7.44282 10.917C7.26066 10.7284 7.15987 10.4758 7.16215 10.2136C7.16443 9.95136 7.26959 9.70055 7.455 9.51514C7.64041 9.32973 7.89122 9.22456 8.15342 9.22229C8.41562 9.22001 8.66822 9.3208 8.85682 9.50296L11.2128 11.859L20.7128 2.34496C20.8057 2.25205 20.9159 2.17834 21.0372 2.12803C21.1586 2.07772 21.2886 2.0518 21.42 2.05176C21.5513 2.05171 21.6814 2.07754 21.8028 2.12776C21.9241 2.17798 22.0344 2.25162 22.1273 2.34446C22.2202 2.43731 22.2939 2.54754 22.3443 2.66887C22.3946 2.79021 22.4205 2.92026 22.4205 3.05161C22.4206 3.18296 22.3947 3.31303 22.3445 3.43439C22.2943 3.55576 22.2207 3.66605 22.1278 3.75896L11.9198 13.979C11.8271 14.072 11.7169 14.1459 11.5956 14.1963C11.4743 14.2468 11.3442 14.2728 11.2128 14.273Z" fill="white"></path>
                    </g>
                    <defs>
                    <clipPath id="clip0_1116_20">
                    <rect width="22.423" height="22.431" fill="white"></rect>
                    </clipPath>
                    </defs>
                </svg>
                <span class="text-white font-size-14">Desert Tours</span>                                    
            </div>
            <div class="rounded-pill px-3 py-3 bg-custom d-flex align-items-center gap-3">
                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1116_20)">
                    <path d="M11.2069 22.43C9.53616 22.4298 7.88657 22.0563 6.37871 21.3367C4.87085 20.6172 3.54281 19.5699 2.49167 18.2712C1.44053 16.9726 0.692845 15.4555 0.303265 13.8308C-0.0863137 12.2061 -0.107942 10.5149 0.239962 8.88082C0.587866 7.24671 1.29651 5.71098 2.3141 4.38589C3.33169 3.06079 4.6325 1.97982 6.12147 1.22198C7.61044 0.46413 9.24993 0.0485644 10.9201 0.00565293C12.5903 -0.0372585 14.249 0.293568 15.7749 0.973953C15.8949 1.0274 16.0031 1.10395 16.0935 1.19924C16.1839 1.29453 16.2546 1.40668 16.3016 1.5293C16.3487 1.65192 16.3711 1.78261 16.3676 1.91389C16.3641 2.04518 16.3348 2.17449 16.2814 2.29445C16.2279 2.41442 16.1514 2.52268 16.0561 2.61305C15.9608 2.70343 15.8487 2.77416 15.726 2.82119C15.6034 2.86822 15.4727 2.89064 15.3415 2.88717C15.2102 2.8837 15.0809 2.8544 14.9609 2.80095C13.8333 2.30118 12.6168 2.03296 11.3836 2.01221C10.1503 1.99146 8.92552 2.21859 7.78173 2.68014C6.63795 3.14169 5.59851 3.82826 4.72508 4.69911C3.85165 5.56996 3.16201 6.60736 2.69707 7.74977C2.23213 8.89218 2.00137 10.1163 2.01847 11.3496C2.03557 12.5829 2.30019 13.8002 2.79662 14.9293C3.29305 16.0583 4.01119 17.0762 4.90843 17.9225C5.80568 18.7688 6.86375 19.4263 8.01989 19.856C9.41185 20.3696 10.9073 20.5395 12.379 20.351C13.8507 20.1625 15.2551 19.6213 16.4726 18.7734C17.6902 17.9255 18.6849 16.7961 19.3722 15.4811C20.0594 14.1662 20.4189 12.7047 20.4199 11.221V10.282C20.4199 10.0167 20.5252 9.76238 20.7128 9.57485C20.9003 9.38731 21.1547 9.28195 21.4199 9.28195C21.6851 9.28195 21.9395 9.38731 22.127 9.57485C22.3145 9.76238 22.4199 10.0167 22.4199 10.282V11.221C22.4151 14.1938 21.2316 17.0434 19.1288 19.1448C17.0261 21.2463 14.1757 22.428 11.2029 22.431L11.2069 22.43Z" fill="white"></path>
                    <path d="M11.2128 14.273C10.9476 14.2729 10.6933 14.1675 10.5058 13.98L7.44282 10.917C7.26066 10.7284 7.15987 10.4758 7.16215 10.2136C7.16443 9.95136 7.26959 9.70055 7.455 9.51514C7.64041 9.32973 7.89122 9.22456 8.15342 9.22229C8.41562 9.22001 8.66822 9.3208 8.85682 9.50296L11.2128 11.859L20.7128 2.34496C20.8057 2.25205 20.9159 2.17834 21.0372 2.12803C21.1586 2.07772 21.2886 2.0518 21.42 2.05176C21.5513 2.05171 21.6814 2.07754 21.8028 2.12776C21.9241 2.17798 22.0344 2.25162 22.1273 2.34446C22.2202 2.43731 22.2939 2.54754 22.3443 2.66887C22.3946 2.79021 22.4205 2.92026 22.4205 3.05161C22.4206 3.18296 22.3947 3.31303 22.3445 3.43439C22.2943 3.55576 22.2207 3.66605 22.1278 3.75896L11.9198 13.979C11.8271 14.072 11.7169 14.1459 11.5956 14.1963C11.4743 14.2468 11.3442 14.2728 11.2128 14.273Z" fill="white"></path>
                    </g>
                    <defs>
                    <clipPath id="clip0_1116_20">
                    <rect width="22.423" height="22.431" fill="white"></rect>
                    </clipPath>
                    </defs>
                </svg>
                <span class="text-white font-size-14">City Tours</span>                                    
            </div>
        </div>
    </div>
</div>

<!-- Testimonials v2 -->
<div class="testimonial-block testimonial-v2 border-bottom border-color-8">
    <div class="container">
        <div class="pt-7 pb-8">
            <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5">
                <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">What our guests says on 
                    <a href="https://www.tripadvisor.com/AttractionProductReview-g295424-d26683371-Full_Day_Desert_Safari_in_Dubai-Dubai_Emirate_of_Dubai.html" target="_blank">
                        <img src="https://saharadesertdubai.com/site/img/tripadvisor_logo.svg" width="150">
                    </a>
                </h2>
            </div>
            <!-- Slick Carousel -->
            <div class="js-slick-carousel u-slick u-slick--gutters-3" data-infinite="true" data-autoplay="true" data-speed="3000" data-fade="true"
            data-pagi-classes="text-center u-slick__pagination mb-0 mt-4"
                data-responsive='[{
                "breakpoint": 992,
                   "settings": {
                     "slidesToShow": 1
                   }
                }]'>
                <div class="js-slide">
                    <!-- Testimonials -->
                    <div class="d-flex justify-content-center mb-6">
                        <div class="position-relative">
                            <img class="img-thumbnail rounded-circle mx-auto" width="120" src="{{ asset('assets/frontend/img/default-avatar.jpg') }}" alt="Image-Descrition">
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">Today was an absolutely amazing day's with many fun activities. We did many things such as dune bashing, camel riding and a wonderful sunset photoshoot. We also had an amazing driver and tour guide called Waseem and overall a 10/10 trip.</p>
                        <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">faňhmRadek R</h6>
                        <span class="text-blue-lighter-1 font-size-normal">Desert Safari</span>
                    </div>
                    <!-- End Testimonials -->
                </div>

                <div class="js-slide">
                    <!-- Testimonials -->
                    <div class="d-flex justify-content-center mb-6">
                        <div class="position-relative">
                            <img class="img-thumbnail rounded-circle mx-auto" width="120" src="{{ asset('assets/frontend/img/default-avatar.jpg') }}" alt="Image-Descrition">
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">We had a great time!
                            Thank you Sahara Desert Dubai.
                            We went there first time and our experience was beyond our expectations. Every single moment was enjoyable and memorable. We went there as Family group and they were able to assist us and give us what we need. Very accommodating and this tour is High recommended! 
                            The Land Cruiser experience - it was enjoyable and not that extreme. They drive safely where you can seat and enjoy the dessert ride going to camp!
                            The camping experience - We eat great buffet foods! Including many options, grilled chicken, salad, rice, desserts, bread and etc.
                            A must have experience and bucket list tour in Dubai, High reccomended! </p>
                        <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Rona Mae F</h6>
                        <span class="text-blue-lighter-1 font-size-normal">Best Tour in Dubai - Bucket List</span>
                    </div>
                    <!-- End Testimonials -->
                </div>

                <div class="js-slide">
                    <!-- Testimonials -->
                    <div class="d-flex justify-content-center mb-6">
                        <div class="position-relative">
                            <img class="img-thumbnail rounded-circle mx-auto" width="120" src="{{ asset('assets/frontend/img/default-avatar.jpg') }}" alt="Image-Descrition">
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">I had an incredible time on the desert safari with Sahara Desert Dubai! My friends and I had an absolute blast with thrilling activities like dune bashing and ATV bike rides. Our driver was not only an expert but also a true professional, ensuring our safety throughout. The whole experience was smooth and enjoyable. I wholeheartedly recommend Sahara Desert Dubai for an unforgettable adventure! </p>
                        <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Danial i</h6>
                        <span class="text-blue-lighter-1 font-size-normal">VIP Group</span>
                    </div>
                    <!-- End Testimonials -->
                </div>
            </div>
            <!-- End Slick Carousel -->
        </div>
    </div>
</div>
<!-- End Testimonials v2 -->


@endsection