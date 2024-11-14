@extends("admin.layouts.main")
@section("content")

<style>
    .iti {
        width: 100%;
    }
</style>

<div class="components-preview wide-lg mx-auto">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Edit Vendor ({{ @$vendor->name }})</h4>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('admin.vendor.list') }}" class="btn btn-dim btn-outline-primary"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card card-bordered card-success">
                    <form action="{{ route('admin.vendor.basic.update', @$vendor->id) }}" method="POST">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-info font-weight-bold">Basic Information</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="vendorName" class="form-label">{{ __('Vendor Name') }}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="name" class="form-control" placeholder="Enter vendor name" id="vendorName" value="{{ old('name') ?? @$vendor->name }}">
                                            @error('name')
                                                <label class="text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="vendorPassword" class="form-label">{{ __('Vendor Password') }}</label>
                                        <div class="form-control-wrap">
                                            <input type="password" name="password" class="form-control" placeholder="Enter vendor password" id="vendorPassword" autocomplete="new-password">
                                            @error('name')
                                                <label class="text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="vendorEmail" class="form-label">{{ __('Vendor Email') }}</label>
                                        <div class="form-control-wrap">
                                            <input type="email" name="email" class="form-control" placeholder="Enter vendor email" id="vendorEmail" value="{{ old('email') ?? @$vendor->email }}">
                                            @error('email')
                                                <label class="text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="vendorPhone" class="form-label">{{ __('Vendor Phone') }}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="phone" class="form-control" placeholder="Enter vendor phone number" id="vendorPhone" value="{{ old('phone') ?? @$vendor->phone }}">
                                            @error('phone')
                                                <label class="text-danger">{{ $message }}</label>
                                            @enderror

                                            <input type="hidden" name="vendor_country_code" value="">
                                            <input type="hidden" name="vendor_country_iso2" value="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="vendorAddress" class="form-label">{{ __('Address') }}</label>
                                        <div class="form-control-wrap">
                                            <textarea name="address" class="form-control" cols="10" rows="2" placeholder="Enter vendor address" id="vendorAddress">{{ old('address') ?? @$vendor->address }}</textarea>
                                            @error('address')
                                                <label class="text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="vendorCity" class="form-label">{{ __('City') }}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="city" class="form-control" placeholder="Enter city name" id="vendorCity" value="{{ old('city') ?? @$vendor->city }}">
                                            @error('city')
                                                <label class="text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="vendorState" class="form-label">{{ __('State') }}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="state" class="form-control" placeholder="Enter state name" id="vendorState" value="{{ old('state') ?? @$vendor->state }}">
                                            @error('state')
                                                <label class="text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="vendorCountry" class="form-label">{{ __('Country') }}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="country" class="form-control" placeholder="Enter country name" id="vendorCountry" value="{{ old('country') ?? @$vendor->country }}">
                                            @error('country')
                                                <label class="text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="vendorPostalCode" class="form-label">{{ __('Postal Code') }}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="postal_code" class="form-control" placeholder="Enter postal code" id="vendorPostalCode" value="{{ old('postal_code') ?? @$vendor->postal_code }}">
                                            @error('postal_code')
                                                <label class="text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="vendorStatus" class="form-label">{{ __('Status') }}</label>
                                        <div class="form-control-wrap">
                                            <select name="status" class="form-select" data-placeholder="Select status" id="vendorStatus">
                                                <option></option>
                                                <option value="1" {{ @$vendor->status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ @$vendor->status == 0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('status')
                                                <label class="text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="vendorBanStatus" class="form-label">{{ __('Ban Status') }}</label>
                                        <div class="form-control-wrap">
                                            <select name="ban" class="form-select" data-placeholder="Select ban status" id="vendorBanStatus">
                                                <option></option>
                                                <option value="1" {{ @$vendor->ban == 1 ? 'selected' : '' }}>Ban</option>
                                                <option value="0" {{ @$vendor->ban == 0 ? 'selected' : '' }}>Not Ban</option>
                                            </select>
                                            @error('ban')
                                                <label class="text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-md btn-primary" type="submit">Save Basic Information</button>
                                    </div>
                                </td>
                            </tr>
                        </table> 
                    </form>
                </div>

                <div class="card card-bordered card-success">
                    <form action="{{ route('admin.vendor.bank.update', @$vendor->id) }}" method="POST">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-info font-weight-bold">Bank Information</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="bankName" class="form-label">{{ __('Bank Name') }}</label>
                                        <input type="text" name="bank_name" class="form-control" placeholder="Enter bank name" id="bankName" value="{{ old('bank_name') ?? @$vendor->seller->bank_name }}">
                                        @error('bank_name')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="accountHolderName" class="form-label">{{ __('Account Holder Name') }}</label>
                                        <input type="text" name="bank_acc_name" class="form-control" placeholder="Enter account holder name" id="accountHolderName" value="{{ old('bank_acc_name') ?? @$vendor->seller->bank_acc_name }}">
                                        @error('bank_acc_name')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="accountNumber" class="form-label">{{ __('Account Number') }}</label>
                                        <input type="text" name="bank_acc_number" class="form-control" placeholder="Enter account number" id="accountNumber" value="{{ old('bank_acc_number') ?? @$vendor->seller->bank_acc_number }}">
                                        @error('bank_acc_number')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="ibanNumber" class="form-label">{{ __('IBAN Number') }}</label>
                                        <input type="text" name="iban_number" class="form-control" placeholder="Enter iban number" id="ibanNumber" value="{{ old('iban_number') ?? @$vendor->seller->iban_number }}">
                                        @error('iban_number')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="routingNumber" class="form-label">{{ __('Routing Number') }}</label>
                                        <input type="text" name="bank_routing_number" class="form-control" placeholder="Enter routing number" id="routingNumber" value="{{ old('bank_routing_number') ?? @$vendor->seller->bank_routing_number }}">
                                        @error('bank_routing_number')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="bankPaymentStatus" class="form-label">{{ __('Bank Transfer Status') }}</label>
                                        <select name="bank_payment_status" class="form-select" id="bankPaymentStatus" data-placeholder="Select bank transfer status">
                                            <option></option>
                                            <option value="1" {{ @$vendor->seller->bank_payment_status == 1 ? 'selected' : '' }}>Enable</option>
                                            <option value="0" {{ @$vendor->seller->bank_payment_status == 0 ? 'selected' : '' }}>Disable</option>
                                        </select>
                                        @error('bank_payment_status')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-md btn-primary" type="submit">Save Bank Information</button>
                                    </div>
                                </td>
                            </tr>
                        </table> 
                    </form>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card card-bordered card-success">
                    <form action="{{ route('admin.vendor.business.update', @$vendor->id) }}" method="POST">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-info font-weight-bold">Business Information</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="businessName" class="form-label">{{ __('Business Name') }}</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter business name" id="businessName" value="{{ old('name') ?? @$vendor->shop->name }}">
                                        @error('name')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="businessEmail" class="form-label">{{ __('Business Email') }}</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter business email" id="businessEmail" value="{{ old('country') ?? @$vendor->shop->email }}">
                                        @error('email')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="businessPhone" class="form-label">{{ __('Business Phone') }}</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter business phone number" id="businessPhone" value="{{ old('country') ?? @$vendor->shop->phone }}">
                                        @error('phone')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror

                                        <input type="hidden" name="business_country_code" value="">
                                        <input type="hidden" name="business_country_iso2" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="businessAddress" class="form-label">{{ __('Address') }}</label>
                                        <textarea name="address" class="form-control" cols="10" rows="2" placeholder="Enter business address" id="businessAddress">{{ old('address') ?? @$vendor->shop->address }}</textarea>
                                        @error('address')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="businessCity" class="form-label">{{ __('City') }}</label>
                                        <input type="text" name="city" class="form-control" placeholder="Enter city name" id="businessCity" value="{{ old('city') ?? @$vendor->shop->city }}">
                                        @error('city')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="businessState" class="form-label">{{ __('State') }}</label>
                                        <input type="text" name="state" class="form-control" placeholder="Enter state name" id="businessState" value="{{ old('state') ?? @$vendor->shop->state }}">
                                        @error('state')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="businessCountry" class="form-label">{{ __('Country') }}</label>
                                        <input type="text" name="country" class="form-control" placeholder="Enter country name" id="businessCountry" value="{{ old('country') ?? @$vendor->shop->country }}">
                                        @error('country')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="businessPostalCode" class="form-label">{{ __('Postal Code') }}</label>
                                        <input type="text" name="postal_code" class="form-control" placeholder="Enter postal code" id="businessPostalCode" value="{{ old('postal_code') ?? @$vendor->shop->postal_code }}">
                                        @error('postal_code')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="businessCommFix" class="form-label">{{ __('Commission') }} <small class="font-italic">(Fixed)</small></label>
                                        <input type="text" name="commission_fixed" class="form-control" placeholder="Enter commission (fixed)" id="businessCommFix" value="{{ old('commission_fixed') ?? @$vendor->shop->commission_fixed }}">
                                        @error('commission_fixed')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="businessCommPerc" class="form-label">{{ __('Commission') }} <small class="font-italic">(Percent)</small></label>
                                        <input type="text" name="commission_percent" class="form-control" placeholder="Enter commission (percent)" id="businessCommPerc" value="{{ old('commission_percent') ?? @$vendor->shop->commission_percent }}">
                                        @error('commission_percent')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-md btn-primary" type="submit">Save Business Information</button>
                                    </div>
                                </td>
                            </tr>
                        </table> 
                    </form>
                </div>

                <div class="card card-bordered card-success">
                    <form action="{{ route('admin.vendor.wallet.update', @$vendor->id) }}" method="POST">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-info font-weight-bold">Update Wallet Balance</td>
                            </tr>
                            <tr>
                                <td class="text-info font-weight-bold">{{ __('Available Balance') }}: 
                                    @if(@$vendor->seller->balance > 0)
                                    <span class="text-success">{{ single_price(@$vendor->seller->balance) }}</span>
                                    @elseif (@$vendor->seller->balance < 0)
                                    <span class="text-danger">{{ single_price(@$vendor->seller->balance) }}</span>
                                    @else
                                    <span class="text-primary">{{ single_price(@$vendor->seller->balance) }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="tranxAmount" class="form-label">{{ __('Tranx Amount') }}</label>
                                        <input type="text" name="tranx_amount" class="form-control" placeholder="Enter Tranx Amount" id="tranxAmount" value="{{ old('tranx_amount') ?? @$vendor->seller->tranx_amount }}">
                                        @error('tranx_amount')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="tranxType" class="form-label">{{ __('Tranx Type') }}</label>
                                        <select name="tranx_type" id="tranxType" class="form-select" data-placeholder="Enter Tranx Type">
                                            <option></option>
                                            <option value="debit">Debit</option>
                                            <option value="credit">Credit</option>
                                        </select>
                                        @error('tranx_type')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="tranxRemark" class="form-label">{{ __('Tranx Remark') }}</label>
                                        <textarea name="tranx_remark" class="form-control" id="tranxRemark" placeholder="Type Tranx Remark" cols="30" rows="2"></textarea>
                                        @error('tranx_remark')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-md btn-primary" type="submit">Update Wallet Tranx</button>
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

@section('custom-script')
<script>
    const phoneInputField = document.querySelector("#vendorPhone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        initialCountry: "ae",
        nationalMode: true,
        placeholderNumberType: "MOBILE",
        separateDialCode: true,
        preferredCountries: ['ae','in', 'us', 'pk'],
        // strictMode: true,
        // separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // just for formatting/placeholders etc
    });

    var country = phoneInput.getSelectedCountryData();
    $('input[name=vendor_country_code]').val(country.dialCode);
    $('input[name=vendor_country_iso2]').val(country.iso2);

    const phoneInputField_2 = document.querySelector("#businessPhone");
    const phoneInput_2 = window.intlTelInput(phoneInputField_2, {
        initialCountry: "ae",
        nationalMode: true,
        placeholderNumberType: "MOBILE",
        separateDialCode: true,
        preferredCountries: ['ae','in', 'us', 'pk'],
        // strictMode: true,
        // separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // just for formatting/placeholders etc
    });

    var country_2 = phoneInput_2.getSelectedCountryData();
    $('input[name=business_country_code]').val(country_2.dialCode);
    $('input[name=business_country_iso2]').val(country_2.iso2);
</script>

@endsection
