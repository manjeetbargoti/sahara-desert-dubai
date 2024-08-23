@extends('admin.layouts.main')
@section('content')
    <div class="components-preview wide-lg mx-auto">
        <div class="nk-block nk-block-lg">
            <div class="row g-gs">
                <div class="col-lg-12 mx-auto">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-head">
                                <h5 class="card-title">Add New Tour</h5>
                            </div>
                            <form action="{{ route('admin.tours.create') }}" method="POST" class="gy-3">
                                @csrf
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="tourTitle">Tour Title</label>
                                            <span class="form-note">Please enter Tour Title.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="tourTitle">
                                                @error('name')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Category</label>
                                            <span class="form-note">Please select a Category.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <select name="category" class="form-select @error('category') is-invalid @enderror" data-search="on" data-placeholder="Please Select a Role">
                                                    <option value="">Please Select a Category</option>
                                                    <option value="1">Category 1</option>
                                                    <option value="2">Category 2</option>
                                                    @foreach ($tourCategories as $tourCategory)
                                                    <option value="{{ @$tourCategory->id }}">{{ @$tourCategory->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="tourSubtitle">Subtitle</label>
                                            <span class="form-note">Please enter Tour Subtitle.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="subtitle" value="{{ old('subtitle') }}" class="form-control @error('subtitle') is-invalid @enderror" id="tourSubtitle">
                                                @error('subtitle')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="orgPrice">Original Price <small class="text-info"><i>(including vat)</i></small></label>
                                            <span class="form-note">Maximum price without discount.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="number" name="org_price" value="{{ old('org_price') }}" class="form-control @error('org_price') is-invalid @enderror" min="0.00" step="0.10" id="orgPrice">
                                                @error('org_price')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="salePrice">Sale Price <small class="text-info"><i>(including vat)</i></small></label>
                                            <span class="form-note">Sale price after discount.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="number" name="sale_price" value="{{ old('sale_price') }}" class="form-control @error('sale_price') is-invalid @enderror" min="0.00" step="0.10" id="salePrice">
                                                @error('sale_price')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="childPrice">Child Price <small class="text-info"><i>(including vat)</i></small></label>
                                            <span class="form-note">Child price after discount  (age 3-8 year).</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="number" name="child_price" value="{{ old('child_price') }}" class="form-control @error('child_price') is-invalid @enderror" min="0.00" step="0.10" id="childPrice">
                                                @error('child_price')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="infantPrice">Infant Price <small class="text-info"><i>(including vat)</i></small></label>
                                            <span class="form-note">Infant price after discount (age 1-2 year).</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="number" name="infant_price" value="{{ old('infant_price') }}" class="form-control @error('infant_price') is-invalid @enderror" min="0.00" step="0.10" id="infantPrice">
                                                @error('infant_price')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="shortDescription">Short Description</label>
                                            <span class="form-note">Write short description.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror summernote-basic" id="shortDescription" rows="10">{{ old('short_description') }}</textarea>
                                                @error('short_description')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="tourDescription">Tour Description</label>
                                            <span class="form-note">Write tour description.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <textarea name="description" class="form-control @error('description') is-invalid @enderror summernote-basic" id="tourDescription" rows="10">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="whatThisTour">What This Tour</label>
                                            <span class="form-note">Write what is in this tour.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <textarea name="what_this_tour" class="form-control @error('what_this_tour') is-invalid @enderror summernote-basic" id="whatThisTour" rows="10">{{ old('what_this_tour') }}</textarea>
                                                @error('what_this_tour')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="importantInformation">Important Information</label>
                                            <span class="form-note">Write any Important Information about this tour.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <textarea name="important_information" class="form-control @error('important_information') is-invalid @enderror summernote-basic" id="importantInformation" rows="10">{{ old('important_information') }}</textarea>
                                                @error('important_information')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="itenararyDescription">Itenarary Description</label>
                                            <span class="form-note">Write itenarary description.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <textarea name="itenarary_description" class="form-control @error('itenarary_description') is-invalid @enderror summernote-basic" id="itenararyDescription" rows="10">{{ old('itenarary_description') }}</textarea>
                                                @error('itenarary_description')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="usefulInformation">Useful Information</label>
                                            <span class="form-note">Write any useful information.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <textarea name="useful_information" class="form-control @error('useful_information') is-invalid @enderror summernote-basic" id="usefulInformation" rows="10">{{ old('useful_information') }}</textarea>
                                                @error('useful_information')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="faqDetails">FAQ Details</label>
                                            <span class="form-note">Write FAQ's.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <textarea name="faq_details" class="form-control @error('faq_details') is-invalid @enderror summernote-basic" id="faqDetails" rows="10">{{ old('faq_details') }}</textarea>
                                                @error('faq_details')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="termsCondition">Terms & Condition</label>
                                            <span class="form-note">Write tour terms & condition.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <textarea name="terms_condition" class="form-control @error('terms_condition') is-invalid @enderror summernote-basic" id="termsCondition" rows="10">{{ old('terms_condition') }}</textarea>
                                                @error('terms_condition')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="cancellationPolicyName">Cancellation Policy Name</label>
                                            <span class="form-note">Write cancellation policy name.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <textarea name="cancellation_policy_name" class="form-control @error('cancellation_policy_name') is-invalid @enderror summernote-basic" id="cancellationPolicyName" rows="10">{{ old('cancellation_policy_name') }}</textarea>
                                                @error('cancellation_policy_name')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="cancellationPolicyDescription">Cancellation Policy Description</label>
                                            <span class="form-note">Write cancellation policy description.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <textarea name="cancellation_policy_description" class="form-control @error('cancellation_policy_description') is-invalid @enderror summernote-basic" id="cancellationPolicyDescription" rows="10">{{ old('cancellation_policy_description') }}</textarea>
                                                @error('cancellation_policy_description')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="childCacellationPolicyName">Child Cacellation Policy Name</label>
                                            <span class="form-note">Write Child Cacellation Policy Name.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <textarea name="child_cacellation_policy_name" class="form-control @error('child_cacellation_policy_name') is-invalid @enderror summernote-basic" id="childCacellationPolicyName" rows="10">{{ old('child_cacellation_policy_name') }}</textarea>
                                                @error('child_cacellation_policy_name')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="childCacellationPolicyDescription">Child Cacellation Policy Description</label>
                                            <span class="form-note">Write Child Cacellation Policy Description.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <textarea name="child_cacellation_policy_description" class="form-control @error('child_cacellation_policy_description') is-invalid @enderror summernote-basic" id="childCacellationPolicyDescription" rows="10">{{ old('child_cacellation_policy_description') }}</textarea>
                                                @error('child_cacellation_policy_description')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Upload Images --}}
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="thumbnailImage">Thumbnail Image</label>
                                            <span class="form-note">Please upload thumbnail image.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="file" name="thumbnail_img" value="{{ old('thumbnail_img') }}" class="form-control @error('thumbnail_img') is-invalid @enderror" id="thumbnailImage">
                                                @error('thumbnail_img')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="galleryImages">Gallery Images</label>
                                            <span class="form-note">Please upload Gallery image.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="file" multiple name="photos[]" value="{{ old('photos') }}" class="form-control @error('photos') is-invalid @enderror" id="galleryImages">
                                                @error('photos')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="bannerImage">Banner</label>
                                            <span class="form-note">Please upload banner image.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="file" name="banner" value="{{ old('banner') }}" class="form-control @error('banner') is-invalid @enderror" id="bannerImage">
                                                @error('banner')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="reportingTime">Reporting Time</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="time" name="reporting_time" value="{{ old('reporting_time') }}" class="form-control @error('reporting_time') is-invalid @enderror" id="reportingTime">
                                                @error('reporting_time')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="startTime">Start Time</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="time" name="start_time" value="{{ old('start_time') }}" class="form-control @error('start_time') is-invalid @enderror" id="startTime">
                                                @error('start_time')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="duration">Duration</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="duration" value="{{ old('duration') }}" class="form-control @error('duration') is-invalid @enderror" id="duration">
                                                @error('duration')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="season">Season</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="season" value="{{ old('season') }}" class="form-control @error('season') is-invalid @enderror" id="season">
                                                @error('season')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="maxGuest">Max Guest</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="max_guest" value="{{ old('max_guest') }}" class="form-control @error('max_guest') is-invalid @enderror" id="maxGuest">
                                                @error('max_guest')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="departurePoint">Departure Point</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="departure_point" value="{{ old('departure_point') }}" class="form-control @error('departure_point') is-invalid @enderror" id="departurePoint">
                                                @error('departure_point')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="childAge">Child Age</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="child_age" value="{{ old('child_age') }}" class="form-control @error('child_age') is-invalid @enderror" id="childAge">
                                                @error('child_age')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="infantAge">Infant Age</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="infant_age" value="{{ old('infant_age') }}" class="form-control @error('infant_age') is-invalid @enderror" id="infantAge">
                                                @error('infant_age')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="infantCount">Infant Count</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="infant_count" value="{{ old('infant_count') }}" class="form-control @error('infant_count') is-invalid @enderror" id="infantCount">
                                                @error('infant_count')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="isSlot">is Slot</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="is_slot" value="{{ old('is_slot') }}" class="form-control @error('is_slot') is-invalid @enderror" id="isSlot">
                                                @error('is_slot')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="onlyChild">Only Child</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="only_child" value="{{ old('only_child') }}" class="form-control @error('only_child') is-invalid @enderror" id="onlyChild">
                                                @error('only_child')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Location Info --}}
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="latitude">Latitude</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="latitude" value="{{ old('latitude') }}" class="form-control @error('latitude') is-invalid @enderror" id="latitude">
                                                @error('latitude')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="longitude">Longitude</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="longitude" value="{{ old('longitude') }}" class="form-control @error('longitude') is-invalid @enderror" id="longitude">
                                                @error('longitude')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="googleMap">Google Map</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="google_map" value="{{ old('google_map') }}" class="form-control @error('google_map') is-invalid @enderror" id="googleMap">
                                                @error('google_map')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="meal">Meal Available</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <select name="meal" id="meal" class="form-select @error('meal') is-invalid @enderror" data-search="off" data-placeholder="Please Select">
                                                    <option value="">Please Select</option>
                                                    <option value="1">Yes, Meal will br provided.</option>
                                                    <option value="0">No, Meal not be available.</option>
                                                </select>
                                                @error('meal')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="status">Status</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" data-search="off" data-placeholder="Please Select">
                                                    <option value="">Please Select</option>
                                                    <option value="1">Enable</option>
                                                    <option value="0">Disable</option>
                                                </select>
                                                @error('status')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="featured">Featured</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <select name="featured" id="featured" class="form-select @error('featured') is-invalid @enderror" data-search="off" data-placeholder="Please Select">
                                                    <option value="">Please Select</option>
                                                    <option value="1">Enable</option>
                                                    <option value="0">Disable</option>
                                                </select>
                                                @error('featured')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="adminApproval">Admin Approval</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <select name="admin_approval" id="adminApproval" class="form-select @error('admin_approval') is-invalid @enderror" data-search="off" data-placeholder="Please Select">
                                                    <option value="">Please Select</option>
                                                    <option value="1">Approved</option>
                                                    <option value="0">Pending</option>
                                                    <option value="2">Rejected</option>
                                                </select>
                                                @error('admin_approval')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-lg-8 offset-lg-4">
                                        <div class="form-group mt-2">
                                            <button type="submit" class="btn btn-lg btn-primary">Save Tour</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

