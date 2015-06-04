@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="orders space-top-sm col-md-12"  ng-controller="TableController">
            <h2 class="side-heading">Contacts</h2>
            {{--Form Actions--}}
            {{ Form::open(['route'=>'contacts.actions', 'method' => 'post' ]) }}
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

            {{--Contact Table--}}
            @include('components.tables.table-contacts')


            {{ Form::close() }}


        </div>
    </div>
@stop