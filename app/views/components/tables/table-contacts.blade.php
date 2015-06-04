@include('components.tables.table-footer')

<div ng-show="tableData.length > 0">
    <table class="table table-striped ng-table-responsive" ng-table="tableParams" template-pagination="custom/pager">
        <thead>
            <tr>
                <th ><input type="checkbox" class="iCheck-all icheck"/></th>
                <th>Name</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="contact in tableData">
                <th  scope="row"> <input class="icheck" name="tableItems[]" type="checkbox" value="@{{ contact.id }}"></th>
                <td  data-title="'Name'">
                    <a href="@{{ contact.url }}" class="link-red">@{{ contact.first_name +' '+ contact.last_name }}</a>
                </td>
                <td>
                    @{{ contact.subject  }}
                </td>
                <td><a href="@{{ contact.url }}" class="link-red">@{{ contact.message }}</a></td>
                <td  data-title="'Date'" class="text-center">
                    <i class="fa fa-clock-o"></i> <span style="font-size: 13px;">@{{ contact.date }}</span>
                </td>
                <td></td>
            </tr>

        </tbody>
    </table>
</div>
<div class="alert alert-danger" ng-show="tableData <= 0">
    No data available
</div>