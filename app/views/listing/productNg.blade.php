<div class="col-md-4 col-sm-6 col-xs-6 item" ng-repeat="product in products">
    <a href="@{{ product.url }}" class="frame-link">
        @if(isset($no_ribbon) == false)
            <div class="ribbon-wrapper" ng-show="product.statusClass ? true : false">
                <div class="ribbon @{{ product.statusClass }}">@{{ product.status }}</div>
            </div>
        @endif

        <img ng-src="@{{ product.imageThumb }}" class="img-responsive img-frame">

        <div class="detail">
            <div style="min-height: 45px">
                <h4 class="title">@{{ product.title }} <span>@{{ product.size }}</span></h4>
                <div class="subhead">@{{ product.category }}</div>
            </div>
            <div class="description">
               {{-- <a href="#"><i class="fa fa-tag"></i> @{{ main.currencyConvert( product.price, main.inCurrency, main.outCurrency ) | currency : main.outCurrency + ' ' }}</a>--}}
                <span class="pull-right" ng-controller="ProductListingController">
                    {{--<a href='@{{ product.addToBagUrl }}'><i class="fa fa-shopping-cart"></i></a> &nbsp;--}}
                    @if( Auth::check() )
                        <a style="cursor:pointer" ng-click="addToWishList( product )"><i class="@{{ product.isInWishList == true ? 'toggle-red' : '' }} fa fa-heart"></i></a>
                    @endif
                </span>
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