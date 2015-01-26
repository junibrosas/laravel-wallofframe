@extends('layout.profile')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="label-heading">Personal Details</h4>
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
            <div class="col-md-12">
                @include('components.forms.change-pass-form')
            </div>
        </div>
    </div>
@stop

