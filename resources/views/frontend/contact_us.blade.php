@extends('frontend.layouts.main')
@section('content')

<!-- Hero Section -->
<div class="text-center mb-4 py-2" style="background: #f5efec;">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Info -->
            <div class="py-3">
                <h1 class="font-size-25 font-weight-bold">Contact us</h1>
            </div>
            <!-- End Info -->
        </div>
    </div>
</div>
<!-- End Hero Section -->
<div class="border-bottom border-color-8 pb-6 pb-lg-8 mb-5 mb-lg-7">
    <div class="container pb-1">
        <div class="row">
            <div class="col-sm-12 pt-2">
                <p class="font-italic">Need help? Get in touch with our customer support team 24x7.</p>
            </div>
            <div class="col-sm-12 pt-2 pb-3">
                <h3 class="font-weight-bold font-size-28">Communication Channels & Hours of Operation</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="mb-5 mb-lg-0 text-center text-md-left" style="box-shadow: 0px 0px 2px #d2d2d2; padding: 0.5rem 1rem;">
                    <h6 class="text-muted font-weight-bold" style="font-size: 18px;">Call us on <span class="text-primary" style="font-size: 24px;">{{ get_setting('support_phone') }}</span></h6>
                    <div class="">
                        <p class="mb-1 font-weight-bold">From 12:00 AM to 12:00 AM</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="mb-5 mb-lg-0 text-center text-md-left" style="box-shadow: 0px 0px 2px #d2d2d2; padding: 0.5rem 1rem;">
                    <h6 class="text-muted font-weight-bold font-size-16">Contact us on</h6>
                    <div class="">
                        <p class="mb-1 font-weight-bold text-primary" style="font-size: 24px;">{{ get_setting('support_email') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="text-center text-md-left" style="box-shadow: 0px 0px 2px #d2d2d2; padding: 0.5rem 1rem;">
                    <h6 class="text-muted font-weight-bold font-size-16">Address</h6>
                    <div class="">
                        <p class="mb-1 font-weight-bold text-primary">Dubai,</p>
                        <p class="mb-0 font-weight-bold text-primary">United Arab Emirates</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection