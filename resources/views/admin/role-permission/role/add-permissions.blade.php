@extends("admin.layouts.main")
@section("content")

<div class="components-preview wide-md mx-auto">
    <div class="nk-block nk-block-lg">
        <div class="row g-gs">
            <div class="col-lg-12 mx-auto">

                @if(session('status'))
                <div class="alert alert-success alert-icon">
                    <em class="icon ni ni-check-circle"></em> {{ session('status') }}
                </div>
                @endif

                <div class="card card-bordered h-100">
                    <div class="card-inner">
                        <div class="card-head mb-3">
                            <h5 class="card-title">Add Role Permissions</h5>
                        </div>

                        <form action="{{ route('admin.role.give.permissions',$role->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            @error('permission')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="form-group">
                                <div class="row">
                                    @foreach ($permissions as $key => $permission)
                                    <div class="col-md-3 mb-2">
                                        <div class="custom-control custom-control-sm custom-checkbox custom-control-pro">
                                            <input type="checkbox" class="custom-control-input" name="permission[]" value="{{ @$permission->name }}" id="{{ 'permissionId_'.@$permission->id }}" {{ in_array($permission->id, $rolePermissions) ? 'checked': '' }}>
                                            <label class="custom-control-label" for="{{ 'permissionId_'.@$permission->id }}">{{ @$permission->name }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-lg btn-primary">Add Permission</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
