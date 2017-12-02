<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/parcels', function () {
    return view('parcel');
});


Route::group(['middleware' => 'web'], function ()
{
	Route::get('/', function () {
    	return view('welcome');
	});
	
});

Auth::routes();

Route::group(['middleware' => ['web', 'cors']], function ()
{
	Route::get('/parcel/send', ['as' => 'app.send-parcels', 'uses' => 'boxtoshop\AppController@index']);
	Route::get('/parcel/list', ['as' => 'app.list-parcels', 'uses' => 'boxtoshop\AppController@index']);

	Route::resource('parcels/products','Products\ProductController');
	Route::resource('parcels/items', 'ItemController');


	// Authentication Routes...
	Route::get('login.html', ['as' => 'app.login.show','uses' => 'Auth\LoginController@showLoginForm']);

	// Registration Routes...
	Route::get('register.html', ['as' => 'app.register.show','uses' => 'Auth\RegisterController@showRegistrationForm']);

});

/*Route::group(['prefix' => 'user-management','middleware' => ['role:admin']], function() {
          Route::get('/users', 'UsersController@index');
      });*/



