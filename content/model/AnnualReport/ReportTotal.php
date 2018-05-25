<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ReportTotal
{
    private $totalAmount;
    
    public function __construct($totalAmount=null) {
        if (isset($totalAmount)) {
            $this->totalAmount = $totalAmount;
        };
    }
    function getTotalAmount() {
        return $this->totalAmount;
    }

}
