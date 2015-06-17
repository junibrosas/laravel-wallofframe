@extends('layout.admin')
@section('footer')
    @parent
    <script type="text/javascript">
        $(function(){
            var bulkSubmitBtn = $('#order-bulk-submit-btn');
            var filterSubmitBtn = $('#order-filter-submit-btn');
            var form = $('#order-form-submission');

            bulkSubmitBtn.click(function(){
                form.attr('action', form.data('bulk-url'));
                form.submit();
            });

            filterSubmitBtn.click(function(){
                form.attr('action', form.data('filter-url'));
                form.submit();
            });
        });
    </script>
@stop
@section('content')
    <div class="row">
        <div class="orders space-top-sm col-md-12"  ng-controller="TableController">
            <ul class="list list-inline pull-right">
                <li><a href="{{ route('admin.orders.new') }}" class="btn btn-default"> <i class="fa fa-plus"></i> New Order</a></li>
            </ul>
            <h2 class="side-heading">Orders</h2>

            {{--Form Actions--}}
            <form action="{{ route('admin.orders.action') }}"
                data-bulk-url="{{ route('admin.orders.action') }}"
                data-filter-url="{{ route('admin.orders.filter') }}"
                method="post"
                id="order-form-submission">

                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="space-top-sm" style="padding-bottom: 50px;">
                    <div class="col-md-5 no-pad-left">
                        <div class="col-md-8 no-pad-left">
                             <div class="form-group">

                                {{ Form::select('bulk_action', Transaction::listStatus(), "", ['class' => 'form-control col-md-8']);  }}

                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-default" id="order-bulk-submit-btn">Apply</button>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5 no-pad-right">
                        <div class="col-md-8">
                             <div class="form-group">

                                {{ Form::select('filter', Transaction::listFilter(), Request::segment(3) == "" ? "" : Request::segment(3), ['class' => 'form-control col-md-8']);  }}

                            </div>
                        </div>
                        <div class="col-md-4 no-pad-right">
                            <button type="submit" class="btn btn-default" id="order-filter-submit-btn">Apply</button>
                        </div>
                    </div>
                    <div class="space-bottom-sm"></div>
                </div>
                @include('components.tables.table-orders')
            </form>
        </div>
    </div>
@stop