<?php

namespace App\Soap\DPD;

use App\Soap\DPD\Request\CreateShipment;
use App\Soap\DPD\Request\LabelType;
use App\Soap\DPD\Request\MultiShipmentRequest;
use App\Soap\DPD\Request\ReceiveLabelRequest;
use App\Soap\DPD\Response\CreateShipmentResult;
use Artisaninweb\SoapWrapper\SoapWrapper;
use SoapClient;
use SoapHeader;

class DPDSoap
{
	//protected 	$soapWrapper;
	protected 	$wsdl;
    protected 	$ns;
    protected 	$userid;
    protected 	$password;
    protected 	$appName;
    protected	$customerNumber;
    protected	$customerCenterNumber;
    protected	$customerCountrycode;
   

	public function __construct()
	{
		 //$this->soapWrapper = $soapWrapper;
		 $this->wsdl = env('DPD_WEBSERVICE_URI_WSDL');
		 $this->ns = env('DPD_WEBSERVICE_NS');
		 $this->userid = env('DPD_USER_ID');
		 $this->password = env('DPD_USER_ID');
		 $this->appName = env('APP_NAME');
		 $this->customerNumber = env('DPD_CUSTOMER_NUMBER');
		 $this->customerCenterNumber = env('DPD_CUSTOMER_CENTER_NUMBER');
		 $this->customerCountrycode = env('CUSTOMER_COUNTRY_CODE');
	}

	private function getSoapService()
	{
		return new SoapClient($this->wsdl, array('encoding'=>'UTF-8'));
	}

	private function getAuth()
	{
		return array(
			   		'userid'=> $this->userid,
			   		'password'=> $this->password
			   );
	}

	private function getSoapHeader()
	{
		return new SOAPHeader($this->ns, 'UserCredentials', $this->getAuth());  
	}

	public function getLabel($parcelnumber, $labelType)
	{
		$client  = $this->getSoapService();
		$soapHeader = $this->getSoapHeader();
		$client->__setSoapHeaders($soapHeader);

		$receiveLabelRequest = new ReceiveLabelRequest();
    	$receiveLabelRequest->setCountrycode($this->customerCountrycode);
    	$receiveLabelRequest->setCenternumber($this->customerCenterNumber);
    	$receiveLabelRequest->setParcelnumber($parcelnumber);

    	/*$labelTypeObj = new LabelType();
    	$labelTypeObj->setLabelType();*/

    	$receiveLabelRequest->setLabelType(json_encode(array('type'=>'PDF')));

        $response = $client->GetLabel(array('request'=>$receiveLabelRequest));

        return $response;

	}

	public function createShipmentWithLabel($receiverAddress, $shipperAddress, $receiverInfo, $referencenumber, $custom_label_text, $weight)
	{
		$client  = $this->getSoapService();
		$soapHeader = $this->getSoapHeader();
		$client->__setSoapHeaders($soapHeader);

        $shipmentRequest = new ShipmentRequest();
        $shipmentRequest->setReceiveraddress($receiverAddress);
        $shipmentRequest->setShipperaddress($shipperAddress);
        $shipmentRequest->setReceiverinfo($receiverInfo);
        $shipmentRequest->setCustomerCountrycode($this->customerCountrycode);

        // Center+Account DPD France
        $shipmentRequest->setCustomerCenternumber($this->customerCenterNumber);
        $shipmentRequest->setCustomerNumber($this->customerNumber);
        $shipmentRequest->setReferencenumber($referencenumber);
        $shipmentRequest->setCustomLabelText($custom_label_text);
        $shipmentRequest->setWeight($weight);

        $response = $client->CreateShipmentWithLabels(array('request'=>$shipmentRequest));

        return $response;

	}
	public function createMultiShipment($receiverAddress, $shipperAddress, $receiverInfo, $slaves, $shippingDate)
	{
		$client  = $this->getSoapService();
		$soapHeader = $this->getSoapHeader();
		$client->__setSoapHeaders($soapHeader);

        $shipmentRequest = new MultiShipmentRequest();
        $shipmentRequest->setReceiveraddress($receiverAddress);
        $shipmentRequest->setShipperaddress($shipperAddress);
        $shipmentRequest->setReceiverinfo($receiverInfo);
        $shipmentRequest->setCustomerCountrycode($this->customerCountrycode);

        // Center+Account DPD France
        $shipmentRequest->setCustomerCenternumber($this->customerCenterNumber);
        $shipmentRequest->setCustomerNumber($this->customerNumber);
        $shipmentRequest->setSlaves($slaves);
        $shipmentRequest->setShippingdate($shippingDate);

        $response = $client->CreateMultiShipment(array('request'=>$shipmentRequest));

        return $response;

	}

}