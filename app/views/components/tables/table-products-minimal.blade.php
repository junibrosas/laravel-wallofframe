<table class="table table-responsive" ng-show="transaction.products.length > 0">
    <thead>
        <tr>
            <th>Item(s)</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <tr ng-repeat="product in transaction.products">
            <td>@{{ product.title }}</td>
            <td> <small>@{{ main.currencyConvert( product.price, main.inCurrency, main.outCurrency ) | currency : main.outCurrency + ' ' }}</small> </td>
        </tr>

    </tbody>
</table>
<div class="alert alert-danger" ng-show="transaction.products.length <= 0">
    No available products
</div>