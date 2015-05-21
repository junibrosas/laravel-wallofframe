var app = angular.module("wallOfFrame", ['uiSlider', 'finance', 'flow', 'ngTable', 'checklist-model']);
// filters
app.filter('reverse', function(){
    return function(items){
        return items.slice().reverse();
    };
});

// Public Functions

// add an ajax response to the view.
// use: app.ajaxResponse("Opps error", "error");
app.ajaxResponse = function( message, status){
    if (status === undefined) {
        status = 'success';
    }
    var response = $('#ajax-response');
    var responseMsg = $('#ajax-response-message');

    if(status == 'success') {
        response.addClass('alert-success');
    }else{
        response.addClass('alert-danger');
    }

    response.show().delay(5000).fadeOut(500);
    responseMsg.html( message );
};

// services
// a service module for cart items.
app.factory('ngCartItems', function(){
    var items = window.cartItems === undefined ? [] : window.cartItems;
    var totalItems = window.cartTotalItems;

    return {
        getTotalItems: function () {
            return totalItems;
        },
        setTotalItems : function( total ){
            totalItems = total;
        },

        getItems: function () {
            return items;
        },
        setItems : function( total ){
            items = total;
        }

    };
});