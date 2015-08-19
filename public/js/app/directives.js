'use strict';

/* Filters */

var productDirective  = angular.module('productDirectives', []);


productDirective.directive('imageonload', function() {
    return {
        
      
        link: function(scope, element, attrs) {
          element.on('load', function() {
              var preloader = element.parent().find('div[class="preloader-wrapper big active"]');
              
              preloader.addClass('hide');
              element.removeClass('hide');
          });
          scope.$watch('ngSrc', function() {

              element.addClass('hide');
             
          });

        }
    };
});

productDirective.directive("materialSlider", ["$timeout", function($timeout){
            return {
                restrict: 'A',
                link: function(scope, element, attrs) {
                    element.addClass("slider");
                    window.c = element;
                    console.log('f')
                    $timeout(function(){
                        element.slider();
                    });
                   
                }
            };
        }]);
