@include('components.tables.table-footer')

<div ng-show="tableData.length > 0">
    <table class="table table-striped ng-table-responsive" ng-table="tableParams" template-pagination="custom/pager">
        <thead>
            <tr>
                <th ><input type="checkbox" class="iCheck-all icheck"/></th>
                <th>Orders</th>
                <th>Status</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="order in tableData">
                <th  scope="row"> <input class="icheck" name="transactions[]" type="checkbox" value="@{{ order.id }}"></th>
                <td  data-title="'Orders'">
                    <a href="@{{ order.url }}" class="link-red">#@{{ order.tracking_number }}</a>
                    <br/> <small><b>Buyer</b>: @{{ order.buyer }}</small> &nbsp;&nbsp;&nbsp;<small><b>Method</b>: @{{ order.payment_method }}</small>
                </td>
                <td class="text-center">@{{ order.status }}</td>
                <td  data-title="'Date'" class="text-center">
                                         <i class="fa fa-clock-o"></i> <span style="font-size: 13px;">@{{ order.date }}</span>
                                     </td>
                <td  data-title="'Amount'" class="text-center">
                    @{{ main.currencyConvert( order.total_amount, main.inCurrency, main.outCurrency ) | currency : main.outCurrency + ' ' }}
                </td>
                <td data-title="'Actions'" class="text-center">
                    <button type="button" class="btn btn-danger"><a href="@{{ order.url }}" style="color: white"><i class="fa fa-eye"></i></a></button>
                    {{--<button class="btn btn-danger"><i class="fa fa-pencil"></i></button>--}}
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="alert alert-danger " ng-show="tableData <= 0">
    No data available
</div>