<?php

/** CREATION 05.12.16 14:30 Alex Noever**/



include("../model/Apartment.php");

interface ApartmentDAOInterface
{

    public function createApartment(Apartment $apartment);

    public function readApartment($id_apartment);

    public function updateApartment(Apartment $apartment);

    public function deleteApartment(Apartment $apartment);

    public function findAll();
}