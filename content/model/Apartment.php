<?php

/** CREATION 05.12.16 14:30 Alex Noever**/


class Apartment
{
    private $id_apartment;
    private $apartment_type;
    private $rooms;
    private $squaremeter;
    
    private $id_property;
    private $id_adress;
    private $street;
    private $streetnumber;
    private $postcode;
    private $city;
    private $tenancy_status;



    public function __construct($id_apartment=null, $apartment_type=null, $rooms=null, $squaremeter=null, $id_property=null, $id_adress=null,$street=null,$streetnumber=null,$postcode=null,$city=null, $tenancy_status=null)
    {
        if (isset($id_apartment)) {
            $this->id_apartment = $id_apartment;
        }
        if (isset($apartment_type)){
            $this->apartment_type = $apartment_type;
        }
        if (isset($rooms)){
            $this->rooms = $rooms;
        }
        if (isset($squaremeter)){
            $this->squaremeter = $squaremeter;
        }
        if (isset($id_property)){
            $this->id_property = $id_property;
        }
        if (isset($id_adress)){
            $this->id_adress = $id_adress;
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
        if (isset($tenancy_status)){
            $this->tenancy_status = $tenancy_status;
        }
    }
    function getId_apartment() {
        return $this->id_apartment;
    }

    function getApartment_type() {
        return $this->apartment_type;
    }

    function getRooms() {
        return $this->rooms;
    }

    function getSquaremeter() {
        return $this->squaremeter;
    }

    function getId_property() {
        return $this->id_property;
    }
    function getId_adress() {
        return $this->id_adress;
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
    function getTenancy_status() {
        return $this->tenancy_status;
    }

    function setTenancy_status($tenancy_status) {
        $this->tenancy_status = $tenancy_status;
    }
    
    function getStatusPic() {
        if ($this->tenancy_status=='0'){
            return '<div align="center"><span class="glyphicon glyphicon-remove" style="color:red" align="center" aria-hidden="true"></span></div>';
        }
        return '<div align="center"><span class="glyphicon glyphicon-ok" style="color:green" aria-hidden="true"></span></div>';
    }
}


