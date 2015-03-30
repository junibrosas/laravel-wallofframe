app.controller("TableController", function($scope, NgTableParams){
    $scope.$watch('initialData', function(value) {
        var data = value;

        console.log( 'Table Data: ' + data );
        console.log( 'Table Data length: ' + data.length + ' ' );

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


});