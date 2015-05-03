@extends('layout.default')

@section('content')
    <section>
        <div class="container checkout">
            <div class="row">
                <div class="col-md-6">

                    @include('components.forms.ship-complete-form', [$address = new ShippingAddress() ])
                </div>
                <div class="col-md-6">
                    <h2 class="side-heading">Already a member?</h2>
                    <div id="loginbox" style="margin-top:50px;" class="mainbox">
                        <div class="panel panel-info" >
                            <div class="panel-heading">
                                <div class="panel-title">Sign In</div>
                                <div style="float:right; font-size: 80%; position: relative; top:-20px"><a href="{{ route('forgot.password') }}">Forgot password?</a></div>
                            </div>
                            <div style="padding-top:30px" class="panel-body" >
                                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                                    @include('components.forms.login-form', ['redirect' => route('checkout.cart')])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop