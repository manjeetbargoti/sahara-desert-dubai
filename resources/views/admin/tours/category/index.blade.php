@extends("admin.layouts.main")
@section("content")

<div class="components-preview wide-lg mx-auto">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Tour Category List</h4>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('admin.tours.category.create') }}" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add Tour Category</span></a>
                </div>
            </div>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-icon">
            <em class="icon ni ni-check-circle"></em> {{ session('success') }}
        </div>
        @endif

        <div class="card card-bordered card-preview">
            <table class="table table-tranx">
                <thead>
                    <tr class="tb-tnx-head">
                        <th>#</th>
                        <th>{{ __('Thumb icon') }}</th>
                        <th>{{ __('Category Name') }}</th>
                        <th>{{ __('Banner') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($toursCategories as $key => $category)
                    <tr class="tb-tnx-item">
                        <td>
                            <span>{{ ($key+1) + ($toursCategories->currentPage() - 1)*$toursCategories->perPage() }}</span>
                        </td>
                        <td>
                            <img src="{{ uploaded_asset($category->thumbnail_img) }}" class="img-thumbnail" width="40" alt="{{ @$category->name }}">
                        </td>
                        <td>
                            {{ @$category->name }}
                        </td>
                        <td>
                            <img src="{{ uploaded_asset($category->banner) }}" class="img-thumbnail" width="100" alt="{{ @$category->name }}">
                        </td>
                        <td>
                            @if(@$category->status == 1)
                                <span class="badge badge-dot badge-success">{{ __('Active') }}</span>
                            @elseif (@$category->status == 0)
                                <span class="badge badge-dot badge-danger">{{ __('Inactive') }}</span>
                            @endif
                        </td>
                        <td class="tb-tnx-action">
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li><a href="#" class="text-info">{{ __('View') }}</a></li>
                                        <li><a href="{{ route('admin.tours.category.edit', @$category->id) }}" class="text-primary">{{ __('Edit') }}</a></li>
                                        <li><a href="{{ route('admin.tours.category.delete', @$category->id) }}" class="text-danger">{{ __('Delete') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- .card-preview -->
    </div><!-- nk-block -->
</div><!-- .components-preview -->

@endsection