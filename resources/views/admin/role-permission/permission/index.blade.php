@extends("admin.layouts.main")
@section("content")

<div class="components-preview wide-lg mx-auto">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Permissions List</h4>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('permissions.create') }}" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add Permission</span></a>
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
                    <tr class="tb-tnx-head">
                        <th class="tb-tnx-id"><span class="">#</span></th>
                        <th class="tb-tnx-info">
                            <span class="tb-tnx-desc">
                                <span>Name</span>
                            </span>
                            <span class="tb-tnx-desc">
                                <span>Guard</span>
                            </span>
                        </th>
                        <th class="tb-tnx-amount is-alt">
                            <span class="tb-tnx-status d-none d-md-inline-block">Status</span>
                        </th>
                        <th class="tb-tnx-action">
                            <span>&nbsp;</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                    <tr class="tb-tnx-item">
                        <td class="tb-tnx-id">
                            <span>{{ @$permission->id }}</span>
                        </td>
                        <td class="tb-tnx-info">
                            <div class="tb-tnx-desc">
                                <span class="title">{{ @$permission->name }}</span>
                            </div>
                            <div class="tb-tnx-desc">
                                <span class="title">{{ @$permission->guard_name }}</span>
                            </div>
                        </td>
                        <td class="tb-tnx-amount is-alt">
                            <div class="tb-tnx-status">
                                <span class="badge badge-dot badge-success">Active</span>
                            </div>
                        </td>
                        <td class="tb-tnx-action">
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li><a href="#" class="text-warning">View</a></li>
                                        <li><a href="#" class="text-primary">Edit</a></li>
                                        <li><a href="#" class="text-danger">Remove</a></li>
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