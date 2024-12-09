@extends("admin.layouts.main")
@section("content")
<style>
    .iti {
        width: 100%;
    }
</style>

<div class="col-sm-8 m-auto">
    <div class="mb-4">
        <h4><span class="text-info">[#{{ @$booking->booking_reference }}]</span> {{ @$booking->tour->name }}</h4>
    </div>
</div>

<div class="card card-bordered col-sm-8 m-auto">
    <div class="card-inner">
        <div class="card-head">
            <h5 class="card-title">Edit Booking</h5>
        </div>
        <form action="{{ route('admin.bookings.edit', @$booking->booking_reference) }}" method="POST">
            @csrf
            {{-- <input type="hidden" name="ip_address" value="{{ @$_SERVER['REMOTE_ADDR'] }}">
            <input type="hidden" name="request_page" value="{{ @url()->current() }}"> --}}
            <div class="row g-4">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="form-label">Tours or Activity</label>
                        <div class="form-control-wrap">
                            <select class="form-select" id="tourActivity" name="tour_id" data-search="on" onchange="tour_data();" data-placeholder="Select Tour/Activity">
                                <option></option>
                                @if(!empty($tours))
                                    @foreach($tours as $key => $tour)
                                        <option value="{{ @$tour->id }}" {{ @$tour->id == @$booking->tour_id ? 'selected' : '' }}>{{ @$tour->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="form-label">Activity Date</label>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right xl">
                                <em class="icon ni ni-calendar-alt"></em>
                            </div>
                            <input type="text" name="booking_date" class="form-control form-control-md form-control-outlined date-picker" id="outlined-date-picker" value="{{ date('m/d/Y', strtotime(@$booking->booking_date)) }}">
                            <label class="form-label-outlined" for="outlined-date-picker">Date Picker</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="form-label">Time Slot</label>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right xl">
                                <em class="icon ni ni-calendar-alt"></em>
                            </div>
                            <input type="text" name="time_slot" class="form-control form-control-md form-control-outlined time-picker" id="outlined-time-picker" value="{{ date('h:i A', strtotime(@$booking->time_slot)) }}">
                            <label class="form-label-outlined" for="outlined-time-picker">Time Slot</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="customerName">Customer Name</label>
                        <div class="form-control-wrap">
                            <input type="text" name="name" class="form-control" id="customerName" placeholder="Enter customer name" value="{{ @$booking->name }}">
                            <input type="hidden" name="country_code" value="">
                            <input type="hidden" name="country_iso2" value="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="customerEmail">Customer Email</label>
                        <div class="form-control-wrap">
                            <input type="email" name="email" class="form-control" id="customerEmail" placeholder="Enter customer email address" value="{{ @$booking->email }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="customerPhone">Customer Phone</label>
                        <div class="form-control-wrap">
                            <input type="text" name="phone" class="form-control" id="customerPhone" value="{{ @$booking->phone }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="adultCount">Adults</label>
                        <div class="form-control-wrap">
                            <input type="text" name="adult_count" class="form-control" id="adultCount" value="{{ @$booking->adult_count }}">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="childCount">Child</label>
                        <div class="form-control-wrap">
                            <input type="text" name="child_count" class="form-control" id="childCount" value="{{ @$booking->child_count }}">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="infantCount">Infants</label>
                        <div class="form-control-wrap">
                            <input type="text" name="infant_count" class="form-control" id="infantCount" value="{{ @$booking->infant_count }}">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="adultPrice">Adult Price</label>
                        <div class="form-control-wrap">
                            <input type="text" name="adult_price" class="form-control" id="adultPrice" placeholder="AED 0.00"  value="{{ @$booking->adult_price }}">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="childPrice">Child Price</label>
                        <div class="form-control-wrap">
                            <input type="text" name="child_price" class="form-control" value="{{ @$booking->child_price }}" id="childPrice" placeholder="AED 0.00">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="infantPrice">Infant Price</label>
                        <div class="form-control-wrap">
                            <input type="text" name="infant_price" class="form-control" value="{{ @$booking->infant_price }}" id="infantPrice" placeholder="AED 0.00">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="fixedChargesType">Fixed Charges Type</label>
                        <div class="form-control-wrap">
                            <input type="text" name="fixed_charges_type" class="form-control" value="{{ @$booking->fixed_charges_type }}" id="fixedChargesType" placeholder="Additional charges type (if any)">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="fixedCharges">Fixed Charges</label>
                        <div class="form-control-wrap">
                            <input type="text" name="fixed_charges" class="form-control" value="{{ @$booking->fixed_charges }}" id="fixedCharges" placeholder="0.00">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="customCommission">Custom Commission</label>
                        <div class="form-control-wrap">
                            <input type="text" name="custom_commission" class="form-control" value="{{ @$booking->custom_commission }}" id="customCommission" placeholder="0.00">
                        </div>
                    </div> 
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="form-label">Vendor</label>
                        <div class="form-control-wrap">
                            <select class="form-select" id="vendor" name="vendor" data-search="on" data-placeholder="Select vendor">
                                <option></option>
                                @if(!empty($vendors))
                                    @foreach($vendors as $key => $vendor)
                                        <option value="{{ @$vendor->id }}" {{ @$booking->vendor_id == @$vendor->id ? 'selected' : ''}}>{{ @$vendor->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="form-label">Payment Status</label>
                        <div class="form-control-wrap">
                            <select class="form-select" id="paymentStatus" name="payment_status" data-placeholder="Payment Status">
                                <option></option>
                                <option value="paid" {{ @$booking->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="unpaid" {{ @$booking->payment_status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="form-label">Payment Method</label>
                        <div class="form-control-wrap">
                            <select class="form-select" id="paymentMethod" name="payment_method" data-placeholder="Payment Method">
                                <option></option>
                                <option value="cash" {{ @$booking->payment_method == 'cash' ? 'selected' : '' }}>Cash</option>
                                <option value="credit_debit" {{ @$booking->payment_method == 'credit_debit' ? 'selected' : '' }}>Credit/Debit</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="form-label" for="bookingStatus">Booking Status</label>
                        <div class="form-control-wrap">
                            <select class="form-select" id="bookingStatus" name="status" data-placeholder="Booking Status">
                                <option></option>
                                <option value="1" {{ @$booking->status == '1' ? 'selected' : '' }}>Completed</option>
                                <option value="0" {{ @$booking->status == '0' ? 'selected' : '' }}>Pending</option>
                                <option value="2" {{ @$booking->status == '2' ? 'selected' : '' }}>Canceled</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="form-label" for="customerAddress">Customer Address</label>
                        <div class="form-control-wrap">
                            <textarea name="address" id="customerAddress" cols="30" rows="2" class="form-control">{{ @$booking->address }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="form-label" for="customRemarks">Custom Remarks</label>
                        <div class="form-control-wrap">
                            <textarea name="custom_remarks" id="customRemarks" cols="30" rows="2" class="form-control">{{ @$booking->custom_remarks }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="form-label" for="customActivity">Custom Activity</label>
                        <div class="form-control-wrap">
                            <textarea name="custom_activity" id="customActivity" cols="30" rows="4" class="form-control summernote-basic">{{ @$booking->custom_activity }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary">Update Booking</button>
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