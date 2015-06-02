// This is the controller for FlowJs uploading, every progress in uploading will be processed here.
app.controller("FlowController", function($scope){
    $scope.errors = []; // list of errors.

    // get the fileAdded function event from $flow and check the image width
    $scope.$on('flow::fileAdded', function (event, $flow, file) {
        if (file.file.dimensions) {
            file.dimensions = file.file.dimensions;
            if (file.dimensions.width < 100) {//dimensions validator
                alert('invalid dimensions');
                return false;
            }
            return true;// image is valid
        }

        // get the image file and make it readable
        var fileReader = new FileReader();
        fileReader.readAsDataURL(file.file);
        fileReader.onload = function (event) {
            var img = new Image();
            img.onload = function() {
                //console.log(this.width + 'x' + this.height);
                file.file.dimensions = {
                    width: this.width,
                    height: this.height
                };
                // 1500 max width and 2mb max size
                if(this.width <= 1500 && file.size <= 20000000 ){
                    file.file.isUploadable = true;
                    $scope.$flow.addFile(file.file);
                }else{
                    file.file.isUploadable = false;
                    //$scope.errors.push({ message:  + 'Large file dimension: ' +  file.file.name });
                }
            }
            img.src = event.target.result;
        };

        event.preventDefault();

        //return false;// do not add file to be uploaded
        //// or $event.preventDefault(); depends how you use this function, in scope events or in directive
    });

    $scope.$on('flow::filesSubmitted', function (event, $flow, file) {

    });
});

app.controller("FrameUploadController", function($http, $scope){
    $http.post(mainApp.baseUrl+'/admin/upload-config', {}).
        success(function(data, status, headers, config) {
            $scope.showLoader = false;
            $scope.categories = data.categories;
            $scope.brands = data.brands;
            $scope.types = data.types;

            $scope.config = {
                categories: [],
                brand: [],
                type: $scope.types[0]
            }
        }).
        error(function(data, status, headers, config) {
            app.ajaxResponse('Unexpected Error.', 'error');
        });
    $scope.onConfigChange = function(){
        console.log($scope.config);
    }
    /*
    $scope.imageUpload = function(){
        $scope.showLoader = true;
    }

    var sendSelectionData = function(){
        var data = {
            category : $scope.currentCategory.slug,
            brand: $scope.currentBrand.slug,
            type: $scope.currentType.slug,
            part: window.frame_part
        }

        // save data to session
        $http.post( progressUrl, data ).
            success(function(data, status, headers, config) {
                console.log(data);
            }).
            error(function(data, status, headers, config) {
                //console.log(data);
            });
    } 

    $scope.selectionChanged = function( index, slug ){
        sendSelectionData();
    }

    sendSelectionData();*/
});

app.controller("FrameAppController", function($http, $scope, productService){
    $scope.frameList = window.frameList;
    $scope.currentFrame = $scope.frameList[0];
    $scope.frameSizes = window.frameSizes;
    $scope.currentSize = $scope.frameSizes[0];
    $scope.frameTypes = ['framed', 'canvas', 'art'];
    $scope.currentFrameType = $scope.frameTypes[0];

    // sets the current frame to use for border using click event.
    $scope.setCurrentFrame = function( frame ){
        $scope.currentFrame = frame;
    }

    // sets the current design preview mode using click event.
    $scope.setPreviewMode = function( mode ){
        $scope.currentMode = mode;
    }

    // sets the size selected and change the price
    $scope.selectedtSize = function( size ){
        $scope.currentSize = size;
    }

    // set selected frame type
    $scope.selectedFrameType = function( type ){
        console.log(type);
        $scope.currentFrameType = type;
    }

});

app.controller("FrameBorderController", function($http, $scope){
    var tableData = window.tableData;
    $scope.totalItems = tableData.length;
    $scope.currentItem = tableData[0];

    // select current frame
    $scope.setCurrentItem = function( frame ){
        $scope.currentItem = frame;
    }
});

app.controller("BorderGeneratorController", ['$scope', function( $scope){
    $scope.frameSizes = window.frameSizes;
    $scope.currentSize = $scope.frameSizes[0];

    // sets the size selected and change the price
    $scope.selectedtSize = function( size ){
        $scope.currentSize = size;
        $('#cssEl').css("width", size.width + 'px')
            .css("min-height", size.height + 'px');
    }
}]);

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
        $scope.designImage = {};

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
            productService.getProducts().splice( index, 1);
        });
    }

    // get the selected product
    $scope.selectProduct = function( index, product ){
        $('#save-mark').hide();
        $scope.selectedProduct = {
            categories: product.categories
        };
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

        this.selectedProduct.categories = $scope.selectedProduct.categories;
        this.selectedProduct.category_id = $scope.currentCategory.id;
        this.selectedProduct.brand_id = $scope.currentBrand ? $scope.currentBrand.id : '';
        this.selectedProduct.type_id = $scope.currentType.id;
        this.selectedProduct.status_id = $scope.currentStatus.id;
        this.selectedProduct.is_available = $scope.currentMakePublic.value;
        this.selectedProduct.designImage = $('#design-image-single').data('image-id');

        // sends the form
        $http.post( window.updateUrl, this.selectedProduct).success(function( data ){
            console.log(data);
            if( data.status == 'success' ){

                $scope.selectedProduct.imageSquare = data.product.imageSquare;
                $('#load-mark').hide();
                $('#save-mark').show();
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

app.controller("FrameSizeController", function($http, $scope) {
    //$scope.size = []; // single model
    $scope.isToUpdate = false;
    $scope.categories = window.categories;

    // sets the size selected and change the price
    $scope.selectedSize = function( size ){
        $scope.size = size;
        $scope.isToUpdate = true;
    }

    $scope.goToCreateForm = function(){
        $scope.isToUpdate = false;
        $scope.size = []; // reset the model
    }

    // submit created form
    $scope.submitAdd = function(size){
        var sizeData = {
            order: size.order,
            width: size.width,
            height: size.height,
            price: size.price,
            category_id: size.category ? size.category.id : ''
        };

        $http.post(mainApp.baseUrl+'/admin/sizes/add', sizeData ).
            success(function(data, status, headers, config) {
                $scope.errors = data.errors;
                if(data.errors !== undefined){
                    app.ajaxResponse('There are some errors occurred.', 'error');
                }
                else{
                    app.ajaxResponse('Created Successfully');
                    $scope.size = []; // reset the model
                }
            }).
            error(function(data, status, headers, config) {
                app.ajaxResponse('Unexpected Error.', 'error');
            });
    }

    // submit edited form
    $scope.submitEdit = function(){
        $scope.size.category_id = $scope.size.category ? $scope.size.category.id : '';
        $http.post(mainApp.baseUrl+'/admin/sizes/update', $scope.size ).
            success(function(data, status, headers, config) {
                $scope.errors = data.errors;
                if(data.errors !== undefined){
                    app.ajaxResponse('There are some errors occurred.', 'error');
                }
                else{
                    app.ajaxResponse('Updated Successfully');
                }

            }).
            error(function(data, status, headers, config) {
                app.ajaxResponse('Unexpected Error.', 'error');
            });
    }

});


app.controller("BrandsController", function($http, $scope) {
    $scope.selectedBrand = function( brand ){
        console.log(brand);
        $scope.brand = brand; // selected brand
    }
    $scope.submitEdit = function(){
        $http.post(mainApp.baseUrl + '/admin/brand/update', $scope.brand).
            success(function(data, status, headers, config) {
                if(data.success){
                    $.notify( data.responseMessage,{ className:"success", position: "right bottom"});
                }
            }).
            error(function(data, status, headers, config) {
                app.ajaxResponse('Unexpected Error.', 'error');
            });
    }
});

// DIRECTIVES
// THIS DIRECTIVE WILL CENTER THE IMAGE DEPENDING ON ITS CONTAINER.
app.directive('imagecenter', function() {
    var topAllowance = - 60;

    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            element.bind('load', function() {
                var width = (603 / 2) - ( this.width  / 2 );
                var height =  (419 / 2 + topAllowance) - ( this.height  / 2 );
                element.attr('style', 'position:absolute; left: '+width+'px; top:'+height+'px;');
            });
        }
    };
});



