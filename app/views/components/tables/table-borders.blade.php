@include('components.tables.table-footer')

<div ng-show="tableData.length > 0">
    <table class="table table-striped ng-table-responsive" ng-table="tableParams" template-pagination="custom/pager">
        <thead>
            <tr>
                <th width="5%"><input type="checkbox" class="iCheck-all icheck"/></th>
                <th>Borders</th>
                <th>Name</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="frame in tableData">
                <td  scope="row"> <input class="icheck" name="selectedFrames[]" type="checkbox" value="@{{ frame.id }}"></td>
                <td  data-title="'Border'"><img width="60" ng-src="@{{ frame.imagePath }}" class="img-responsive" alt="@{{ frame.name }}" style="cursor: pointer" ng-click="setCurrentItem(frame)"></td>
                <td data-title="'Name'">@{{ frame.name }}</td>
                <td  data-title="'Date'" class="text-center">
                    <i class="fa fa-clock-o"></i> <span style="font-size: 13px;">@{{ frame.date_human }}</span>
                </td>
                <td  data-title="'Status'" class="text-center">
                    <a class="btn btn-success btn-sm" ng-show="frame.is_active == 1 ? true : false" style="cursor: pointer">active</a>
                    <a class="btn btn-danger btn-sm" ng-show="frame.is_active == 0 ? true : false" style="cursor: pointer">inactive</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="alert alert-danger " ng-show="tableData <= 0">
    No data available
</div>