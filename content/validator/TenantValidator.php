<?php

/**
 * Created by PhpStorm.
 * Tenant: andreas.martin
 * Date: 15.11.2016
 * Time: 09:04
 */

include_once "../model/Tenant.php";

class TenantValidator
{


    /**
     * @var Tenant
     */
    private $tenant;

    /**
     * @var bool
     */
    private $valid = true;
    private $firstnameError = null;
    private $lastnameError = null;
    private $emailError = null;
    private $birthdayError = null;
    private $phoneError = null;
    private $mobileError = null;
    private $streetError = null;
    private $postcodeError = null;
    private $cityError = null;

    /**
     * TenantValidator constructor.
     * @param Tenant $tenant
     */
    public function __construct(Tenant $tenant = null)
    {
        $this->tenant = $tenant;
        $this->validate();
    }

    public function validate(){

        if(!is_null($this->tenant)) {
            if (empty($this->tenant->getFirstname())) {
                $this->firstnameError = 'Bitte gib einen Vornamen ein.';
                $this->valid = false;
            }
            
            if (empty($this->tenant->getLastname())) {
                $this->lastnameError = 'Bitte gib einen Nachnamen ein.';
                $this->valid = false;
            }

            if (empty($this->tenant->getEmail())) {
                $this->emailError = 'Bitte tippe eine gültige EMail Adresse ein.';
                $this->valid = false;
            } else if (!filter_var($this->tenant->getEmail(), FILTER_VALIDATE_EMAIL)) {
                $this->emailError = 'Bitte tippe eine gültige EMail Adresse ein.';
                $this->valid = false;
            }
            
            if (!empty($this->tenant->getBirthday())){
              if(!$this->validateDate($this->tenant->getBirthday())){
                $this->birthdayError = 'Falsches Datumsformat (yyyy-mm-dd)';
                $this->valid = false;
            }
            }
            if((preg_match("/^(\+[0-9]{2,3}|0+[0-9]{2,5}).+[\d\s\/\(\)-]/", $this->tenant->getPhone())) || $this->tenant->getPhone()==""){
                
            }else{
                $this->phoneError = 'Bitte tippe eine gültige Telefonnummer ein.';
                $this->valid = false;
            }
            
            if((preg_match("/^(\+[0-9]{2,3}|0+[0-9]{2,5}).+[\d\s\/\(\)-]/", $this->tenant->getMobile())) || $this->tenant->getMobile()==""){
                
            }else{
                $this->mobileError = 'Bitte tippe eine gültige Telefonnummer ein.';
                $this->valid = false;
            }
            
            if(is_numeric($this->tenant->getStreet())){
                $this->streetError = 'Bitte keine Nummern';
                $this->valid = false;
            }
            
            if(!($this->tenant->getPostcode()=="")){
            if(!(is_numeric($this->tenant->getPostcode()))){
                $this->postcodeError = 'Bitte keine Buchstaben';
                $this->valid = false;
            }
            }
            
            if(is_numeric($this->tenant->getCity())){
                $this->cityError = 'Bitte keine Nummern';
                $this->valid = false;
            }
            
        }
        else {
            $this->valid = false;
        }
        return $this->valid;

    }

    /**
     * @return Tenant
     */
    public function getTenant()
    {
        return $this->tenant;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->valid;
    }

    function getFirstnameError() {
        return $this->firstnameError;
    }

    function getLastnameError() {
        return $this->lastnameError;
    }
    
    function getEmailError() {
        return $this->emailError;
    }
    
    function getBirthdayError(){
    return $this->birthdayError;
    }
    
    function validateDate($date)
    {
    $format = 'Y-m-d';
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
     }
     
     function getPhoneError(){
         return $this->phoneError;
     }
     
     function getMobileError(){
         return $this->mobileError;
     }
     
     function getStreetError(){
         return $this->streetError;
     }
     
     function getPostcodeError(){
         return $this->postcodeError;
     }
     
     function getCityError(){
         return $this->cityError;
     }

}