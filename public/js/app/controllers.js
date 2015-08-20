'use strict';

/* Controllers */

var productControllers = angular.module('productControllers', []);

productControllers.controller('ProductListCtrl', ['$scope', '$rootScope','$location', '$routeParams','Category','Notification','$filter',
  function($scope,$rootScope,$location,$routeParams,Category,Notification,$filter) {
  
  Category.findAll({},function(result){
    
    
    $scope.categories = result.response.data.categories.collections;
  
  });

  $scope.products = [];
  $scope.totalProducts = [];
  $scope.product = null;
  $scope.filter = 100;
  
  $scope.settedCategory = $routeParams.categoryId;

  if($scope.settedCategory != undefined){
    
    Category.findById({categoryId:$scope.settedCategory },function(result){
      
      if(result.response.type == "success"){

        $scope.products = result.response.data.category.skus;
        $scope.totalProducts = result.response.data.category.skus;
      }
      else{
        Notification.error(result.response.message);
      } 
    
    });
  }

  $scope.hoverIn = function(){

    this.hoverEdit = true;
  }

  $scope.hoverOut = function(){
    this.hoverEdit = false;
  }

  $scope.filterData = function(filter){
    $scope.products = $filter('filterForPrice')($scope.totalProducts,filter);
  }


  $scope.setProduct = function(product){
    $scope.product = product;
    $location.path('products/'+$scope.settedCategory+'/'+product.id)
  }
  
    $scope.showMobile = function(){
        this.mobile = !this.mobile;
    }
  }]);



productControllers.controller('ProductDetailCtrl', ['$filter','$scope', '$routeParams', '$rootScope', 'Category','Notification',
  function($filter,$scope, $routeParams,$rootScope,Category,Notification) {

    $scope.valuationLevel = [1,2,3,4,5];
    $scope.valuation = $filter('randomize')(5);

    Category.findProductById({categoryId:$routeParams.categoryId,productId:$routeParams.productId},function(result){
      
      if(result.response.type == "success"){

          //Notification.success(result.response.message);
          $scope.category = result.response.data.category;
          $scope.product = result.response.data.product;
      }
      else{
           Notification.error(result.response.message);
      }
     
    
    });
  }]);