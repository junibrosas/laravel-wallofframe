var app = angular.module("wallOfFrame", ['uiSlider', 'finance', 'flow', 'ngTable', 'checklist-model']);
// filters
app.filter('reverse', function(){
    return function(items){
        return items.slice().reverse();
    };
});

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