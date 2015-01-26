<div class="pull-right">
    <ul class="list-inline" id="browse-pages" ng-show="showPageButton">
        <li ng-repeat="page in pageRange">
            <a style="cursor: pointer" ng-click="loadTo( page.number )" class="normal-link " ng-class="page.class">@{{ page.number }}</a>
        </li>
    </ul>
    <a style="cursor: pointer" class="btn btn-default btn-sm" ng-show="showPageButton" ng-click="previousPage()">Previous</a>
    <a style="cursor: pointer" class="btn btn-default btn-sm" ng-show="showPageButton" ng-click="nextPage()">Next</a>
    <a style="cursor: pointer" class="btn btn-default btn-sm" ng-show="showPageButton" ng-click="toLastPage()">Last</a>
</div>