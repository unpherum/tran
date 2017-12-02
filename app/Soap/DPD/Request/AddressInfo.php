<?php 
namespace App\Soap\DPD\Request;

class AddressInfo
{
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
	 * @param    $contact   
	 * @param    $name2   
	 * @param    $name3   
	 * @param    $name4   
	 * @param    $digicode1   
	 * @param    $digicode2   
	 * @param    $intercomid   
	 * @param    $vinfo1   
	 * @param    $vinfo2   
	 */
	public function __construct($contact, $name2, $name3, $name4, $digicode1, $digicode2, $intercomid, $vinfo1, $vinfo2)
	{
		$this->contact = $contact;
		$this->name2 = $name2;
		$this->name3 = $name3;
		$this->name4 = $name4;
		$this->digicode1 = $digicode1;
		$this->digicode2 = $digicode2;
		$this->intercomid = $intercomid;
		$this->vinfo1 = $vinfo1;
		$this->vinfo2 = $vinfo2;
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