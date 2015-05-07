app.controller("TableController", ['$scope', 'NgTableParams', function($scope, NgTableParams){

    // tableData is a requirement. Each routes that uses TableController.js
    // must have a tableData variable specified.

    // ngTable Module Initialization
    var ngTableData = window.tableData;
    $scope.tableParams = new NgTableParams({
        page: 1,            // show first page
        count: 10           // count per page
    }, {
        total: ngTableData.length, // length of data
        getData: function($defer, params) {
            var slicedData = ngTableData.slice((params.page() - 1) * params.count(), params.page() * params.count());

            $defer.resolve(slicedData);

            $scope.tableData = slicedData; // sliced frames on table.
        }
    });

    $scope.removeTableItem = function(item){
        $scope.tableData.splice($scope.tableData.indexOf(item),1);
    }

}]);