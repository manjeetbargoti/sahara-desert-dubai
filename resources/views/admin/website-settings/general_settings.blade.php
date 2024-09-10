@extends('admin.layouts.main')
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
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-head">
                                <h5 class="card-title">General Settings</h5>
                            </div>
                            <form action="{{ route('admin.website.setting.general.update') }}" method="POST" class="gy-3" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="tourTitle">Website Title</label>
                                            <span class="form-note">Please enter website title.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="hidden" name="types[]" value="website_title">
                                                <input type="text" name="website_title" value="{{ get_setting('website_title') ?? old('website_title') }}" class="form-control @error('website_title') is-invalid @enderror" id="tourTitle">
                                                @error('website_title')
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
                                            <label class="form-label" for="websiteLogo">Website Logo</label>
                                            <span class="form-note">Please upload website logo.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div class="custom-file">
                                                    <input type="hidden" name="types[]" value="website_logo">
                                                    <input type="file" name="website_logo" value="{{ old('website_logo') }}" class="custom-file-input @error('website_logo') is-invalid @enderror" id="websiteLogo">
                                                    <label class="custom-file-label" for="websiteLogo">Choose file</label>
                                                </div>
                                                @error('website_logo')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                                <div class="image-preview mt-1">
                                                    <img id="websiteLogoPreview" class="img-thumbnail" src="https://placehold.co/600x400/EEE/31343C" alt="preview image" width="60">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="websiteFevicon">Website icon</label>
                                            <span class="form-note">Please upload website icon (512x512 px).</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div class="custom-file">
                                                    <input type="hidden" name="types[]" value="website_icon">
                                                    <input type="file" name="website_icon" value="{{ old('website_icon') }}" class="custom-file-input @error('website_icon') is-invalid @enderror" id="websiteFevicon">
                                                    <label class="custom-file-label" for="websiteFevicon">Choose file</label>
                                                </div>
                                                @error('website_icon')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                                <div class="image-preview mt-1">
                                                    <img id="websiteFeviconPreview" class="img-thumbnail" src="https://placehold.co/512x512/EEE/31343C" alt="preview image" width="60">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="homeBanner">Homepage Banner</label>
                                            <span class="form-note">Please upload homepage banner (1920x600 px).</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div class="custom-file">
                                                    <input type="hidden" name="types[]" value="homepage_banner">
                                                    <input type="file" name="homepage_banner" value="{{ old('homepage_banner') }}" class="custom-file-input @error('homepage_banner') is-invalid @enderror" id="homeBanner">
                                                    <label class="custom-file-label" for="homeBanner">Choose file</label>
                                                </div>
                                                @error('homepage_banner')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                                <div class="image-preview mt-1">
                                                    <img id="homeBannerPreview" class="img-thumbnail" src="https://placehold.co/1920x600/EEE/31343C" alt="preview image" width="150">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="supportPhone">Support Phone</label>
                                            <span class="form-note">Please enter support phone number.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="hidden" name="types[]" value="support_phone">
                                                <input type="text" name="support_phone" value="{{ get_setting('support_home') ?? old('support_phone') }}" class="form-control @error('support_phone') is-invalid @enderror" id="supportPhone">
                                                @error('support_phone')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="adminPhone">Admin Phone</label>
                                            <span class="form-note">Please enter admin phone number.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="hidden" name="types[]" value="admin_phone">
                                                <input type="text" name="admin_phone" value="{{ get_setting('admin_home') ?? old('admin_phone') }}" class="form-control @error('admin_phone') is-invalid @enderror" id="adminPhone">
                                                @error('admin_phone')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="adminEmail">Admin Email</label>
                                            <span class="form-note">Please enter admin email address.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="hidden" name="types[]" value="admin_email">
                                                <input type="email" name="admin_email" value="{{ get_setting('admin_email') ?? old('admin_email') }}" class="form-control @error('admin_email') is-invalid @enderror" id="adminEmail">
                                                @error('admin_email')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="supportEmail">Support Email</label>
                                            <span class="form-note">Please enter support email address.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="hidden" name="types[]" value="support_email">
                                                <input type="email" name="support_email" value="{{ get_setting('support_email') ?? old('support_email') }}" class="form-control @error('support_email') is-invalid @enderror" id="supportEmail">
                                                @error('support_email')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="row g-3">
                                    <div class="col-lg-8 offset-lg-4">
                                        <div class="form-group mt-2">
                                            <button type="submit" class="btn btn-lg btn-primary">Update Settings</button>
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

            $('#websiteFevicon').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                $('#websiteFeviconPreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#homeBanner').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                $('#homeBannerPreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection

