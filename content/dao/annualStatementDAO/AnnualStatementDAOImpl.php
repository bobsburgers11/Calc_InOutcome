<?php

/** CREATION 05.12.16 14:30 Alex Noever**/


include_once "../dao/AbstractDAO.php";
include("../model/AnnualReport/ReportType.php");
include("../model/AnnualReport/ReportProperty.php");
include("../model/AnnualReport/ReportTenant.php");
include("../model/AnnualReport/ReportTotal.php");

class AnnualStatementDAOImpl extends AbstractDAO
{
    /**
     * @param $id
     * @return Customer
     */
    
    public function findAllreportPropertys($payed, $invoiceType, $date_begin, $date_end)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT property.id_property, adress.street, adress.streetnumber, city.postcode, city.city, SUM(invoice.amount) AS total
            FROM invoice 
                JOIN tenancy_agreement 
                    ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement 
                JOIN apartment
                    ON tenancy_agreement.id_apartment=apartment.id_apartment
                JOIN property
                    ON apartment.id_property=property.id_property
                JOIN adress
                    ON property.id_adress=adress.id_adress
                JOIN city
                    ON adress.postcode=city.postcode
                WHERE invoice.payed=:payed AND invoice.invoice_type=:invoice_type AND invoice.invoice_date BETWEEN CAST(:date_begin AS DATE) AND CAST(:date_end AS DATE)
                GROUP BY property.id_property
        ');
        $stmt->bindValue(':date_begin', $date_begin);
        $stmt->bindValue(':date_end', $date_end);
        $stmt->bindValue(':payed', $payed);
        $stmt->bindValue(':invoice_type', $invoiceType);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'ReportProperty');
    }
    

    /**
     * @return AnnualStatement[]
     */
    
    
    public function findAll($payed, $date_begin, $date_end)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT invoice.invoice_type, SUM(invoice.amount) AS total
                FROM invoice 
                JOIN tenancy_agreement 
                    ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement 
                JOIN tenant 
                    ON tenancy_agreement.id_tenant=tenant.id_tenant 
                WHERE invoice.payed=:payed AND invoice.invoice_date BETWEEN CAST(:date_begin AS DATE) AND CAST(:date_end AS DATE)
                GROUP BY invoice.invoice_type
        ');
        $stmt->bindValue(':date_begin', $date_begin);
        $stmt->bindValue(':date_end', $date_end);
        $stmt->bindValue(':payed', $payed);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'ReportType');
    }
    
    public function findTotal($payed, $date_begin, $date_end) 
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT SUM(invoice.amount) AS totalAmount 
                FROM invoice
                WHERE invoice.payed=:payed AND invoice.invoice_date BETWEEN CAST(:date_begin AS DATE) AND CAST(:date_end AS DATE)
        ');
        $stmt->bindValue(':date_begin', $date_begin);
        $stmt->bindValue(':date_end', $date_end);
        $stmt->bindValue(':payed', $payed);
        $stmt->execute();
        return $stmt->fetchObject("ReportTotal");
    }
}

