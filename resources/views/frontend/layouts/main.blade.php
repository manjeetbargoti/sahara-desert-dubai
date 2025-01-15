<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Title -->
    <title>{{ get_setting('website_title') ?? env('APP_NAME') }}</title>
    <link rel="icon" href="{{ asset('assets/frontend/img/sm-logo.svg') }}" type="image/gif" sizes="20x20">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/jquery-ui.css') }}" rel="stylesheet">
    <!-- Bootstrap Icon CSS -->
    <link href="{{ asset('assets/frontend/css/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- Fontawesome all CSS -->
    <link href="{{ asset('assets/frontend/css/all.min.css') }}" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="{{ asset('assets/frontend/css/animate.min.css') }}" rel="stylesheet">
    <!-- FancyBox CSS -->
    <link href="{{ asset('assets/frontend/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <!-- intl-tel-input CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.2.1/build/css/intlTelInput.css">
    <!-- Fontawesome CSS -->
    <link href="{{ asset('assets/frontend/css/fontawesome.min.css') }}" rel="stylesheet">
    <!-- Swiper slider CSS -->
       <link rel="stylesheet" href="{{ asset('assets/frontend/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/daterangepicker.css') }}">
    <!-- BoxIcon  CSS -->
    <link href="{{ asset('assets/frontend/css/boxicons.min.css') }}" rel="stylesheet">
    <!-- Select2  CSS -->
    <link href="{{ asset('assets/frontend/css/nice-select.css') }}" rel="stylesheet">
    <!--  Style CSS  -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    
</head>

<body>
  
    <!-- PreLoader -->
    <div class="egns-preloader">
        <div class="preloader-close-btn">
            <span><i class="bi bi-x-lg"></i> Close</span>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <div class="circle-border text-center">
                        <div class="moving-circle"></div>
                        <div class="moving-circle"></div>
                        <div class="moving-circle"></div>
                        <img alt="image" class="img-fluid" src="{{ asset('assets/frontend/img/sm-logo.svg') }}" style="transform: translateY(25px);width: 90px;height: 90px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')

    <!--  Main jQuery  -->
    <script src="{{ asset('assets/frontend/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/daterangepicker.min.js') }}"></script>
    <!-- Popper and Bootstrap JS -->
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
    <!-- Swiper slider JS -->
    <script src="{{ asset('assets/frontend/js/swiper-bundle.min.js') }}"></script>
    <!-- Waypoints JS -->
    <script src="{{ asset('assets/frontend/js/waypoints.min.js') }}"></script>
    <!-- Select2  JS -->
    <script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js') }}"></script>
    <!-- intlTelInput  JS -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.2.1/build/js/intlTelInput.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/js/intlTelInput.min.js"></script>

    <script src="{{ asset('assets/frontend/js/jquery.fancybox.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/frontend/js/custom.js') }}"></script>

</body>

</html>