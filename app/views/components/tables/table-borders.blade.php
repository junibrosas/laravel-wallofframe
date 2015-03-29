@section('footer')
    @parent
    <script type="text/ng-template" id="custom/pager">
        <ul class="pager ng-cloak">
            <li ng-repeat="page in pages"
                ng-class="{'disabled': !page.active, 'previous': page.type == 'prev', 'next': page.type == 'next'}"
                ng-show="page.type == 'prev' || page.type == 'next'" ng-switch="page.type">
                <a ng-switch-when="prev" ng-click="params.page(page.number); $event.stopPropagation();" style="cursor: pointer">Previous</a>
                {{--<a ng-switch-when="next" ng-click="params.page(page.number); $event.stopPropagation();" style="cursor: pointer">Next &raquo;</a>--}}
                <a style="cursor: pointer" ng-switch-when="next" ng-click="params.page(page.number)">Next</a>
            </li>
            <li>
                <div class="btn-group">
                    <button type="button" ng-class="{'active':params.count() == 10}" ng-click="params.count(10)" class="btn btn-default btn-sm">10</button>
                    <button type="button" ng-class="{'active':params.count() == 25}" ng-click="params.count(25)" class="btn btn-default btn-sm">25</button>
                    <button type="button" ng-class="{'active':params.count() == 50}" ng-click="params.count(50)" class="btn btn-default btn-sm">50</button>
                    <button type="button" ng-class="{'active':params.count() == 100}" ng-click="params.count(100)" class="btn btn-default btn-sm">100</button>
                </div>
            </li>
        </ul>
    </script>
@stop
<div  ng-show="tableData.length > 0">
    <table class="table ng-table-responsive" ng-table="tableParams" template-pagination="custom/pager">
        <thead>
            <tr>
                <th width="5%"><input type="checkbox" class="iCheck-all icheck"/></th>
                <th>Borders</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="frame in tableData">
                <th  scope="row"> <input class="icheck" name="selectedFrames[]" type="checkbox" value="@{{ frame.id }}"></th>
                <td  data-title="'Border'"><img width="60" ng-src="@{{ frame.imagePath }}" class="img-responsive" alt="@{{ frame.name }}" style="cursor: pointer" ng-click="setCurrentItem(frame)"></td>
                <td  data-title="'Date'">
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