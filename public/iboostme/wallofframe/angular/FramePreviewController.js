


/*app.controller("FramePreviewController", function($scope, productService) {
    var preview = $('#product_design');
    var frame = $('#product_frame');
    var bg = $('#product_background');
    var original = $('.product-original');

    $scope.type = $(frame).data('imagetype');
    $scope.bg_images = window.backgrounds;
    $scope.frame_images = window.frames;

    console.log($scope.frame_images);
    $scope.types = {
        //'square': { previewWidth: '130' , widths : [ '260', '180', '160', '180', '170', '240' ] },
        'square': { previewWidth: (130 * 0.6) , widths : [ (260 * 0.6), (180 * 0.6), (160 * 0.6), (180 * 0.6), (170 * 0.6), (240 * 0.6) ] },
        'horizontal': { previewWidth: '150', widths : [ '190', '240', '240', '176', '180', '163' ] },
        'vertical': { previewWidth: '100' , widths : [ '147', '190', '120', '134', '132', '160' ] }
    };

    $scope.frame_path =  mainApp.baseUrl+'/uploads/products/frames/square/';
    $scope.bg_path = mainApp.baseUrl+'/uploads/products/backgrounds/';
    $scope.showOriginal = false;

    $scope.changePreviewImage = function( image ){
        $(preview).find('img').attr('src', image );
    }

    $scope.changeFrameImage = function( image ){
        $(preview).attr('width',  $scope.types[$scope.type].previewWidth );
        $(frame).attr('src', image);
    };
    $scope.setWidthByIndex = function( index ){
        $(frame).attr('width', $scope.types[$scope.type].widths[index] );
    }

    $scope.changeBgImage = function( image ){
        $(bg).attr('src', image);
    }

    $scope.changeType = function( type ){
        $scope.type = type;
        $scope.frame_path =  mainApp.baseUrl+'/uploads/products/frames/' + type +'/';
        $scope.changeFrameImage($scope.frame_path + $scope.frame_images[0]);
        $scope.setWidthByIndex(0);
    };

    $scope.hoverIn = function(){
        this.showOriginal = true;
    };

    $scope.hoverOut = function(){
        this.showOriginal = false;
    };

    // initialize
    $scope.changeType( $scope.type );
});*/