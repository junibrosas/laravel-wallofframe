@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="orders space-top-sm col-md-12"  ng-controller="TableController">
            <h2 class="side-heading">Contacts</h2>

            @include('components.tables.table-contacts')
        </div>
    </div>
@stop