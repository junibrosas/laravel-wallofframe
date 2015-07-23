<div class="col-md-3 col-sm-6 item animated flipInX" ng-repeat="product in products">
    <a href="@{{ product.url }}" class="frame-link ">
        @if(isset($no_ribbon) == false)
            <div class="ribbon-wrapper" ng-show="product.statusClass ? true : false">
                <div class="ribbon @{{ product.statusClass }}">@{{ product.status }}</div>
            </div>
        @endif

        <img ng-src="@{{ product.imageSquare }}" class="img-responsive img-frame">

        {{--Logo Watermark--}}
        <div class="watermark" style="bottom: 24%; right: 8%;">
            <img src="{{ asset('img/watermark-black.png') }}" alt="Wall Of Frame Watermark" width="40" style="box-shadow: none;">
        </div>

        <div class="detail">
            <div>
                <h4 class="title">@{{ product.title }}</h4>
                <div class="subhead">@{{ product.category }}</div>
            </div>
            <div class="description">
                <div class="pull-right" ng-controller="ProductListingController">
                    @if( Auth::check() )
                        <a style="cursor:pointer" ng-click="addToWishList( product );$event.stopPropagation();"><i class="@{{ product.isInWishList == true ? 'toggle-red' : '' }} fa fa-heart"></i></a>
                    @endif
                </div>
            </div>
        </div>

        <div class="content hidden-xs" style="display:none" >
            <a href="@{{ product.url }}" class="frame-link">
                <h4 class="title">@{{ product.type }}</h4>
                <div class="description">
                    <p>@{{ product.excerpt }}</p>
                </div>
            </a>
        </div>
    </a>
</div>
<div class="alert alert-danger alert-sm" ng-show="noProducts" role="alert">
    <b>{{ PRODUCT_EMPTY }}</b>
</div>