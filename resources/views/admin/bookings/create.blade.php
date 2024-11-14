@extends("admin.layouts.main")
@section("content")
<style>
    .iti {
        width: 100%;
    }
</style>

<div class="card card-bordered">
    <div class="card-inner">
        <div class="card-head">
            <h5 class="card-title">New Booking</h5>
        </div>
        <form action="{{ route('admin.bookings.create') }}" method="POST">
            @csrf
            <input type="hidden" name="ip_address" value="{{ @$_SERVER['REMOTE_ADDR'] }}">
            <input type="hidden" name="request_page" value="{{ @url()->current() }}">
            <div class="row g-4">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="form-label">Tours or Activity</label>
                        <div class="form-control-wrap">
                            <select class="form-select" id="tourActivity" name="tour_id" data-search="on" onchange="tour_data();" data-placeholder="Select Tour/Activity">
                                <option></option>
                                @if(!empty($tours))
                                    @foreach($tours as $key => $tour)
                                        <option value="{{ @$tour->id }}">{{ @$tour->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="form-label">Activity Date</label>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right xl">
                                <em class="icon ni ni-calendar-alt"></em>
                            </div>
                            <input type="text" name="booking_date" class="form-control form-control-md form-control-outlined date-picker" id="outlined-date-picker">
                            <label class="form-label-outlined" for="outlined-date-picker">Date Picker</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="form-label">Time Slot</label>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right xl">
                                <em class="icon ni ni-calendar-alt"></em>
                            </div>
                            <input type="text" name="time_slot" class="form-control form-control-md form-control-outlined time-picker" id="outlined-time-picker">
                            <label class="form-label-outlined" for="outlined-time-picker">Time Slot</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="customerName">Customer Name</label>
                        <div class="form-control-wrap">
                            <input type="text" name="name" class="form-control" id="customerName" placeholder="Enter customer name">
                            <input type="hidden" name="country_code" value="">
                            <input type="hidden" name="country_iso2" value="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="customerEmail">Customer Email</label>
                        <div class="form-control-wrap">
                            <input type="email" name="email" class="form-control" id="customerEmail" placeholder="Enter customer email address">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="customerPhone">Customer Phone</label>
                        <div class="form-control-wrap">
                            <input type="text" name="phone" class="form-control" id="customerPhone">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="form-label" for="adultCount">Adults</label>
                        <div class="form-control-wrap">
                            <input type="text" name="adult_count" class="form-control" id="adultCount">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="form-label" for="childCount">Child</label>
                        <div class="form-control-wrap">
                            <input type="text" name="child_count" class="form-control" id="childCount">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="form-label" for="infantCount">Infants</label>
                        <div class="form-control-wrap">
                            <input type="text" name="infant_count" class="form-control" id="infantCount">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="form-label" for="adultPrice">Adult Price</label>
                        <div class="form-control-wrap">
                            <input type="text" name="adult_price" class="form-control" value="" id="adultPrice" placeholder="AED 0.00">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="form-label" for="childPrice">Child Price</label>
                        <div class="form-control-wrap">
                            <input type="text" name="child_price" class="form-control" value="" id="childPrice" placeholder="AED 0.00">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="form-label" for="infantPrice">Infant Price</label>
                        <div class="form-control-wrap">
                            <input type="text" name="infant_price" class="form-control" value="" id="infantPrice" placeholder="AED 0.00">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-label" for="fixedChargesType">Fixed Charges Type</label>
                        <div class="form-control-wrap">
                            <input type="text" name="fixed_charges_type" class="form-control" value="" id="fixedChargesType" placeholder="Additional charges type (if any)">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="form-label" for="fixedCharges">Fixed Charges</label>
                        <div class="form-control-wrap">
                            <input type="text" name="fixed_charges" class="form-control" value="" id="fixedCharges" placeholder="0.00">
                        </div>
                    </div> 
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="form-label">Vendor</label>
                        <div class="form-control-wrap">
                            <select class="form-select" id="vendor" name="vendor" data-search="on" data-placeholder="Select vendor">
                                <option></option>
                                @if(!empty($vendors))
                                    @foreach($vendors as $key => $vendor)
                                        <option value="{{ @$vendor->id }}">{{ @$vendor->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="form-label">Payment Status</label>
                        <div class="form-control-wrap">
                            <select class="form-select" id="paymentStatus" name="payment_status" data-search="on" data-placeholder="Payment Status">
                                <option></option>
                                <option value="paid">Paid</option>
                                <option value="unpaid">Unpaid</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="form-label">Payment Method</label>
                        <div class="form-control-wrap">
                            <select class="form-select" id="paymentMethod" name="payment_method" data-search="on" data-placeholder="Payment Method">
                                <option></option>
                                <option value="cash">Cash</option>
                                <option value="credit_debit">Credit/Debit</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="form-label" for="customerAddress">Customer Address</label>
                        <div class="form-control-wrap">
                            <textarea name="address" id="customerAddress" cols="30" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary">Save Booking</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('custom-script')
<script>
    const input = document.querySelector("#customerPhone");
    const phoneInput = window.intlTelInput(input, {
        initialCountry: "ae",
        strictMode: true,
        separateDialCode: true,
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/js/utils.js" // just for formatting/placeholders etc
    });

    var country = phoneInput.getSelectedCountryData();
    $('input[name=country_code]').val(country.dialCode);
    $('input[name=country_iso2]').val(country.iso2);
</script>

<script>
    function tour_data(){
        var tour_id = $("#tourActivity").val();
        $.post('{{ route('admin.bookings.tourbyid') }}', {_token:'{{ csrf_token() }}', id:tour_id}, function(data){
            $('#adultPrice').val(data.sell_price);
            $('#childPrice').val(data.child_price);
            $('#infantPrice').val(data.infant_price);
            $('#fixedChargesType').val(data.fixed_charges_text);
            $('#fixedCharges').val(data.fixed_charges);
        });
    }
</script>
@endsection