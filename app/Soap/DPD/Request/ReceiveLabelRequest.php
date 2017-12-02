<?php 
namespace App\Soap\DPD\Request;

use App\Soap\DPD\Request\LabelType;

class ReceiveLabelRequest
{
	protected $countrycode;
	protected $centernumber;
	protected $parcelnumber;
	protected $labelType;


	/**
	 * Class Constructor
	 * @param    $countrycode   
	 * @param    $centernumber   
	 * @param    $parcelnumber   
	 * @param    $labelType   
	 */
	public function __construct()
	{

	}


    /**
     * @return mixed
     */
    public function getCountrycode()
    {
        return $this->countrycode;
    }

    /**
     * @param mixed $countrycode
     *
     * @return self
     */
    public function setCountrycode($countrycode)
    {
        $this->countrycode = $countrycode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCenternumber()
    {
        return $this->centernumber;
    }

    /**
     * @param mixed $centernumber
     *
     * @return self
     */
    public function setCenternumber($centernumber)
    {
        $this->centernumber = $centernumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getParcelnumber()
    {
        return $this->parcelnumber;
    }

    /**
     * @param mixed $parcelnumber
     *
     * @return self
     */
    public function setParcelnumber($parcelnumber)
    {
        $this->parcelnumber = $parcelnumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabelType()
    {
        return $this->labelType;
    }

    /**
     * @param mixed $labelType
     *
     * @return self
     */
    public function setLabelType($labelType)
    {
        $this->labelType = $labelType;

        return $this;
    }
}