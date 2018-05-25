<?php

class TotalSquaremeter
{

    private $totalSquaremeter;

    public function __construct($totalSquaremeter=null)
    {
        if (isset($totalSquaremeter)){
            $this->totalSquaremeter = $totalSquaremeter;
        }
    }
    function getTotalSquaremeter() {
        return $this->totalSquaremeter;
    } 
}