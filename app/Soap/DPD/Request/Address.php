<?php 
namespace App\Soap\DPD\Request;

class Address
{
	protected $name;
	protected $phoneNumber;
	protected $faxNumber;
	protected $geoX;
	protected $geoY;

    //address min
    protected $countryPrefix;
    protected $zipCode;
    protected $city;
    protected $street;

    //address of receiver info
    protected $contact;
    protected $name2;
    protected $name3;
    protected $name4;
    protected $digicode1;
    protected $digicode2;
    protected $intercomid;
    protected $vinfo1;
    protected $vinfo2;


    /**
     * Class Constructor
     * @param    $name   
     * @param    $phoneNumber   
     * @param    $faxNumber   
     * @param    $geoX   
     * @param    $geoY   
     * @param    $countryPrefix   
     * @param    $zipCode   
     * @param    $city   
     * @param    $street   
     */
    public function __construct()
    {

    }

    

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     *
     * @return self
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * @param mixed $faxNumber
     *
     * @return self
     */
    public function setFaxNumber($faxNumber)
    {
        $this->faxNumber = $faxNumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGeoX()
    {
        return $this->geoX;
    }

    /**
     * @param mixed $geoX
     *
     * @return self
     */
    public function setGeoX($geoX)
    {
        $this->geoX = $geoX;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGeoY()
    {
        return $this->geoY;
    }

    /**
     * @param mixed $geoY
     *
     * @return self
     */
    public function setGeoY($geoY)
    {
        $this->geoY = $geoY;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountryPrefix()
    {
        return $this->countryPrefix;
    }

    /**
     * @param mixed $countryPrefix
     *
     * @return self
     */
    public function setCountryPrefix($countryPrefix)
    {
        $this->countryPrefix = $countryPrefix;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param mixed $zipCode
     *
     * @return self
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     *
     * @return self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     *
     * @return self
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param mixed $contact
     *
     * @return self
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName2()
    {
        return $this->name2;
    }

    /**
     * @param mixed $name2
     *
     * @return self
     */
    public function setName2($name2)
    {
        $this->name2 = $name2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName3()
    {
        return $this->name3;
    }

    /**
     * @param mixed $name3
     *
     * @return self
     */
    public function setName3($name3)
    {
        $this->name3 = $name3;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName4()
    {
        return $this->name4;
    }

    /**
     * @param mixed $name4
     *
     * @return self
     */
    public function setName4($name4)
    {
        $this->name4 = $name4;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDigicode1()
    {
        return $this->digicode1;
    }

    /**
     * @param mixed $digicode1
     *
     * @return self
     */
    public function setDigicode1($digicode1)
    {
        $this->digicode1 = $digicode1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDigicode2()
    {
        return $this->digicode2;
    }

    /**
     * @param mixed $digicode2
     *
     * @return self
     */
    public function setDigicode2($digicode2)
    {
        $this->digicode2 = $digicode2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIntercomid()
    {
        return $this->intercomid;
    }

    /**
     * @param mixed $intercomid
     *
     * @return self
     */
    public function setIntercomid($intercomid)
    {
        $this->intercomid = $intercomid;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVinfo1()
    {
        return $this->vinfo1;
    }

    /**
     * @param mixed $vinfo1
     *
     * @return self
     */
    public function setVinfo1($vinfo1)
    {
        $this->vinfo1 = $vinfo1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVinfo2()
    {
        return $this->vinfo2;
    }

    /**
     * @param mixed $vinfo2
     *
     * @return self
     */
    public function setVinfo2($vinfo2)
    {
        $this->vinfo2 = $vinfo2;

        return $this;
    }
}