@extends("admin.layouts.main")
@section("content")

<div class="components-preview wide-lg mx-auto">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Update Payout</h4>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('admin.vendor.payout.list', @$payout->user_id) }}" class="btn btn-dim btn-outline-primary"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card card-bordered card-success">
                    <form action="{{ route('admin.vendor.payout.update_status', @$payout->id) }}" method="POST">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-info font-weight-bold">Update Payout Status</td>
                            </tr>
                            <tr>
                                <td class="text-info font-weight-bold">{{ __('Payout Amount') }}: 
                                    @if(@$payout->amount > 0)
                                    <span class="text-success">{{ single_price(@$payout->amount) }}</span>
                                    @elseif (@$payout->amount < 0)
                                    <span class="text-danger">{{ single_price(@$payout->amount) }}</span>
                                    @else
                                    <span class="text-primary">{{ single_price(@$payout->amount) }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="paymentStatus" class="form-label">{{ __('Payment Status') }}</label>
                                        <select name="payment_status" id="paymentStatus" class="form-select" data-placeholder="Select Payment Status">
                                            <option></option>
                                            <option value="0" {{ @$payout->payment_status == 0 ? 'selected' : '' }}>Pending</option>
                                            <option value="1" {{ @$payout->payment_status == 1 ? 'selected' : '' }}>Success</option>
                                        </select>
                                        @error('payment_status')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Payout Date</label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right xl">
                                                <em class="icon ni ni-calendar-alt"></em>
                                            </div>
                                            <input type="text" name="payment_date" class="form-control form-control-md form-control-outlined date-picker" data-date-format="yyyy-mm-dd" id="outlined-date-picker" value={{ now() }}>
                                            <label class="form-label-outlined" for="outlined-date-picker">Date Picker</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-md btn-primary" type="submit">Update Payout Status</button>
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
