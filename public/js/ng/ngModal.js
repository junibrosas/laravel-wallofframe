app.factory('ngModal', function (vModal) {
    return vModal({
        controller: 'ModalController',
        controllerAs: 'modalCtrl',
        templateUrl: mainApp.publicPath + '/media.html'
    });
})

app.controller('MyModalController', function (ngModal) {
    this.close = ngModal.deactivate;
})
