@extends('layout.default')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Opps!</div>
                    </div>
                    <div style="padding-top:30px" class="panel-body" >
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            @include('components.forms.email-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop

