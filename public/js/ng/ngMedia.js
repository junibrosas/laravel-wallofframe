
// This is the controller for FlowJs uploading, every progress in uploading will be processed here.
app.controller("MediaFlowController", function($scope){


    // handle error on image upload
    $scope.$on('flow::fileError', function (event, $flow, flowFile) {
        console.log(flowFile.error);
    });
});


