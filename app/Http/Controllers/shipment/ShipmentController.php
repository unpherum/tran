<?php

namespace App\Http\Controllers\shipment;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
	public function __construct()
	{
		$this->middleware('web');
	}

    public function getSent($users_id){


    	if(!$users_id){
    		return response([
	            'error' => 'Missing user id!'
	        ], 401);
    	}

    	$shipment = User::find($users_id)->shipments;

    	return $shipment;
    }
}
