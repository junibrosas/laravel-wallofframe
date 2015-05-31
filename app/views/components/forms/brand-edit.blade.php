<form class="mainbox product-update" ng-submit="submitEdit()">
    <img ng-src="@{{ brand.image ? brand.image : 'http://placehold.it/245x245' }}" alt="" width="100%"  class="img-border"/>
    <div class="space-md"></div>
    <div class="form-group">
        <label for="password">Name</label>
        <input class="form-control" type="text" ng-model="brand.name">
        <div class="label label-danger" ng-show="errors.name[0]">@{{ errors.name.toString()}}</div>
    </div>

    <button type="submit" class="btn btn-default"> Save </button>
    {{--<button type="button" class="btn btn-default" ng-click="goToCreateForm()"> New </button>--}}
    <span id="save-mark" class="text-success saved-mark" style="display: none;"><i class="fa fa-check-circle-o"></i></span>
    <span id="load-mark" class="fa-spin load-mark" style="display: none;"><i class="fa fa-spinner"></i></span>
</form>