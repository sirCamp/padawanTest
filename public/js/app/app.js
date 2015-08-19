
var app = angular.module('ecommerceApp',[
    'ngRoute',
    'productControllers',
    'productServices',
    'productFilters',
    'productDirectives',
    'ui-notification'

    ]);

app.config(['$routeProvider','NotificationProvider',
  

  function($routeProvider, NotificationProvider) {
    
    NotificationProvider.setOptions({
                delay: 5000,
                startTop: 20,
                startRight: 10,
                verticalSpacing: 20,
                horizontalSpacing: 20,
                positionX: 'right',
                positionY: 'top'
            });

    $routeProvider.
     when('/products/', {
        templateUrl: '../../partials/product-list.html',
        controller: 'ProductListCtrl'
      }).
      when('/products/:categoryId', {
        templateUrl: '../../partials/product-list.html',
        controller: 'ProductListCtrl'
      }).
      when('/products/:categoryId/:productId', {
        templateUrl: 'partials/product-detail.html',
        controller: 'ProductDetailCtrl'
      }).
      otherwise({
        redirectTo: '/products'
      });
  }]);

app.run(function($rootScope,Category) {
				    
    $rootScope.titleApp = "Flower Ecommerce";
    
    $rootScope.reloadPage = function(){
        window.location.reload();
    }
});