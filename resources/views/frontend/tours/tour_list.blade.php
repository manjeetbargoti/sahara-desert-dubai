@extends('frontend.layouts.main')
@section('content')

<div class="breadcrumb-section" style="background-image: linear-gradient(270deg, rgba(0, 0, 0, .3), rgba(0, 0, 0, 0.3) 101.02%), url({{ asset('assets/frontend/img/all-packages-bg.png') }});">  
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="banner-content">
                    <h1>All Packages</h1>
                    <p class="text-white">Here you can find all the Standard tour packages offered by our team</p>
                    <ul class="breadcrumb-list">
                        <li><a href="index.html">Home</a></li>
                        <li>All Packages</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@if(@$tour_count > 0)
<!-- Start Package Grid section -->
<div class="package-grid-section pt-50 mb-80">
    <div class="container">
        <div class="row gy-5 mb-70">
            @foreach($tours as $key => $tour)
            <div class="col-lg-4 col-md-6">
                <div class="package-card">
                    <div class="package-card-img-wrap">
                        <a href="{{ route('tour.detail', @$tour->slug) }}" class="card-img"><img src="{{ uploaded_asset(@$tour->thumbnail_img) }}" alt=""></a>
                        <div class="batch">
                            @if(!empty($tour->subtitle))
                            <span class="date">{{ @$tour->subtitle }}</span>
                            @endif
                            <div class="location">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path d="M8.99939 0C5.40484 0 2.48047 2.92437 2.48047 6.51888C2.48047 10.9798 8.31426 17.5287 8.56264 17.8053C8.79594 18.0651 9.20326 18.0646 9.43613 17.8053C9.68451 17.5287 15.5183 10.9798 15.5183 6.51888C15.5182 2.92437 12.5939 0 8.99939 0ZM8.99939 9.79871C7.19088 9.79871 5.71959 8.32739 5.71959 6.51888C5.71959 4.71037 7.19091 3.23909 8.99939 3.23909C10.8079 3.23909 12.2791 4.71041 12.2791 6.51892C12.2791 8.32743 10.8079 9.79871 8.99939 9.79871Z"></path>
                                </svg>
                                <ul class="location-list">
                                    @if(!empty($tour->places))
                                        <li><a href="#">{{ @$tour->places }}</a></li>
                                    @endif
                                    @if(!empty($tour->duration))
                                        <li><a href="#">{{ @$tour->duration }}</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                     <div class="package-card-content">
                        <div class="card-content-top">
                            <h5><a href="{{ route('tour.detail', @$tour->slug) }}">{{ @$tour->name }}</a></h5>
                            <div class="location-area">
                                <ul class="location-list scrollTextAni">
                                    <li><a href="#">Pick-Up &amp; Drop-Off</a></li>
                                    <li><a href="#">Dune Bashing</a></li>
                                    <li><a href="#">SandBoarding</a></li>
                                    <li><a href="#">Camel Riding</a></li>
                                    <li><a href="#">Live Entertainment</a></li>
                                    <li><a href="#">BBQ Dinner</a></li>
                                </ul>
                            </div>
                        </div>
                         <div class="card-content-bottom">
                             <div class="price-area">
                                 <h6>Starting Form:</h6>
                                 @if(@$tour->child_price > 1)
                                    <span>{{ single_price(@$tour->child_price) }}</span>
                                @else
                                    <span>{{ single_price(@$tour->sell_price) }}</span>
                                @endif
                                 <p>TAXES INCL/PERS</p>
                             </div>
                             <a href="{{ route('tour.detail', @$tour->slug) }}" class="primary-btn2">Book a Trip</a>
                         </div>
                     </div>
                 </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12">
                <nav class="inner-pagination-area">
                    <ul class="pagination-list">
                        <li>
                            <a href="#" class="shop-pagi-btn"><i class="bi bi-chevron-left"></i></a>
                        </li>
                        <li>
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#" class="active">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#"><i class="bi bi-three-dots"></i></a>
                        </li>
                        <li>
                            <a href="#">6</a>
                        </li>
                        <li>
                            <a href="#" class="shop-pagi-btn"><i class="bi bi-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Package Grid section -->
@endif

@endsection
