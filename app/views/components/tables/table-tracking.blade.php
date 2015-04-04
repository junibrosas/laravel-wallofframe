@if( count($transactions) > 0 )
    <table class="table table-striped table-tracking">
        <tr>
            <th>Tracking Number</th>
            <th>Method</th>
            <th>Shipping Address</th>
            <th>Status</th>
            <th>Date</th>
            <th>Products</th>
            <th class="text-right">Amount</th>
        </tr>
        @foreach( $transactions as $transaction )
            <tr>
                <td>{{ $transaction->present()->trackingNumber }}</td>
                <td>{{ $transaction->present()->paymentMethod }}</td>
                <td width="20%">{{ $transaction->present()->shippingAddress }}</td>
                <td class="text-center">{{ $transaction->present()->status }}</td>
                <td>{{ $transaction->present()->date }}</td>
                <td></td>
                {{--<td>{{ $transaction->present()->productNames }}</td>--}}
                <td class="text-right">{{ $transaction->present()->totalAmount }}</td>
            </tr>
        @endforeach
    </table>
@else
<div class="alert alert-danger alert-sm space-sm" role="alert">
    <b><?php echo TRANSACTION_EMPTY; ?></b>
</div>
@endif
