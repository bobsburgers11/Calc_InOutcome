<?php


include("../model/Property.php");

interface PropertyDAOInterface
{

    public function createProperty(Property $property);

    public function readProperty($id_property);

    public function updateProperty(Property $property);

    public function deleteProperty(Property $property);

    public function findAll();
}