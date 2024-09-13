@extends('frontend.layouts.main')
@section('content')

    <!-- Breadcrumb -->
    <div class="container">
        <nav class="py-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-no-gutter mb-0 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a>Tours</a></li>
                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a>{{ @$tour->tour_category->name }}</a></li>
                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{ @$tour->name }}</li>
            </ol>
        </nav>
    </div>
    <!-- End Breadcrumb -->
    <div class="mb-4 mb-lg-8">
        <img class="img-fluid" src="{{ uploaded_asset(@$tour->banner) }}" alt="{{ @$tour->name }}">
        <div class="container">
            <div class="position-relative">
                <div class="position-absolute right-0 mt-md-n11 mt-n9">
                    <div class="flex-horizontal-center">
                        <!-- Video -->
                        {{-- <a class="js-fancybox btn btn-white transition-3d-hover py-2 px-md-5 px-3 shadow-6 mr-1" href="javascript:;"
                        data-src="//www.youtube.com/watch?v=Vfk5VuUpJ-o"
                        data-speed="700">
                        <i class="flaticon-movie mr-md-2 font-size-18 text-primary"></i><span class="d-none d-md-inline">Video</span>
                    </a> --}}
                        <!-- End Video -->

                        <a class="js-fancybox btn btn-white transition-3d-hover ml-2 py-2 px-md-5 px-3 shadow-6"
                            href="javascript:;" data-src="{{ uploaded_asset(@$tour->photos) }}"
                            data-fancybox="fancyboxGallery6" data-caption="{{ @$tour->season }}" data-speed="700">
                            <i class="flaticon-gallery mr-md-2 font-size-18 text-primary"></i><span
                                class="d-none d-md-inline">Gallery</span>
                        </a>

                        {{-- Loop will run here --}}
                        <img class="js-fancybox d-none" alt="{{ @$tour->season }}" data-fancybox="fancyboxGallery6"
                            data-src="{{ uploaded_asset(@$tour->photos) }}" data-caption="{{ @$tour->season }}"
                            data-speed="700">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-9">
                <div class="d-block d-md-flex flex-center-between align-items-start mb-3">
                    <div class="mb-1">
                        <div class="mb-2 mb-md-0">
                            <h4 class="font-size-23 font-weight-bold mb-1 mr-3">{{ @$tour->name }}</h4>
                        </div>
                        <div class="d-block d-xl-flex flex-horizontal-center">
                            <div class="d-block d-md-flex flex-horizontal-center font-size-14 text-gray-1 mb-2 mb-xl-0">
                                <span class="fas fa-cloud-sun"> </span> &nbsp;
                                {{ @$tour->season }}
                                {{-- <a href="{{ @$tour->google_map }}" target="_blank" class="ml-1 d-block d-md-inline"> - View on map</a> --}}
                            </div>
                            <div class="mr-4 mb-2 mb-md-0 flex-horizontal-center">
                                <div class="ml-xl-3 font-size-10 letter-spacing-2">
                                    <span class="d-block green-lighter ml-1">
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                    </span>
                                </div>
                                <span class="font-size-14 text-gray-1 ml-2">(1,186 Reviews)</span>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group list-group-borderless list-group-horizontal custom-social-share">
                        <li class="list-group-item px-1">
                            <a href="#" class="height-45 width-45 border rounded border-width-2 flex-content-center">
                                <i class="flaticon-like font-size-18 text-dark"></i>
                            </a>
                        </li>
                        <li class="list-group-item px-1">
                            <a href="#" class="height-45 width-45 border rounded border-width-2 flex-content-center">
                                <i class="flaticon-share font-size-18 text-dark"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="py-4 border-top border-bottom mb-4">
                    <ul class="list-group list-group-borderless list-group-horizontal row">
                        <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2">
                            <i class="flaticon-alarm text-primary font-size-22 mr-2 d-block"></i>
                            <div class="ml-1 text-gray-1">5 Days</div>
                        </li>
                        <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2">
                            <i class="flaticon-social text-primary font-size-22 mr-2 d-block"></i>
                            <div class="ml-1 text-gray-1">Max People : 26</div>
                        </li>
                        <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2">
                            <i class="flaticon-wifi-signal text-primary font-size-22 mr-2 d-block"></i>
                            <div class="ml-1 text-gray-1">Wifi Available</div>
                        </li>
                        <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2">
                            <i class="flaticon-month text-primary font-size-22 mr-2 d-block"></i>
                            <div class="ml-1 text-gray-1">Jan 18 - Dec 21</div>
                        </li>
                        <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2">
                            <i class="flaticon-user-2 text-primary font-size-22 mr-2 d-block"></i>
                            <div class="ml-1 text-gray-1">Min Age : 10+</div>
                        </li>
                        <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2">
                            <i class="flaticon-pin text-primary font-size-22 mr-2 d-block"></i>
                            <div class="ml-1 text-gray-1">Pickup: Airpot</div>
                        </li>
                    </ul>
                </div>
                @if (!empty(strip_tags($tour->short_description)))
                    <div class="border-bottom position-relative text-justify">
                        <h5 class="font-size-21 font-weight-bold text-dark mb-3">
                            Short Description
                        </h5>
                        {!! @$tour->short_description !!}
                    </div>
                @endif

                @if (!empty(strip_tags($tour->description)))
                    <div class="border-bottom position-relative text-justify">
                        <h5 class="font-size-21 font-weight-bold text-dark mb-3">
                            Description
                        </h5>
                        {!! @$tour->description !!}
                    </div>
                @endif

                @if (!empty(strip_tags($tour->tour_inclusion)))
                    <div class="border-bottom py-4 text-justify">
                        <h5 class="font-size-21 font-weight-bold text-dark mb-4">
                            Included in this tour
                        </h5>
                        {!! @$tour->tour_inclusion !!}
                    </div>
                @endif

                @if (!empty(strip_tags($tour->itenarary_description)))
                    <div class="border-bottom py-4 text-justify">
                        <h5 class="font-size-21 font-weight-bold text-dark mb-4">
                            Itinerary
                        </h5>
                        {!! @$tour->itenarary_description !!}
                    </div>
                @endif

                @if (!empty(strip_tags($tour->what_this_tour)))
                    <div class="border-bottom py-4 text-justify">
                        <h5 class="font-size-21 font-weight-bold text-dark mb-4">
                            What is in This Tour
                        </h5>
                        {!! @$tour->what_this_tour !!}
                    </div>
                @endif

                @if (!empty(strip_tags($tour->important_information)))
                    <div class="border-bottom py-4 text-justify">
                        <h5 class="font-size-21 font-weight-bold text-dark mb-4">
                            Important Information
                        </h5>
                        {!! @$tour->important_information !!}
                    </div>
                @endif

                @if (!empty(strip_tags($tour->useful_information)))
                    <div class="border-bottom py-4 text-justify">
                        <h5 class="font-size-21 font-weight-bold text-dark mb-4">
                            Useful Information
                        </h5>
                        {!! @$tour->useful_information !!}
                    </div>
                @endif

                @if (!empty(strip_tags($tour->terms_condition)))
                    <div class="border-bottom py-4 text-justify">
                        <h5 class="font-size-21 font-weight-bold text-dark mb-4">
                            Terms Condition
                        </h5>
                        {!! @$tour->terms_condition !!}
                    </div>
                @endif

                @if (!empty(strip_tags($tour->cancellation_policy_description)))
                    <div class="border-bottom py-4 text-justify">
                        <h5 class="font-size-21 font-weight-bold text-dark mb-4">
                            {{ $tour->cancellation_policy_name }}
                        </h5>
                        {!! @$tour->cancellation_policy_description !!}
                    </div>
                @endif

                @if (!empty(strip_tags($tour->child_cacellation_policy_description)))
                    <div class="border-bottom py-4 text-justify">
                        <h5 class="font-size-21 font-weight-bold text-dark mb-4">
                            {{ $tour->child_cacellation_policy_name }}
                        </h5>
                        {!! @$tour->child_cacellation_policy_description !!}
                    </div>
                @endif

                <div class="border-bottom py-4 text-justify">
                    <h5 class="font-size-21 font-weight-bold text-dark mb-4">
                        Location
                    </h5>
                    <iframe src="{{ @$tour->google_map }}" width="100%" height="480" frameborder="0"
                        style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div class="border-bottom py-4 text-justify">
                    <h5 class="font-size-21 font-weight-bold text-dark mb-4">
                        Faq
                    </h5>
                    {!! @$tour->faq_details !!}
                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                <div class="mb-4">
                    <form action="{{ route('tour.booking.submit') }}" method="post">
                        @csrf

                        <input type="hidden" name="tour_id" value="{{ @$tour->id }}">
                        <input type="hidden" name="ip_address" value="{{ @$_SERVER['REMOTE_ADDR'] }}">
                        <input type="hidden" name="request_page" value="{{ @url()->current() }}">
                        <input type="hidden" name="adult_price" value="{{ @$tour->sell_price }}">
                        <input type="hidden" name="child_price" value="{{ @$tour->child_price }}">
                        <input type="hidden" name="infant_price" value="{{ @$tour->infant_price }}">
                        <input type="hidden" name="fixed_charges" value="{{ @$tour->fixed_price }}">
                        <input type="hidden" name="fixed_charges_type" value="{{ @$tour->fixed_charges_text }}">

                        <div class="border border-color-7 rounded mb-5">
                            <div class="border-bottom">
                                <div class="p-4">
                                    <span class="font-size-14">From</span>
                                    <span
                                        class="font-size-24 text-success font-weight-bold ml-1">{{ single_price(@$tour->child_price) }}</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <!-- Input -->
                                <span class="d-block text-gray-1 font-weight-normal mb-0 text-left">Date</span>
                                <div class="mb-4">
                                    <div class="border-bottom border-width-2 border-color-1">
                                        <div id="datepickerWrapperPick" class="u-datepicker input-group">
                                            @php
                                                $defaultDate = date(
                                                    'd M, Y',
                                                    strtotime('+' . @$tour->cut_off_time . ' hours'),
                                                );
                                            @endphp
                                            <input
                                                class="js-range-datepicker w-auto height-40 font-size-16 shadow-none font-weight-bold form-control hero-form bg-transparent border-0 flatpickr-input p-0"
                                                name="booking_date" required id="myDatePicker" type="text"
                                                data-rp-wrapper="#datepickerWrapperPick" data-rp-date-format="d M, Y"
                                                data-rp-default-date='{{ $defaultDate }}'>
                                        </div>
                                        <!-- End Datepicker -->
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <span class="d-block text-gray-1 font-weight-normal mb-1 text-left">Name</span>
                                <div class="mb-4">
                                    <div class="js-focus-state input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </span>
                                        </div>
                                        <input class="form-control" placeholder="Name" name="name" id="customerName"
                                            type="text">
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <span class="d-block text-gray-1 font-weight-normal mb-1 text-left">Email</span>
                                <div class="mb-4">
                                    <div class="js-focus-state input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </span>
                                        </div>
                                        <input class="form-control" name="email" id="customerEmail" type="email"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <span class="d-block text-gray-1 font-weight-normal mb-1 text-left">Phone <small
                                        class="text-info"><i>(with country code)</i></small></span>
                                <div class="mb-4">
                                    <div class="js-focus-state input-group mb-2">
                                        <input class="form-control" name="phone" id="customerPhone" type="text"
                                            placeholder="Phone">
                                    </div>
                                    <input type="hidden" name="country_code" value="">
                                    <input type="hidden" name="country_iso2" value="{{ old('country_iso2') }}">
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <span class="d-block text-gray-1 font-weight-normal mb-2 text-left">Adults <small
                                        class="text-success font-weight-bold">({{ single_price(@$tour->sell_price) }} /per
                                        person)</small></span>
                                <div class="mb-4">
                                    <div class="border-bottom border-width-2 border-color-1 pb-1">
                                        <div class="js-quantity flex-center-between mb-1 text-dark font-weight-bold">
                                            <span class="d-block">Age 18+</span>
                                            <div class="flex-horizontal-center">
                                                <a class="js-minus font-size-10 text-dark" href="javascript:;">
                                                    <i class="fas fa-chevron-up"></i>
                                                </a>
                                                <input
                                                    class="js-result form-control h-auto width-30 font-weight-bold font-size-16 shadow-none bg-tranparent border-0 rounded p-0 mx-1 text-center"
                                                    name="adult_count" type="text" value="1" min="01"
                                                    max="100">
                                                <a class="js-plus font-size-10 text-dark" href="javascript:;">
                                                    <i class="fas fa-chevron-down"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <span class="d-block text-gray-1 font-weight-normal mb-2 text-left">Children <small
                                        class="text-success font-weight-bold">({{ single_price(@$tour->child_price) }}
                                        /per person)</small></span>
                                <div class="mb-4">
                                    <div class="border-bottom border-width-2 border-color-1 pb-1">
                                        <div class="js-quantity flex-center-between mb-1 text-dark font-weight-bold">
                                            <span class="d-block">Age {{ @$tour->child_age }}</span>
                                            <div class="flex-horizontal-center">
                                                <a class="js-minus font-size-10 text-dark" href="javascript:;">
                                                    <i class="fas fa-chevron-up"></i>
                                                </a>
                                                <input
                                                    class="js-result form-control h-auto width-30 font-weight-bold font-size-16 shadow-none bg-tranparent border-0 rounded p-0 mx-1 text-center"
                                                    readonly name="child_count" type="text" value="0"
                                                    min="0" max="100">
                                                <a class="js-plus font-size-10 text-dark" href="javascript:;">
                                                    <i class="fas fa-chevron-down"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <span class="d-block text-gray-1 font-weight-normal mb-2 text-left">Infant <small
                                        class="text-success font-weight-bold">({{ single_price(@$tour->infant_price) }}
                                        /per person)</small></span>
                                <div class="mb-4">
                                    <div class="border-bottom border-width-2 border-color-1 pb-1">
                                        <div class="js-quantity flex-center-between mb-1 text-dark font-weight-bold">
                                            <span class="d-block">Age {{ @$tour->infant_age }} <br><small
                                                    class="text-warning font-weight-bold">(Max {{ @$tour->infant_count }}
                                                    infant)</small></span>
                                            <div class="flex-horizontal-center">
                                                <a class="js-minus font-size-10 text-dark" href="javascript:;">
                                                    <i class="fas fa-chevron-up"></i>
                                                </a>
                                                <input
                                                    class="js-result form-control h-auto width-30 font-weight-bold font-size-16 shadow-none bg-tranparent border-0 rounded p-0 mx-1 text-center"
                                                    name="infant_count" type="text" value="0" min="0"
                                                    max="100">
                                                <a class="js-plus font-size-10 text-dark" href="javascript:;">
                                                    <i class="fas fa-chevron-down"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Input -->

                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-primary d-flex align-items-center justify-content-center  height-60 w-100 mb-xl-0 mb-lg-1 transition-3d-hover font-weight-bold">Book
                                        Now</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="border border-color-7 rounded p-4 mb-5">
                        <h6 class="font-size-17 font-weight-bold text-gray-3 mx-1 mb-3 pb-1">Why Book With Us?</h6>
                        <div class="d-flex align-items-center mb-3">
                            <i class="flaticon-star font-size-25 text-primary mr-3 pr-1"></i>
                            <h6 class="mb-0 font-size-14 text-gray-1">
                                <a href="#">No-hassle best price guarantee</a>
                            </h6>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="flaticon-support font-size-25 text-primary mr-3 pr-1"></i>
                            <h6 class="mb-0 font-size-14 text-gray-1">
                                <a href="#">Customer care available 24/7</a>
                            </h6>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="flaticon-favorites-button font-size-25 text-primary mr-3 pr-1"></i>
                            <h6 class="mb-0 font-size-14 text-gray-1">
                                <a href="#">Hand-picked Tours &amp; Activities</a>
                            </h6>
                        </div>
                        <div class="d-flex align-items-center mb-0">
                            <i class="flaticon-airplane font-size-25 text-primary mr-3 pr-1"></i>
                            <h6 class="mb-0 font-size-14 text-gray-1">
                                <a href="#">Free Travel Insureance</a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Cards carousel -->
        <div class="product-card-carousel-block product-card-carousel-v5">
            <div class="space-1">
                <div class="w-md-80 w-lg-50 text-center mx-md-auto mt-3">
                    <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">You might also like...</h2>
                </div>
                <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3" data-slides-show="4"
                    data-slides-scroll="1"
                    data-arrows-classes="d-none d-xl-inline-block u-slick__arrow-classic v1 u-slick__arrow-classic--v1 u-slick__arrow-centered--y rounded-circle"
                    data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left shadow-5"
                    data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right shadow-5"
                    data-pagi-classes="text-center d-xl-none u-slick__pagination mt-4"
                    data-responsive='[{
                "breakpoint": 1025,
                "settings": {
                "slidesToShow": 3
                }
                }, {
                "breakpoint": 992,
                "settings": {
                "slidesToShow": 2
                }
                }, {
                "breakpoint": 768,
                "settings": {
                "slidesToShow": 1
                }
                }, {
                "breakpoint": 554,
                "settings": {
                "slidesToShow": 1
                }
                }]'>
                    @if (!empty($related_tours))
                        @foreach ($related_tours as $key => $reTour)
                            <div class="js-slide mt-5">
                                <div class="card transition-3d-hover shadow-hover-2 w-100 h-100">
                                    <div class="position-relative">
                                        <a href="{{ route('tour.detail', @$reTour->slug) }}"
                                            class="d-block gradient-overlay-half-bg-gradient-v5">
                                            <img class="card-img-top" src="{{ uploaded_asset(@$reTour->thumbnail_img) }}"
                                                alt="Image Description">
                                        </a>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="#" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <span class="fas fa-cloud-sun"></span>&nbsp;
                                                        {{ @$reTour->season }}
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-4 py-3">
                                        <a href="{{ route('tour.detail', @$reTour->slug) }}"
                                            class="card-title font-size-17 font-weight-medium text-dark"
                                            style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;min-height: 3em;">{{ @$reTour->name }}</a>
                                        <div class="mt-2 mb-3">
                                            <span
                                                class="badge badge-pill badge-warning text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                            <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                        </div>
                                        <div class="mb-0">
                                            <span class="mr-1 font-size-14 text-gray-1">From</span>
                                            @if (@$tour->child_price > 1)
                                                <span
                                                    class="font-weight-bold">{{ single_price(@$reTour->child_price) }}</span>
                                            @else
                                                <span
                                                    class="font-weight-bold">{{ single_price(@$reTour->sell_price) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- End Product Cards carousel -->
    </div>

@endsection

@section('custom-script')
    <script>
        var today = new Date();
        var cut_off_time = {{ @$tour->cut_off_time }};
        var tday = today.setHours(today.getHours() + cut_off_time);

        $("#myDatePicker").flatpickr({
            enableTime: false,
            minuteIncrement: 1,
            minDate: new Date(tday),
            defaultDate: new Date(tday),
            dateFormat: 'd M, Y'
        })
    </script>

    <script>
        const input = document.querySelector("#customerPhone");
        const phoneInput = window.intlTelInput(input, {
            initialCountry: "ae",
            strictMode: true,
            separateDialCode: true,
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/js/utils.js" // just for formatting/placeholders etc
        });

        var country = phoneInput.getSelectedCountryData();
        $('input[name=country_code]').val(country.dialCode);
        $('input[name=country_iso2]').val(country.iso2);
    </script>
@endsection
