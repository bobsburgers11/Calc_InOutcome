<?php

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 14.11.2016
 * Time: 11:42
 */
abstract class AbstractDAO
{
    protected $pdoInstance;

    public function __construct(PDO $pdoInstance)
    {
        $this->pdoInstance = $pdoInstance;
        if ($this->pdoInstance === null) {
            throw new Exception("No DB connection!");
        }
    }
}