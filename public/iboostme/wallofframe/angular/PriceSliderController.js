var app = app;
app.controller('PriceSliderController', ['$scope', function($scope){
    $scope.items = [{name: "item 1", "min-acceptable-price": "0",
        "max-acceptable-price": "1000"},
        {name: "item 2", "min-acceptable-price": "5",
            "max-acceptable-price": "40"},
        {name: "item 3", "min-acceptable-price": "15",
            "max-acceptable-price": "30"}];

    $scope.lower_price_bound = window.price_min == undefined ? 0 : window.price_min;
    $scope.upper_price_bound = window.price_max == undefined ? 1000 : window.price_max;

    $scope.priceRange = function(item) {
        return (parseInt(item['min-acceptable-price']) >= $scope.lower_price_bound && parseInt(item['max-acceptable-price']) <= $scope.upper_price_bound);
    };
}]);