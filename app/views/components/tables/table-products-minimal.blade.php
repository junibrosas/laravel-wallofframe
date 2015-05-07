<table class="table table-responsive" ng-show="transaction.products.length > 0">
    <thead>
        <tr>
            <th width="60%">Item(s)</th>
            <th width="30%">Price</th>
            <th width="10%">Quantity</th>
        </tr>
    </thead>
    <tbody>
        <tr ng-repeat="product in transaction.products">
            <td>@{{ product.title }}</td>
            <td> <small>@{{main.currencyConvert( product.price, main.inCurrency, main.outCurrency ) | currency : main.outCurrency + ' ' }}</small> </td>
            <td>
                <input type="text" ng-model="product.quantity" ng-init="product.quantity = 1" class="form-control"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            </td>
        </tr>
    </tbody>
</table>
<div class="alert alert-danger" ng-show="transaction.products.length <= 0">
    No available products
</div>