@extends("admin.layouts.main")
@section("content")

<div class="components-preview wide-md mx-auto">
    <div class="nk-block nk-block-lg">
        <div class="row g-gs">
            <div class="col-lg-6 mx-auto">
                <div class="card card-bordered h-100">
                    <div class="card-inner">
                        <div class="card-head">
                            <h5 class="card-title">Add New Role</h5>
                        </div>
                        <form action="{{ route('admin.roles.create') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="full-name">Role Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="name" id="roleName">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary">Save Role</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
