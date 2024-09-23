@extends('admin.layouts.main')
@section('content')
    <div class="components-preview wide-lg mx-auto">
        <div class="nk-block nk-block-lg">
            <div class="row g-gs">
                <div class="col-lg-12 mx-auto">
                    @if(session('error'))
                    <div class="alert alert-danger alert-icon">
                        <em class="icon ni ni-check-circle"></em> {{ session('error') }}
                    </div>
                    @endif
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-head">
                                <h5 class="card-title">Edit Tour</h5>
                            </div>
                            <form action="{{ route('admin.tours.edit', $tour->id) }}" method="POST" class="gy-3" enctype="multipart/form-data">
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
                                                <input type="text" name="name" value="{{ @$tour->name ?? old('name') }}" class="form-control @error('name') is-invalid @enderror" id="tourTitle">
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
                                            <label class="form-label">Tour Transfer Type</label>
                                            <span class="form-note">Please select a tour transfer type.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <select name="type" class="form-select @error('type') is-invalid @enderror" id="tourTransferType" data-search="on" data-placeholder="Please select tour transfer type">
                                                    <option value=""></option>
                                                    <option value="1" {{ $tour->type == 1 ? 'selected' : ''}}>Shared Transfer</option>
                                                    <option value="2" {{ $tour->type == 2 ? 'selected' : ''}}>Private Transfer</option>
                                                    <option value="3" {{ $tour->type == 3 ? 'selected' : ''}}>Without Transfer</option>
                                                </select>
                                                @error('type')
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
                                                    <option value=""></option>
                                                    @foreach ($tourCategories as $tourCategory)
                                                    <option value="{{ @$tourCategory->id }}" {{ $tour->category == $tourCategory->id ? 'selected' : '' }}>{{ @$tourCategory->name }}</option>
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
                                                <input type="text" name="subtitle" value="{{ $tour->subtitle ?? old('subtitle') }}" class="form-control @error('subtitle') is-invalid @enderror" id="tourSubtitle">
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
                                                <input type="number" name="org_price" value="{{ $tour->original_price ?? old('org_price') }}" class="form-control @error('org_price') is-invalid @enderror" min="0.00" step="0.10" id="orgPrice">
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
                                                <input type="number" name="sale_price" value="{{ $tour->sell_price ?? old('sale_price') }}" class="form-control @error('sale_price') is-invalid @enderror" min="0.00" step="0.10" id="salePrice">
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
                                                <input type="number" name="child_price" value="{{ $tour->child_price ?? old('child_price') }}" class="form-control @error('child_price') is-invalid @enderror" min="0.00" step="0.10" id="childPrice">
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
                                                <input type="number" name="infant_price" value="{{ $tour->infant_price ?? old('infant_price') }}" class="form-control @error('infant_price') is-invalid @enderror" min="0.00" step="0.10" id="infantPrice">
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
                                            <label class="form-label" for="fixedCharges">Fixed Charges Amount <small class="text-info"><i>(including vat)</i></small></label>
                                            <span class="form-note">Enter fixed charges.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="number" name="fixed_charges" value="{{ @$tour->fixed_charges ?? old('fixed_charges') }}" class="form-control @error('fixed_charges') is-invalid @enderror" min="0.00" step="0.10" id="fixedCharges">
                                                @error('fixed_charges')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="fixedChargesText">Fixed Charges Text <small class="text-info"><i>(including vat)</i></small></label>
                                            <span class="form-note">Enter fixed charges text.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="fixed_charges_text" value="{{ @$tour->fixed_charges_text ?? old('fixed_charges_text') }}" class="form-control @error('fixed_charges_text') is-invalid @enderror" min="0.00" step="0.10" id="fixedChargesText">
                                                @error('fixed_charges_text')
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
                                                <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror summernote-basic" id="shortDescription" rows="10">{{ $tour->short_description ?? old('short_description') }}</textarea>
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
                                                <textarea name="description" class="form-control @error('description') is-invalid @enderror summernote-basic" id="tourDescription" rows="10">{{ $tour->description ?? old('description') }}</textarea>
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
                                            <label class="form-label" for="tourInclusion">Tour Inclusion</label>
                                            <span class="form-note">Write is included in this tour?</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <textarea name="tour_inclusion" class="form-control @error('tour_inclusion') is-invalid @enderror summernote-basic" id="tourInclusion" rows="10">{{ $tour->tour_inclusion ?? old('tour_inclusion') }}</textarea>
                                                @error('tour_inclusion')
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
                                                <textarea name="what_this_tour" class="form-control @error('what_this_tour') is-invalid @enderror summernote-basic" id="whatThisTour" rows="10">{{ $tour->what_this_tour ?? old('what_this_tour') }}</textarea>
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
                                                <textarea name="important_information" class="form-control @error('important_information') is-invalid @enderror summernote-basic" id="importantInformation" rows="10">{{ $tour->important_information ?? old('important_information') }}</textarea>
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
                                                <textarea name="itenarary_description" class="form-control @error('itenarary_description') is-invalid @enderror summernote-basic" id="itenararyDescription" rows="10">{{ $tour->itenarary_description ?? old('itenarary_description') }}</textarea>
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
                                                <textarea name="useful_information" class="form-control @error('useful_information') is-invalid @enderror summernote-basic" id="usefulInformation" rows="10">{{ $tour->useful_information ?? old('useful_information') }}</textarea>
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
                                                <textarea name="faq_details" class="form-control @error('faq_details') is-invalid @enderror summernote-basic" id="faqDetails" rows="10">{{ $tour->faq_details ?? old('faq_details') }}</textarea>
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
                                                <textarea name="terms_condition" class="form-control @error('terms_condition') is-invalid @enderror summernote-basic" id="termsCondition" rows="10">{{ $tour->terms_condition ?? old('terms_condition') }}</textarea>
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
                                                <textarea name="cancellation_policy_name" class="form-control @error('cancellation_policy_name') is-invalid @enderror summernote-basic" id="cancellationPolicyName" rows="10">{{ $tour->cancellation_policy_name ?? old('cancellation_policy_name') }}</textarea>
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
                                                <textarea name="cancellation_policy_description" class="form-control @error('cancellation_policy_description') is-invalid @enderror summernote-basic" id="cancellationPolicyDescription" rows="10">{{ $tour->cancellation_policy_description ?? old('cancellation_policy_description') }}</textarea>
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
                                                <textarea name="child_cacellation_policy_name" class="form-control @error('child_cacellation_policy_name') is-invalid @enderror summernote-basic" id="childCacellationPolicyName" rows="10">{{ $tour->child_cacellation_policy_name ?? old('child_cacellation_policy_name') }}</textarea>
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
                                                <textarea name="child_cacellation_policy_description" class="form-control @error('child_cacellation_policy_description') is-invalid @enderror summernote-basic" id="childCacellationPolicyDescription" rows="10">{{ $tour->child_cacellation_policy_description ?? old('child_cacellation_policy_description') }}</textarea>
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
                                            <span class="form-note">Please upload thumbnail image (300x230).</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div class="custom-file">
                                                    <input type="file" name="thumbnail_img" value="{{ old('thumbnail_img') }}" class="custom-file-input @error('thumbnail_img') is-invalid @enderror" id="thumbnailImage">
                                                    <input type="hidden" name="thumbnail_img_old" value="{{ $tour->thumbnail_img }}">
                                                    <label class="custom-file-label" for="thumbnailImage">Choose file</label>
                                                </div>
                                                @error('thumbnail_img')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                                <div class="image-preview mt-1">
                                                    <img id="thumbImagePreview" class="img-thumbnail" src="{{ uploaded_asset($tour->thumbnail_img) }}" alt="preview image" width="60">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="galleryImages">Gallery Images</label>
                                            <span class="form-note">Please upload Gallery image (960x490).</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div class="custom-file">
                                                    <input type="file" name="photos" value="{{ old('photos') }}" class="custom-file-input @error('photos') is-invalid @enderror" id="galleryImages">
                                                    <input type="hidden" name="photos_old" value="{{ $tour->photos }}">
                                                    <label class="custom-file-label" for="galleryImages">Choose file</label>
                                                </div>
                                                @error('photos')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                                <div class="image-preview mt-1">
                                                    <img id="gallImagePreview" class="img-thumbnail" src="{{ uploaded_asset($tour->photos) }}" alt="preview image" width="60">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="bannerImage">Banner</label>
                                            <span class="form-note">Please upload banner image (1920x600).</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div class="custom-file">
                                                    <input type="file" name="banner" value="{{ old('banner') }}" class="custom-file-input @error('banner') is-invalid @enderror" id="bannerImage">
                                                    <input type="hidden" name="banner_old" value="{{ $tour->banner }}">
                                                    <label class="custom-file-label" for="bannerImage">Choose file</label>
                                                </div>
                                                @error('banner')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                                <div class="image-preview mt-1">
                                                    <img id="bannerImagePreview" class="img-thumbnail" src="{{ uploaded_asset($tour->banner) }}" alt="preview image" width="120">
                                                </div>
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
                                                <input type="time" name="reporting_time" value="{{ $tour->reporting_time ?? old('reporting_time') }}" class="form-control @error('reporting_time') is-invalid @enderror" id="reportingTime">
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
                                                <input type="time" name="start_time" value="{{ $tour->start_time ?? old('start_time') }}" class="form-control @error('start_time') is-invalid @enderror" id="startTime">
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
                                                <input type="text" name="duration" value="{{ $tour->duration ?? old('duration') }}" class="form-control @error('duration') is-invalid @enderror" id="duration">
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
                                                <input type="text" name="season" value="{{ $tour->season ?? old('season') }}" class="form-control @error('season') is-invalid @enderror" id="season">
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
                                                <input type="text" name="max_guest" value="{{ $tour->max_guest ?? old('max_guest') }}" class="form-control @error('max_guest') is-invalid @enderror" id="maxGuest">
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
                                                <input type="text" name="departure_point" value="{{ $tour->departure_point ?? old('departure_point') }}" class="form-control @error('departure_point') is-invalid @enderror" id="departurePoint">
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
                                                <input type="text" name="child_age" value="{{ $tour->child_age ?? old('child_age') }}" class="form-control @error('child_age') is-invalid @enderror" id="childAge">
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
                                                <input type="text" name="infant_age" value="{{ $tour->infant_age ?? old('infant_age') }}" class="form-control @error('infant_age') is-invalid @enderror" id="infantAge">
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
                                                <input type="text" name="infant_count" value="{{ $tour->infant_count ?? old('infant_count') }}" class="form-control @error('infant_count') is-invalid @enderror" id="infantCount">
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
                                            <label class="form-label" for="minAge">Minimum Age</label>
                                            {{-- <span class="form-note">Please upload banner image.</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="min_age" value="{{ @$tour->min_age ?? old('min_age') }}" class="form-control @error('min_age') is-invalid @enderror" id="minAge">
                                                @error('min_age')
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
                                                <select name="is_slot" class="form-select form-control @error('is_slot') is-invalid @enderror" data-search="off" id="isSlot" data-placeholder="Please select slot option">
                                                    <option value=""></option>
                                                    <option value="1" {{ $tour->is_slot == 1 ? 'selected' : '' }}>Yes</option>
                                                    <option value="0" {{ $tour->is_slot == 0 ? 'selected' : '' }}>No</option>
                                                </select>
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
                                            <label class="form-label" for="slotList">Slots</label>
                                            <span class="form-note">Please select slot.</span>
                                        </div>
                                    </div>
                                    @php
                                        $selected_slots = explode(',', $tour->slots);
                                    @endphp
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <select name="slots[]" multiple class="form-select form-control @error('slots') is-invalid @enderror time-picker" data-search="off" id="slotList" data-placeholder="Please select slot option">
                                                    <option value=""></option>
                                                    <option value="00:00" {{ in_array('00:00', $selected_slots) ? 'selected' : '' }}>00:00</option>
                                                    <option value="00:30" {{ in_array('00:30', $selected_slots) ? 'selected' : '' }}>00:30</option>
                                                    <option value="1:00" {{ in_array('1:00', $selected_slots) ? 'selected' : '' }}>1:00</option>
                                                    <option value="1:30" {{ in_array('1:30', $selected_slots) ? 'selected' : '' }}>1:30</option>
                                                    <option value="2:00" {{ in_array('2:00', $selected_slots) ? 'selected' : '' }}>2:00</option>
                                                    <option value="2:30" {{ in_array('2:30', $selected_slots) ? 'selected' : '' }}>2:30</option>
                                                    <option value="3:00" {{ in_array('3:00', $selected_slots) ? 'selected' : '' }}>3:00</option>
                                                    <option value="3:30" {{ in_array('3:30', $selected_slots) ? 'selected' : '' }}>3:30</option>
                                                    <option value="4:00" {{ in_array('4:00', $selected_slots) ? 'selected' : '' }}>4:00</option>
                                                    <option value="4:30" {{ in_array('4:30', $selected_slots) ? 'selected' : '' }}>4:30</option>
                                                    <option value="5:00" {{ in_array('5:00', $selected_slots) ? 'selected' : '' }}>5:00</option>
                                                    <option value="5:30" {{ in_array('5:30', $selected_slots) ? 'selected' : '' }}>5:30</option>
                                                    <option value="6:00" {{ in_array('6:00', $selected_slots) ? 'selected' : '' }}>6:00</option>
                                                    <option value="6:30" {{ in_array('6:30', $selected_slots) ? 'selected' : '' }}>6:30</option>
                                                    <option value="7:00" {{ in_array('7:00', $selected_slots) ? 'selected' : '' }}>7:00</option>
                                                    <option value="7:30" {{ in_array('7:30', $selected_slots) ? 'selected' : '' }}>7:30</option>
                                                    <option value="8:00" {{ in_array('8:00', $selected_slots) ? 'selected' : '' }}>8:00</option>
                                                    <option value="8:30" {{ in_array('8:30', $selected_slots) ? 'selected' : '' }}>8:30</option>
                                                    <option value="9:00" {{ in_array('9:00', $selected_slots) ? 'selected' : '' }}>9:00</option>
                                                    <option value="9:30" {{ in_array('9:30', $selected_slots) ? 'selected' : '' }}>9:30</option>
                                                    <option value="10:00" {{ in_array('10:00', $selected_slots) ? 'selected' : '' }}>10:00</option>
                                                    <option value="10:30" {{ in_array('10:30', $selected_slots) ? 'selected' : '' }}>10:30</option>
                                                    <option value="11:00" {{ in_array('11:00', $selected_slots) ? 'selected' : '' }}>11:00</option>
                                                    <option value="11:30" {{ in_array('11:30', $selected_slots) ? 'selected' : '' }}>11:30</option>
                                                    <option value="12:00" {{ in_array('12:00', $selected_slots) ? 'selected' : '' }}>12:00</option>
                                                    <option value="12:30" {{ in_array('12:30', $selected_slots) ? 'selected' : '' }}>12:30</option>
                                                    <option value="13:00" {{ in_array('13:00', $selected_slots) ? 'selected' : '' }}>13:00</option>
                                                    <option value="13:30" {{ in_array('13:30', $selected_slots) ? 'selected' : '' }}>13:30</option>
                                                    <option value="14:00" {{ in_array('14:00', $selected_slots) ? 'selected' : '' }}>14:00</option>
                                                    <option value="14:30" {{ in_array('14:30', $selected_slots) ? 'selected' : '' }}>14:30</option>
                                                    <option value="15:00" {{ in_array('15:00', $selected_slots) ? 'selected' : '' }}>15:00</option>
                                                    <option value="15:30" {{ in_array('15:30', $selected_slots) ? 'selected' : '' }}>15:30</option>
                                                    <option value="16:00" {{ in_array('16:00', $selected_slots) ? 'selected' : '' }}>16:00</option>
                                                    <option value="16:30" {{ in_array('16:30', $selected_slots) ? 'selected' : '' }}>16:30</option>
                                                    <option value="17:00" {{ in_array('17:00', $selected_slots) ? 'selected' : '' }}>17:00</option>
                                                    <option value="17:30" {{ in_array('17:30', $selected_slots) ? 'selected' : '' }}>17:30</option>
                                                    <option value="18:00" {{ in_array('18:00', $selected_slots) ? 'selected' : '' }}>18:00</option>
                                                    <option value="18:30" {{ in_array('18:30', $selected_slots) ? 'selected' : '' }}>18:30</option>
                                                    <option value="19:00" {{ in_array('19:00', $selected_slots) ? 'selected' : '' }}>19:00</option>
                                                    <option value="19:30" {{ in_array('19:30', $selected_slots) ? 'selected' : '' }}>19:30</option>
                                                    <option value="20:00" {{ in_array('20:00', $selected_slots) ? 'selected' : '' }}>20:00</option>
                                                    <option value="20:30" {{ in_array('20:30', $selected_slots) ? 'selected' : '' }}>20:30</option>
                                                    <option value="21:00" {{ in_array('21:00', $selected_slots) ? 'selected' : '' }}>21:00</option>
                                                    <option value="21:30" {{ in_array('21:30', $selected_slots) ? 'selected' : '' }}>21:30</option>
                                                    <option value="22:00" {{ in_array('22:00', $selected_slots) ? 'selected' : '' }}>22:00</option>
                                                    <option value="22:30" {{ in_array('22:30', $selected_slots) ? 'selected' : '' }}>22:30</option>
                                                    <option value="23:00" {{ in_array('23:00', $selected_slots) ? 'selected' : '' }}>23:00</option>
                                                    <option value="23:30" {{ in_array('23:30', $selected_slots) ? 'selected' : '' }}>23:30</option>
                                                </select>
                                                @error('slots')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="cutOffTime">Cut-Off Time</label>
                                            <span class="form-note">Please add cut-off time in hours.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="cut_off_time" value="{{ $tour->cut_off_time ?? old('cut_off_time') }}" class="form-control @error('cut_off_time') is-invalid @enderror" id="cutOffTime">
                                                @error('cut_off_time')
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
                                                <input type="text" name="only_child" value="{{ $tour->only_child ?? old('only_child') }}" class="form-control @error('only_child') is-invalid @enderror" id="onlyChild">
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
                                                <input type="text" name="latitude" value="{{ $tour->latitude ?? old('latitude') }}" class="form-control @error('latitude') is-invalid @enderror" id="latitude">
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
                                                <input type="text" name="longitude" value="{{ $tour->longitude ?? old('longitude') }}" class="form-control @error('longitude') is-invalid @enderror" id="longitude">
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
                                                <input type="text" name="google_map" value="{{ $tour->google_map ?? old('google_map') }}" class="form-control @error('google_map') is-invalid @enderror" id="googleMap">
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
                                                    <option value="1" {{ $tour->meal == 1 ? 'selected' : '' }}>Yes, Meal will be provided.</option>
                                                    <option value="0" {{ $tour->meal == 0 ? 'selected' : '' }}>No, Meal will not be available.</option>
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
                                                    <option value="1" {{ $tour->status == 1 ? 'selected' : '' }}>Enable</option>
                                                    <option value="0" {{ $tour->status == 0 ? 'selected' : '' }}>Disable</option>
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
                                                    <option value="1" {{ $tour->featured == 1 ? 'selected' : '' }}>Enable</option>
                                                    <option value="0" {{ $tour->featured == 0 ? 'selected' : '' }}>Disable</option>
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
                                                    <option value="1" {{ $tour->admin_approval == 1 ? 'selected' : '' }}>Approved</option>
                                                    <option value="0" {{ $tour->admin_approval == 0 ? 'selected' : '' }}>Pending</option>
                                                    <option value="2" {{ $tour->admin_approval == 2 ? 'selected' : '' }}>Rejected</option>
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
                                            <button type="submit" class="btn btn-lg btn-primary">Update Tour</button>
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

@section('custom-script')
    <script type="text/javascript">
        $(document).ready(function (e) {
            $('#thumbnailImage').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                $('#thumbImagePreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#galleryImages').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                $('#gallImagePreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#bannerImage').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                $('#bannerImagePreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection