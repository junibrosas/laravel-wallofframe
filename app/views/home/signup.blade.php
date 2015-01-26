@extends('layout.default')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Sign Up</div>
                        <div style="float:right; font-size: 85%; position: relative; top:-20px"><a id="" href="{{ route('login') }}">Sign In</a></div>
                    </div>
                    <div class="panel-body" >

                        @include('components.forms.signup-form')

                     </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

