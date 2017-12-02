<?php 
namespace App\Soap\DPD\Request;

class LabelType
{
	protected $labelType;

	public function __construct(){

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