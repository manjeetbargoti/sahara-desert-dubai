@extends('frontend.seller.layouts.main')
@section('content')
    <div class="components-preview wide-lg mx-auto">
        <div class="nk-block nk-block-lg">
            <div class="row g-gs">
                <div class="col-lg-8 mx-auto">

                    {{-- General Setting --}}
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-head">
                                <h5 class="card-title">Shop</h5>
                                
                    @if(session('success'))
                    <div class="alert alert-success alert-icon">
                        <em class="icon ni ni-check-circle"></em> {{ session('success') }}
                    </div>
                    @endif
                            </div>
                            <form action="{{ route('vendor.settings.shop.edit') }}" method="POST" class="gy-3" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="shopName">Shop Name</label>
                                            <span class="form-note">Please shop name.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="name" value="{{ @$shop->name ?? old('name') }}" class="form-control @error('name') is-invalid @enderror" id="shopName">
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
                                            <label class="form-label" for="shopPhone">Shop Phone</label>
                                            <span class="form-note">Please shop phone number.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="phone" value="{{ @$shop->phone ?? old('phone') }}" class="form-control @error('phone') is-invalid @enderror" id="shopPhone">

                                                <input type="hidden" name="country_code" value="{{ old('country_code') }}">
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
                                            <label class="form-label" for="shopEmail">Shop Email</label>
                                            <span class="form-note">Please enter shop email address.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="email" name="email" value="{{ @$shop->email ?? old('email') }}" class="form-control @error('email') is-invalid @enderror" id="shopEmail">
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
                                            <label class="form-label" for="shopAddress">Address</label>
                                            <span class="form-note">Please add shop address.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="shopAddress">{{ @$shop->address ?? old('address') }}</textarea>
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
                                            <label class="form-label" for="shopCountry">Country</label>
                                            <span class="form-note">Please enter country name.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="country" value="{{ @$shop->country ?? old('country') }}" class="form-control @error('country') is-invalid @enderror" id="shopCountry">
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
                                            <label class="form-label" for="shopState">State</label>
                                            <span class="form-note">Please enter state name.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="state" value="{{ @$shop->state ?? old('state') }}" class="form-control @error('state') is-invalid @enderror" id="shopState">
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
                                            <label class="form-label" for="shopCity">City</label>
                                            <span class="form-note">Please enter city name.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="city" value="{{ @$shop->city ?? old('city') }}" class="form-control @error('city') is-invalid @enderror" id="shopCity">
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
                                            <label class="form-label" for="shopPostalCode">Postal Code</label>
                                            <span class="form-note">Please enter postal code.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="postal_code" value="{{ @$shop->postal_code ?? old('postal_code') }}" class="form-control @error('postal_code') is-invalid @enderror" id="shopPostalCode">
                                                @error('postal_code')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="shopFacebook">Facebook</label>
                                            <span class="form-note">Please enter facebook link.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="facebook" value="{{ @$shop->facebook ?? old('facebook') }}" class="form-control @error('facebook') is-invalid @enderror" id="shopFacebook">
                                                @error('facebook')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="shopTwitter">Twitter</label>
                                            <span class="form-note">Please enter twitter link.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="twitter" value="{{ @$shop->twitter ?? old('twitter') }}" class="form-control @error('twitter') is-invalid @enderror" id="shopTwitter">
                                                @error('twitter')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="shopYoutube">Youtube</label>
                                            <span class="form-note">Please enter youtube link.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="youtube" value="{{ @$shop->youtube ?? old('youtube') }}" class="form-control @error('youtube') is-invalid @enderror" id="shopYoutube">
                                                @error('youtube')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="shopInstagram">Instagram</label>
                                            <span class="form-note">Please enter instagram link.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="instagram" value="{{ @$shop->instagram ?? old('instagram') }}" class="form-control @error('instagram') is-invalid @enderror" id="shopInstagram">
                                                @error('instagram')
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
    const input = document.querySelector("#shopPhone");
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

