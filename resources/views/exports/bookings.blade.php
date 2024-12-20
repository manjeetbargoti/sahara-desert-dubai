<table>
    <thead>
        <tr>
            <th width="5" height="30" style="font-weight: bold; background: #92d050;vertical-align: middle;vertical-align: middle; text-align:center;">Sr no</th>
            <th width="20" style="font-weight: bold; background: #92d050;vertical-align: middle;">Booking Reference</th>
            <th width="20" style="font-weight: bold; background: #92d050;vertical-align: middle;">Vendor</th>
            <th width="40" style="font-weight: bold; background: #92d050;vertical-align: middle;">Activity</th>
            <th width="15" style="font-weight: bold; background: #92d050;vertical-align: middle; text-align:center;">Adult Price</th>
            <th width="15" style="font-weight: bold; background: #92d050;vertical-align: middle; text-align:center;;">Adult Count</th>
            <th width="15" style="font-weight: bold; background: #92d050;vertical-align: middle; text-align:center;">Child Price</th>
            <th width="15" style="font-weight: bold; background: #92d050;vertical-align: middle; text-align:center;">Child Count</th>
            <th width="15" style="font-weight: bold; background: #92d050;vertical-align: middle; text-align:center;">Infant Price</th>
            <th width="15" style="font-weight: bold; background: #92d050;vertical-align: middle; text-align:center;">Infant Count</th>
            <th width="20" style="font-weight: bold; background: #92d050;vertical-align: middle;">Fixed Charges Type</th>
            <th width="15" style="font-weight: bold; background: #92d050;vertical-align: middle; text-align:center;">Fixed Charges</th>
            <th width="15" style="font-weight: bold; background: #92d050;vertical-align: middle; text-align:center;">Activity Date</th>
            <th width="10" style="font-weight: bold; background: #92d050;vertical-align: middle; text-align:center;">Time Slot</th>

            <th width="15" style="font-weight: bold; background: #92d050;vertical-align: middle; text-align:center;">Subtotal</th>
            <th width="15" style="font-weight: bold; background: #92d050;vertical-align: middle; text-align:center;">VAT (5%)</th>
            <th width="15" style="font-weight: bold; background: #92d050;vertical-align: middle; text-align:center;">Grand Total</th>
            <th width="15" style="font-weight: bold; background: #92d050;vertical-align: middle; text-align:center;">Status</th>

            <th width="20" style="font-weight: bold; background: yellow;vertical-align: middle">Customer Name</th>
            <th width="20" style="font-weight: bold; background: yellow;vertical-align: middle">Customer Email</th>
            <th width="20" style="font-weight: bold; background: yellow;vertical-align: middle">Customer Phone</th>

            <th width="20" style="font-weight: bold; background: #1ee0ac;vertical-align: middle; text-align:center;">Payment Status</th>
            <th width="20" style="font-weight: bold; background: #1ee0ac;vertical-align: middle; text-align:center;">Payment Method</th>

            <th width="25" style="font-weight: bold; background: #92d050;vertical-align: middle; text-align:center;">Booking Date</th>
            <th width="25" style="font-weight: bold; background: #92d050;vertical-align: middle; text-align:center;">Remarks</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($bookings))
            @foreach($bookings as $key => $booking)
            <tr>
                <td height="20" style="vertical-align: middle; text-align:center;">{{ $key+1 }}</td>
                <td style="vertical-align: middle;">{{ @$booking->booking_reference }}</td>
                <td style="vertical-align: middle;">{{ @$booking->vendor->name }}</td>
                <td style="vertical-align: middle;">{{ @$booking->tour->name }}</td>
                <td style="vertical-align: middle; text-align:center;">{{ single_price(@$booking->adult_price) }}</td>
                <td style="vertical-align: middle; text-align:center;">{{ @$booking->adult_count }}</td>
                <td style="vertical-align: middle; text-align:center;">{{ single_price(@$booking->child_price) }}</td>
                <td style="vertical-align: middle; text-align:center;">{{ @$booking->child_count }}</td>
                <td style="vertical-align: middle; text-align:center;">{{ single_price(@$booking->infant_price) }}</td>
                <td style="vertical-align: middle; text-align:center;">{{ @$booking->infant_count }}</td>
                <td style="vertical-align: middle;">{{ @$booking->fixed_charges_type }}</td>
                <td style="vertical-align: middle; text-align:center;">{{ single_price(@$booking->fixed_charges) }}</td>
                <td style="vertical-align: middle; text-align:center;">{{ date('d M, Y', strtotime(@$booking->booking_date)) }}</td>
                <td style="vertical-align: middle; text-align:center;">{{ date('h:i A', strtotime(@$booking->time_slot)) }}</td>
                <td style="font-weight: bold; vertical-align: middle; text-align:center;">{{ single_price(@$booking->subtotal) }}</td>
                <td style="font-weight: bold; vertical-align: middle; text-align:center;">{{ single_price(@$booking->total_vat) }}</td>
                <td style="font-weight: bold; vertical-align: middle; text-align:center;">{{ single_price(@$booking->grand_total) }}</td>

                @if (@$booking->status == 1)
                    <td style="font-weight: bold; color: green;vertical-align: middle; text-align:center;">Completed</td>
                @elseif (@$booking->status == 2)
                    <td style="font-weight: bold; color: orange;vertical-align: middle; text-align:center;">Pending</td>
                @elseif (@$booking->status == 0)
                    <td style="font-weight: bold; color: red;vertical-align: middle; text-align:center;">Canceled</td>
                @endif

                <td style="vertical-align: middle;">{{ @$booking->name }}</td>
                <td style="vertical-align: middle;">{{ @$booking->email }}</td>
                <td style="vertical-align: middle; text-align:center;">{{ @$booking->phone }}</td>

                <td style="vertical-align: middle; text-align:center;">{{ @$booking->payment_status }}</td>
                <td style="vertical-align: middle; text-align:center;">{{ @$booking->payment_method }}</td>

                <td style="vertical-align: middle; text-align:center;">{{ date('d M, Y h:i A', strtotime(@$booking->created_at)) }}</td>
                <td style="vertical-align: middle; text-align:center;">{{ @$booking->custom_remarks }}</td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>