<form class="mainbox product-update" ng-submit="submitAdd(size)">
    <div class="form-group">
        <label for="priority">Priority No.</label>
        <input class="form-control" type="text" ng-model="size.order">
        <div class="label label-danger" ng-show="errors.order[0]">@{{ errors.order.toString()}}</div>
    </div>
    <div class="form-group">
        <label for="width">Width</label>
        <input class="form-control" type="text" ng-model="size.width">
        <div class="label label-danger" ng-show="errors.width[0]">@{{ errors.width.toString()}}</div>
    </div>
    <div class="form-group">
        <label for="height">Height</label>
        <input class="form-control" type="text" ng-model="size.height">
        <div class="label label-danger" ng-show="errors.height[0]">@{{ errors.height.toString()}}</div>
    </div>
    <div class="form-group">
        <label for="category">Category Exclusive To</label>
        <select ng-model="size.category" ng-options="category.name for category in categories track by category.id" class="form-control">
            <option value="">All</option>
        </select>
    </div>
    <div class="form-group">
        <label for="password">Price</label>
        <input class="form-control" type="text" ng-model="size.price">
        <div class="label label-danger" ng-show="errors.price[0]">@{{ errors.price.toString()}}</div>
    </div>

    <button type="submit" class="btn btn-default"> Create </button>
    <span id="save-mark" class="text-success saved-mark" style="display: none;"><i class="fa fa-check-circle-o"></i></span>
    <span id="load-mark" class="fa-spin load-mark" style="display: none;"><i class="fa fa-spinner"></i></span>
</form>