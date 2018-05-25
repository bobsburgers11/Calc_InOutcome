<?php


class Property
{
    private $id_property;
    private $postcode;
    private $city;
    private $id_adress;
    private $street;
    private $streetnumber;



    public function __construct($id_property=null, $postcode=null, $city=null, $id_adress=null, $street=null, $streetnumber=null)
    {
        if (isset($id_property)) {
            $this->id_property = $id_property;
        }
        if (isset($postcode)){
            $this->postcode = $postcode;
        }
        if (isset($city)){
            $this->city = $city;
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
    }

    function getId_property() {
        return $this->id_property;
    }

    function getPostcode() {
        return $this->postcode;
    }

    function getCity() {
        return $this->city;
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

    function setId_property($id_property) {
        $this->id_property = $id_property;
    }

    function setPostcode($postcode) {
        $this->postcode = $postcode;
    }

    function setCity($city) {
        $this->city = $city;
    }

    function setId_adress($id_adress) {
        $this->id_adress = $id_adress;
    }

    function setStreet($street) {
        $this->street = $street;
    }

    function setStreetnumber($streetnumber) {
        $this->streetnumber = $streetnumber;
    }
}


