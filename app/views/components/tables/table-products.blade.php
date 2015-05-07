@include('components.tables.table-footer')

<div ng-show="tableData.length > 0">
    <table class="table table-striped table-product ng-table-responsive" ng-table="tableParams" template-pagination="custom/pager">
        <thead>
            <tr>
                <th width="10%"><button class="btn btn-danger" ng-click="checkAllToggle()"><i class="fa fa-check-square-o"></i></button></th>
                <th>Item(s)</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="product in tableData">
                <th scope="row"> <input type="checkbox" checklist-model="transaction.products" checklist-value="product"></th>
                <td class="text-left">
                    <a href="@{{ product.url }}">
                    <img ng-src="@{{ product.imageSquare }}" class="img-responsive" width="80"/>
                    </a>
                </td>
                <td>
                    <h6>@{{ product.title }}</h6>
                    <ul class="list-unstyled list-detail">
                        <li>Category: @{{ product.category }}</li>
                        <li>Size: @{{ product.size }}</li>
                    </ul>
                </td>
                <td class="text-right"> <small>@{{main.currencyConvert( product.price, main.inCurrency, main.outCurrency ) | currency : main.outCurrency + ' ' }}</small> </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="alert alert-danger " ng-show="tableData <= 0">
    No data available
</div>
