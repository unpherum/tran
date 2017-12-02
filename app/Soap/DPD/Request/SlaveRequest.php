<?php 

namespace App\Soap\DPD\Request;

class SlaveRequest
{
	protected $weight;
	protected $referencenumber;
	protected $reference2;
	protected $reference3;


	/**
	 * Class Constructor
	 * @param    $weight   
	 * @param    $referencenumber   
	 * @param    $reference2   
	 * @param    $reference3   
	 */
	public function __construct($weight, $referencenumber, $reference2, $reference3)
	{
		$this->weight = $weight;
		$this->referencenumber = $referencenumber;
		$this->reference2 = $reference2;
		$this->reference3 = $reference3;
	}

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     *
     * @return self
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReferencenumber()
    {
        return $this->referencenumber;
    }

    /**
     * @param mixed $referencenumber
     *
     * @return self
     */
    public function setReferencenumber($referencenumber)
    {
        $this->referencenumber = $referencenumber;

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
}