app.controller("TableController", function($scope, NgTableParams){

    $scope.$watch('initialData', function(value) {

    });

    // tableData is a requirement. Each routes that uses TableController.js
    // must have a tableData variable specified.
    var data = window.tableData;

    console.log( 'Table Data length: ' + data.length + ' ' );
    console.log( data );


    // ngTable Module Initialization
    $scope.tableParams = new NgTableParams({
        page: 1,            // show first page
        count: 10           // count per page
    }, {
        total: data.length, // length of data
        getData: function($defer, params) {
            var slicedData = data.slice((params.page() - 1) * params.count(), params.page() * params.count());

            $defer.resolve(slicedData);

            $scope.tableData = slicedData; // sliced frames on table.
        }
    });

});