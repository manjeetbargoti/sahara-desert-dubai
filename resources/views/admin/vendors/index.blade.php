@extends("admin.layouts.main")
@section("content")

<div class="components-preview wide-lg mx-auto">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Vendor List</h4>
                </div>
                <div class="nk-block-head-content">
                    <a href="#" class="btn btn-dim btn-outline-primary"><em class="icon ni ni-plus"></em><span>Add New Vendor</span></a>
                </div>
            </div>
        </div>

        <div class="card card-bordered card-preview">
            <table class="table table-tranx">
                <thead>
                    <tr>
                        <th class="text-muted" width="5%">#</th>
                        <th class="text-muted" width="30%">Name</th>
                        <th class="text-muted" width="20%">Phone</th>
                        <th class="text-muted" width="20%">Email</th>
                        <th class="text-muted" width="15%">Status</th>
                        <th width="10%">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vendors as $key => $vendor)
                    <tr class="tb-tnx-item">
                        <td>{{ ($key+1) + ($vendors->currentPage() - 1)*$vendors->perPage() }}</td>
                        <td>
                            {{ @$vendor->name }}
                            @if(!empty(@$vendor->shop->name))
                            <br>
                            <small class="text-info font-italic">{{ @$vendor->shop->name }}</small>
                            @endif
                            @if(!empty(@$vendor->shop->city))
                            <br>
                            <small class="text-primary font-italic">{{ @$vendor->shop->city.', '.@$vendor->shop->country }}</small>
                            @endif
                        </td>
                        <td>{{ @$vendor->phone_country_code.' '.@$vendor->phone }}</td>
                        <td>{{ @$vendor->email }}</td>
                        <td>
                            @if(@$vendor->status == 1)
                            <span class="badge badge-dot badge-success">{{ __('Active') }}</span>
                            @else
                            <span class="badge badge-dot badge-danger">{{ __('Inactive') }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li><a href="{{ route('admin.vendor.profile', $vendor->id) }}" class="text-info">{{ __('Profile') }}</a></li>
                                        <li><a href="{{ route('admin.vendor.edit', $vendor->id) }}" class="text-primary">{{ __('Edit') }}</a></li>
                                        <li><a href="#" class="text-danger">{{ __('Ban Vendor') }}</a></li>
                                        <li><a href="{{ route('admin.vendor.bookings', $vendor->id) }}" class="text-success">{{ __('Booking List') }}</a></li>
                                        <li><a href="{{ route('admin.vendor.payout.list', $vendor->id) }}" class="text-success">{{ __('Payout History') }}</a></li>
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