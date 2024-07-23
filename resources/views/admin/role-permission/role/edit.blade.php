@extends("admin.layouts.main")
@section("content")

<div class="components-preview wide-md mx-auto">
    <div class="nk-block nk-block-lg">
        <div class="row g-gs">
            <div class="col-lg-6 mx-auto">
                <div class="card card-bordered h-100">
                    <div class="card-inner">
                        <div class="card-head">
                            <h5 class="card-title">Edit Role</h5>
                        </div>
                        <form action="{{ route('roles.update',$role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="form-label" for="full-name">Role Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="name" value="{{ @$role->name }}" id="roleName">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary">Update Role</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection