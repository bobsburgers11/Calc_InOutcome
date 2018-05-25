<?php

/**
 * Created by PhpStorm.
 * Property: andreas.martin
 * Date: 15.11.2016
 * Time: 09:04
 */

include_once "../model/Property.php";

class PropertyValidator
{


    /**
     * @var Property
     */
    private $property;

    /**
     * @var bool
     */
    private $valid = true;
    private $streetError = null;
    private $postcodeError = null;
    private $cityError = null;
    private $streetnumberError = null;

    /**
     * PropertyValidator constructor.
     * @param Property $property
     */
    public function __construct(Property $property = null)
    {
        $this->property = $property;
        $this->validate();
    }

    public function validate(){

        if(!is_null($this->property)) {
           if(is_numeric($this->property->getStreet()) || empty($this->property->getStreet())){
                $this->streetError = 'Bitte keine Nummern.';
                $this->valid = false;
            }
            
            
            if(!(is_numeric($this->property->getPostcode())) || empty($this->property->getPostcode())){
                $this->postcodeError = 'Bitte keine Buchstaben.';
                $this->valid = false;
            }
            
            if(is_numeric($this->property->getCity()) || empty($this->property->getCity())){
                $this->cityError = 'Bitte keine Nummern.';
                $this->valid = false;
            }
            
            if(empty($this->property->getStreetnumber())){
                $this->streetnumberError = 'Bitte nicht leer lassen.';
                $this->valid = false;
            }

        }
        else {
            $this->valid = false;
        }
        return $this->valid;

    }

    /**
     * @return Property
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->valid;
    }
    function getStreetError() {
        return $this->streetError;
    }

    function getPostcodeError() {
        return $this->postcodeError;
    }
    
    function getCityError() {
        return $this->cityError;
    }
    
    function getStreetNumberError(){
        return $this->streetnumberError;
    }
    
}