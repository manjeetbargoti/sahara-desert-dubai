@extends("frontend.seller.layouts.main")
@section("content")

<div class="col-sm-9 mt-2 mx-auto">
    <div class="card card-bordered card-full">
        <div class="card-inner border-bottom">
            <div class="card-title-group">
                <div class="card-title">
                    @if (@$tranx->tranx_type == 'debit')
                        <h6 class="title text-danger"><em class="icon ni ni-upload"></em> {{ __('Debited') }} ({{ single_price(@$tranx->tranx_amount) }})</h6>
                    @elseif (@$tranx->tranx_type == 'credit')
                        <h6 class="title text-success"><em class="icon ni ni-download"></em> {{ __('Credited') }} ({{ single_price(@$tranx->tranx_amount) }})</h6>
                    @endif
                </div>
                <div class="card-tools">
                    <a href="{{ route('vendor.wallet.index') }}" class="btn btn-sm btn-outline-primary"><em class="icon ni ni-arrow-long-left"></em>&nbsp; Back</a>
                </div>
            </div>
        </div>
        <div class="card-inner">
            <table class="table table-bordered table-hover">
                <tr>
                    <td class="font-weight-bold" width="35%">{{ __('Tranx Amount') }}</td>
                    <td>{{ single_price(@$tranx->tranx_amount) }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="35%">{{ __('Tranx Type') }}</td>
                    <td>
                        @if (@$tranx->tranx_type == 'debit')
                        <span class="text-danger"><em class="icon ni ni-upload"></em> {{ __('Debited from Wallet') }}</span>
                        @elseif(@$tranx->tranx_type == 'credit')
                        <span class="text-success"><em class="icon ni ni-download"></em> {{ __('Credit to Wallet') }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="35%">{{ __('Tranx Remark') }}</td>
                    <td>{{ @$tranx->tranx_remark }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="35%">{{ __('Tranx Method') }}</td>
                    <td>{{ @$tranx->payment_method }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="35%">{{ __('Tranx Status') }}</td>
                    <td>{{ @$tranx->payment_method }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="35%">{{ __('Approved') }}</td>
                    <td>
                        @if (@$tranx->approval == 0)
                            <span class="bagde badge-outline-danger">No</span>
                        @elseif(@$tranx->approval == 1)
                            <span class="bagde badge-outline-success">Approved</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="35%">{{ __('Offline Payment') }}</td>
                    <td>
                        @if (@$tranx->offline_payment == 0)
                            <span class="bagde badge-outline-danger">No</span>
                        @elseif(@$tranx->offline_payment == 1)
                            <span class="bagde badge-outline-success">Yes</span>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection
