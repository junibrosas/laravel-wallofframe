@extends('layout.admin')
@section('footer')
    @parent
    {{ link_js('js/jqNotify/notify.min.js') }}
@stop
@section('content')
    <div class="row" ng-controller="BrandsController">
        <div class="col-md-8" ng-controller="TableController">
            {{--Form Actions--}}
            {{ Form::open(['route'=>'admin.brand.actions', 'method' => 'post' ]) }}
                <div class="space-top-sm" style="padding-bottom: 50px;">
                    <div class="col-md-3 no-pad-left ">
                        <div class="form-group">
                            <select class="form-control col-md-8" name="bulk_action">
                                <option value="">Bulk Action</option>
                                <option value="delete">Delete Permanently</option>
                            </select>
                        </div>
                    </div>
                    <div class="space-bottom-sm"></div>
                    <div class="col-md-9 no-right">
                          <button type="submit" name="apply" class="btn btn-default">Apply</button>
                    </div>
                </div>

                {{--Brand Table--}}
                @include('components.tables.table-brands')

            {{ Form::close() }}
        </div>
        <div class="col-md-4">
            @include('components.forms.brand-edit')
        </div>
    </div>
@stop