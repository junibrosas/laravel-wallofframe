@extends('layout.profile')
@section('footer')
    @parent

@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="label-heading">Personal Details</h4>
            <a href="#" class="btn btn-info btn-xs pull-right btn-edit personal-btn">Edit</a>
        </div>
    </div>

    <div class="personal-details">
        <div class="row info">
            <div class="col-xs-4">Name:</div>
            <div class="col-xs-8">{{ $user->present()->name }}</div>
        </div>
        <div class="row info">
            <div class="col-xs-4">Email:</div>
            <div class="col-xs-8">{{ $user->present()->email }}</div>
        </div>
        {{--<div class="row info">
            <div class="col-xs-4">Birthday:</div>
            <div class="col-xs-8">{{ $user->present()->birthday }}</div>
        </div>--}}
        <div class="row info">
            <div class="col-xs-4">Password:</div>
            <div class="col-xs-8">******** [ <a href="{{ route('password.update') }}" class="password-link">Change Password</a> ] </div>
        </div>
    </div>
    <div class="personal-details-form " style="display:none;">
        @include('components.forms.profile-edit-form')
    </div>


    <div class="row">
        <div class="col-md-12">
            <h4 class="label-heading">Billing/Shipping Address</h4>
        </div>
        <div class="col-md-12">
            <h6 class="border-bottom">Address</h6>
            <div class="row">
                <div class="col-md-12">
                    @if($user->shippingAddresses()->count() > 0)
                        @foreach( $user->shippingAddresses as $address )
                            <button class="btn btn-info btn-xs pull-right btn-edit address-btn" data-id="{{ $address->id }}">Edit</button>
                            <div class="address-box border-bottom" id="address-box-{{ $address->id }}">

                                <p>{{ $address->present()->name }}, {{ $address->present()->mobile }} <br/>
                                {{ $address->present()->address }} <br/>
                                    <span class="landmark"> {{ $address->present()->landmark }}</span>
                                </p>

                            </div>
                            <div style="display:none" id="address-form-{{ $address->id }}" class="address-form">
                                @include('components.forms.ship-address-form', ['address' => $address])
                            </div>
                        @endforeach
                    @endif

                    <div class="ship-form" style="display:none">
                        @include('components.forms.ship-address-form', ['address' => new ShippingAddress(), 'type' => 'new'])
                    </div>
                    <button class="btn btn-default btn-sm btn-purchase ship-btn "><i class="fa fa-plus"></i> New Address</button>
                </div>
            </div>
        </div>
    </div>
@stop

