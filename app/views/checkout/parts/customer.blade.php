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
    <h6 class="space-top-sm space-bottom-xs">BILLING INFORMATION</h6>
    <div class="border-bottom"></div>

    <div class="form-group">
        @if(count($user->present()->addresses) > 0 )
            <span class="space-sm">Select Billing Address</span>
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
    </div>
    <h6 class="space-top-md space-bottom-xs">SHIPPING INFORMATION</h6>
    <div class=" border-bottom"></div>
    <div class="row">
        <div class="col-md-1">
            <i class="fa fa-truck"></i>
        </div>
        <div class="col-md-11">
            <div class="checkbox checkbox-shipping">
                <label>
                    <input type="checkbox" value="" checked>
                    Deliver to the same address
                </label>
            </div>
        </div>
    </div>
</div>