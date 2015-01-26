@extends('layout.admin')

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
@stop