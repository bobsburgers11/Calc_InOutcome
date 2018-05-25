<?php

include_once "../dao/AbstractDAO.php";
include "../dao/propertyDAO/PropertyDAOInterface.php";

class PropertyDAOImpl extends AbstractDAO implements PropertyDAOInterface
{
    /**
     * @param Property $property
     * @return Customer
     */
    public function createProperty(Property $property)
    {
        if (!is_null($property->getId_property())) {
            return $this->updateProperty($property);
        }
        
        $stmt = $this->pdoInstance->prepare('
            
            INSERT IGNORE INTO city (postcode, city)
            VALUES (:postcode, :city);
            
            INSERT IGNORE INTO adress (street, streetnumber, postcode)
            VALUES (:street, :streetnumber, :postcode);
            
            INSERT INTO property (id_adress)
            VALUES ((SELECT id_adress FROM adress WHERE street = :street AND streetnumber = :streetnumber AND postcode = :postcode));');
        
        $stmt->bindValue(':postcode', $property->getPostcode());
        $stmt->bindValue(':city', $property->getCity());
        $stmt->bindValue(':street', $property->getStreet());
        $stmt->bindValue(':streetnumber', $property->getStreetnumber());
        $stmt->execute();
        unset($stmt);
        $property = $this->readProperty($this->pdoInstance->lastInsertId());
        return $property;
    }

    /**
     * @param Customer $customer
     * @return Customer
     */
    public function updateProperty(Property $property)
    {
        if (is_null($property->getId_property())) {
            throw new LogicException(
                'Cannot update property that does not yet exist in the database.'
            );
        }
        $stmt = $this->pdoInstance->prepare('
            INSERT IGNORE INTO city (postcode, city)
            VALUES (:postcode, :city);
            
            INSERT IGNORE INTO adress (street, streetnumber, postcode)
            VALUES (:street, :streetnumber, :postcode);

            UPDATE tenancymanager_t.property
            SET
            id_adress = (SELECT id_adress FROM adress WHERE street = :street AND streetnumber = :streetnumber AND postcode = :postcode)
            WHERE id_property = :id_property;
        ');
        $stmt->bindValue(':street', $property->getStreet());
        $stmt->bindValue(':streetnumber', $property->getStreetnumber());
        $stmt->bindValue(':postcode', $property->getPostcode());
        $stmt->bindValue(':city', $property->getCity());
        $stmt->bindValue(':id_property', $property->getId_property());
        $stmt->execute();
        unset($stmt);
        return $property;
    }


    /**
     * @param $id
     * @return Customer
     */
    public function readProperty($id_property)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT C.id_property, B.postcode, B.city, A.id_adress, A.street, A.streetnumber  
                FROM adress = A, city = B, property = C
                WHERE A.postcode = B.postcode 
                AND A.id_adress = C.id_adress
                AND C.id_property = :id_property;
        ');
        $stmt->bindValue(':id_property', $id_property);
        $stmt->execute();
        return $stmt->fetchObject("Property");
    }

    /**
     * @param Customer $customer
     */
    public function deleteProperty(Property $property)
    {
        try {
            $stmt = $this->pdoInstance->prepare('
                DELETE FROM property
                WHERE id_property = :id
            ');
            $stmt->bindValue(':id', $property->getId_property());
            $stmt->execute();
            $property = null;
        } catch (PDOException $ex){
            Route::call('Error', 'errorDelete');
        }
    }


    /**
     * @return Property[]
     */
    public function findAll()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT C.id_property, B.postcode, B.city, A.id_adress, A.street, A.streetnumber 
                FROM adress = A, city = B, property = C
                WHERE A.postcode = B.postcode 
                AND A.id_adress = C.id_adress
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Property');
    }

}