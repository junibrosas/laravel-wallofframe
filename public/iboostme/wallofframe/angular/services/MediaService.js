app.service('mediaService', function( $http ){
    var mediaSelectedItems = [];

    // get media items
    this.getSelectedMediaItems = function( ){
        return this.mediaSelectedItems;
    };

    // set new media items
    this.setSelectedMediaItems = function( items ){
        this.mediaSelectedItems = items;
    };

});