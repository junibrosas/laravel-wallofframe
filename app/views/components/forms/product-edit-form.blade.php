<form class="mainbox product-update" ng-submit="submitProduct()">
    <div class="form-group">
        <label for="password">Title</label>
        <input class="form-control" type="text" name="title" ng-model="selectedProduct.title">
    </div>
    <div class="form-group">
        <label for="password">Content</label>
        <textarea class="form-control" name="content" ng-model="selectedProduct.content" style="height: 50px" ></textarea>
    </div>
    <div class="form-group">
        <label>Select Category:</label>
        <div class="space-xs"></div>
        <span ng-repeat="category in categories">
            <label>
                <input type="checkbox" checklist-model="selectedProduct.categories" checklist-value="category"> @{{ category.name }}
            </label> <br/>
        </span>
    </div>
    <div class="form-group">
        <label>Select Brand:</label>
         <select name="brand_id" ng-model="currentBrand" ng-options="brand.name for brand in brands" class="form-control">
            <option value="">No Brand</option>
         </select>
    </div>
    <div class="form-group">
        <label>Status:</label>
         <select name="status_id" ng-model="currentStatus" ng-options="status.name for status in statuses" class="form-control"></select>
    </div>
    <div class="form-group">
        <label>Logo Watermark Color:</label>
         <select name="watermark_color" ng-model="currentWatermarkColor" ng-options="color.name for color in watermarkColors" class="form-control"></select>
    </div>
    <div class="form-group">
        <label>Make Public:</label>
         <select name="is_available" ng-model="currentMakePublic" ng-options="bool.name for bool in booleans" class="form-control"></select>
    </div>
    <button type="submit" class="btn btn-default"> Save </button>
    <span id="save-mark" class="text-success saved-mark" style="display: none;"><i class="fa fa-check-circle-o"></i></span>
    <span id="load-mark" class="fa-spin load-mark" style="display: none;"><i class="fa fa-spinner"></i></span>
</form>