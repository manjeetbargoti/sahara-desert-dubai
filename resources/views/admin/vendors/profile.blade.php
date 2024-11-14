@extends("admin.layouts.main")
@section("content")

<div class="components-preview wide-lg mx-auto">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">{{ @$vendor->shop->name.' ('.@$vendor->name.')' }}</h4>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('admin.vendor.list') }}" class="btn btn-dim btn-outline-primary"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card card-bordered card-preview">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="font-weight-bold text-info" colspan="2">Basic Information</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Name</td>
                                <td>{{ @$vendor->name }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Email</td>
                                <td>{{ @$vendor->email }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Phone</td>
                                <td>{{@$vendor->phone_country_code.' '.@$vendor->phone }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Address</td>
                                <td>{{ @$vendor->address }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">City</td>
                                <td>{{ @$vendor->city }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Country</td>
                                <td>{{ @$vendor->country }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Status</td>
                                @if(@$vendor->status == 1)
                                <td><span class="badge badge-dot badge-success">Active</span></td>
                                @else
                                <td><span class="badge badge-dot badge-danger">Inactive</span></td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div><!-- .card-preview -->

                <div class="card card-bordered card-preview">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="font-weight-bold text-info" colspan="2">Bank Information</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold" width="40%">Bank Name</td>
                                <td>{{ @$vendor->seller->bank_name }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold" width="40%">Account Holder Name</td>
                                <td>{{ @$vendor->seller->bank_acc_name }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold" width="40%">Account Number</td>
                                <td>{{@$vendor->seller->bank_acc_number }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold" width="40%">IBAN Number</td>
                                <td>{{ @$vendor->seller->iban_number }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold" width="40%">Routing Number</td>
                                <td>{{ @$vendor->seller->bank_routing_number }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold" width="40%">Bank Address</td>
                                <td>{{ @$vendor->seller->address }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold" width="40%">Bank Country</td>
                                <td>{{ @$vendor->seller->country }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold" width="40%">Payment Status</td>
                                @if(@$vendor->bank_payment_status == 1)
                                <td><span class="badge badge-dot badge-success">Enable</span></td>
                                @else
                                <td><span class="badge badge-dot badge-danger">Disable</span></td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div><!-- .card-preview -->
            </div>
            <div class="col-sm-6">
                <div class="card card-bordered card-preview">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="font-weight-bold text-info" colspan="2">Business Information</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Business Name</td>
                                <td>{{ @$vendor->shop->name }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Business TRN</td>
                                <td>{{ @$vendor->seller->trn }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Business Email</td>
                                <td>{{ @$vendor->shop->email }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Business Phone</td>
                                <td>{{@$vendor->shop->country_code.' '.@$vendor->shop->phone }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Address</td>
                                <td>{{ @$vendor->shop->address }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">City</td>
                                <td>{{ @$vendor->shop->city }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Country</td>
                                <td>{{ @$vendor->shop->country }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Commission <small class="font-italic">(Fixed)</small></td>
                                <td>{{ @$vendor->shop->commission_fixed }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Commission <small class="font-italic">(Percent)</small></td>
                                <td>{{ @$vendor->shop->commission_percent }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div><!-- .card-preview -->

                <div class="card card-bordered card-preview">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="font-weight-bold text-info" colspan="2">Wallet Balance</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="font-weight-bold" style="font-size: 24px;">
                                    @if (@$vendor->seller->balance > 0)
                                    <span class="text-success">{{ single_price(@$vendor->seller->balance) }}</span>
                                    @elseif (@$vendor->seller->balance < 0)
                                    <span class="text-danger">{{ single_price(@$vendor->seller->balance) }}</span>
                                    @else
                                    <span class="text-primary">{{ single_price(@$vendor->seller->balance) }}</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div><!-- .card-preview -->
            </div>
        </div>
    </div><!-- nk-block -->
</div><!-- .components-preview -->

@endsection