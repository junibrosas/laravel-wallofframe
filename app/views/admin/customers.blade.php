@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="orders space-top-sm col-md-12"  ng-controller="TableController">
            <ul class="list list-inline pull-right">
                <li><a href="{{ route('signup') }}" class="btn btn-default"> <i class="fa fa-plus"></i> New Customer</a></li>
            </ul>
            <h2 class="side-heading">Customers</h2>

            {{--Form Actions--}}
            @include('components.tables.table-'.$suffix)
        </div>
    </div>
@stop