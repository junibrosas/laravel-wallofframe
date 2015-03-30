

@include('components.tables.table-summary')

<div class="amount">
    <div class="row">
        <div class="col-xs-6"><h6>Shipping</h6></div>
        <div class="col-xs-6"><h6>Free</h6></div>
    </div>
    <div class="row">
        <div class="col-xs-6">Subtotal</div>
        <div class="col-xs-6">{{ ngTotalAmount($total_amount) }}</div>
    </div>
    <div class="row bg-info total">
        <div class="col-xs-6"><b>Total</b></div>
        <div class="col-xs-6 "><b>{{ ngTotalAmount($total_amount) }}</b></div>
    </div>
</div>