<?php

/** CREATION 06.12.16 14:30 Alex Noever**/


class Tenancy_Agreement
{
    private $id_tenancy_agreement;
    private $start_of_tenancy;
    private $end_of_tenancy;
    private $netrent;
    private $cancellationterms;
    private $id_apartment;
    private $squaremeter;
    private $id_tenant;
    private $firstname;
    private $lastname;
    private $street;
    private $streetnumber;
    private $postcode;
    private $city;



    public function __construct($id_tenancy_agreement=null, $start_of_tenancy=null, $end_of_tenancy=null, $netrent=null, $cancellationterms=null, $id_apartment=null, $squaremeter=null, $id_tenant=null,$firstname=null,$lastname=null,$street=null,$streetnumber=null,$postcode=null,$city=null)
    {
        if (isset($id_tenancy_agreement)) {
            $this->id_tenancy_agreement = $id_tenancy_agreement;
        }
        if (isset($start_of_tenancy)){
            $this->start_of_tenancy = $start_of_tenancy;
        }
        if (isset($end_of_tenancy)){
            $this->end_of_tenancy = $end_of_tenancy;
        }
        if (isset($netrent)){
            $this->netrent = $netrent;
        }
        if (isset($cancellationterms)){
            $this->cancellationterms = $cancellationterms;
        }
        if (isset($id_apartment)){
            $this->id_apartment = $id_apartment;
        }
        if (isset($squaremeter)){
            $this->squaremeter = $squaremeter;
        }
        if (isset($id_tenant)){
            $this->id_tenant = $id_tenant;
        }
        if (isset($firstname)){
            $this->firstname = $firstname;
        }
        if (isset($lastname)){
            $this->lastname = $lastname;
        }
        if (isset($street)){
            $this->street = $street;
        }
        if (isset($streetnumber)){
            $this->streetnumber = $streetnumber;
        }
        if (isset($postcode)){
            $this->postcode = $postcode;
        }
        if (isset($city)){
            $this->city = $city;
        }
    }
    function getId_tenancy_agreement() {
        return $this->id_tenancy_agreement;
    }

    function getStart_of_tenancy() {
        return $this->start_of_tenancy;
    }

    function getEnd_of_tenancy() {
        return $this->end_of_tenancy;
    }

    function getNetrent() {
        return $this->netrent;
    }

    function getCancellationterms() {
        return $this->cancellationterms;
    }

    function getId_apartment() {
        return $this->id_apartment;
    }

    function getId_tenant() {
        return $this->id_tenant;
    }
    function getFirstname() {
        return $this->firstname;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getStreet() {
        return $this->street;
    }

    function getStreetnumber() {
        return $this->streetnumber;
    }

    function getPostcode() {
        return $this->postcode;
    }

    function getCity() {
        return $this->city;
    }
    function getSquaremeter() {
        return $this->squaremeter;
    }
}


