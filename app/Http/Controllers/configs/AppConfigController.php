<?php

namespace App\Http\Controllers\configs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;

class AppConfigController extends Controller
{
    public function __construct()
	{
		//$this->middleware('auth');
	}

    public function getParcelTypes()
    {
    	return Config::get('constants.PARCEL_TYPE');
    }

    public function getCountries()
    {
    	return Country::all();
    }
    public function getTransporters()
	{
		return Config::get('constants.TRANSPORTERS', null);
	}
}
