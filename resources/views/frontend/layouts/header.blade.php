<!-- ========== HEADER ========== -->
<header id="header" class="u-header u-header--abs-top u-header--white-nav-links-xl u-header--bg-transparent u-header--show-hide border-bottom border-xl-bottom-0 border-color-white" data-header-fix-moment="500" data-header-fix-effect="slide">
    <div class="u-header__section u-header__shadow-on-show-hide">
        <!-- Topbar -->
        <div class="container-fluid u-header__hide-content u-header__topbar u-header__topbar-lg border-bottom border-color-white">
             <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <ul class="list-inline list-inline-dark u-header__topbar-nav-divider mb-0">
                        <li class="list-inline-item mr-0"><a href="tel:{{ get_setting('support_phone') }}" class="u-header__navbar-link">{{ get_setting('support_phone') }}</a></li>
                        <li class="list-inline-item mr-0"><a href="mailto:{{ get_setting('support_email') }}" class="u-header__navbar-link">{{ get_setting('support_email') }}</a></li>
                    </ul>
                    <div class="ml-auto d-flex align-items-center">
                        <ul class="list-inline mb-0 mr-2 pr-1">
                            <li class="list-inline-item">
                                <a class="btn btn-sm btn-icon btn-pill btn-soft-white btn-bg-transparent transition-3d-hover" href="{{ get_setting('facebook_url') }}" target="_blank">
                                    <span class="fab fa-facebook-f btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-sm btn-icon btn-pill btn-soft-white btn-bg-transparent transition-3d-hover" href="{{ get_setting('twitter_url') }}" target="_blank">
                                    <span class="fab fa-twitter btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-sm btn-icon btn-pill btn-soft-white btn-bg-transparent transition-3d-hover" href="{{ get_setting('instagram_url') }}" target="_blank">
                                    <span class="fab fa-instagram btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-sm btn-icon btn-pill btn-soft-white btn-bg-transparent transition-3d-hover" href="{{ get_setting('linkedin_url') }}" target="_blank">
                                    <span class="fab fa-linkedin-in btn-icon__inner"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <div id="logoAndNav" class="container-fluid py-1 py-xl-0">
            <!-- Nav -->
            <nav class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space">
                <!-- Logo -->
                <a class="navbar-brand u-header__navbar-brand-default u-header__navbar-brand-center u-header__navbar-brand-text-dark-xl" href="{{ route('home') }}" aria-label="{{ get_setting('website_title') }}">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="55px" height="53px" style="margin-bottom: 0;">
                        <path fill-rule="evenodd"  class="fill-primary" d="M53.175,51.207 C50.755,53.610 46.848,53.594 44.448,51.171 L40.766,47.484 C40.378,47.082 40.378,46.443 40.766,46.041 C41.164,45.628 41.821,45.617 42.233,46.016 L45.915,49.702 C47.503,51.246 50.030,51.246 51.619,49.702 C53.243,48.125 53.283,45.528 51.708,43.902 L50.100,42.291 C49.712,41.889 49.712,41.251 50.100,40.849 C50.498,40.436 51.155,40.425 51.567,40.823 L53.174,42.433 C53.186,42.444 53.198,42.456 53.210,42.468 C55.610,44.891 55.594,48.804 53.175,51.207 ZM47.857,37.404 C47.757,37.404 47.657,37.389 47.561,37.360 C47.561,37.360 47.561,37.360 47.561,37.360 C47.012,37.196 46.700,36.617 46.864,36.068 C48.542,30.412 47.740,24.309 44.659,19.280 C38.665,9.497 25.886,6.432 16.116,12.434 C16.085,12.456 16.054,12.475 16.021,12.493 C15.518,12.767 14.888,12.581 14.614,12.077 C14.340,11.574 14.526,10.943 15.029,10.669 C18.623,8.455 22.761,7.284 26.981,7.287 C29.178,7.289 31.363,7.608 33.469,8.234 C45.556,11.831 52.442,24.559 48.851,36.662 C48.719,37.102 48.315,37.403 47.857,37.404 ZM13.802,8.022 L12.765,6.983 C12.377,6.581 12.377,5.943 12.765,5.540 C13.163,5.128 13.820,5.116 14.232,5.515 L15.269,6.553 C15.657,6.956 15.657,7.594 15.269,7.996 C14.871,8.409 14.214,8.420 13.802,8.022 ZM9.654,3.868 L9.084,3.296 C7.495,1.753 4.968,1.752 3.379,3.296 C1.755,4.873 1.715,7.470 3.291,9.096 L10.083,15.900 C10.278,16.094 10.387,16.358 10.387,16.634 C10.387,17.208 9.923,17.672 9.350,17.672 C9.075,17.672 8.812,17.563 8.617,17.368 L1.824,10.566 C1.812,10.554 1.800,10.542 1.788,10.530 C-0.611,8.107 -0.596,4.195 1.824,1.792 C4.243,-0.612 8.150,-0.596 10.550,1.827 L11.121,2.399 C11.129,2.408 11.138,2.416 11.146,2.425 C11.544,2.838 11.533,3.495 11.121,3.894 C10.709,4.292 10.052,4.280 9.654,3.868 ZM7.742,19.850 C8.260,20.095 8.480,20.715 8.234,21.233 C5.232,27.580 5.635,35.016 9.305,41.001 C15.302,50.779 28.080,53.839 37.845,47.834 C37.876,47.813 37.908,47.793 37.940,47.775 C38.444,47.501 39.073,47.687 39.347,48.191 C39.621,48.695 39.435,49.326 38.932,49.599 C35.338,51.813 31.200,52.984 26.981,52.980 C23.606,52.979 20.273,52.228 17.223,50.782 C5.829,45.379 0.966,31.751 6.360,20.342 C6.606,19.824 7.225,19.603 7.742,19.850 ZM40.262,35.347 C40.601,35.280 40.951,35.386 41.196,35.631 L43.270,37.708 C43.675,38.113 43.675,38.770 43.270,39.176 L39.551,42.900 C37.191,45.264 33.364,45.264 31.004,42.900 L24.906,36.795 L21.491,40.215 C21.086,40.620 20.430,40.620 20.025,40.215 L17.951,38.138 C17.719,37.905 17.612,37.576 17.660,37.251 L18.624,30.501 L12.590,24.460 C11.040,22.907 11.040,20.390 12.590,18.837 C14.141,17.285 16.654,17.285 18.205,18.837 L24.077,24.716 L35.851,18.820 C36.250,18.620 36.732,18.699 37.048,19.015 L39.122,21.092 C39.527,21.498 39.527,22.155 39.122,22.561 L30.521,31.173 L35.622,36.277 L40.262,35.347 ZM20.758,38.012 L23.440,35.326 L20.454,32.337 L19.784,37.036 L20.758,38.012 ZM34.541,38.138 L28.318,31.907 C27.914,31.501 27.914,30.844 28.318,30.439 L36.919,21.826 L36.107,21.013 L24.333,26.910 C23.934,27.109 23.452,27.031 23.136,26.714 L16.735,20.306 C16.379,19.949 15.897,19.749 15.394,19.749 C14.347,19.750 13.498,20.600 13.499,21.649 C13.496,22.153 13.695,22.638 14.051,22.995 L20.449,29.401 L25.635,34.593 L32.464,41.432 C34.014,42.984 36.528,42.984 38.078,41.432 L41.064,38.442 L40.115,37.492 L35.474,38.421 C35.135,38.488 34.786,38.382 34.541,38.138 Z"/>
                    </svg>
                    <span class="u-header__navbar-brand-text">{{ get_setting('website_title') }}</span> --}}
                    <img src="{{ uploaded_asset(get_setting('website_logo')) }}" alt="{{ get_setting('website_title') }}" width="120">
                </a>
                <!-- End Logo -->

                <!-- Handheld Logo -->
                <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center u-header__navbar-brand-collapsed" href="{{ route('home') }}" aria-label="{{ get_setting('website_title') }}">
                    <img src="{{ uploaded_asset(get_setting('website_logo')) }}" alt="{{ get_setting('website_title') }}" width="120">
                </a>
                <!-- End Handheld Logo -->

                <!-- Scroll Logo -->
                <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center u-header__navbar-brand-on-scroll" href="{{ route('home') }}" aria-label="{{ get_setting('website_title') }}">
                        
                    <img src="{{ uploaded_asset(get_setting('website_logo')) }}" alt="{{ get_setting('website_title') }}" width="120">
                </a>
                <!-- End Scroll Logo -->

                <!-- Responsive Toggle Button -->
                <button type="button" class="navbar-toggler btn u-hamburger u-hamburger--primary order-2 ml-3" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                    <span id="hamburgerTrigger" class="u-hamburger__box">
                        <span class="u-hamburger__inner"></span>
                    </span>
                </button>
                <!-- End Responsive Toggle Button -->

                <!-- Navigation -->
                <div id="navBar" class="navbar-collapse u-header__navbar-collapse u-header-right-aligned-nav collapse order-2 order-xl-0 pt-4 pt-xl-0 pl-xl-6">
                    <ul class="navbar-nav u-header__navbar-nav position-relative">
                        <!-- Home -->
                        <li class="nav-item u-header__nav-item">
                            <a class="nav-link u-header__nav-link" href="{{ route('home') }}" aria-expanded="false">{{ __('Home') }}</a>
                        </li>
                        <!-- End Home -->

                        <!-- Yacht -->
                        <li class="nav-item u-header__nav-item">
                            <a class="nav-link u-header__nav-link" href="{{ route('tour.list') }}" aria-expanded="false" aria-labelledby="yachtSubMenu">{{ __('Tours') }}</a>
                        </li>
                        <!-- End Yacht -->

                        <!-- Flights -->
                        <li class="nav-item u-header__nav-item">
                            <a class="nav-link u-header__nav-link" href="#" aria-expanded="false" aria-labelledby="flightsSubMenu">{{ __('Gallery') }}</a>
                        </li>
                        <!-- End Flights -->

                        <!-- Pages -->
                        <li class="nav-item u-header__nav-item">
                            <a class="nav-link u-header__nav-link" href="{{ route('contactus') }}" aria-expanded="false">{{ __('Contact us') }}</a>
                        </li>
                        <!-- End Pages -->

                    </ul>
                </div>
                <!-- End Navigation -->

                <!-- Search Form -->
                <div class="position-relative u-header__search-xl">
                    {{-- <a id="searchClassicInvoker" class="btn-text-dark" href="javascript:;" role="button" aria-controls="searchClassic" aria-haspopup="true" aria-expanded="false" data-unfold-target="#searchClassic" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                        <span class="flaticon-magnifying-glass-1 font-size-20"></span>
                    </a> --}}

                    <!-- Input -->
                    {{-- <div id="searchClassic" class="dropdown-menu dropdown-unfold dropdown-menu-right u-unfold--css-animation u-unfold--hidden" aria-labelledby="searchClassicInvoker">
                        <form class="js-focus-state input-group px-3" style="width: 370px;">
                            <input class="form-control" type="search" placeholder="Search MyTour">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </form>
                    </div> --}}
                    <!-- End Input -->
                </div>
                <!-- Search Form -->

                <!-- Shopping Cart -->
                {{-- <div class="pl-2 pl-md-4 ml-auto shopping-cart">
                    <a id="shoppingCartDropdownInvoker" class="btn-text-dark py-4 position-relative" href="javascript:;" role="button" aria-controls="shoppingCartDropdown" aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#shoppingCartDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                        <span class="flaticon-shopping-basket font-size-25 text-primary-max-lg"></span>
                    </a>

                    <div id="shoppingCartDropdown" class="dropdown-menu dropdown-unfold dropdown-menu-right dropdown-menu-right-fix-wd-10 p-0 mt-0 w-max-sm-100 u-unfold--css-animation font-size-16" aria-labelledby="shoppingCartDropdownInvoker" style="width: 500px; animation-duration: 300ms; right: 0px;">
                        <div class="card">
                            <!-- Header -->
                            <div class="card-header border-color-8 py-3 px-5">
                                <span class="font-weight-semi-bold">Your Cart</span>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body p-0">
                                <div class="px-2 px-md-3 py-2 py-md-1 border-bottom border-color-8">
                                    <div class="media p-2 p-md-3">
                                        <div class="u-avatar u-lg-avatar-md mr-2 mr-md-3">
                                            <img class="img-fluid rounded-pill" src="{{ asset('assets/frontend/img/80x80/img1.jpg') }}" alt="Image Description">
                                        </div>
                                        <div class="media-body position-relative pl-md-1">
                                            <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3">
                                                <span class="d-block text-dark font-weight-bold">Hyatt Centric Times  Square</span>
                                                <button type="button" class="close close-rounded position-md-absolute right-0 ml-2" aria-label="Close">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            <span class="d-block text-gray-1">Price  £590.00 </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-2 px-md-3 py-2 py-md-1 border-bottom border-color-8">
                                    <div class="media p-2 p-md-3">
                                        <div class="u-avatar u-lg-avatar-md mr-2 mr-md-3">
                                            <img class="img-fluid rounded-pill" src="{{ asset('assets/frontend/img/80x80/img2.jpg') }}" alt="Image Description">
                                        </div>
                                        <div class="media-body position-relative pl-md-1">
                                            <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3">
                                                <span class="d-block text-dark font-weight-bold">Hyatt Centric Times  Square</span>
                                                <button type="button" class="close close-rounded position-md-absolute right-0 ml-2" aria-label="Close">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            <span class="d-block text-gray-1">Price  £590.00 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Body -->

                            <!-- Footer -->
                            <div class="card-footer border-0 p-3 px-md-5 py-md-4">
                                <div class="mb-4 pb-md-1">
                                    <span class="d-block font-weight-semi-bold">Subtotal: £1180.00</span>
                                </div>
                                <div class="d-md-flex button-inline-group-md mb-1">
                                    <a class="btn btn-block btn-md btn-gray-1 rounded-xs font-weight-bold transition-3d-hover" href="#">
                                        View cart
                                    </a>
                                    <a class="btn btn-block btn-md btn-blue-1 rounded-xs font-weight-bold transition-3d-hover mt-md-0 ml-md-5" href="#">
                                        Check Out
                                    </a>
                                </div>
                            </div>
                            <!-- End Footer -->
                        </div>
                    </div>
                </div> --}}
                <!-- End Shopping Cart -->

                <!-- Button -->
                {{-- <div class="pl-4 ml-2 u-header__last-item-btn u-header__last-item-btn-lg">
                    <a class="btn btn-wide rounded-xs btn-dark transition-3d-hover" href="#" target="_blank">Become Local Expert</a>
                </div> --}}
                <!-- End Button -->
            </nav>
            <!-- End Nav -->
        </div>
    </div>
</header>
<!-- ========== End HEADER ========== -->