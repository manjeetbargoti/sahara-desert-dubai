@extends('admin.layouts.main')
@section('content')
    <div class="components-preview wide-lg mx-auto">
        <div class="nk-block nk-block-lg">
            <div class="row g-gs">
                <div class="col-lg-12 mx-auto">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-head">
                                <h5 class="card-title">Edit Tour Category</h5>
                            </div>
                            <form action="{{ route('admin.tours.category.edit', $category->id) }}" method="POST" class="gy-3" enctype="multipart/form-data">
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
                                                <input type="text" name="name" value="{{ $category->name ? $category->name : old('name') }}" class="form-control @error('name') is-invalid @enderror" id="tourTitle">
                                                @error('name')
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
                                                <div class="custom-file">
                                                    <input type="file" name="thumbnail_img" value="{{ old('thumbnail_img') }}" class="custom-file-input @error('thumbnail_img') is-invalid @enderror" id="thumbnailImage">
                                                    <label class="custom-file-label" for="thumbnailImage">Choose file</label>
                                                </div>
                                                {{-- <input type="file" name="thumbnail_img" value="{{ old('thumbnail_img') }}" class="form-control @error('thumbnail_img') is-invalid @enderror" id="thumbnailImage"> --}}
                                                @error('thumbnail_img')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                                @if(!empty($category->thumbnail_img))
                                                <div class="image-preview mt-1">
                                                    <img id="thumbImagePreview" src="{{ uploaded_asset($category->thumbnail_img) }}" class="img-thumbnail" alt="{{ $category->name }}" width="60">
                                                </div>
                                                @endif
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
                                                <div class="custom-file">
                                                    <input type="file" name="banner" value="{{ old('banner') }}" class="custom-file-input @error('banner') is-invalid @enderror" id="bannerImage">
                                                    <label class="custom-file-label" for="bannerImage">Choose file</label>
                                                </div>
                                                {{-- <input type="file" name="banner" value="{{ old('banner') }}" class="form-control @error('banner') is-invalid @enderror" id="bannerImage"> --}}
                                                @error('banner')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                                @if(!empty($category->banner))
                                                <div class="image-preview mt-1">
                                                    <img id="bannerImagePreview" src="{{ uploaded_asset($category->banner) }}" class="img-thumbnail" alt="{{ $category->name }}" width="150">
                                                </div>
                                                @endif
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
                                                    <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Enable</option>
                                                    <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Disable</option>
                                                </select>
                                                @error('status')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-lg-8 offset-lg-4">
                                        <div class="form-group mt-2">
                                            <button type="submit" class="btn btn-lg btn-primary">Update Category</button>
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