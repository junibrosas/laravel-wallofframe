@include('components.tables.table-footer')
<div ng-show="tableData.length > 0">
    <table class="table table-striped ng-table-responsive">
        <thead>
            <tr>
                <th>Item(s)</th>
                <th  >Quantity</th>
                <th class="pull-right">Price</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="product in tableData">
                <td>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="@{{ product.options.url  }}">
                                <img ng-src='@{{ product.options.image  }}' class="img-responsive" width="150"/>
                                <div class="logo-watermark" style="bottom: 31%; right: 12%;">
                                    <span style="font-size: 6px; color: @{{ product.options.watermarkColor }};">Wall Of <br/> Frame</span>
                                </div>
                            </a>
                            <button type="submit" class="btn btn-danger btn-xs space-xs btn-block" ng-click="remoteCartItem(product);">remove</button>
                        </div>
                        <div class="col-md-9 no-pad">
                            <h6>@{{ product.name }}</h6>
                            <ul class="list-unstyled list-detail">
                                <li>Type: @{{ product.options.type }}</li>
                                <li>Category: @{{ product.options.category }}</li>
                                <li>Size: @{{ product.options.width +"x"+ product.options.height }}</li>
                            </ul>
                        </div>
                    </div>
                </td>
                <td class="text-center" style="width: 20px">
                    <input type="number" ng-model="product.qty" class="form-control" ng-change="changeQuantity(product)" min="1" max="20"/>
                </td>
                <td class="text-right">
                    @{{ main.currencyConvert(product.subtotal , main.inCurrency, main.outCurrency ) | currency : main.outCurrency + ' ' }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="alert alert-danger " ng-show="tableData <= 0">
    No data available
</div>