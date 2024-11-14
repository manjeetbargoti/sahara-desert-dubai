<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ uploaded_asset(get_setting('website_icon')) }}">
    <!-- Page Title  -->
    <title>{{ __('Welcome Email') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/dashlite.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/admin/assets/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/style-email.css') }}">
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">

    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-inner">
                <h4 class="title text-soft mb-4 overline-title">Notification - Welcome Email</h4>
                <table class="email-wraper">
                    <tr>
                        <td class="py-5">
                            <table class="email-header">
                                <tbody>
                                    <tr>
                                        <td class="text-center pb-4">
                                            <a href="#"><img class="email-logo" src="{{ uploaded_asset(get_setting('website_logo')) }}" width="90" alt="logo"></a>
                                            {{-- <p class="email-title">Conceptual Base Modern Dashboard Theme</p> --}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="email-body">
                                <tbody>
                                    <tr>
                                        <td class="p-3 p-sm-5">
                                            <p><strong>Hi {{ @$name }},</strong></p>

                                            <p>We are pleased to have you as a member of Sahara Desert Dubai.</p>

                                            <p>Your account is now verified and you can access bookings assigned to you. Also you can update your business information from Shop Setting page.</p>
                                            <p>Hope you'll enjoy the experience, we're here if you have any questions, drop us a line at <a href="mailto:info@saharadesertdubai.com">info@saharadesertdubai.com</a> anytime. </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="email-footer">
                                <tbody>
                                    <tr>
                                        <td class="text-center pt-4">
                                            <p class="email-copyright-text">Copyright &copy; {{ date('Y') }}
                                                {{ get_setting('website_name') }}. All rights reserved.</p>
                                            <p class="fs-12px pt-4">This email was sent to you as a registered member of
                                                <a href="https://SaharaDesertDubai.com">SaharaDesertDubai</a>.</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div><!-- .nk-block -->

</body>

</html>
