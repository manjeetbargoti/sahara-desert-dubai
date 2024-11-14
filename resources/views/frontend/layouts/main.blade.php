<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>{{ get_setting('website_title') ?? env('APP_NAME') }}</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ uploaded_asset(get_setting('website_icon')) }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Rubik:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet"
        href="{{ asset('assets/frontend/vendor/font-awesome/css/fontawesome-all.min.css?v=' . env('APP_VERSION')) }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-mytravel.css?v=' . env('APP_VERSION')) }}">
    <link rel="stylesheet"
        href="{{ asset('assets/frontend/vendor/animate.css/animate.min.css?v=' . env('APP_VERSION')) }}">
    <link rel="stylesheet"
        href="{{ asset('assets/frontend/vendor/hs-megamenu/src/hs.megamenu.css?v=' . env('APP_VERSION')) }}">
    <link rel="stylesheet"
        href="{{ asset('assets/frontend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css?v=' . env('APP_VERSION')) }}">
    <link rel="stylesheet"
        href="{{ asset('assets/frontend/vendor/flatpickr/dist/flatpickr.min.css?v=' . env('APP_VERSION')) }}">
    <link rel="stylesheet"
        href="{{ asset('assets/frontend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css?v=' . env('APP_VERSION')) }}">
    <link rel="stylesheet"
        href="{{ asset('assets/frontend/vendor/slick-carousel/slick/slick.css?v=' . env('APP_VERSION')) }}">
    <link rel="stylesheet"
        href="{{ asset('assets/frontend/vendor/fancybox/jquery.fancybox.css?v=' . env('APP_VERSION')) }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/css/intlTelInput.css">

    <!-- CSS MyTravel Template -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/theme.css?v=' . env('APP_VERSION')) }}">
</head>

<body>
    @include('frontend.layouts.header')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">
        @yield('content')
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    @include('frontend.layouts.footer')

    <!-- Page Preloader -->
    {{-- <!-- <div id="jsPreloader" class="page-preloader">
            <div class="page-preloader__content-centered">
                <div class="spinner-grow text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div> --> --}}
    <!-- End Page Preloader -->

    <!-- Go to Top -->
    <a class="js-go-to u-go-to-modern" href="#" data-position='{"bottom": 15, "right": 15 }' data-type="fixed"
        data-offset-top="400" data-compensation="#header" data-show-effect="slideInUp" data-hide-effect="slideOutDown">
        <span class="flaticon-arrow u-go-to-modern__inner"></span>
    </a>
    <!-- End Go to Top -->

    <!-- JS Global Compulsory -->
    <script src="{{ asset('assets/frontend/vendor/jquery/dist/jquery.min.js?v=' . env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/frontend/vendor/jquery-migrate/dist/jquery-migrate.min.js?v=' . env('APP_VERSION')) }}">
    </script>
    <script src="{{ asset('assets/frontend/vendor/popper.js/dist/umd/popper.min.js?v=' . env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/frontend/vendor/bootstrap/bootstrap.min.js?v=' . env('APP_VERSION')) }}"></script>

    <!-- JS Implementing Plugins -->
    <script src="{{ asset('assets/frontend/vendor/hs-megamenu/src/hs.megamenu.js?v=' . env('APP_VERSION')) }}"></script>
    <script
        src="{{ asset('assets/frontend/vendor/jquery-validation/dist/jquery.validate.min.js?v=' . env('APP_VERSION')) }}">
    </script>
    <script src="{{ asset('assets/frontend/vendor/flatpickr/dist/flatpickr.min.js?v=' . env('APP_VERSION')) }}"></script>
    <script
        src="{{ asset('assets/frontend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js?v=' . env('APP_VERSION')) }}">
    </script>
    <script src="{{ asset('assets/frontend/vendor/slick-carousel/slick/slick.js?v=' . env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/frontend/vendor/gmaps/gmaps.min.js?v=' . env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/frontend/vendor/player.js/dist/player.min.js?v=' . env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/frontend/vendor/fancybox/jquery.fancybox.min.js?v=' . env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/frontend/vendor/svg-injector/dist/svg-injector.min.js?v=' . env('APP_VERSION')) }}">
    </script>

    <!-- JS SDD -->
    <script src="{{ asset('assets/frontend/js/hs.core.js?v=' . env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/frontend/js/components/hs.header.js?v=' . env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/frontend/js/components/hs.unfold.js?v=' . env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/frontend/js/components/hs.validation.js?v=' . env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/frontend/js/components/hs.show-animation.js?v=' . env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/frontend/js/components/hs.range-datepicker.js?v=' . env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/frontend/js/components/hs.selectpicker.js?v=' . env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/frontend/js/components/hs.go-to.js?v=' . env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/frontend/js/components/hs.slick-carousel.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/components/hs.fancybox.js?v=' . env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/frontend/js/components/hs.svg-injector.js?v=' . env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/frontend/js/components/hs.quantity-counter.js?v=' . env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/frontend/js/components/hs.g-map.js?v=' . env('APP_VERSION')) }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/js/intlTelInput.min.js"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(window).on('load', function() {
            // initialization of HSMegaMenu component
            $('.js-mega-menu').HSMegaMenu({
                event: 'hover',
                pageContainer: $('.container'),
                breakpoint: 1199.98,
                hideTimeOut: 0
            });

            // initialization of svg injector module
            $.HSCore.components.HSSVGIngector.init('.js-svg-injector');

            // Page preloader
            setTimeout(function() {
                $('#jsPreloader').fadeOut(500)
            }, 800);
        });

        $(document).on('ready', function() {
            // initialization of header
            $.HSCore.components.HSHeader.init($('#header'));
            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));
            // initialization of show animations
            $.HSCore.components.HSShowAnimation.init('.js-animation-link');
            // initialization of datepicker
            // $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');
            // initialization of select
            $.HSCore.components.HSSelectPicker.init('.js-select');
            // initialization of quantity counter
            $.HSCore.components.HSQantityCounter.init('.js-quantity');
            // initialization of slick carousel
            $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');
            // initialization of popups
            $.HSCore.components.HSFancyBox.init('.js-fancybox');
            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');
        });
    </script>

    <script>
        var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?40669';

        var s = document.createElement('script');

        s.type = 'text/javascript';

        s.async = true;

        s.src = url;

        var options = {

            "enabled": true,

            "chatButtonSetting": {

                "backgroundColor": "#4dc247",

                "ctaText": "Book now",

                "borderRadius": "25",

                "marginLeft": "25",

                "marginBottom": "30",

                "marginRight": "25",

                "position": "left"



            },

            "brandSetting": {

                "brandName": "Sahara Desert Dubai",

                "brandSubTitle": "Discover the Beauty of Dubai Desert",

                "brandImg": "https://saharadesertdubai.com/favicon.ico",

                "welcomeText": "Welcome to Sahara Desert Dubai! 🏜️ How can we make your desert adventure unforgettable today?",

                "backgroundColor": "#0a5f54",

                "ctaText": "Start Chat",

                "borderRadius": "25",

                "autoShow": false,

                "phoneNumber": "971525469933"

            }

        };

        s.onload = function() {

            CreateWhatsappChatWidget(options);

        };

        var x = document.getElementsByTagName('script')[0];

        x.parentNode.insertBefore(s, x);

        window.onload = function() {


            $('#loader').hide();

        }
    </script>

    @yield('custom-script')
</body>

</html>
