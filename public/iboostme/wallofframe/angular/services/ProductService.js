app.service('productService', function( $http ){
    var products = []; // the product lists
    var product = []; // the current selected product
    var frameList = [];
    var backgroundList = [];
    var asd = [];


    // get frame list
    this.getFrameList = function(){
        return this.frameList;
    };
    this.setFrameList = function( frameList ){
        this.frameList = frameList;
    };

    // get background list
    this.getBackgroundList = function(){
        return this.backgroundList;
    };
    this.setBackgroundList = function( backgroundList ){
        this.backgroundList = backgroundList;
    };

    // get product list
    this.getProducts = function(){
        return this.products;
    };
    this.setProducts = function( products ){
        this.products = products;
    };

    // get single product
    this.getProduct = function(){
        return this.product;
    };
    this.setProduct = function( product ){
        this.product = product;
    };

    this.deleteFramePart = function( url, data ){
        $http({ method:'post', url: url, data: data }).success(function( response ){
            console.log(response);
        });
    }
    this.getBackgroundFrames = function( backgroundList ){
        var data = [];
        for(var i = 0; i < backgroundList.length; i++ ){
            if(backgroundList[i].is_active){
                data.push(backgroundList[i]);
            }
        }
        return data;
    }

    this.getFrameIndex = function( frameId, list ){
        for(var i = 0; i < list.length; i++ ){
            if(list[i].id == frameId ){
                return i;
            }
        }
    }

    this.getActiveFrames = function( frameList ){
        var data = [];
        for(var i = 0; i < frameList.length; i++ ){
            if(frameList[i].is_active){
                data.push(frameList[i]);
            }
        }
        return data;
    }

});