<?php


include("../model/Tenant.php");

interface TenantDAOInterface
{

    public function createTenant(Tenant $tenant);

    public function readTenant($id_tenant);

    public function updateTenant(Tenant $tenant);

    public function deleteTenant(Tenant $tenant);

    public function findAll();
}