@extends('admin.layouts.main')
@section('content')
    <div class="components-preview wide-md mx-auto">
        <div class="nk-block nk-block-lg">
            <div class="row g-gs">
                <div class="col-lg-9 mx-auto">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-head">
                                <h5 class="card-title">Add New User</h5>
                            </div>
                            <form action="{{ route('users.store') }}" method="POST" class="gy-3">
                                @csrf
                                <div class="row g-3 align-center">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="form-label" for="userName">Name</label>
                                            <span class="form-note">Please enter your full name.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="name" class="form-control" id="userName">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="form-label" for="userEmail">Emal Address</label>
                                            <span class="form-note">Please enter your valid email address.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="email" class="form-control" id="userEmail">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="form-label">Password</label>
                                            <span class="form-note">Password must be 8 characters long.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="password" name="password" class="form-control" id="userPaswword">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="form-label">Role</label>
                                            <span class="form-note">Please assign a role to user.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <select name="roles[]" multiple="multiple" class="form-select" data-search="on">
                                                    @foreach ($roles as $role)
                                                    <option value="{{ $role }}">{{ $role }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-lg-7 offset-lg-5">
                                        <div class="form-group mt-2">
                                            <button type="submit" class="btn btn-lg btn-primary">Save User</button>
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
