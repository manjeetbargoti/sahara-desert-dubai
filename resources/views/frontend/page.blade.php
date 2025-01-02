@extends('frontend.layouts.main')

@section('content')
            <!-- Hero Section -->
            <div class="bg-img-hero text-center mb-5 mb-lg-8" style="background-image: url({{ asset('site/img/all-packages.png')}})">
                <div class="container space-top-xl-3 pt-10 py-xl-0">
                    <div class="row justify-content-center py-xl-4">
                        <!-- Info -->
                        <div class="py-xl-10 py-5">
                            <h1 class="font-size-40 font-size-xs-30 text-white font-weight-bold mb-0">{{ $page->title }}</h1>
                            
                            <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-no-gutter justify-content-center mb-0">
                                <li class="breadcrumb-item font-size-14"> <a class="text-white" href="../html/index.html">Home</a> </li>
                                <li class="breadcrumb-item custom-breadcrumb-item font-size-14 text-white active" aria-current="page">{{ $page->title }}</li>
                            </ol>
                            </nav>
                        </div>
                        <!-- End Info -->
                    </div>
                </div>
            </div>
            <!-- End Hero Section -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-12">
                        <div class="d-block d-md-flex flex-center-between align-items-start mb-3">
                            <div class="mb-1">
                                <div class="mb-2 mb-md-0">
                                    <h4 class="font-size-50 font-weight-bold mb-1 mr-3 text-uppercase line-height-1">{{ __($page->title) }}</h4>
                                </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="border-bottom position-relative" id="tour">
                            @if(!empty($page->description))
                                <div class="col-md-12 mb-4">
                                    {!! @$page->description !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
@endsection
