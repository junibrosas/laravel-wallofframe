app.controller("NewOrderController", function($http, $scope, NgTableParams){
    $scope.products = window.products;
    $scope.users = window.users; // get users
    $scope.paymentMethods = window.paymentMethods;

    $scope.transaction = {} // transaction model
    var toggleCheck = false;

    $scope.transaction = {
        user: [],
        products: [],
        paymentMethod: [],
        shipmentAddress: []

    };


    // user selection by dropdown
    $scope.userSelected = function( user ){
        $scope.transaction.user = user; // save the selected user.

        var url = mainApp.baseUrl + '/customer/get-address';
        $http.post(url, user ).
            success(function(data, status, headers, config) {
                $scope.userShipments = data; // get user shipment addresses.
            }).
            error(function(data, status, headers, config) {
            });
    }

    // update button
    $scope.update = function(){
        var url = mainApp.baseUrl + '/admin/orders/store';
        $http.post(url, $scope.transaction ).
            success(function(data, status, headers, config) {
                console.log(data);
            }).
            error(function(data, status, headers, config) {
            });
        console.log($scope.transaction);
    }

    // check all button
    $scope.checkAllToggle = function() {
        toggleCheck = !toggleCheck;
        if(toggleCheck){
            $scope.transaction.products = angular.copy($scope.products);
        }else{
            $scope.transaction.products = [];
        }

    };


    // ngTable Module Initialization
    $scope.tableParams = new NgTableParams({
        page: 1,            // show first page
        count: 5           // count per page
    }, {
        total: $scope.products.length, // length of data
        getData: function($defer, params) {
            var slicedData = $scope.products.slice((params.page() - 1) * params.count(), params.page() * params.count());
            $defer.resolve(slicedData);
            $scope.tableData = slicedData; // sliced frames on table.
        }
    });

});