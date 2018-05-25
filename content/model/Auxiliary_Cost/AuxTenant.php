<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AuxTenant
{
    private $id_tenant;
    private $firstname;
    private $lastname;
    private $totalAmount;
    private $auxInvoiceTypes;


    public function __construct($id_tenant=null, $firstname=null, $lastname=null,$totalAmount=null, $auxInvoiceTypes=null) {
        if (isset($id_tenant)) {
            $this->id_tenant = $id_tenant;
        };
        if (isset($firstname)) {
            $this->firstname = $firstname;
        };
        if (isset($lastname)) {
            $this->lastname = $lastname;
        };
        if (isset($totalAmount)) {
            $this->totalAmount = $totalAmount;
        };
        if (isset($auxInvoiceTypes)) {
            $this->auxInvoiceTypes = $auxInvoiceTypes;
        };
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

    function getAuxInvoiceTypes() {
        return $this->auxInvoiceTypes;
    }
    function getTotalAmount() {
        return $this->totalAmount;
    }
    function setAuxInvoiceTypes($auxInvoiceTypes) {
        $this->auxInvoiceTypes = $auxInvoiceTypes;
    }

}
