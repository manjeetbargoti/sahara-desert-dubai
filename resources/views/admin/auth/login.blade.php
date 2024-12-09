<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="SDD">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ uploaded_asset(get_setting('website_icon')) }}">
    <!-- Page Title  -->
    <title>Admin Login | {{ get_setting('website_title') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/dashlite.css?ver='.env('APP_VERSION')) }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/admin/assets/css/theme.css?ver='.env('APP_VERSION')) }}">
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
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
                                        <h4 class="nk-block-title">Admin Sign-In</h4>
                                        <div class="nk-block-des">
                                            <p>Access the Admin account using your email and password.</p>
                                        </div>
                                        {{-- @if(session('status'))
                                        <div class="alert alert-danger alert-icon">
                                            <em class="icon ni ni-check-circle"></em> {{ session('status') }}
                                        </div>
                                        @endif --}}
                                    </div>
                                </div>
                                <form action="{{ route('admin.login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="emailAddress">Email Address</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" id="emailAddress" placeholder="Enter your email address" required autofocus autocomplete="username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                            {{-- <a class="link link-primary link-sm" href="#">Need help?</a> --}}
                                        </div>
                                        <div class="form-control-wrap">
                                            <a class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter your passcode" required autocomplete="current-password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Sign in</button>
                                    </div>
                                </form>
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
                                        <p class="text-soft">Copyright &copy; 2024 {{ get_setting('website_title') }}. All Rights Reserved.</p>
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

</html>