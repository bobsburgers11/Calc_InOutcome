<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ReportTenant
{
    private $total;
    private $id_property;
    private $id_tenant;
    private $firstname;
    private $lastname;



    public function __construct($lastname=null, $firstname=null,$id_tenant=null, $id_property=null,$total=null)
    {

        if (isset($firstname)) {
            $this->firstname = $firstname;
        }
        if (isset($lastname)) {
            $this->lastname = $lastname;
        }
        if (isset($id_tenant)) {
            $this->id_tenant = $id_tenant;
        }
        if (isset($id_property)) {
            $this->id_property = $id_property;
        }
        if (isset($total)) {
            $this->total = $total;
        }
    }
    function getTotal() {
        return $this->total;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getLastname() {
        return $this->lastname;
    }
    function getId_property() {
        return $this->id_property;
    }

    function getId_tenant() {
        return $this->id_tenant;
    }
}

