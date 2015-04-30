<h2 class="side-heading space-bottom-md">Payment Method</h2>
<div class="method form-group">
    @if( PaymentMethod::get()->count() > 0 )
        @foreach( PaymentMethod::get() as $method)
            <div class="radio">
                <label>
                    <input type="radio" name="paymentMethod" value="{{ $method->slug }}" checked>
                    <img src="{{ asset('img/payments/'.$method->image) }}" class="img-responsive elem-center" alt="{{ $method->name }}"/>
                </label>
            </div>
        @endforeach
    @else
        <p class="text-muted"> No available payment methods </p>
    @endif

</div>
<label for="">Note: Cash on Delivery is within United Arab Emirates (UAE).</label>