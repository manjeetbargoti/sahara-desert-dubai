@extends('frontend.seller.layouts.main')
@section('content')
    <div class="components-preview wide-lg mx-auto">
        <div class="nk-block nk-block-lg">
            <div class="row g-gs">
                <div class="col-lg-8 mx-auto">
                    @if(session('success'))
                    <div class="alert alert-success alert-icon">
                        <em class="icon ni ni-check-circle"></em> {{ session('success') }}
                    </div>
                    @endif

                    {{-- General Setting --}}
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-head">
                                <h5 class="card-title">Profile</h5>
                            </div>
                            <form action="{{ route('vendor.settings.profile.edit') }}" method="POST" class="gy-3" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="vendorName">Contact Person Name</label>
                                            <span class="form-note">Please contact person name.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="name" value="{{ @$vendor->name ?? old('name') }}" class="form-control @error('name') is-invalid @enderror" id="vendorName">
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
                                            <label class="form-label" for="vendorPhone">Vendor Phone</label>
                                            <span class="form-note">Please vendor phone number.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="phone" value="{{ @$vendor->phone ?? old('phone') }}" class="form-control @error('phone') is-invalid @enderror" id="vendorPhone">

                                                <input type="hidden" name="country_code" value="">
                                                <input type="hidden" name="country_iso2" value="{{ old('country_iso2') }}">
                                                @error('phone')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="vendorEmail">Vendor Email</label>
                                            <span class="form-note">Please enter vendor email address.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="email" name="email" value="{{ @$vendor->email ?? old('email') }}" class="form-control @error('email') is-invalid @enderror" id="vendorEmail">
                                                @error('email')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="vendorAddress">Address</label>
                                            <span class="form-note">Please add  address.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="vendorAddress">{{ @$vendor->address ?? old('address') }}</textarea>
                                                @error('address')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="vendorCountry">Country</label>
                                            <span class="form-note">Please enter country name.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="country" value="{{ @$vendor->country ?? old('country') }}" class="form-control @error('country') is-invalid @enderror" id="vendorCountry">
                                                @error('country')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="vendorState">State</label>
                                            <span class="form-note">Please enter state name.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="state" value="{{ @$vendor->state ?? old('state') }}" class="form-control @error('state') is-invalid @enderror" id="vendorState">
                                                @error('state')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="vendorCity">City</label>
                                            <span class="form-note">Please enter city name.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="city" value="{{ @$vendor->city ?? old('city') }}" class="form-control @error('city') is-invalid @enderror" id="vendorCity">
                                                @error('city')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="vendorPostalCode">Postal Code</label>
                                            <span class="form-note">Please enter postal code.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="postal_code" value="{{ @$vendor->postal_code ?? old('postal_code') }}" class="form-control @error('postal_code') is-invalid @enderror" id="vendorPostalCode">
                                                @error('postal_code')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-lg-8 offset-lg-4">
                                        <div class="form-group mt-2">
                                            <button type="submit" class="btn btn-lg btn-primary">Update Profile</button>
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
            $('#websiteLogo').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                $('#websiteLogoPreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>

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
@endsection

