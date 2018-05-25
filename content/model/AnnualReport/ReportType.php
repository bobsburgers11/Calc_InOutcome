<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ReportType
{
    private $total;
    private $invoice_type;
    private $invoicePropertys;



    public function __construct($invoice_type=null,$total=null, $invoicePropertys=null)
    {
        if (isset($total)) {
            $this->total = $total;
        }
        if (isset($invoice_type)) {
            $this->invoice_type = $invoice_type;
        }
        if (isset($invoicePropertys)) {
            $this->invoicePropertys = $invoicePropertys;
        }
    }
    function getTotal() {
        return $this->total;
    }

    function getInvoice_type() {
        return $this->invoice_type;
    }

    function getReportPropertys() {
        return $this->invoicePropertys;
    }
    function setReportPropertys($invoicePropertys) {
        $this->invoicePropertys = $invoicePropertys;
    }
}
