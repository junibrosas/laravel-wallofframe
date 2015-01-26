app.controller("FrameManageController", function($http, $scope, productService) {
    $scope.products = {};
    $scope.selectedProductIndex = 0;
    $scope.showUploadImageForm = false; // toggle upload image form
    $scope.showControlButtons = false;
    $scope.showProductForm = false;
    $scope.selectedStatusSlug = window.status; // selected status slug used for url redirection
    $scope.categories = window.categories; // list of categories
    $scope.brands = window.brands; // list of brands
    $scope.types = window.types; // list of types
    $scope.statuses = window.statuses; // list of statuses
    $scope.booleans = [
        { name: 'False', value: 0 },
        { name: 'True', value: 1 }

    ];
    var initialize = function(){
        $scope.selectedProduct = {}; //empty first
        $scope.currentCategory = {};
        $scope.currentBrand = {};
        $scope.currentType = {};
        $scope.currentStatus = {};
        $scope.currentMakePublic = {};

        // get navigations
        $http.get( window.productNavigationUrl ).success( function( data ){
            $scope.navigation = data.navigation;
            $scope.showProductForm = true;
        });
        window.apiUrl = window.productUrl;
        /*
        // get all products
        /*$http.get( window.productUrl+"?status="+$scope.selectedStatusSlug ).success( function( data ){
            $scope.products = data.products;

        });*/

    }



    initialize();

    // get products by status
    $scope.getProductsByStatus = function( status ){
        $scope.selectedStatusSlug = status;
        //window.apiUrl = window.productUrl + '?status='+$scope.selectedStatusSlug;

        initialize();
    }

    $scope.removeSelectedProduct = function( index ){
        $http({
            method : 'POST',
            url : window.productDeleteUrl,
            data : productService.getProduct()
        }).success(function (data) {
            console.log(data);
            productService.getProducts().splice( index, 1);
        });
    }

    // get the selected product
    $scope.selectProduct = function( index, product ){
        $scope.selectedProduct = product;
        $scope.selectedProductIndex = index;
        $scope.currentCategory = getCurrent( product.category_id, $scope.categories );
        $scope.currentBrand = getCurrent( product.brand_id, $scope.brands );
        $scope.currentType = getCurrent( product.type_id, $scope.types );
        $scope.currentStatus = getCurrent( product.status_id, $scope.statuses );
        $scope.currentMakePublic = $scope.booleans[ product.is_available ];

        productService.setProduct( $scope.selectedProduct ); // pass to the service

        $scope.showControlButtons = true;

        var data = {
            product: $scope.selectedProduct.id,
            category : $scope.currentCategory.slug,
            brand: $scope.currentBrand.slug,
            type: $scope.currentType.slug,
            part: window.frame_part
        }

        // save data to session
        $http.post( window.progressUrl, data ).
            success(function(data, status, headers, config) {
                console.log(data);
            }
        );
    }

    // submits the product form
    $scope.submitProduct = function(){
        $('#load-mark').show(); $('#save-mark').hide();
        this.selectedProduct.category_id = $scope.currentCategory.id;
        this.selectedProduct.brand_id = $scope.currentBrand.id;
        this.selectedProduct.type_id = $scope.currentType.id;
        this.selectedProduct.status_id = $scope.currentStatus.id;
        this.selectedProduct.is_available = $scope.currentMakePublic.value;

        // sends the form
        $http.post( window.updateUrl, this.selectedProduct).success(function( data ){
            if( data.status == 'success' ){
                $('#load-mark').hide();
                $('#save-mark').show();
                //$('#save-mark').show().fadeIn('fast').delay(1000).fadeOut('fast');
            }
        });
    }

    // get the current selected product
    var getCurrent = function( id, data ){
        for(var i = 0; i < data.length; i++){
            if(data[i].id == id){
                return data[i];
            }
        }
    }
});