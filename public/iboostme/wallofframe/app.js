var app = angular.module("wallOfFrame", ['uiSlider', 'finance', 'flow', 'ngTable', 'checklist-model']);
// filters
app.filter('reverse', function(){
    return function(items){
        return items.slice().reverse();
    };
});