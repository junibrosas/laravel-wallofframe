
app.config(['flowFactoryProvider', function (flowFactoryProvider, $scope, $flow) {
    var maxWidth = 1200;
    flowFactoryProvider.defaults = {
        target: window.uploadUrl,
        permanentErrors: [404, 500, 501, 413],
        maxChunkRetries: 1,
        chunkRetryInterval: 5000,
        chunkSize: 2*1024*1024,
        progressCallbacksInterval: 1000,
        simultaneousUploads: 1,
        testChunks: false,
        forceChunkSize: true
    };

    flowFactoryProvider.on('fileSuccess', function (file, data){
        var data = JSON.parse(data);
        if(data.part == 'background' || data.part == 'frame'){
            $('#bf-list').show();
            $('#background-and-frame-list').append('<div class="col-md-2 space-bottom-sm"><img src="'+data.part_image+'" alt="" class="img-responsive"/></div>');
        }else{
            $('#action-notify').show();
        }

    });

    flowFactoryProvider.on('catchAll', function (event) {
        console.log('catchAll', arguments);
    });
}]);

app.controller("MainController", ['currencyConverter', '$http', 'ngCartItems','$scope', '$interval', function(currencyConverter, $http, ngCartItems, $scope, $interval) {
    this.quantity = 1;
    this.cost = 0;
    this.inCurrency = 'AED';
    this.outCurrency = window.out_currency;
    this.currencies = currencyConverter.currencies;

    console.log('Current Currency: ' + this.outCurrency);

    $interval(function() {
        $scope.totalCartItems = ngCartItems.getTotalItems();
        $('#cart-item-count').html(ngCartItems.getTotalItems());
    },1000);


    this.getTotal = function total(outCurrency) {
        return currencyConverter.convert(this.quantity * this.cost, this.inCurrency, outCurrency);
    };

    this.currencyConvert = function(amount, inCurrency, outCurrency ){
        return currencyConverter.convert(amount, inCurrency, outCurrency);
    };

    // updates and saves the selected currency
    this.getSelectedCurrency = function( currency){
        this.outCurrency = currency;
        var data = { currency : currency };

        $http.post( mainApp.baseUrl + '/changeCurrency', data ).
            success(function(data, status, headers, config) {
                console.log('change currency success');
            }).
            error(function(data, status, headers, config) {
                console.log(data);
            });
    }

}]);

app.controller("ProductListingController", function( $http, $scope ){

    $scope.addToWishList = function( product ){
        $scope.currentProduct = product;
        $http.get( mainApp.baseUrl+'/customer/ajax-add-wishlist?product='+product.id ).success( function( response ){
            console.log(response);
            product.isInWishList = response.product.isInWishList;
            // $scope.currentProduct.isInWishList = !response.product.isInWishList;

        });
    }
});

function onFileAdded(file) {

//// or $event.preventDefault(); depends how you use this function, in scope events or in directive
}


app.controller("ContactFormController", ['$http', '$scope',function($http, $scope){
    $('#contact-ajax-response').hide();
    $scope.contactFormSubmit = function(){
        $http.post(mainApp.baseUrl+'/contact/send', $scope.contact ).
            success(function(data, status, headers, config) {
                $scope.errors = data.errors;
                if(data.errors !== undefined){
                }
                else{
                    $scope.contact = {};
                    $('#contact-ajax-response').html('Message successfully sent.').show().fadeIn('fast').delay(3000).fadeOut('fast');
                }
            }).
            error(function(data, status, headers, config) {
                $('#contact-ajax-response').html('Unexpected Error Occurred.', 'error').show();
            });
    }
}]);
