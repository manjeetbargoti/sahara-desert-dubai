<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ uploaded_asset(get_setting('website_icon')) }}">
    <!-- Page Title  -->
    <title>Register | {{ get_setting('website_title') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/dashlite.css?ver='.env('APP_VERSION')) }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/admin/assets/css/theme.css?ver='.env('APP_VERSION')) }}">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/css/intlTelInput.css">

    <style>
        .iti {
            width: 100%;
        }
    </style>
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="{{ route('home') }}" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="{{ uploaded_asset(get_setting('website_logo')) }}" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="{{ uploaded_asset(get_setting('website_logo')) }}" alt="logo-dark">
                            </a>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">{{ __('Vendor Registration') }}</h4>
                                        <div class="nk-block-des">
                                            <p>Create New SDD Vendor Account</p>
                                        </div>
                                    </div>
                                    @if(session('error'))
                                        <div class="alert alert-danger alert-icon">
                                            <em class="icon ni ni-check-circle"></em> {{ session('error') }}
                                        </div>
                                    @endif
                                </div>
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="user_type" id="userType" value="vendor">

                                    <div class="form-group">
                                        <label class="form-label" for="name">Name</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="name" class="form-control form-control-lg" id="name" placeholder="Enter your name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email Address</label>
                                        <div class="form-control-wrap">
                                            <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Enter your email address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="vendorPhone">Phone Number</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="phone" class="form-control form-control-lg" id="vendorPhone" placeholder="Enter your phone number">
                                            <input type="hidden" name="country_code">
                                            <input type="hidden" name="country_iso2">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Business Name</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="shop_name" class="form-control form-control-lg" id="shop_name" placeholder="Enter your business name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter your password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-control-xs custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox">
                                            <label class="custom-control-label" for="checkbox">I agree to Dashlite <a href="#">Privacy Policy</a> &amp; <a href="#"> Terms.</a></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Register</button>
                                    </div>
                                </form>
                                <div class="form-note-s2 text-center pt-4"> Already have an account? <a href="{{ route('login') }}"><strong>Sign in instead</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-6 order-lg-last">
                                    <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Terms & Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Privacy Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Help</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <div class="nk-block-content text-center text-lg-left">
                                        <p class="text-soft">&copy; 2024 {{ get_setting('website_title') }}. All Rights Reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('assets/admin/assets/js/bundle.js?ver='.env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/admin/assets/js/scripts.js?ver='.env('APP_VERSION')) }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/js/intlTelInput.min.js"></script>

    <script>
        const input = document.querySelector("#vendorPhone");
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

</html>
