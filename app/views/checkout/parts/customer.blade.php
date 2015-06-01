<h2 class="side-heading space-bottom-md">Customer Information</h2>
<div class="media">
    <a class="media-left" href="{{ route('customer.account') }}">
        <img src="{{ asset('img/profile.jpg') }}" alt="customer profile image">
    </a>
    <div class="media-body">
        <p>Hi, <b>{{ $user->present()->name }}</b></p>
        <p>Please complete the form below.</p>
        <p class="space-sm">Not you? <a href="{{ route('logout') }}" class="normal-link">Click here!</a></p>
    </div>
</div>
<div>
    <h6 class="space-top-sm space-bottom-xs">SHIPPING INFORMATION</h6>
    <div class="border-bottom"></div>

    <div class="form-group">
        @if(count($user->present()->addresses) > 0 )
            <span class="space-sm"><i class="fa fa-truck"></i> Select Shipping Address</span>
            @foreach( $user->present()->addresses as $i => $address )
                <div class="radio">
                    <label>
                        <input type="radio" name="billingAddress"  value="{{ $address->id }}" {{ $i == 0 ? 'checked' : '' }}>
                        {{ $address->present()->name }} <br/>
                        {{ $address->present()->address }} <br/>
                        {{ $address->present()->landmark }} <br/>
                        {{ $address->present()->mobile }} <br/>
                    </label>
                </div>
            @endforeach
        @endif
        <div class="text-center">
            <a href="#newShippingAddress" style="font-weight: bold; color: #252525;">New Shipping Information</a>
        </div>

    </div>
</div>


