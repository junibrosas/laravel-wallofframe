
// This is the controller for FlowJs uploading, every progress in uploading will be processed here.
app.controller("MediaFlowController", ['$scope','$http','productService', function($scope, $http, productService){
    // handle error on image upload
    $scope.$on('flow::fileError', function (event, $flow, flowFile) {
        console.log(flowFile.error);
    });
    $scope.$on('flow::complete', function () {

        // Close the modal after all the flow instances has been completely downloaded.
        var remodal = $('[data-remodal-id=mediaModal]').remodal();
        remodal.close();

        // Remove all files from the ngFlow uploader to give no space for the uploaded files.
        $scope.$flow.files = [];

        $http.post(mainApp.baseUrl+'/media/items', { items: $scope.mediaIds }).
            success(function(data, status, headers, config) {
                console.log(data);

                // add media items to parent property from response.
                $scope.$parent.mediaSelectedItems = data;

            }).
            error(function(data, status, headers, config) {
                app.ajaxResponse('Unexpected error occurred ', 'error');
            });
    });

    $scope.$on('flow::fileSuccess', function (file, message, chunk, response) {

        // returned an Attachment model
        var mediaItem = JSON.parse(response);

        // Push a single media item that is successfully uploaded.
        $scope.mediaIds.push(mediaItem.id);

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

    // Event on modal opening
    $(document).on('opened', '.remodal', function () {
        // removed all media item ids that are selected.
        $scope.mediaIds = [];

        // remove selected media item objects.
        $scope.mediaSelectedItems = [];


        // Request new media items to be displayed in the modal.
        $http.get(mainApp.baseUrl+'/media/modal').
            success(function(data, status, headers, config) {
                console.log(data);

                // add media items from response.
                $scope.mediaItems = data;

                $scope.mediaItemsLoaded = true;

            }).
            error(function(data, status, headers, config) {
                app.ajaxResponse('Unexpected error occurred ', 'error');
            });
    });

    $(document).on('closed', '.remodal', function (e) {
        $scope.mediaItemsLoaded = false;

        // Remove old media items displayed in the modal.
        $scope.mediaItems = [];
    });

    // retrieve the media items via ajax.
    $scope.getMediaItems = function(){
        var modal = $.remodal.lookup[$('[data-remodal-id=mediaModal]').data('remodal')];

        $http.post(mainApp.baseUrl+'/media/items', { items: $scope.mediaIds }).
            success(function(data, status, headers, config) {
                console.log(data);

                // add media items from response.
                $scope.mediaSelectedItems = data;

                modal.close();
            }).
            error(function(data, status, headers, config) {
                app.ajaxResponse('Unexpected error occurred ', 'error');
            });
    }
}]);

