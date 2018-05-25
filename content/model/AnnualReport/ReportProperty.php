<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ReportProperty
{
    private $total;
    private $id_property;
    private $street;
    private $streetnumber;
    private $postcode;
    private $city;
    private $reportTenants;



    public function __construct($id_property=null, $street=null, $streetnumber=null, $postcode=null, $city=null,$total=null,$reportTenants=null)
    {
        if (isset($id_property)) {
            $this->id_property = $id_property;
        }
        if (isset($street)) {
            $this->street = $street;
        }
        if (isset($streetnumber)) {
            $this->streetnumber = $streetnumber;
        }
        if (isset($postcode)) {
            $this->postcode = $postcode;
        }
        if (isset($city)) {
            $this->city = $city;
        }
        if (isset($total)) {
            $this->total = $total;
        }
        if (isset($reportTenants)) {
            $this->reportTenants = $reportTenants;
        }
    }
    function getTotal() {
        return $this->total;
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

    function getReportTenants() {
        return $this->reportTenants;
    }
    function getId_property() {
        return $this->id_property;
    }
    function setReportTenants($reportTenants) {
        $this->reportTenants = $reportTenants;
    }
}

