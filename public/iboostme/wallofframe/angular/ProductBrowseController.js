app.controller("ProductBrowseController",function( $scope, $http, productService ) {
    'use strict';
    $scope.page = 1;
    $scope.take = 20;
    $scope.products = [];
    $scope.pageRange = 0;
    $scope.loadEnabled = window.loadEnabled;
    $scope.url = window.apiUrl;
    $scope.noProducts = false;



    $scope.showPageButton = false; // show page button

    $scope.loadData = function(){
        var url = $scope.url + '&take='+$scope.take+'&page=' + $scope.page;
        console.log(url);
        $scope.showLoadingText = true; // show loading text
        $http.get( url ).success(function(data){
            $scope.noProducts = data.products.length <= 0 ? true : false;
            productService.setProducts( data.products );

            $scope.products = data.products;
            $scope.currentPage = data.currentPage;
            $scope.lastPage = data.lastPage;
            $scope.getTotal = data.getTotal;
            $scope.getPerPage = data.getPerPage;
            $scope.count = data.count;
            $scope.showLoadingText = false; // show loading text
            $scope.showPageButton = true; // show page button

            $scope.renderPaging();

        });
    }
    $scope.nextPage = function(){
        if($scope.currentPage < $scope.lastPage){
            $scope.page++;
            $scope.loadData();
        }
    };
    $scope.previousPage = function(){
        if($scope.currentPage > 1){
            $scope.page--;
            $scope.loadData();
        }
    };

    $scope.toLastPage = function(){
        $scope.page = $scope.lastPage;
        $scope.loadData();
    }
    $scope.loadTo = function(page){
        $scope.page = page;
        $scope.loadData();
    }
    $scope.renderPaging = function(){
        var min = 1; var max = 3;
        if($scope.currentPage == 1){
            min = 1; max = $scope.currentPage + 2;
        }
        else if($scope.currentPage >= $scope.lastPage){
            min = $scope.currentPage - 2; max = $scope.lastPage;
        }
        else{
            min = $scope.currentPage - 1; max = $scope.currentPage + 1;
        }

        if(min <= 0){
            min = 1;
        }
        if($scope.lastPage < max){
            max = $scope.lastPage;
        }

        var range = [];
        for(var i=min;i<=max;i++) {
            var number = i;
            var classString = '';
            if ($scope.page == number) {
                classString = 'active';
            }
            range.push({number: number, class: classString});
        }
        $scope.pageRange = range;
    }
    $scope.enableLoading = function( bool ){
        $scope.loadEnabled = bool;
    }

    if($scope.loadEnabled){
        $scope.loadData();
    }

});