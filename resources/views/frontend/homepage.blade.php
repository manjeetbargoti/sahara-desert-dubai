@extends("frontend.layouts.main")
@section("content")

<!-- ========== HERO ========== -->
<div class="bg-img-hero-bottom min-height-600 gradient-overlay-half-gray-gradient  space-top-lg-3 space-2" style="background-image: url(assets/frontend/img/1920x600/img1.jpg);">
    <div class="container">
        <div class="d-md-flex align-items-lg-center text-center">
            <div class="row justify-content-md-center w-100 pt-4">
                <!-- Info -->
                <div class="mx-3 mb-xl-3 mt-xl-4 mb-2">
                  <h1 class="font-size-60 font-size-xs-30 text-white font-weight-bold  mb-0">Find Next Place To Visit</h1>
                  <p class="font-size-20 font-weight-normal text-white ml-3">Discover amzaing places at exclusive deals</p>
                </div>
                <!-- End Info -->
            </div>
        </div>
        <div class="row">
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
        </div>
    </div>
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
                        <h5 class="font-size-19 text-dark font-weight-bold mb-1"><a href="#">2.000 +Destinations</a></h5>
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
                        <h5 class="font-size-19 text-dark font-weight-bold mb-1"><a href="#">Top Notch Support</a></h5>
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
<div class="destination-block destination-v5 border-bottom border-color-8">
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
                                    <a href="#" class="text-white font-weight-bold font-size-21">United Kingdom</a>
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
</div>
<!-- End Destinantion v5 -->

<!-- Product Cards -->
<div class="product-card-block product-card-v1 border-bottom border-color-8">
    <div class="container space-1">
        <div class="w-md-80 w-lg-50 text-center mx-md-auto mt-3">
            <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Popular Tours</h2>
        </div>
        <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3 mb-4" data-slides-show="4" data-slides-scroll="1" data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-classic--v2 u-slick__arrow-centered--y rounded-circle" data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-xl-n8" data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-xl-n8" data-pagi-classes="d-lg-none text-center u-slick__pagination mt-4" data-responsive='[ { "breakpoint": 1025, "settings": { "slidesToShow": 3 } }, { "breakpoint": 992, "settings": { "slidesToShow": 2 } }, { "breakpoint": 768, "settings": { "slidesToShow": 1 } }, { "breakpoint": 554, "settings": { "slidesToShow": 1 } } ]'>
            <div class="js-slide mt-5">
                <div class="card mb-1 transition-3d-hover shadow-hover-2 w-100">
                    <div class="position-relative mb-2">
                        <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5">
                            <img class="card-img-top" src="{{ asset('assets/frontend/img/300x230/img1.jpg') }}" alt="Image Description">
                        </a>
                        <div class="position-absolute top-0 left-0 pt-5 pl-3">
                            <a href="#">
                                <span class="badge badge-pill bg-white text-primary px-4 py-2 font-size-14 font-weight-normal">Featured</span>
                            </a>
                            <a href="#">
                            <span class="badge badge-pill bg-white text-danger px-3 ml-3 py-2 font-size-14 font-weight-normal">%25</span>
                            </a>
                        </div>
                        <div class="position-absolute top-0 right-0 pt-5 pr-3">
                          <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                            <span class="flaticon-heart-1 font-size-20"></span>
                          </button>
                        </div>
                        <div class="position-absolute bottom-0 left-0 right-0">
                            <div class="px-3 pb-2">
                                <h2 class="h5 text-white mb-0 font-weight-bold font-size-17"><small class="mr-2">From</small>£350.00</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pt-2 pb-3">
                        <a href="#" class="d-block">
                            <div class="mb-1 d-flex align-items-center font-size-14 text-gray-1">
                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                            </div>
                        </a>
                        <a href="#" class="card-title font-size-17 font-weight-bold mb-0 text-dark">Stonehenge, Windsor Castle,<br>and Bath from London</a>
                        <div class="my-2">
                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary">
                                <div class="green-lighter mr-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                </div>
                                <span class="text-secondary font-size-14 mt-1">48 Reviews</span>
                            </div>
                        </div>
                        <div class="font-size-14 text-gray-1">
                            <i class="icon flaticon-clock-circular-outline mr-2 font-size-14"></i> 3 hours 45 minutes
                        </div>
                    </div>
                </div>
            </div>
            <div class="js-slide mt-5">
                <div class="card mb-1 transition-3d-hover shadow-hover-2 w-100">
                    <div class="position-relative mb-2">
                        <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5">
                            <img class="card-img-top" src="{{ asset('assets/frontend/img/300x230/img2.jpg') }}" alt="Image Description">
                        </a>
                        <div class="position-absolute top-0 left-0 pt-5 pl-3">
                        <a href="#">
                            <span class="badge badge-pill bg-white text-danger px-3 py-2 font-size-14 font-weight-normal">%25</span>
                        </a>
                        </div>
                        <div class="position-absolute top-0 right-0 pt-5 pr-3">
                          <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                            <span class="flaticon-heart-1 font-size-20"></span>
                          </button>
                        </div>
                        <div class="position-absolute bottom-0 left-0 right-0">
                            <div class="px-3 pb-2">
                                <span class="text-color-13 font-weight-normal font-size-16 mb-1 d-block">Multi-day Tours</span>
                                <h2 class="h5 text-white mb-0 font-weight-bold font-size-17"><small class="mr-2">From</small>£899.00</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pt-2 pb-3">
                        <a href="#" class="d-block">
                            <div class="mb-1 d-flex align-items-center font-size-14 text-gray-1">
                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                            </div>
                        </a>
                        <a href="#" class="card-title text-dark font-size-17 font-weight-bold">Bosphorus Strait and Black Sea Half-Day Cruise from Istanbul</a>
                        <div class="my-2">
                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1">
                                <div class="green-lighter mr-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                </div>
                                <span class="text-secondary font-size-14 mt-1">48 Reviews</span>
                            </div>
                        </div>
                        <div class="font-size-14 text-gray-1">
                            <i class="icon flaticon-clock-circular-outline mr-2 font-size-14"></i> 3 hours 45 minutes
                        </div>
                    </div>
                </div>
            </div>
            <div class="js-slide mt-5">
                <div class="card mb-1 transition-3d-hover shadow-hover-2 w-100">
                    <div class="position-relative mb-2">
                        <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5">
                            <img class="card-img-top" src="{{ asset('assets/frontend/img/300x230/img3.jpg') }}" alt="Image Description">
                        </a>
                        <div class="position-absolute top-0 right-0 pt-5 pr-3">
                          <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                            <span class="flaticon-heart-1 font-size-20"></span>
                          </button>
                        </div>
                        <div class="position-absolute bottom-0 left-0 right-0">
                            <div class="px-3 pb-2">
                                <span class="text-color-13 font-weight-normal font-size-16 mb-1 d-block">Attraction Tickets</span>
                                <h2 class="h5 text-white mb-0 font-weight-bold font-size-17"><small class="mr-2">From</small>£590.00</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pt-2 pb-3">
                        <a href="#" class="d-block">
                            <div class="mb-1 d-flex align-items-center font-size-14 text-gray-1">
                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                            </div>
                        </a>
                        <a href="#" class="card-title text-dark font-size-17 font-weight-bold">NYC One World Observatory Skip-the-Line Ticket</a>
                        <div class="my-2">
                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1">
                                <div class="green-lighter mr-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                </div>
                                <span class="text-secondary font-size-14 mt-1">48 Reviews</span>
                            </div>
                        </div>
                        <div class="font-size-14 text-gray-1">
                            <i class="icon flaticon-clock-circular-outline mr-2 font-size-14"></i> 3 hours 45 minutes
                        </div>
                    </div>
                </div>
            </div>
            <div class="js-slide mt-5">
                <div class="card mb-1 transition-3d-hover shadow-hover-2 w-100">
                    <div class="position-relative mb-2">
                        <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5">
                            <img class="card-img-top" src="{{ asset('assets/frontend/img/300x230/img4.jpg') }}" alt="Image Description">
                        </a>
                        <div class="position-absolute top-0 right-0 pt-5 pr-3">
                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                <span class="flaticon-heart-1 font-size-20"></span>
                              </button>
                        </div>
                        <div class="position-absolute bottom-0 left-0 right-0">
                            <div class="px-3 pb-2">
                                <span class="text-color-13 font-weight-normal font-size-16 mb-1 d-block">Culturals Tours</span>
                                <h2 class="h5 text-white mb-0 font-weight-bold font-size-17"><small class="mr-2">From</small>£550.00</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pt-2 pb-3">
                        <a href="#" class="d-block">
                            <div class="mb-1 d-flex align-items-center font-size-14 text-gray-1">
                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                            </div>
                        </a>
                        <a href="#" class="card-title text-dark font-size-17 font-weight-bold">Small-Group Blue Mountains Day Trip from Sydney with River Cruise</a>
                        <div class="my-2">
                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1">
                                <div class="green-lighter mr-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                </div>
                                <span class="text-secondary font-size-14 mt-1">48 Reviews</span>
                            </div>
                        </div>
                        <div class="font-size-14 text-gray-1">
                            <i class="icon flaticon-clock-circular-outline mr-2 font-size-14"></i> 3 hours 45 minutes
                        </div>
                    </div>
                </div>
            </div>
            <div class="js-slide mt-5">
                <div class="card mb-1 transition-3d-hover shadow-hover-2 w-100">
                    <div class="position-relative mb-2">
                        <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5">
                            <img class="card-img-top" src="{{ asset('assets/frontend/img/300x230/img5.jpg') }}" alt="Image Description">
                        </a>
                        <div class="position-absolute top-0 left-0 pt-5 pl-3">
                        <a href="#">
                            <span class="badge badge-pill bg-white text-primary px-4 py-2 font-size-14 font-weight-normal">Featured</span>
                        </a>
                        <a href="#">
                            <span class="badge badge-pill bg-white text-danger px-3 ml-3 py-2 font-size-14 font-weight-normal">%25</span>
                        </a>
                        </div>
                        <div class="position-absolute top-0 right-0 pt-5 pr-3">
                            <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                <span class="flaticon-heart-1 font-size-20"></span>
                            </button>
                        </div>
                        <div class="position-absolute bottom-0 left-0 right-0">
                            <div class="px-3 pb-2">
                                <h2 class="h5 text-white mb-0 font-weight-bold font-size-17"><small class="mr-2">From</small>£350.00</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pt-2 pb-3">
                        <a href="#" class="d-block">
                            <div class="mb-1 d-flex align-items-center font-size-14 text-gray-1">
                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                            </div>
                        </a>
                        <a href="#" class="card-title text-dark font-size-17 font-weight-bold">Windsor Castle, Stonehenge, and Oxford Day Trip from London</a>
                        <div class="my-2">
                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1">
                                <div class="green-lighter mr-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                </div>
                                <span class="text-secondary font-size-14 mt-1">48 Reviews</span>
                            </div>
                        </div>
                        <div class="font-size-14 text-gray-1">
                            <i class="icon flaticon-clock-circular-outline mr-2 font-size-14"></i> 3 hours 45 minutes
                        </div>
                    </div>
                </div>
            </div>
            <div class="js-slide mt-5">
                <div class="card mb-1 transition-3d-hover shadow-hover-2 w-100">
                    <div class="position-relative mb-2">
                        <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5">
                            <img class="card-img-top" src="{{ asset('assets/frontend/img/300x230/img6.jpg') }}" alt="Image Description">
                        </a>
                        <div class="position-absolute top-0 left-0 pt-5 pl-3">
                        <a href="#">
                            <span class="badge badge-pill bg-white text-danger px-3 py-2 font-size-14 font-weight-normal">%25</span>
                        </a>
                        </div>
                        <div class="position-absolute top-0 right-0 pt-5 pr-3">
                            <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                <span class="flaticon-heart-1 font-size-20"></span>
                            </button>
                        </div>
                        <div class="position-absolute bottom-0 left-0 right-0">
                            <div class="px-3 pb-2">
                                <span class="text-color-13 font-weight-normal font-size-16 mb-1 d-block">Multi-day Tours</span>
                                <h2 class="h5 text-white mb-0 font-weight-bold font-size-17"><small class="mr-2">From</small>£899.00</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pt-2 pb-3">
                        <a href="#" class="d-block">
                            <div class="mb-1 d-flex align-items-center font-size-14 text-gray-1">
                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                            </div>
                        </a>
                        <a href="#" class="card-title text-dark font-size-17 font-weight-bold">Snaefellsnes Peninsula Classic Day Tour from Reykjavik</a>
                        <div class="my-2">
                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1">
                                <div class="green-lighter mr-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                </div>
                                <span class="text-secondary font-size-14 mt-1">48 Reviews</span>
                            </div>
                        </div>
                        <div class="font-size-14 text-gray-1">
                            <i class="icon flaticon-clock-circular-outline mr-2 font-size-14"></i> 3 hours 45 minutes
                        </div>
                    </div>
                </div>
            </div>
            <div class="js-slide mt-5">
                <div class="card mb-1 transition-3d-hover shadow-hover-2 w-100">
                    <div class="position-relative mb-2">
                        <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5">
                            <img class="card-img-top" src="{{ asset('assets/frontend/img/300x230/img7.jpg') }}" alt="Image Description">
                        </a>
                        <div class="position-absolute top-0 right-0 pt-5 pr-3">
                          <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                            <span class="flaticon-heart-1 font-size-20"></span>
                          </button>
                        </div>
                        <div class="position-absolute bottom-0 left-0 right-0">
                            <div class="px-3 pb-2">
                                <span class="text-color-13 font-weight-normal font-size-16 mb-1 d-block">Attraction Tickets</span>
                                <a href="#" class="h5 text-white mb-0 font-weight-bold font-size-17"><small class="mr-2">From</small>£590.00</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pt-2 pb-3">
                        <a href="#" class="d-block">
                            <div class="mb-1 d-flex align-items-center font-size-14 text-gray-1">
                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                            </div>
                        </a>
                        <a href="#" class="card-title text-dark font-size-17 font-weight-bold">Giverny and Versailles Small Group Day Trip</a>
                        <div class="my-2">
                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1">
                                <div class="green-lighter mr-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                </div>
                                <span class="text-secondary font-size-14 mt-1">48 Reviews</span>
                            </div>
                        </div>
                        <div class="font-size-14 text-gray-1">
                            <i class="icon flaticon-clock-circular-outline mr-2 font-size-14"></i> 3 hours 45 minutes
                        </div>
                    </div>
                </div>
            </div>
            <div class="js-slide mt-5">
                <div class="card mb-1 transition-3d-hover shadow-hover-2 w-100">
                    <div class="position-relative mb-2">
                        <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5">
                            <img class="card-img-top" src="{{ asset('assets/frontend/img/300x230/img8.jpg') }}" alt="Image Description">
                        </a>
                        <div class="position-absolute top-0 right-0 pt-5 pr-3">
                              <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                <span class="flaticon-heart-1 font-size-20"></span>
                              </button>
                        </div>
                        <div class="position-absolute bottom-0 left-0 right-0">
                            <div class="px-3 pb-2">
                                <span class="text-color-13 font-weight-normal font-size-16 mb-1 d-block">Culturals Tours</span>
                                <h2 class="h5 text-white mb-0 font-weight-bold font-size-17"><small class="mr-2">From</small>£550.00</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pt-2 pb-3">
                        <a href="#" class="d-block">
                            <div class="mb-1 d-flex align-items-center font-size-14 text-gray-1">
                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                            </div>
                        </a>
                        <a href="#" class="card-title text-dark font-size-17 font-weight-bold">Two Hour Walking Tour of Manhattan</a>
                        <div class="my-2">
                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1">
                                <div class="green-lighter mr-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                </div>
                                <span class="text-secondary font-size-14 mt-1">48 Reviews</span>
                            </div>
                        </div>
                        <div class="font-size-14 text-gray-1">
                            <i class="icon flaticon-clock-circular-outline mr-2 font-size-14"></i> 3 hours 45 minutes
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product Cards -->

<!--Banner v4-->
<div class="banner-block banner-v4 gradient-overlay-half-bg-blue-light bg-img-hero space-3 space-top-lg-4 space-bottom-lg-3" style="background-image: url({{ asset('assets/frontend/img/1920x500/img5.jp') }}g);">
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

<!-- Testimonials v2 -->
<div class="testimonial-block testimonial-v2 border-bottom border-color-8">
    <div class="container">
        <div class="pt-7 pb-8">
            <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5">
                <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Customer Reviews</h2>
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
                            <img class="img-fluid mx-auto" src="{{ asset('assets/frontend/img/137x137/img1.jpg') }}" alt="Image-Descrition">
                            <div class="btn-position btn btn-icon btn-dark rounded-circle d-flex align-items-center justify-content-center height-60 width-60">
                                <figure id="quote7" class="svg-preloader">
                                    <img class="js-svg-injector" src="{{ asset('assets/frontend/svg/illustrations/qu') }}ote2.svg" alt="SVG" data-parent="#quote7">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize</p>
                        <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Jessica Brown</h6>
                        <span class="text-blue-lighter-1 font-size-normal">client</span>
                    </div>
                    <!-- End Testimonials -->
                </div>

                <div class="js-slide">
                    <!-- Testimonials -->
                    <div class="d-flex justify-content-center mb-6">
                        <div class="position-relative">
                            <img class="img-fluid mx-auto" src="{{ asset('assets/frontend/img/137x137/img2.jpg') }}" alt="Image-Descrition">
                            <div class="btn-position btn btn-icon btn-dark rounded-circle d-flex align-items-center justify-content-center height-60 width-60">
                                <figure id="quote8" class="svg-preloader">
                                    <img class="js-svg-injector" src="{{ asset('assets/frontend/svg/illustrations/qu') }}ote2.svg" alt="SVG" data-parent="#quote8">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize</p>
                        <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Augusta Silva</h6>
                        <span class="text-blue-lighter-1 font-size-normal">client</span>
                    </div>
                    <!-- End Testimonials -->
                </div>

                <div class="js-slide">
                    <!-- Testimonials -->
                    <div class="d-flex justify-content-center mb-6">
                        <div class="position-relative">
                            <img class="img-fluid mx-auto" src="{{ asset('assets/frontend/img/137x137/img3.jpg') }}" alt="Image-Descrition">
                            <div class="btn-position btn btn-icon btn-dark rounded-circle d-flex align-items-center justify-content-center height-60 width-60">
                                <figure id="quote9" class="svg-preloader">
                                    <img class="js-svg-injector" src="{{ asset('assets/frontend/svg/illustrations/qu') }}ote2.svg" alt="SVG" data-parent="#quote9">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize</p>
                        <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Ali Tufan</h6>
                        <span class="text-blue-lighter-1 font-size-normal">client</span>
                    </div>
                    <!-- End Testimonials -->
                </div>

                <div class="js-slide">
                    <!-- Testimonials -->
                    <div class="d-flex justify-content-center mb-6">
                        <div class="position-relative">
                            <img class="img-fluid mx-auto" src="{{ asset('assets/frontend/img/137x137/img1.jpg') }}" alt="Image-Descrition">
                            <div class="btn-position btn btn-icon btn-dark rounded-circle d-flex align-items-center justify-content-center height-60 width-60">
                                <figure id="quote10" class="svg-preloader">
                                    <img class="js-svg-injector" src="{{ asset('assets/frontend/svg/illustrations/qu') }}ote2.svg" alt="SVG" data-parent="#quote10">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize</p>
                        <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Jessica Brown</h6>
                        <span class="text-blue-lighter-1 font-size-normal">client</span>
                    </div>
                    <!-- End Testimonials -->
                </div>

                <div class="js-slide">
                    <!-- Testimonials -->
                    <div class="d-flex justify-content-center mb-6">
                        <div class="position-relative">
                            <img class="img-fluid mx-auto" src="{{ asset('assets/frontend/img/137x137/img3.jpg') }}" alt="Image-Descrition">
                            <div class="btn-position btn btn-icon btn-dark rounded-circle d-flex align-items-center justify-content-center height-60 width-60">
                                <figure id="quote11" class="svg-preloader">
                                    <img class="js-svg-injector" src="{{ asset('assets/frontend/svg/illustrations/qu') }}ote2.svg" alt="SVG" data-parent="#quote11">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize</p>
                        <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Ali Tufan</h6>
                        <span class="text-blue-lighter-1 font-size-normal">client</span>
                    </div>
                    <!-- End Testimonials -->
                </div>

                <div class="js-slide">
                    <!-- Testimonials -->
                    <div class="d-flex justify-content-center mb-6">
                        <div class="position-relative">
                            <img class="img-fluid mx-auto" src="{{ asset('assets/frontend/img/137x137/img2.jpg') }}" alt="Image-Descrition">
                            <div class="btn-position btn btn-icon btn-dark rounded-circle d-flex align-items-center justify-content-center height-60 width-60">
                                <figure id="quote12" class="svg-preloader">
                                    <img class="js-svg-injector" src="{{ asset('assets/frontend/svg/illustrations/qu') }}ote2.svg" alt="SVG" data-parent="#quote12">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize</p>
                        <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">Augusta Silva</h6>
                        <span class="text-blue-lighter-1 font-size-normal">client</span>
                    </div>
                    <!-- End Testimonials -->
                </div>
            </div>
            <!-- End Slick Carousel -->
        </div>
    </div>
</div>
<!-- End Testimonials v2 -->

<!-- Recent Article -->
<div class="recent-article-block recent-article-v1">
    <div class="container space-1 mt-3 mb-lg-4">
        <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5">
            <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Recent Article</h2>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="mb-4 mb-lg-0 text-md-center text-lg-left">
                    <a class="d-block mb-3" href="../blog/blog-single.html">
                        <img class="img-fluid rounded-xs w-100" src="{{ asset('assets/frontend/img/410x300/img1.jpg') }}" alt="Image-Description">
                    </a>
                    <h6 class="font-size-17 pt-xl-1 font-weight-bold font-weight-bold mb-1">
                        <a href="../blog/blog-single.html">How to travel with paper map</a>
                    </h6>
                    <a class="text-gray-1" href="../blog/blog-single.html">
                        <span>June 6, 2019</span>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="mb-4 mb-lg-0 text-md-center text-lg-left">
                    <a class="d-block mb-3" href="../blog/blog-single.html">
                        <img class="img-fluid rounded-xs w-100" src="{{ asset('assets/frontend/img/410x300/img2.jpg') }}" alt="Image-Description">
                    </a>
                    <h6 class="font-size-17 pt-xl-1 font-weight-bold font-weight-bold mb-1">
                        <a href="../blog/blog-single.html">Change your place and get fresh air</a>
                    </h6>
                    <a class="text-gray-1" href="../blog/blog-single.html">
                        <span>June 6, 2019</span>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="mb-0 text-md-center text-lg-left">
                    <a class="d-block mb-3" href="../blog/blog-single.html">
                        <img class="img-fluid rounded-xs w-100" src="{{ asset('assets/frontend/img/410x300/img3.jpg') }}" alt="Image-Description">
                    </a>
                    <h6 class="font-size-17 pt-xl-1 font-weight-bold font-weight-bold mb-1">
                        <a href="../blog/blog-single.html">Pityful a rethoric question ran</a>
                    </h6>
                    <a class="text-gray-1" href="../blog/blog-single.html">
                        <span>June 6, 2019</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Recent Article -->

<!-- Clients v1 -->
<div class="clients-block clients-v1 border-bottom border-color-8">
    <div class="container space-1">
        <div class="row justify-content-between pb-lg-1 text-center text-md-left">
            <div class="col-12 col-md mb-5">
                <img class="img-fluid" src="{{ asset('assets/frontend/img/200x200/img11.pn') }}g" alt="Image Description">
            </div>
            <div class="col-12 col-md mb-5">
                <img class="img-fluid" src="{{ asset('assets/frontend/img/200x200/img12.pn') }}g" alt="Image Description">
            </div>
            <div class="col-12 col-md mb-5">
                <img class="img-fluid" src="{{ asset('assets/frontend/img/200x200/img13.pn') }}g" alt="Image Description">
            </div>
            <div class="col-12 col-md mb-5">
                <img class="img-fluid" src="{{ asset('assets/frontend/img/200x200/img14.pn') }}g" alt="Image Description">
            </div>
            <div class="col-12 col-md mb-md-5">
                <img class="img-fluid" src="{{ asset('assets/frontend/img/200x200/img15.pn') }}g" alt="Image Description">
            </div>
        </div>
    </div>
</div>
<!-- End Clients v1 -->

@endsection