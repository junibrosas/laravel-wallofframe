@extends('layout.admin')

@section('content')
    <div class="row" ng-controller="FrameSizeController">
        <div class="col-md-12">
            <h2 class="side-heading">Sizes</h2>
        </div>
        <div class="col-md-8 orders space-top-sm"  ng-controller="TableController">

                    {{--Form Actions--}}
                    {{ Form::open(['route'=>'admin.frame.sizes.actions', 'method' => 'post' ]) }}
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

                    {{--Sizes Table--}}
                    @include('components.tables.table-sizes')


                    {{ Form::close() }}
                </div>
        <div class="col-md-4">
            <div ng-show="isToUpdate == false">
                <h5>Add New Size</h5>

                {{--Add Form--}}
                @include('components.forms.sizes-add')
            </div>


            <div ng-show="isToUpdate == true">
                <h5>Edit Size</h5>

                {{--Edit Form--}}
                @include('components.forms.sizes-edit')
            </div>
        </div>
    </div>
@stop