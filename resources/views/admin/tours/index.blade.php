@extends("admin.layouts.main")
@section("content")

<div class="components-preview wide-lg mx-auto">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Tours List</h4>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('admin.tours.create') }}" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add Tour</span></a>
                </div>
            </div>
        </div>

        @if(session('status'))
        <div class="alert alert-success alert-icon">
            <em class="icon ni ni-check-circle"></em> {{ session('status') }}
        </div>
        @endif

        <div class="card card-bordered card-preview">
            <table class="table table-tranx">
                <thead>
                    <tr>
                        <th width="5%">{{ __('#') }}</th>
                        <th width="30%">{{  __('Tour Info') }}</th>
                        <th width="15%">{{  __('Category') }}</th>
                        <th width="10%">{{  __('Price') }}</th>
                        <th width="10%">{{  __('Status') }}</th>
                        <th width="10%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tours as $key => $tour)
                    <tr class="tb-tnx-item">
                        <td>
                            <span>{{ ($key+1) + ($tours->currentPage() - 1)*$tours->perPage() }}</span>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-sm-2">
                                    <img src="{{ uploaded_asset($tour->thumbnail_img) }}" alt="{{ @$tour->name }}" width="60">
                                </div>
                                <div class="col-sm-10">
                                    <span class="title">{{ @$tour->name }}</span><br>
                                    @if(@$tour->type == 3)
                                    <span class="badge badge-dim badge-outline-info">{{ __('Without Transfer') }}</span>
                                    @elseif (@$tour->type == 2)
                                    <span class="badge badge-dim badge-outline-info">{{ __('Private Transfer') }}</span>
                                    @elseif (@$tour->type == 1)
                                    <span class="badge badge-dim badge-outline-info">{{ __('Shared Transfer') }}</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-dim badge-outline-primary">{{ @$tour->tour_category->name }}</span>
                        </td>
                        <td>
                            <span class="title text-info">{{ single_price(@$tour->sell_price) }}</span>
                        </td>
                        <td>
                            <span class="badge badge-dot badge-success">{{ __('Active') }}</span>
                        </td>
                        <td class="tb-tnx-action">
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li><a href="#" class="text-info">{{ __('View') }}</a></li>
                                        <li><a href="{{ route('admin.tours.edit', @$tour->id) }}" class="text-primary">{{ __('Edit') }}</a></li>
                                        <li><a href="{{ route('admin.tours.delete', @$tour->id) }}" class="text-danger">{{ __('Delete') }}</a></li>
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