@include('components.tables.table-footer')

<div ng-show="tableData.length > 0">
    <table class="table table-striped ng-table-responsive" ng-table="tableParams" template-pagination="custom/pager">
        <thead>
            <tr>
                <th ><input type="checkbox" class="iCheck-all icheck"/></th>
                <th>Width</th>
                <th>Height</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="size in tableData" ng-click="selectedSize(size)" style="cursor: pointer;">
               <th  scope="row"> <input class="icheck" name="tableItems[]" type="checkbox" value="@{{ size.id }}"></th>
               <td class="text-center">@{{ size.width }}</td>
               <td class="text-center">@{{ size.height }}</td>
               <td class="text-center">@{{ size.price }}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="alert alert-danger " ng-show="tableData <= 0">
    No data available
</div>