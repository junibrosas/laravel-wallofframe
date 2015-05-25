app.controller('CartController', ['$scope','$http', 'ngCartItems', function($scope, $http, ngCartItems){
    //$scope.numLimit = 3; // limit the input number for the quantity.
    $scope.tableData = ngCartItems.getItems();

    var update = function(){
        // restart each values.
        $scope.totalAmount = 0;
        $scope.totalQuantity = 0;

        var data = $scope.tableData;

        if(data == undefined) return;

        if(data <= 0) return;

        // update the variables.
        for(var i = 0; i < data.length; i++){
            $scope.totalAmount += data[i].subtotal;
            $scope.totalQuantity += data[i].qty;
        }

        // update the total cart items.
        ngCartItems.setTotalItems($scope.totalQuantity);
    }

    update();

    // removes an item from the cart
    $scope.remoteCartItem = function( product ){
        // remove first the item
        $scope.tableData.splice($scope.tableData.indexOf(product),1);

        // then update the values
        update();

        // remove the cart item from the server
        $http.post(mainApp.baseUrl+'/cart/remove', product)
            .success(function(data, status, headers, config) {
            console.log('successfully deleted.');
        });

    }

    // change the quantity of a product
    $scope.changeQuantity = function(product){
        product.subtotal = product.price * product.qty;
        update();
    }

    // submit changes for checkout
    $scope.checkout = function( products ){
        $http.post(mainApp.baseUrl+'/cart/update', { products : products})
            .success(function(data, status, headers, config) {
                window.location.replace(mainApp.baseUrl+"/checkout/shipping");
            });
    }


}]);