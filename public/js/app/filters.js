'use strict';

/* Filters */

var productFilter  = angular.module('productFilters', []);

productFilter.filter('forQuantity', function () {
    return function (objects, quantity) {
    	//console.log(objects, quantity);
    	var found = false;
    	var i = 0;
    	for(i = 0; i < objects.length && !found; i++){
    		
    		if(objects[i].quantity == parseInt(quantity)){
    			found = true;    			
    		}
    	}
    	//console.log(objects[i-1].amount)
    	if(found){
    		return objects[i-1].amount;
    	}
    	else{
    		return 0;
    	}
    }

});

productFilter.filter('noImage', function () {
    return function (src, type) {
        
       if(src != '' && src != undefined && src != undefined){
         return src;
       }
       else{

          if(type){
              return 'images/No_image_available2.png';
          }
          else{
              return 'images/No_image_available3.png';
          }
          
          
            
       }
    }

});

productFilter.filter('howMany', function () {
    return function (many) {
        
       return many.length;
    }

});

productFilter.filter('order', function () {
    return function (input) {
        //use bublesort
        console.log(input);
        var a = input;
        var swproductFiltered;
            do {
                swproductFiltered = false;
                for (var i=0; i < a.length-1; i++) {
                    if (parseFloat(a[i].amount) > parseFloat(a[i+1].amount)) {
                        var temp = a[i];
                        a[i] = a[i+1];
                        a[i+1] = temp;
                        swproductFiltered = true;
                    }
                }
            } while (swproductFiltered);
        input = a;
       return input;
    }

});


productFilter.filter('randomize', function () {
    return function (number) {
       
      
       return Math.floor(Math.random() * number) + 1;
    }

});

productFilter.filter('filterForPrice', ['$filter',  function($filter) {
    return function (objects,price) {
      console.log(objects,price)
      var result = [];
      for(var i=0; i< objects.length; i++){
        
           var priceOne = $filter('forQuantity')(objects[i].pricings,1);
           
           if(parseFloat(priceOne) <= parseFloat(price)){
             result.push(objects[i]);
           }
          
      }
      return result;
    }

}]);

productFilter.filter('saving', ['$filter',  function($filter) {
    return function (input, pricing) {
        
        var result = null;
        var priceForOne = $filter('forQuantity')(pricing, 1);
        var partialForOne = (input.amount/input.quantity).toFixed(2);
        var percent = priceForOne - partialForOne;

        try{
            result = (((percent*100)/priceForOne).toFixed(0))+"%";
        }
        catch(e){

        }
        finally{
            return result;
        }
    }

}]);



productFilter.filter('strLimit', ['$filter', function($filter) {
   return function(input, limit) {
      if (! input) return;
      if (input.length <= limit) {
          return input;
      }

      return $filter('limitTo')(input, limit) + ' ...';
   };
}]);
