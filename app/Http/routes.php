<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index')->with('titleApp',"Flowers Ecommerce");
});

Route::group(['prefix' => 'api'], function()
{

	Route::get('/categories', 'IndexController@getCategories');
	Route::get('/category/{categoryId}', 'IndexController@getCategoryById');
	Route::get('/product/{categoryId}/{productId}', 'IndexController@getProductById');

});