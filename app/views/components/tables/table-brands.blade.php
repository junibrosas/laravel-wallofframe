@include('components.tables.table-footer')

<div ng-show="tableData.length > 0">
    <table class="table table-striped ng-table-responsive" ng-table="tableParams" template-pagination="custom/pager">
        <thead>
            <tr>
                <th width="5%"><input type="checkbox" class="iCheck-all icheck"/></th>
                <th width="15%">Brand</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="brand in tableData" style="cursor: pointer;" ng-click="selectedBrand(brand)">
                <td  scope="row"> <input class="icheck" name="tableItems[]" type="checkbox" value="@{{ brand.id }}"></td>
                <td>
                    <img ng-src="@{{ brand.image }}" alt="" width="100" />
                </td>
                <td>
                    Name: @{{ brand.name }} <br/>
                    Total Designs: @{{ brand.totalDesigns }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="alert alert-danger " ng-show="tableData <= 0">
    No data available
</div>