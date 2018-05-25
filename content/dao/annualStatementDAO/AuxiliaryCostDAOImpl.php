<?php

include_once "../dao/AbstractDAO.php";
include("../model/Auxiliary_Cost/AuxInvoiceType.php");
include("../model/Auxiliary_Cost/AuxTenant.php");

class AuxiliaryCostDAOImpl extends AbstractDAO
{
    /**
     * @param invoice $invoice
     * @return Customer
     */
    
    public function findAll($date_begin, $date_end)
    {
        $stmt = $this->pdoInstance->prepare('
        SELECT tenant.id_tenant, tenant.firstname, tenant.lastname, SUM(invoice.amount) AS totalAmount 
            FROM invoice
            JOIN tenancy_agreement
                ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement
            JOIN tenant
                ON tenancy_agreement.id_tenant=tenant.id_tenant
            WHERE invoice.invoice_date BETWEEN CAST(:date_begin AS DATE) AND CAST(:date_end AS DATE)
            GROUP BY tenant.lastname
        ');
        $stmt->bindValue(':date_begin', $date_begin);
        $stmt->bindValue(':date_end', $date_end);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'AuxTenant');
    }
    
    public function findAuxInvoiceType($id_tenant, $invoiceType, $date_begin, $date_end)
    {
        $stmt = $this->pdoInstance->prepare('
        SELECT invoice.invoice_type AS invoice_type, 
            (SELECT SUM(invoice.amount) FROM invoice
		JOIN tenancy_agreement
                    ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement
                JOIN tenant
                    ON tenancy_agreement.id_tenant=tenant.id_tenant
            WHERE tenant.id_tenant=:id_tenant AND invoice.payed="1" AND invoice.invoice_type=:invoice_type AND invoice.invoice_date BETWEEN CAST(:date_begin AS DATE) AND CAST(:date_end AS DATE)) AS amount_payed,
            (SELECT SUM(invoice.amount) FROM invoice
		JOIN tenancy_agreement
                    ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement
                JOIN tenant
                    ON tenancy_agreement.id_tenant=tenant.id_tenant
            WHERE tenant.id_tenant=:id_tenant AND invoice.payed="0" AND invoice.invoice_type=:invoice_type AND invoice.invoice_date BETWEEN CAST(:date_begin AS DATE) AND CAST(:date_end AS DATE)) AS amount_open
        FROM invoice
        JOIN tenancy_agreement
        	ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement
        JOIN tenant
        	ON tenancy_agreement.id_tenant=tenant.id_tenant
        WHERE tenant.id_tenant=:id_tenant AND invoice.invoice_type=:invoice_type AND invoice.invoice_date BETWEEN CAST(:date_begin AS DATE) AND CAST(:date_end AS DATE)
        GROUP BY invoice.invoice_type
        ');
        $stmt->bindValue(':date_begin', $date_begin);
        $stmt->bindValue(':date_end', $date_end);
        $stmt->bindValue(':id_tenant', $id_tenant);
        $stmt->bindValue(':invoice_type', $invoiceType);
        $stmt->execute();
        return $stmt->fetchObject("AuxInvoiceType");
    }
}