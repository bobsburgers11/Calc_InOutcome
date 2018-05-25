<?php


/** CREATION 06.12.16 14:30 Alex Noever**/


include_once "../dao/AbstractDAO.php";
include "../dao/tenancy_agreementDAO/Tenancy_agreementDAOInterface.php";

class Tenancy_agreementDAOImpl extends AbstractDAO implements Tenancy_agreementDAOInterface
{
    /**
     * @param Tenancy_agreement $tenancy_agreement
     * @return Customer
     */
    public function createTenancy_agreement(Tenancy_agreement $tenancy_agreement)
    {
        if (!is_null($tenancy_agreement->getId_tenancy_agreement())) {
            return $this->updateTenancy_agreement($tenancy_agreement);
        }
        
        $stmt = $this->pdoInstance->prepare('
            
            INSERT INTO tenancy_agreement (id_tenant, id_apartment, start_of_tenancy, end_of_tenancy, netrent, cancellationterms)
            VALUES (:id_tenant, :id_apartment, :start_of_tenancy, :end_of_tenancy, :netrent, :cancellationterms);');
        
        $stmt->bindValue(':id_tenant', $tenancy_agreement->getId_tenant());
        $stmt->bindValue(':id_apartment', $tenancy_agreement->getId_apartment());
        $stmt->bindValue(':start_of_tenancy', $tenancy_agreement->getStart_of_tenancy());
        $stmt->bindValue(':end_of_tenancy', $tenancy_agreement->getEnd_of_tenancy());
        $stmt->bindValue(':netrent', $tenancy_agreement->getNetrent());
        $stmt->bindValue(':cancellationterms', $tenancy_agreement->getCancellationterms());
        $stmt->execute();
        unset($stmt);
        $tenancy_agreement = $this->readTenancy_agreement($this->pdoInstance->lastInsertId());
        return $tenancy_agreement;
    }

    public function updateTenancy_agreement(Tenancy_agreement $tenancy_agreement)
    {
        if (is_null($tenancy_agreement->getId_tenancy_agreement())) {
            throw new LogicException(
                'Cannot update tenancy_agreement that does not yet exist in the database.'
            );
        }
        $stmt = $this->pdoInstance->prepare('

            UPDATE tenancymanager_t.tenancy_agreement
            SET
            id_tenant = :id_tenant, 
            id_apartment = :id_apartment,
            start_of_tenancy = :start_of_tenancy, 
            end_of_tenancy = :end_of_tenancy, 
            netrent = :netrent, 
            cancellationterms = :cancellationterms
            WHERE id_tenancy_agreement = :id_tenancy_agreement;
        ');
        $stmt->bindValue(':id_tenant', $tenancy_agreement->getId_tenant());
        $stmt->bindValue(':id_apartment', $tenancy_agreement->getId_apartment());
        $stmt->bindValue(':start_of_tenancy', $tenancy_agreement->getStart_of_tenancy());
        $stmt->bindValue(':end_of_tenancy', $tenancy_agreement->getEnd_of_tenancy());
        $stmt->bindValue(':netrent', $tenancy_agreement->getNetrent());
        $stmt->bindValue(':cancellationterms', $tenancy_agreement->getCancellationterms());
        $stmt->bindValue(':id_tenancy_agreement', $tenancy_agreement->getId_tenancy_agreement());
        $stmt->execute();
        unset($stmt);
        return $tenancy_agreement;
    }


    public function readTenancy_agreement($id_tenancy_agreement)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT tenancy_agreement.id_tenancy_agreement, tenancy_agreement.start_of_tenancy, tenancy_agreement.end_of_tenancy, tenancy_agreement.netrent, tenancy_agreement.cancellationterms, tenancy_agreement.id_apartment, apartment.squaremeter, tenancy_agreement.id_tenant, adress.street, adress.streetnumber, city.postcode, city.city
                FROM tenancy_agreement
                JOIN apartment
                    ON tenancy_agreement.id_apartment=apartment.id_apartment
                JOIN property
                    ON apartment.id_property=property.id_property
                JOIN adress
                    ON property.id_adress=adress.id_adress
                JOIN city
                    ON adress.postcode=city.postcode
                JOIN tenant 
                    ON tenancy_agreement.id_tenant=tenant.id_tenant
                WHERE id_tenancy_agreement = :id_tenancy_agreement;
        ');
        $stmt->bindValue(':id_tenancy_agreement', $id_tenancy_agreement);
        $stmt->execute();
        return $stmt->fetchObject("Tenancy_agreement");
    }


    public function deleteTenancy_agreement(Tenancy_agreement $tenancy_agreement)
    {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM tenancy_agreement
            WHERE id_tenancy_agreement = :id
        ');
        $stmt->bindValue(':id', $tenancy_agreement->getId_tenancy_agreement());
        $stmt->execute();
        $tenancy_agreement = null;
    }


    /**
     * @return Tenancy_agreement[]
     */
    public function findAll()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT tenancy_agreement.id_tenancy_agreement, tenant.firstname, tenant.lastname, tenancy_agreement.start_of_tenancy, tenancy_agreement.end_of_tenancy, tenancy_agreement.netrent, tenancy_agreement.cancellationterms, tenancy_agreement.id_apartment, apartment.squaremeter, tenancy_agreement.id_tenant, adress.street, adress.streetnumber, city.postcode, city.city
                FROM tenancy_agreement
                JOIN apartment
                    ON tenancy_agreement.id_apartment=apartment.id_apartment
                JOIN property
                    ON apartment.id_property=property.id_property
                JOIN adress
                    ON property.id_adress=adress.id_adress
                JOIN city
                    ON adress.postcode=city.postcode
                JOIN tenant 
                    ON tenancy_agreement.id_tenant=tenant.id_tenant
            WHERE CAST(tenancy_agreement.end_of_tenancy AS DATE)>=CURDATE();
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Tenancy_agreement');
    }
    
    public function findAllEnded()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT tenancy_agreement.id_tenancy_agreement, tenant.firstname, tenant.lastname, tenancy_agreement.start_of_tenancy, tenancy_agreement.end_of_tenancy, tenancy_agreement.netrent, tenancy_agreement.cancellationterms, tenancy_agreement.id_apartment, apartment.squaremeter, tenancy_agreement.id_tenant, adress.street, adress.streetnumber, city.postcode, city.city
                FROM tenancy_agreement
                JOIN apartment
                    ON tenancy_agreement.id_apartment=apartment.id_apartment
                JOIN property
                    ON apartment.id_property=property.id_property
                JOIN adress
                    ON property.id_adress=adress.id_adress
                JOIN city
                    ON adress.postcode=city.postcode
                JOIN tenant 
                    ON tenancy_agreement.id_tenant=tenant.id_tenant
            WHERE CAST(tenancy_agreement.end_of_tenancy AS DATE)<=CURDATE();
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Tenancy_agreement');
    }
    
    public function findAllByProperty($id_property)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT tenancy_agreement.id_tenancy_agreement, tenant.firstname, tenant.lastname, tenancy_agreement.start_of_tenancy, tenancy_agreement.end_of_tenancy, tenancy_agreement.netrent, tenancy_agreement.cancellationterms, tenancy_agreement.id_apartment, apartment.squaremeter, tenancy_agreement.id_tenant, adress.street, adress.streetnumber, city.postcode, city.city
                FROM tenancy_agreement
                JOIN apartment
                    ON tenancy_agreement.id_apartment=apartment.id_apartment
                JOIN property
                    ON apartment.id_property=property.id_property
                JOIN adress
                    ON property.id_adress=adress.id_adress
                JOIN city
                    ON adress.postcode=city.postcode
                JOIN tenant 
                    ON tenancy_agreement.id_tenant=tenant.id_tenant
            WHERE property.id_property=:id_property;
            AND CAST(tenancy_agreement.end_of_tenancy AS DATE)>=CURDATE();
        ');
        $stmt->bindValue(':id_property', $id_property);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Tenancy_agreement');
    }

}