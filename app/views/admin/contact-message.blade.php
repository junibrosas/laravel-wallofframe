@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="orders space-top-sm col-md-12"  ng-controller="TableController">
            <ul class="list list-inline">
                <li><a href="{{ route('contacts.index') }}" class="btn btn-default"> <i class="fa fa-arrow-circle-left"></i> Back </a></li>
            </ul>
            <h2 class="side-heading">{{ $contact->subject }}</h2>
            <b>{{ $contact->first_name .' '. $contact->last_name }} | {{ $contact->email }}</b><br/>
            <small>{{ $contact->number }}</small>

            <br/>
            <br/>
            <p>{{ $contact->message }}</p>
        </div>
    </div>
@stop