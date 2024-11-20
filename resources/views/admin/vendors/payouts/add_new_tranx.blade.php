@extends("admin.layouts.main")
@section("content")

<div class="components-preview wide-lg mx-auto">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Add New Transaction</h4>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('admin.vendor.payout.list', @$vendorUser->id) }}" class="btn btn-dim btn-outline-primary"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card card-bordered card-success">
                    <form action="{{ route('admin.vendor.payout.add_tranx', @$vendorUser->id) }}" method="POST">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-info font-weight-bold">Add New Transaction</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="paymentAmount" class="form-label">{{ __('Payment Amount') }}</label>
                                        <input type="text" name="amount" id="paymentAmount" class="form-control" placeholder="Please enter tranx amount">
                                        @error('amount')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tranxReference" class="form-label">{{ __('Tranx Reference') }}</label>
                                        <input type="text" name="tranx_reference" id="tranxReference" class="form-control" placeholder="Please enter tranx reference">
                                        @error('tranx_reference')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="paymentType" class="form-label">{{ __('Payment Type') }}</label>
                                        <select name="payment_type" id="paymentType" class="form-select" data-placeholder="Select Payment Type">
                                            <option></option>
                                            <option value="debit">Credit</option>
                                            <option value="credit">Debit</option>
                                        </select>
                                        @error('payment_type')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="paymentStatus" class="form-label">{{ __('Payment Status') }}</label>
                                        <select name="payment_status" id="paymentStatus" class="form-select" data-placeholder="Select Payment Status">
                                            <option></option>
                                            <option value="0">Pending</option>
                                            <option value="1">Success</option>
                                        </select>
                                        @error('payment_status')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Payment Date</label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right xl">
                                                <em class="icon ni ni-calendar-alt"></em>
                                            </div>
                                            <input type="text" name="payment_date" class="form-control form-control-md form-control-outlined date-picker" id="outlined-date-picker">
                                            <label class="form-label-outlined" for="outlined-date-picker">Date Picker</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tranxRemark" class="form-label">{{ __('Tranx Remark') }}</label>
                                        <textarea name="tranx_remark" id="tranxRemark" class="form-control" placeholder="Please enter tranx remark" cols="30" rows="2"></textarea>
                                        @error('tranx_remark')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-md btn-primary" type="submit">Add Transaction</button>
                                    </div>
                                </td>
                            </tr>
                        </table> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
