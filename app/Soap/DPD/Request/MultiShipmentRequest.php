<?php 

namespace App\Soap\DPD\Request;

class MultiShipmentRequest
{

    protected $receiveraddress;
    protected $receiverinfo;
    protected $shipperaddress;
    protected $retourAddress;
    protected $customer_countrycode;
    protected $customer_centernumber;
    protected $customer_number;
    protected $shippingdate;

    //shipment request
    protected $reference2;
    protected $reference3;
    protected $slaves;


    /**
     * Class Constructor
     * @param    $receiveraddress   
     * @param    $receiverinfo   
     * @param    $shipperaddress   
     * @param    $retourAddress   
     * @param    $customer_countrycode   
     * @param    $customer_centernumber   
     * @param    $customer_number   
     * @param    $shippingdate   
     * @param    $reference2   
     * @param    $reference3   
     * @param    $slaves   
     */
    public function __construct(){}
    


    /**
     * @return mixed
     */
    public function getReceiveraddress()
    {
        return $this->receiveraddress;
    }

    /**
     * @param mixed $receiveraddress
     *
     * @return self
     */
    public function setReceiveraddress($receiveraddress)
    {
        $this->receiveraddress = $receiveraddress;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReceiverinfo()
    {
        return $this->receiverinfo;
    }

    /**
     * @param mixed $receiverinfo
     *
     * @return self
     */
    public function setReceiverinfo($receiverinfo)
    {
        $this->receiverinfo = $receiverinfo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getShipperaddress()
    {
        return $this->shipperaddress;
    }

    /**
     * @param mixed $shipperaddress
     *
     * @return self
     */
    public function setShipperaddress($shipperaddress)
    {
        $this->shipperaddress = $shipperaddress;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRetourAddress()
    {
        return $this->retourAddress;
    }

    /**
     * @param mixed $retourAddress
     *
     * @return self
     */
    public function setRetourAddress($retourAddress)
    {
        $this->retourAddress = $retourAddress;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerCountrycode()
    {
        return $this->customer_countrycode;
    }

    /**
     * @param mixed $customer_countrycode
     *
     * @return self
     */
    public function setCustomerCountrycode($customer_countrycode)
    {
        $this->customer_countrycode = $customer_countrycode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerCenternumber()
    {
        return $this->customer_centernumber;
    }

    /**
     * @param mixed $customer_centernumber
     *
     * @return self
     */
    public function setCustomerCenternumber($customer_centernumber)
    {
        $this->customer_centernumber = $customer_centernumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerNumber()
    {
        return $this->customer_number;
    }

    /**
     * @param mixed $customer_number
     *
     * @return self
     */
    public function setCustomerNumber($customer_number)
    {
        $this->customer_number = $customer_number;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getShippingdate()
    {
        return $this->shippingdate;
    }

    /**
     * @param mixed $shippingdate
     *
     * @return self
     */
    public function setShippingdate($shippingdate)
    {
        $this->shippingdate = $shippingdate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReference2()
    {
        return $this->reference2;
    }

    /**
     * @param mixed $reference2
     *
     * @return self
     */
    public function setReference2($reference2)
    {
        $this->reference2 = $reference2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReference3()
    {
        return $this->reference3;
    }

    /**
     * @param mixed $reference3
     *
     * @return self
     */
    public function setReference3($reference3)
    {
        $this->reference3 = $reference3;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSlaves()
    {
        return $this->slaves;
    }

    /**
     * @param mixed $slaves
     *
     * @return self
     */
    public function setSlaves($slaves)
    {
        $this->slaves = $slaves;

        return $this;
    }
}