<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ uploaded_asset(get_setting('website_icon')) }}">
    <!-- Page Title  -->
    <title>Admin Dashboard | {{ env('APP_NAME') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/dashlite.css?ver='.env('APP_VERSION')) }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/admin/assets/css/theme.css?ver='.env('APP_VERSION')) }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/editors/summernote.css?ver='.env('APP_VERSION')) }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/css/intlTelInput.css">
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            @include("admin.layouts.sidebar")
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                @include("admin.layouts.header")
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                            @yield("content")
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> Copyright &copy; 2024 {{ env('APP_NAME') }}. 
                            </div>
                            <div class="nk-footer-links">
                                Version {{ env('APP_VERSION') }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('assets/admin/assets/js/bundle.js?ver='.env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/admin/assets/js/scripts.js?ver='.env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/admin/assets/js/charts/gd-default.js?ver='.env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/admin/assets/js/libs/editors/summernote.js?ver='.env('APP_VERSION')) }}"></script>
    <script src="{{ asset('assets/admin/assets/js/editors.js?ver='.env('APP_VERSION')) }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/js/intlTelInput.min.js"></script>

    @yield('custom-script')
</body>

</html>