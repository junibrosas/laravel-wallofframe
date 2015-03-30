@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="orders space-top-sm col-md-12"  ng-controller="TableController" ng-init='initialData = {{ json_encode($orders) }}'>
            <ul class="list list-inline pull-right">
                <li><a href="{{ route('admin.orders.new') }}" class="btn btn-default"> <i class="fa fa-plus"></i> New Order</a></li>
            </ul>
            <h2 class="side-heading">Orders</h2>

            {{--Form Actions--}}
            {{ Form::open(['route'=>'admin.orders.action', 'method' => 'post' ]) }}
            <div class="space-top-sm">
                <div class="col-md-3 no-pad-left ">
                    <div class="form-group">
                        <select class="form-control col-md-8" name="bulk_action">
                            <option value="">Bulk Action</option>
                            @foreach( TransactionStatus::get() as $status )
                                <option value="{{ $status->slug }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-9 no-right">
                      <button type="submit" name="apply" class="btn btn-default">Apply</button>
                </div>
            </div>
            @include('components.tables.table-orders')
            {{ Form::close() }}
        </div>
    </div>
@stop