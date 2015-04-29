@include('components.tables.table-footer')

<div ng-show="tableData.length > 0">
    <table class="table table-striped ng-table-responsive" ng-table="tableParams" template-pagination="custom/pager">
        <thead>
            <tr>
                <th ><input type="checkbox" class="iCheck-all icheck"/></th>
                <th>Name</th>
                <th>Date Registered</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="user in tableData">
                <th  scope="row"> <input class="icheck" name="transactions[]" type="checkbox" value="@{{ user.id }}"></th>
                <td  data-title="'Name'">
                    <a href="#" class="link-red">@{{ user.profile.first_name +' '+ user.profile.last_name }}</a>
                </td>
                <td  data-title="'Date'" class="text-center">
                    <i class="fa fa-clock-o"></i> <span style="font-size: 13px;">@{{ user.created_at }}</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="alert alert-danger" ng-show="tableData <= 0">
    No data available
</div>