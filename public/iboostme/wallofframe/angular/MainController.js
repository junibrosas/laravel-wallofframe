
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
    /*flowFactoryProvider.on('fileAdded', function (file){
        if ( file.size > 20000000 ){ // 2MB
            return false;
        }
    });*/
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


app.controller("MainController", ['currencyConverter', '$http', function(currencyConverter, $http) {
    this.quantity = 1;
    this.cost = 0;
    this.inCurrency = 'USD';
    this.outCurrency = window.out_currency;
    this.currencies = currencyConverter.currencies;

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

function onFileAdded(file) {

//// or $event.preventDefault(); depends how you use this function, in scope events or in directive
}