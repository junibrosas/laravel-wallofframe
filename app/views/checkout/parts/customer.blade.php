<h2 class="side-heading space-bottom-md">Customer Information</h2>
<div class="media">
    <a class="media-left" href="{{ route('customer.account') }}">
        <img src="{{ $user->present()->avatar }}" alt="customer profile image" width="150px">
    </a>
    <div class="media-body">
        <p>Hi, <b>{{ $user->present()->name }}</b></p>
        @if(count($user->present()->addresses) <= 0 )
            <p>Please complete the form below.</p>
        @endif

        <p class="space-sm">Not you? <a href="{{ route('logout') }}" class="normal-link">Click here!</a></p>
    </div>
</div>
<div>
    <h6 class="space-top-sm space-bottom-xs">SHIPPING INFORMATION</h6>
    <div class="border-bottom"></div>

    <div class="form-group" ng-controller="ShippingAddressController">
        @if(count($user->present()->addresses) > 0 )
            <i class="fa fa-truck"></i><div class="selected-shipping-title">Select Shipping Address</div>
            @foreach( $user->present()->addresses as $i => $address )
                <div class="radio">

                    <a ng-click="removeShippingAddress({{ $address->id }})" style="cursor: pointer;" class="btn btn-info btn-xs pull-right btn-edit" ><i class="fa fa-trash-o"></i></a>
                    {{--<a style="cursor: pointer;" class="btn btn-info btn-xs pull-right btn-edit" style="margin-right: 5px;"><i class="fa fa-pencil"></i></a>--}}
                    <label>
                        <input type="radio" name="billingAddress"  value="{{ $address->id }}" {{ $i == 0 ? 'checked' : '' }}>
                        {{ $address->present()->name }} <br/>
                        {{ $address->present()->address }} <br/>
                        {{ $address->present()->landmark }} <br/>
                        {{ $address->present()->mobile }} <br/>
                    </label>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning text-center alert-sm" role="alert" style="margin-top: 5px;">
                You have no shipping address yet.
            </div>
        @endif
        <div class="space-sm"></div>
        <div class="text-center">
            <a href="#newShippingAddress" class="new-shipping-btn">New Shipping Information</a>
        </div>

    </div>
</div>


