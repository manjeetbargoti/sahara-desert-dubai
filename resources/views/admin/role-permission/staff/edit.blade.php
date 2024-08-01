@extends('admin.layouts.main')
@section('content')
    <div class="components-preview wide-md mx-auto">
        <div class="nk-block nk-block-lg">
            <div class="row g-gs">
                <div class="col-lg-9 mx-auto">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-head">
                                <h5 class="card-title">Edit Staff</h5>
                            </div>
                            <form action="{{ route('admin.staff.edit', $staff->id) }}" method="POST" class="gy-3">
                                @csrf
                                @method('PUT')
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
                                                <input type="text" name="name" value="{{ $staff->name ?? old('name') }}" class="form-control @error('name') is-invalid @enderror" id="staffName">
                                                @error('name')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="form-label" for="userEmail">Email Address</label>
                                            <span class="form-note">Please enter your valid email address.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="email" value="{{ $staff->email ?? old('email') }}" class="form-control @error('email') is-invalid @enderror" id="staffEmail">
                                                @error('email')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="form-label" for="userEmail">Phone Number</label>
                                            <span class="form-note">Please enter your valid phone number.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" name="phone" value="{{ $staff->phone ?? old('phone') }}" class="form-control @error('phone') is-invalid @enderror" id="staffPhone">
                                                @error('phone')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
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
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="staffPaswword">
                                                @error('password')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="form-label">Role</label>
                                            <span class="form-note">Please assign a role to staff.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <select name="role" class="form-select @error('role') is-invalid @enderror" data-search="off" data-placeholder="Please Select a Role">
                                                    <option value="">Please Select a Role</option>
                                                    @foreach ($roles as $role)
                                                    <option value="{{ @$role->id }}" {{ @$role->id == $staff->role_id ? 'selected' : ''}}>{{ @$role->display_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('role')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-lg-7 offset-lg-5">
                                        <div class="form-group mt-2">
                                            <button type="submit" class="btn btn-lg btn-primary">Update Staff</button>
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
