<?php

namespace App\Http\Controllers\boxtoshop;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShipmentRequest;
use App\Models\Parcel;
use App\Models\Shipment;
use App\Soap\DPD\DPDSoap;
use App\Soap\DPD\Request\Address;
use App\Soap\DPD\Request\SlaveRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;

class TransporterController extends Controller
{
   	public function __construct()
	{
		//$this->middleware('web');
	}

	public function transporter(ShipmentRequest $request)
	{

		if($request->errors)
    		return $request->errors;

		$transporterDPD = Config::get('constants.TRANSPORTERS.DPD.value', '');
		$shipment_id = $this->saveShipment($request);

		if(!$shipment_id){
			return response([
	            'error' => 'Something went wrong, we can not save shipment!'
	        ], 500);
		}

		//Parcels
		$parcels = $request->parcels;
		$slaves = array();
		$reference_number = 'PFS'.$shipment_id.'-'.mt_rand(100000, 999999);
		foreach($parcels as $parcel)
		{
			$parcel_id = $this->saveParcel($shipment_id, $reference_number, $parcel);	
			array_push($slaves, array(
									'weight' => $parcel['weight'],
									'referencenumber' => $reference_number,
									'id' => $parcel_id
								)
						);
		}

		if($request->transporter === $transporterDPD){
			return $this->dpdCreateMultiShipment($request, $slaves);
		}else{

	        return response([
	            'error' => 'Provided an invalid transporter\'s name!'
	        ], 400);
		}	
	}

	public function dpdCreateMultiShipment(ShipmentRequest $request, $slaves)
	{
		
		// Receiver address
		$receiverAddress = new Address();
		$receiverAddress->setName($request->to_company);
		$receiverAddress->setCountryPrefix($request->to_country_prefix);
		$receiverAddress->setZipCode($request->to_zipcode);
		$receiverAddress->setCity($request->to_city);
		$receiverAddress->setStreet($request->to_address);
		$receiverAddress->setPhoneNumber($request->telephone);
		$receiverAddress->setFaxNumber('');
		$receiverAddress->setGeoX('');
		$receiverAddress->setGeoY('');

		// Shipper Address
		$shipperAddress = new Address();
		$shipperAddress->setName($request->from_company);
		$shipperAddress->setCountryPrefix($request->from_country_prefix);
		$shipperAddress->setZipCode($request->from_zipcode);
		$shipperAddress->setCity($request->from_city);
		$shipperAddress->setStreet($request->from_address);
		$shipperAddress->setPhoneNumber('');
		$shipperAddress->setFaxNumber('');
		$shipperAddress->setGeoX('');
		$shipperAddress->setGeoY('');

		// Additional Addresses
		$receiverInfo = new Address();
		$receiverInfo->setName2('');
		$receiverInfo->setName3('');
		$receiverInfo->setName4('');
		$receiverInfo->setVinfo1('');
		$receiverInfo->setVinfo2('');

		
		//$custom_label_text = $request->custom_label_text;
		$shippingDate = $request->shippingdate;

		$dpdSoap = new DPDSoap();
		$response = $dpdSoap->createMultiShipment($receiverAddress, $shipperAddress, $receiverInfo, $slaves, $shippingDate);

		
		$shipments = $response->CreateMultiShipmentResult->shipments->Shipment;


		$data=null;
		$parcelnumber=null;
		
		if( is_array($shipments))
	   	{
		   foreach($shipments as $key=>$shipment)
		   {
				$updateParcel = Parcel::find($slaves[$key]['id']);
				$updateParcel->parcelnumber = $shipment->parcelnumber;
				$updateParcel->barcode = $shipment->barcode;
				$updateParcel->save();
		   }
		   return response([
                        		'data'=> $shipments
                    		], 200);
	   }
	   else 
	   {
			$data = array();
	   		array_push($data, $shipments);
		   	return response([
                        		'data'=>$data
                    		], 200);
	   }

	}

	//save shipment in data and return it id + random number as referrence
	public function saveShipment(ShipmentRequest $request){
		$shipmentRequest = $request->all();
		$shipment = new Shipment($shipmentRequest);
		$shipment->save();
		return $shipment->id;
	}

	public function saveParcel($shipments_id, $reference_number, $parcel){
		$params =  array(
						'shipments_id' => $shipments_id,
						'referencenumber' => $reference_number,
						'parcel' => json_encode($parcel)
					);
		$result = new Parcel($params);
		$result->save();
		return $result->id;
	}
	public function dpdCreateshipmentwithlabel(ShipmentRequest $request, $shipment_id)
	{
		
		//check if the props of amount and weight is invalid
		//return $request->parcels[0]['weight'];
		//$data = html_entity_decode($request->parcels[0]);
        //$parcels = json_decode($data, true);
        $weight=null;
        $width=null;
        $long=null;
        $height=null;

        $weight = $request->parcels[0]['weight'];
        //return $parcel_props;
        /*foreach($parcels as $key=>$value)
        {
        	if(!array_key_exists('weight', $value))
            {
                    return Response::json([
                        'error' => 'Each parcel require weight'
                    ], 400);
            }else{
            	$weight = $value['weight'];
            }

        	if(!array_key_exists('width', $value))
            {
                    return Response::json([
                        'error' => 'Each parcel require width!'
                    ], 400);
            }else{
            	$width = $value['width'];
            }

            if(!array_key_exists('long', $value))
            {
                    return Response::json([
                        'error' => 'Each parcel require long'
                    ], 400);
            }else{
            	$long = $value['long'];
            }
            if(!array_key_exists('height', $value))
            {
                    return Response::json([
                        'error' => 'Each parcel require height'
                    ], 400);
            }else{
            	$height = $value['height'];
            }
        }*/
		//return $parcel_props['weight'];
		//return $this->saveShipment($request);

		// Receiver address
		$receiverAddress = new Address();
		$receiverAddress->setName($request->to_company);
		$receiverAddress->setCountryPrefix($request->to_country_prefix);
		$receiverAddress->setZipCode($request->to_zipcode);
		$receiverAddress->setCity($request->to_city);
		$receiverAddress->setStreet($request->to_address);
		$receiverAddress->setPhoneNumber($request->telephone);
		$receiverAddress->setFaxNumber('');
		$receiverAddress->setGeoX('');
		$receiverAddress->setGeoY('');

		/*print_r($receiverAddress);
		return 1;*/

		// Shipper Address
		$shipperAddress = new Address();
		$shipperAddress->setName($request->from_company);
		$shipperAddress->setCountryPrefix($request->from_country_prefix);
		$shipperAddress->setZipCode($request->from_zipcode);
		$shipperAddress->setCity($request->from_city);
		$shipperAddress->setStreet($request->from_address);
		$shipperAddress->setPhoneNumber('');
		$shipperAddress->setFaxNumber('');
		$shipperAddress->setGeoX('');
		$shipperAddress->setGeoY('');

		// Additional Addresses
		$receiverInfo = new Address();
		$receiverInfo->setName2('');
		$receiverInfo->setName3('');
		$receiverInfo->setName4('');
		$receiverInfo->setVinfo1('');
		$receiverInfo->setVinfo2('');

		$reference_number = 'PFS'.$shipment_id.'-'.mt_rand(100000, 999999);
		$custom_label_text = $request->custom_label_text;

		$dpdSoap = new DPDSoap();
		$response = $dpdSoap->createShipmentWithLabel($receiverAddress, $shipperAddress, $receiverInfo, $reference_number, $custom_label_text, $weight);

		$result = $response->CreateShipmentWithLabelsResult->shipments->Shipment;
	
		$data=null;
		$parcelnumber=null;
		if( is_array($result))
		{
		   foreach($result as $s)
		   {
		   		$parcelnumber = $result->parcelnumber;
				break;
		   }
	   	}
	   	else 
	   	{
			$parcelnumber = $result->parcelnumber;
	   	}

        $arResultLabel = $response->CreateShipmentWithLabelsResult->labels->Label;
        
	   	foreach($arResultLabel as $l) 
	   	{
	   	
	   		if($l->type==='EPRINT'){
	   			$data = base64_encode($l->label);
	   			break;
	   		}
	   		//$data = '<p><img src="data:image/png;base64,'.base64_encode($l->label).'" width="600"/></p>';
	   	
	   	}

	   	return $data;

	   	if($data!=null){
	   		$updateShipment = Shipment::find($shipment_id);
	   		$updateShipment->label_encoded = $data;
	   		$updateShipment->parcelnumber = $parcelnumber;
	   		$updateShipment->referencenumber = $reference_number;
	   		$updateShipment->save();
	   	}
	   	return Response::json([
                        		'data'=>$data,
                        		'parcelnumber'=>$parcelnumber,
                        		'referencenumber'=>$reference_number
                    		], 200);
	}



}
