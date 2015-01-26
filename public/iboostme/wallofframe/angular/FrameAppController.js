app.controller("DragNDropController", function($http, $scope, productService){
    $scope.showLoader = false;
    $scope.categories = window.categories;
    $scope.brands = window.brands;
    $scope.types = window.types;

    //$scope.currentCategory = $scope.categories[0].slug;
    $scope.currentCategory = $scope.categories[0];
    $scope.currentBrand = $scope.brands[0];
    $scope.currentType = $scope.types[0];

    $scope.imageUpload = function(){
        $scope.showLoader = true;
    }

    var sendSelectionData = function(){
        var data = {
            category : $scope.currentCategory.slug,
            brand: $scope.currentBrand.slug,
            type: $scope.currentType.slug,
            part: window.frame_part
        }

        // save data to session
        $http.post( progressUrl, data ).
            success(function(data, status, headers, config) {
                console.log(data);
            }).
            error(function(data, status, headers, config) {
                //console.log(data);
            });
    } 

    $scope.selectionChanged = function( index, slug ){
        sendSelectionData();
    }



    sendSelectionData();
});




app.controller("FrameAppController", function($http, $scope, productService){
    $scope.showLoader = false;
    $scope.types = window.types;
    $scope.frameParts = window.parts;
    


    var preview = $('#product_design');
    var frame = $('#product_frame');
    var bg = $('#product_background');
    var original = $('.product-original');

    $scope.type = $(frame).data('imagetype');
    $scope.bg_images = productService.getBackgroundFrames(window.backgroundList); // active backgrounds
    $scope.frame_images =  productService.getActiveFrames(window.frameList); // active frames


    if(window.controlEnabled){
        $scope.currentPart = window.parts[0];
        $scope.currentType = window.types[0];

        var framePartList = [];
        framePartList[ window.parts[0].slug ] = window.frameList; // frames
        framePartList[ window.parts[1].slug ] = window.backgroundList; //backgrounds

        $scope.currentList = framePartList['frame']; // current list of parts

        var sendSelectionData = function(){
            var data = { part: $scope.currentPart.slug, size_type: $scope.currentType.slug }

            // save data to session
            $http.post( progressUrl, data ).
                success(function(data, status, headers, config) {
                    console.log(data);
                });
        }

        $scope.selectionChanged = function(){
            $scope.currentList = framePartList[ $scope.currentPart.slug ];
            sendSelectionData();
        };
        $scope.imageUpload = function(){
            $scope.showLoader = true;
        }
        $scope.imageDelete = function( index ){
            var data = {
                part: $scope.currentPart.slug,
                size_type: $scope.currentType.slug,
                id: $scope.currentList[index].id
            };
            $http({ method:'post', url: window.url_to_delete, data: data }).success(function( response ){
                $scope.currentList.splice(index, 1);
            });
        }
        $scope.imageActivate = function( index ){
            var data = {
                part: $scope.currentPart.slug,
                id: $scope.currentList[index].id,
                is_active: !$scope.currentList[index].is_active
            };
            $http({ method:'post', url: window.url_to_activate, data: data }).success(function( response ){
               
                
                if($scope.currentList[index].is_active == 0){
                     console.log('on');
                    $scope.currentList[index].is_active = 1;
                    if( response.part == 'background' ){
                        $scope.bg_images.push( $scope.currentList[index]);
                    }
                    if( response.part == 'frame' ){
                        $scope.frame_images.push( $scope.currentList[index]);
                    }
                }else{
                    if($scope.currentList[index].is_active == 1){
                        var frameId = productService.getFrameIndex($scope.currentList[index].id, $scope.bg_images);
                        $scope.currentList[index].is_active = 0;
                        if( response.part == 'background' ){
                            var id = productService.getFrameIndex($scope.currentList[index].id, $scope.bg_images);
                            $scope.bg_images.splice(id, 1);
                        }
                        if( response.part == 'frame' ){
                            var id = productService.getFrameIndex($scope.currentList[index].id, $scope.frame_images);
                            $scope.frame_images.splice(id, 1);
                        }
                    }
                }
                
                console.log(response);

                
                
            });
        }
        //initialize
        sendSelectionData();
    }



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
});

// This is the controller for FlowJs uploading, every progress in uploading will be processed here.
app.controller("FlowController", function($scope){
    // get the fileAdded function event from $flow and check the image width
    $scope.$on('flow::fileAdded', function (event, $flow, file) {
        if (file.file.dimensions) {
            file.dimensions = file.file.dimensions;
            if (file.dimensions.width < 100) {//dimensions validator
                alert('invalid dimensions');
                return false;
            }
            return true;// image is valid
        }

        // get the image file and make it readable
        var fileReader = new FileReader();
        fileReader.readAsDataURL(file.file);
        fileReader.onload = function (event) {
            var img = new Image();
            img.onload = function() {
                //console.log(this.width + 'x' + this.height);
                file.file.dimensions = {
                    width: this.width,
                    height: this.height
                };
                // 1500 max width and 2mb max size
                if(this.width <= 1500 && file.size <= 20000000 ){
                    console.log('valid and dimension size');
                    $scope.$flow.addFile(file.file);
                }
            }
            img.src = event.target.result;
        };
        event.preventDefault();

        //return false;// do not add file to be uploaded
        //// or $event.preventDefault(); depends how you use this function, in scope events or in directive
    });
});

// DIRECTIVES
// this directive will center the image depending on its container.
app.directive('imagecenter', function() {
    var topAllowance = - 60;

    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            element.bind('load', function() {
                var width = (603 / 2) - ( this.width  / 2 );
                var height =  (419 / 2 + topAllowance) - ( this.height  / 2 );
                element.attr('style', 'position:absolute; left: '+width+'px; top:'+height+'px;');
            });
        }
    };
});
