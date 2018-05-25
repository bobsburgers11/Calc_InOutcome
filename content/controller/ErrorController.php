<?php

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 15.11.2016
 * Time: 10:18
 */
class ErrorController
{
    public function error() {
        require_once('../view/error/error.php');
    }
    
    public function errorDelete() {
        require_once('../view/error/errorDelete.php');
    }
}