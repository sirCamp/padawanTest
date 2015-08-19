'use strict';

/* Services */

var productServices = angular.module('productServices', ['ngResource']);

productServices.factory('Category', ['$resource',
  function($resource){
    
    return $resource('/api/category', {categoryId:'@categoryId',productId:'@productId'},  {
        
        findAll: {
            
            method: 'GET',
            url: '/api/categories',
            isArray: false
        },
        
        findById: {
            
            method: 'GET',
            url: '/api/category/:categoryId',
            isArray: false
        },

        findProductById: {
            
            method: 'GET',
            url: '/api/product/:categoryId/:productId',
            isArray: false
        },

    });
  }]);


