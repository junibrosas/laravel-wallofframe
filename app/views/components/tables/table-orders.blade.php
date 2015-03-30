@include('components.tables.table-footer')

<div  ng-show="tableData.length > 0">
    <table class="table ng-table-responsive" ng-table="tableParams" template-pagination="custom/pager">
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
                <th  scope="row"> <input class="icheck" type="checkbox"></th>
                <td  data-title="'Orders'">
                    #@{{ order.tracking_number }} <br/> <small>Buyer: @{{ order.buyer }}</small>
                </td>
                <td class="text-center">@{{ order.status }}</td>
                <td  data-title="'Date'">
                    <i class="fa fa-clock-o"></i> <span style="font-size: 13px;">@{{ order.date }}</span>
                </td>
                <td  data-title="'Amount'" class="text-center">
                    @{{ main.currencyConvert( order.total_amount, main.inCurrency, main.outCurrency ) | currency : main.outCurrency + ' ' }}
                </td>
                <td data-title="'Actions'" class="text-center">
                    <button class="btn btn-danger"><i class="fa fa-eye"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="alert alert-danger " ng-show="tableData <= 0">
    No data available
</div>