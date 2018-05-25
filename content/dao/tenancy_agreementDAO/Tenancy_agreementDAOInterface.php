<?php


include("../model/Tenancy_agreement.php");

interface Tenancy_agreementDAOInterface
{

    public function createTenancy_agreement(Tenancy_agreement $tenancy_agreement);

    public function readTenancy_agreement($id_tenancy_agreement);

    public function updateTenancy_agreement(Tenancy_agreement $tenancy_agreement);

    public function deleteTenancy_agreement(Tenancy_agreement $tenancy_agreement);

    public function findAll();
}