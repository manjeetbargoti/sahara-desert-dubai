<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ uploaded_asset(get_setting('website_icon')) }}">
    <!-- Page Title  -->
    <title>{{ __('Send Booking Confirmation Email') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/dashlite.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/admin/assets/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/style-email.css') }}">
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">

    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-inner">
                <h4 class="title text-soft mb-4 overline-title">Notification - Booking Confirmation Email</h4>
                <table class="email-wraper">
                    <tr>
                        <td class="py-5">
                            <table class="email-header">
                                <tbody>
                                    <tr>
                                        <td class="text-center pb-4">
                                            <a href="#"><img class="email-logo"
                                                    src="{{ uploaded_asset(get_setting('website_logo')) }}"
                                                    width="90" alt="logo"></a>
                                            {{-- <p class="email-title">Conceptual Base Modern Dashboard Theme</p> --}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="email-body">
                                <tbody>
                                    <tr>
                                        <td class="px-3 px-sm-5 pt-3 pt-sm-5 pb-3">
                                            <h2 class="email-heading text-success">Congratulations! Your Booking is
                                                Confirmed.</h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-3 px-sm-5 pb-2">
                                            <p>Hi {{ @$name }},</p>
                                            <p>Welcome! <br> You are receiving this email because you have completed
                                                booking on our site.</p>
                                            <p>Your booking reference is <span
                                                    class="fw-bold text-primary">{{ @$booking_ref }}</span>.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-3 px-sm-5 pb-2">
                                            <p class="fw-bold">Customer Details:</p>
                                            <table class="table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="35%">Name</td>
                                                        <td>{{ @$name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="35%">Email Address</td>
                                                        <td>{{ @$email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="35%">Phone Number</td>
                                                        <td>{{ @$phone }}</td>
                                                    </tr>
                                                    @if(@$address)
                                                    <tr>
                                                        <td width="35%">Address</td>
                                                        <td>{{ @$address }}</td>
                                                    </tr>
                                                    @endif
                                                    @if(@$location)
                                                    <tr>
                                                        <td width="35%">Location</td>
                                                        <td>{{ @$location }}</td>
                                                    </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-3 px-sm-5 pb-2">
                                            <p class="fw-bold">Booking Details:</p>
                                            <table class="table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="35%">Booking Reference</td>
                                                        <td class="text-primary">{{ @$booking_ref }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="35%">Activity Name</td>
                                                        <td>{{ @$activity_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="35%">Activity Date</td>
                                                        <td>{{ date('d M, Y', strtotime(@$booking_date)) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="35%">Time Slot</td>
                                                        <td>{{ date('h:i A', strtotime(@$time_slot)) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="35%">Adults</td>
                                                        <td>{{ @$adult_count.' x '.single_price(@$adult_price).' = '.single_price(@$adult_count*@$adult_price) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="35%">Child</td>
                                                        <td>{{ @$child_count.' x '.single_price(@$child_price).' = '.single_price(@$child_count*@$child_price) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="35%">Infant <small class="text-danger"><i>(max. {{ @$max_infant }})</i></small></td>
                                                        <td>{{ @$infant_count.' x '.single_price(@$infant_price).' = '.single_price(@$infant_count*@$infant_price) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="35%">{{ @$fixed_charges_type }}</td>
                                                        <td>{{ single_price(@$fixed_charges) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="35%">Subtotal <small><i>(excl. vat)</i></small></td>
                                                        <td>{{ single_price(@$subtotal) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="35%">VAT (5%)</td>
                                                        <td>{{ single_price(@$total_vat) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="35%" class="fw-bold">Grand Total</td>
                                                        <td class="fw-bold">{{ single_price(@$grand_total) }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-3 px-sm-5 pb-2">
                                            <p class="fw-bold">Payment Details:</p>
                                            <table class="table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="35%">Payment Status</td>
                                                        @if(@$payment_status == 'paid')
                                                        <td class="text-success fw-bold">{{ __('Paid') }}</td>
                                                        @else
                                                        <td class="text-danger fw-bold">{{ __('Unpaid') }}</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="35%">Payment Method</td>
                                                        @if(@$payment_method == 'cash')
                                                        <td class="text-primary fw-bold">{{ __('Cash') }}</td>
                                                        @else
                                                        <td class="text-success fw-bold">{{ __('Credit/Debit') }}</td>
                                                        @endif
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-3 px-sm-5 pb-2">
                                            <p class="mb-4">If you have any query, feel free to contact us.</p>
                                            <a href="#" class="email-btn">Contact us</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-3 px-sm-5 pt-4 pb-3 pb-sm-5">
                                            <p>If you did not make this request, please contact us or ignore this
                                                message.</p>
                                            <p class="email-note">This is an automatically generated email please do not
                                                reply to this
                                                email. If you face any issues, please contact us at info@saharadesertdubai.com
                                            </p>
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
