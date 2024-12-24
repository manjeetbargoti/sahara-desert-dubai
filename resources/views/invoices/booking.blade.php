<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Invoice</title>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">
	<style media="all">
		@font-face {
            font-family: "Roboto", sans-serif;
            src: url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
            font-weight: normal;
            font-style: normal;
        }
        *{
            margin: 0;
            padding: 0;
            line-height: 1.3;
            font-family: "Roboto", sans-serif;
            color: #333542;
        }
		body{
			font-size: .875rem;
		}
		.gry-color *,
		.gry-color{
			color:#878f9c;
		}
        .bg-gry {
            background-color: #878f9c;
        }
        .text-info {
            color: #09c2de;
        }
        .text-primary {
            color: #6576ff;
        }
        .text-danger{
            color: #e85347;
        }
		table{
			width: 100%;
		}
		table th{
			font-weight: normal;
		}
		table.padding th{
			padding: .5rem .7rem;
		}
		table.padding td{
			padding: .7rem;
		}
		table.sm-padding td{
			padding: .2rem .7rem;
		}
		.border-bottom td,
		.border-bottom th{
			border-bottom:1px solid #eceff4;
		}
		.text-left{
			text-align:left;
		}
		.text-right{
			text-align:right;
		}
		.small{
			font-size: .85rem;
		}
		.currency{

		}
		.page-break {
			page-break-after: always;
		}
	</style>
</head>
<body>
	<div>
		<div style="background: #eceff4;padding: 0.5rem;">
			<table>
				<tr>
					<td>
						{{-- <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('assets/sdd_logo.png')))}}" height="40" style="display:inline-block;"> --}}
						<img src="{{ asset('assets/sdd_logo.png') }}" height="40" style="display:inline-block;">
					</td>
					<td style="font-size: 1.6rem;" class="text-right strong">{{  __('CUSTOMER INVOICE') }}</td>
				</tr>
			</table>
			<table>
				
				<tr>
					<td class="gry-color small"></td>
					<td class="text-right"></td>
				</tr>
				<tr>
					<td style="font-size: 1.2rem;" class="strong"></td>
					<td class="text-right small"><span class="gry-color small">{{  __('Invoice Nr') }}:</span> <span class="strong">{{ 'SDD-'.@date('Y', strtotime(@$data->created_at)).'-'.@$data->booking_reference }}</span></td>
				</tr>
				<tr>
					<td class="gry-color small"></td>
					<td class="text-right small">
						@if(!empty(get_setting('sdd_trn')))
						<span class="gry-color small">{{  __('VAT # ') }}</span> <span class="strong">{{ get_setting('sdd_trn') }}</span>
						@endif
					</td>
				</tr>
				<tr>
					<td class="gry-color small">{{  __('Email') }}: {{ get_setting('support_email') }}</td>
					<td class="text-right small"><span class="gry-color small">{{  __('Booking Ref') }}:</span> <span class="strong">{{ @$data->booking_reference }}</span></td>
				</tr>
				<tr>
					<td class="gry-color small">{{  __('Phone') }}: {{ get_setting('support_phone') }}</td>
					<td class="text-right small"><span class="gry-color small">{{  __('Booking Date') }}:</span> <span class=" strong">{{ date('d M Y', strtotime(@$data->created_at)) }}</span></td>
				</tr>
			</table>

		</div>

		<div style="padding: 0.5rem;padding-bottom: 0">
            <table>
				<tr>
					<td class="small" style="margin-bottom: 0.5rem;"><b class="text-info">{{ __('Guest Details') }}:</b></td>
					<td class="small" style="margin-bottom: 0.5rem;"><b class="text-info">{{ __('Booking Details') }}:</b></td>
					<td></td>
				</tr>
				<tr>
					<td class="strong">{{ ucfirst($data->name) }}</td>
					<td class="strong"><span class="gry-color">Activity Date: </span>{{ date('d M, Y', strtotime(@$data->booking_date)) }}</td>
				</tr>
				<tr>
					<td class="gry-color small">{{ $data->address }}</td>
					<td class="strong"><span class="gry-color">Time Slot: </span>{{ date('h:i A', strtotime(@$data->time_slot)) }}</td>
				</tr>
				<tr><td class="gry-color small">{{ __('Email') }}: {{ $data->email }}</td></tr>
				<tr><td class="gry-color small">{{ __('Phone') }}: {{ $data->phone }}</td></tr>
			</table>
		</div>

	    <div style="padding: 0.5rem;">
			<table class="padding text-left small border-bottom">
				<thead>
	                <tr class="gry-color" style="background: #eceff4;">
	                    <th width="45%"  style="font-size: 12px; text-align: left;">{{ __('Activity Detail') }}</th>
	                    <th width="15%"  style="font-size: 12px; text-align: center;">{{ __('Amount (Excl. VAT)') }}</th>
	                    <th width="10%"  style="font-size: 12px; text-align: center;">{{ __('VAT Rate') }}</th>
	                    <th width="12%"  style="font-size: 12px; text-align: center;">{{ __('VAT Amt') }}</th>
	                    <th width="18%"  style="font-size: 12px; text-align: center;">{{ __('Subtotal') }}</th>
	                </tr>
				</thead>
				<tbody class="strong">
                    @php
                        $amount = @$data->adult_count*@$data->adult_price + @$data->child_count*@$data->child_price + @$data->infant_count*@$data->infant_price;

                        if(@$amount > 0){
                            $tourAmount = @$amount;
                        }else{
                            $tourAmount = @$data->fixed_charges;
                        }

                        $amountWithoutVat = ($tourAmount/105)*100;
                        $vatAmount = $amountWithoutVat * 0.05;
                    @endphp
                    <tr>
                        <td style="font-size: 12px;">
                            <p class="text-primary" style="font-weight: bold;">{{ @$data->tour->name }}</p>
                            <p style="font-style: italic;"><span class="gry-color">Adult: </span>{{ @$data->adult_count }}</p>
                            <p style="font-style: italic;"><span class="gry-color">Child: </span>{{ @$data->child_count }}</p>
                            <p style="font-style: italic;"><span class="gry-color">Infant: </span>{{ @$data->infant_count }}</p>
                        </td>
                        <td style="font-size: 12px;text-align: center;">{{ single_price(@$amountWithoutVat) }}</td>
                        <td style="font-size: 12px;text-align: center;">{{ __('5%') }}</td>
                        <td style="font-size: 12px;text-align: center;">{{ single_price(@$vatAmount) }}</td>
                        <td style="font-size: 12px;text-align: center;">{{ single_price(@$amountWithoutVat + @$vatAmount) }}</td>
                    </tr>
                    @if(@$amount > 0)
                    @php
                        $fixedChargesWithoutVat = (@$data->fixed_charges/105)*100;
                        $vatOnFixedCharges = @$fixedChargesWithoutVat * 0.05;
                    @endphp
                    <tr>
                        <td style="font-size: 12px;font-weight: bold;" class="text-primary">{{ $data->fixed_charges_type }}</td>
                        <td style="font-size: 12px;text-align: center;">{{ single_price(@$fixedChargesWithoutVat) }}</td>
                        <td style="font-size: 12px;text-align: center;">{{ __('5%') }}</td>
                        <td style="font-size: 12px;text-align: center;">{{ single_price(@$vatOnFixedCharges) }}</td>
                        <td style="font-size: 12px;text-align: center;">{{ single_price(@$fixedChargesWithoutVat + @$vatOnFixedCharges) }}</td>
                    </tr>
                    @endif
                </tbody>
			</table>
		</div>

	    <div style="padding:0 1rem;">
					@php
                    $subtotal = $data->subtotal;
                    $tax = $data->total_vat;
                    @endphp
	        <table style="width: 40%;margin-left:auto;" class="text-right sm-padding small strong">
		        <tbody>
			        <tr>
						@php
						$total = $data->grand_total;
						$total = $total < 0 ? 0 : $total;
						@endphp
			            <th class="text-left strong" style="font-size: 18px;font-weight: bold;">{{ __('Total') }}</th>
			            <td class="currency" style="font-size: 18px;font-weight: bold;">{{ single_price($total) }}</td>
			        </tr>
		        </tbody>
		    </table>
	    </div>

	    <div style="padding:0 0.5rem; margin-top: 3em;">
			@php
	            $subtotal = $total;
	            $subtotalWithoutVat = ($subtotal/105) * 100;
	            $vatOnSubtotal = $subtotalWithoutVat * 0.05;
            @endphp
	        <table style="width: 60%;margin-left:auto;" class="text-right sm-padding small strong">
	        	<p style="font-size: 14px;text-align: left;"><strong>VAT Summary</strong></p>
	        	<thead>
	        		<tr class="gry-color" style="background: #eceff4;">
		        		<th style="font-size: 12px;text-align: center;"><strong>VAT Rate</strong></th>
		        		<th style="font-size: 12px;text-align: center;"><strong>Subtotal<br>(excl. VAT)</strong></th>
		        		<th style="font-size: 12px;text-align: center;"><strong>VAT</strong></th>
		        		<th style="font-size: 12px;text-align: center;"><strong>Total</strong></th>
		        	</tr>
	        	</thead>
		        <tbody>
			        <tr>
			            <td class="" style="font-size: 12px;text-align: center;">5%</td>
			            <td class="currency" style="font-size: 12px;text-align: center;">{{ single_price($subtotalWithoutVat) }}</td>
			            <td class="currency" style="font-size: 12px;text-align: center;">{{ single_price($vatOnSubtotal) }}</td>
			            <td class="currency" style="font-size: 12px;text-align: center;"><strong>{{ single_price($subtotal) }}</strong></td>
			        </tr>
		        </tbody>
		    </table>
	    </div>

	</div>

	<div class="page-break"></div>

	<div class="">
		<div style="padding: 1rem;" class="custom-activity">
			<div style="background-color: #eceff4;padding:0.5rem;border-radius: 5px;">
				<h3>Activities:</h3>
				<div style="padding: 0.5rem 0 0 1.5rem;">
					{!! @$data->custom_activity ?? @$data->tour->itenarary_description !!}
				</div>
			</div>
		</div>
		<div style="padding: 1rem;text-align:justify;">
			<div style="background-color: rgba(255, 0, 0, 0.1);padding:0.5rem;border: 1px solid rgba(255, 0, 0, 0.5);border-radius: 5px;">
				<h3>Cancelation Policies:</h3>
				<div style="padding: 0.5rem 0;font-size: 12px;">
					{!! @$data->tour->cancellation_policy_description !!}
				</div>
			</div>
		</div>
	</div>
</body>
</html>
