<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api', 'cors']], function ()
{

	//Configs
	Route::get('boxtoshop/countries', ['as' => 'config.countries', 'uses' => 'configs\AppConfigController@getCountries']);

	//make shipment
	Route::post('boxtoshop/shipment/transporter',[
		'as' => 'shipment.create',
		'uses' => 'boxtoshop\TransporterController@transporter'
	]);
	Route::post('boxtoshop/printlabel', [
		'as' => 'shipment.print',
		'uses' => 'boxtoshop\LabelController@print'
	]);

	Route::get('boxtoshop/shipment/sent/{users_id}',[
		'as' => 'shipment.sent',
		'uses' => 'shipment\ShipmentController@getSent'
	]);

});
