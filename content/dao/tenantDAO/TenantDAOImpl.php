<?php

include_once "../dao/AbstractDAO.php";
include "../dao/tenantDAO/TenantDAOInterface.php";

class TenantDAOImpl extends AbstractDAO implements TenantDAOInterface
{
    /**
     * @param Tenant $tenant
     * @return Customer
     */
    public function createTenant(Tenant $tenant)
    {
        if (!is_null($tenant->getId_tenant())) {
            return $this->updateTenant($tenant);
        }
        
        $stmt = $this->pdoInstance->prepare('
            INSERT IGNORE INTO city (postcode, city)
            VALUES (:postcode, :city);
            
            INSERT IGNORE INTO adress (street, streetnumber, postcode)
            VALUES (:street, :streetnumber, :postcode);
            
            INSERT INTO tenant (title, firstname, lastname, birthday, marital_status, phone, mobile, email, id_adress, inactive)
            VALUES (:title, :firstname, :lastname, :birthday, :marital_status, :phone, :mobile, :email, (SELECT id_adress FROM adress WHERE street = :street AND streetnumber = :streetnumber AND postcode = :postcode), :inactive);');
        
        $stmt->bindValue(':title', $tenant->getTitle());
        $stmt->bindValue(':firstname', $tenant->getFirstname());
        $stmt->bindValue(':lastname', $tenant->getLastname());
        $stmt->bindValue(':birthday', $tenant->getBirthday());
        $stmt->bindValue(':marital_status', $tenant->getMarital_status());
        $stmt->bindValue(':phone', $tenant->getPhone());
        $stmt->bindValue(':mobile', $tenant->getMobile());
        $stmt->bindValue(':email', $tenant->getEmail());
        $stmt->bindValue(':postcode', $tenant->getPostcode());
        $stmt->bindValue(':city', $tenant->getCity());
        $stmt->bindValue(':street', $tenant->getStreet());
        $stmt->bindValue(':streetnumber', $tenant->getStreetnumber());
        $stmt->bindValue(':inactive', $tenant->getInactive());
        $stmt->execute();
        unset($stmt);
        $tenant = $this->readTenant($this->pdoInstance->lastInsertId());
        return $tenant;
    }

    /**
     * @param Customer $customer
     * @return Customer
     */
    public function updateTenant(Tenant $tenant)
    {
        if (is_null($tenant->getId_tenant())) {
            throw new LogicException(
                'Cannot update tenant that does not yet exist in the database.'
            );
        }
        $stmt = $this->pdoInstance->prepare('
            INSERT IGNORE INTO city (postcode, city)
            VALUES (:postcode, :city);
            
            INSERT IGNORE INTO adress (street, streetnumber, postcode)
            VALUES (:street, :streetnumber, :postcode);            

            UPDATE tenancymanager_t.tenant
            SET
            id_tenant = :id_tenant,
            title = :title,
            firstname = :firstname,
            lastname = :lastname,
            birthday = :birthday,
            marital_status = :marital_status,
            phone = :phone,
            mobile = :mobile,
            email = :email,
            id_adress = (SELECT id_adress FROM adress WHERE street = :street AND streetnumber = :streetnumber AND postcode = :postcode),
            inactive = :inactive
            WHERE id_tenant = :id_tenant;
        ');
        $stmt->bindValue(':id_tenant', $tenant->getId_tenant());
        $stmt->bindValue(':title', $tenant->getTitle());
        $stmt->bindValue(':firstname', $tenant->getFirstname());
        $stmt->bindValue(':lastname', $tenant->getLastname());
        $stmt->bindValue(':birthday', $tenant->getBirthday());
        $stmt->bindValue(':marital_status', $tenant->getMarital_status());
        $stmt->bindValue(':phone', $tenant->getPhone());
        $stmt->bindValue(':mobile', $tenant->getMobile());
        $stmt->bindValue(':email', $tenant->getEmail());
        $stmt->bindValue(':postcode', $tenant->getPostcode());
        $stmt->bindValue(':city', $tenant->getCity());
        $stmt->bindValue(':street', $tenant->getStreet());
        $stmt->bindValue(':streetnumber', $tenant->getStreetnumber());
        $stmt->bindValue(':inactive', $tenant->getInactive());
        $stmt->execute();
        unset($stmt);
        return $tenant;
    }


    /**
     * @param $id
     * @return Customer
     */
    public function readTenant($id_tenant)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT tenant.id_tenant, tenant.title, tenant.firstname, tenant.lastname, tenant.birthday, tenant.marital_status, tenant.phone, tenant.mobile, tenant.email, city.postcode, city.city, adress.id_adress, adress.street, adress.streetnumber, tenant.inactive 
            FROM adress, city, tenant 
            WHERE city.postcode = adress.postcode 
                AND tenant.id_adress = adress.id_adress
                AND tenant.id_tenant = :id_tenant;
        ');
        $stmt->bindValue(':id_tenant', $id_tenant);
        $stmt->execute();
        return $stmt->fetchObject("Tenant");
    }

    /**
     * @param Customer $customer
     */
    public function deleteTenant(Tenant $tenant)
    {
        try {
            $stmt = $this->pdoInstance->prepare('
                DELETE FROM tenant
                WHERE id_tenant = :id
            ');
            $stmt->bindValue(':id', $tenant->getId_tenant());
            $stmt->execute();
            $tenant = null;
        } catch (PDOException $ex){
            Route::call('Error', 'errorDelete');
        }            
    }


    /**
     * @return Tenant[]
     */
    public function findAll()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT tenant.id_tenant, tenant.title, tenant.firstname, tenant.lastname, tenant.birthday, tenant.marital_status, tenant.phone, tenant.mobile, tenant.email, city.postcode, city.city, adress.id_adress, adress.street, adress.streetnumber, tenant.inactive 
                FROM adress, city, tenant
                WHERE city.postcode = adress.postcode 
                AND tenant.id_adress = adress.id_adress
                AND tenant.inactive="0"
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Tenant');
    }
    
    public function findAllInactive()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT tenant.id_tenant, tenant.title, tenant.firstname, tenant.lastname, tenant.birthday, tenant.marital_status, tenant.phone, tenant.mobile, tenant.email, city.postcode, city.city, adress.id_adress, adress.street, adress.streetnumber, tenant.inactive 
                FROM adress, city, tenant
                WHERE city.postcode = adress.postcode 
                AND tenant.id_adress = adress.id_adress
                AND tenant.inactive="1"
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Tenant');
    }

}