
// This is the controller for FlowJs uploading, every progress in uploading will be processed here.
app.controller("MediaFlowController", ['$scope','$http', function($scope, $http){
    // handle error on image upload
    $scope.$on('flow::fileError', function (event, $flow, flowFile) {
        console.log(flowFile.error);
    });
}]);

app.controller("MediaController", ['$scope','$http', function($scope, $http){
    $scope.mediaIds = [];
    $scope.mediaItems = [];
    // toggle media item on click

    $scope.itemSelected = function( item ){
        item.isSelected = !item.isSelected;
        var index = jQuery.inArray(item.id, $scope.mediaIds);
        if (index > -1) {
            $scope.mediaIds.splice(index, 1);
        }else{

            // add item
            $scope.mediaIds.push(item.id);
        }
    }


    // Event on modal opened
    /*$(document).on('open', '.remodal', function () {
        $scope.mediaItems = []; // reset
    });*/
    $(document).on('opened', '.remodal', function () {
        if($scope.mediaItems.length <= 0){
            $http.get(mainApp.baseUrl+'/media/modal').
                success(function(data, status, headers, config) {
                    // add media items from response.
                    $scope.mediaItems = data;
                }).
                error(function(data, status, headers, config) {
                    app.ajaxResponse('Unexpected error occurred ', 'error');
                });
        }

    });

    // retrieve the media items via ajax.
    $scope.getMediaItems = function(){
        var modal = $.remodal.lookup[$('[data-remodal-id=mediaModal]').data('remodal')];

        $http.post(mainApp.baseUrl+'/media/items', { items: $scope.mediaIds }).
            success(function(data, status, headers, config) {

                // add media items from response.
                $scope.mediaSelectedItems = data;

                modal.close();
            }).
            error(function(data, status, headers, config) {
                app.ajaxResponse('Unexpected error occurred ', 'error');
            });
    }
}]);

