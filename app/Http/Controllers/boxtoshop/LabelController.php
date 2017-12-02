<?php

namespace App\Http\Controllers\boxtoshop;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrintLabelRequest;
use App\Soap\DPD\DPDSoap;
use Illuminate\Http\Request;

class LabelController extends Controller
{
   	public function __construct()
	{
		//$this->middleware('web');
	}

	public function print(PrintLabelRequest $request)
	{
		if($request->errors)
    		return $request->errors;
    	
    	$dpdSoap = new DPDSoap();
    	$response = $dpdSoap->getLabel($request->parcelnumber, $request->type);



    	$getLabelResult = $response->GetLabelResult->labels->Label;

    	if($getLabelResult){

	    	foreach($getLabelResult as $r){
				return response([
		                        		'data' => base64_encode($r->label)
		                    		], 202);
	    	}
    	}else{
    		return response([
								'data' => 'There is no label return'
		                    ], 202);
    	}
    	
 
	}
}
