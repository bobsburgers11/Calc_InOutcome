<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AuxInvoiceType
{
    private $invoice_type;
    private $amount_payed;
    private $amount_open;
    private $saldo;


    public function __construct($invoice_type=null, $amount_payed=null, $amount_open=null,$saldo=null) {
        if (isset($invoice_type)) {
            $this->invoice_type = $invoice_type;
        };
        if (isset($amount_payed)) {
            $this->amount_payed = $amount_payed;
        };
        if (isset($amount_open)) {
            $this->amount_open = $amount_open;
        };
        if (isset($saldo)) {
            $this->saldo = $saldo;
        };
    }
    function getInvoice_type() {
        return $this->invoice_type;
    }

    function getAmount_payed() {
        return $this->amount_payed;
    }

    function getAmount_open() {
        return $this->amount_open;
    }

    function getSaldo() {
        return $this->saldo;
    }
    
    function setSaldo($saldo) {
        $this->saldo = $saldo;
    }
}