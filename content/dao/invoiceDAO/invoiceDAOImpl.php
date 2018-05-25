<?php

include_once "../dao/AbstractDAO.php";
include "../dao/invoiceDAO/invoiceDAOInterface.php";
include_once '../model/TotalSquaremeter.php';

class InvoiceDAOImpl extends AbstractDAO implements InvoiceDAOInterface
{
    /**
     * @param invoice $invoice
     * @return Customer
     */
    public function createInvoice(Invoice $invoice)
    {
        if (!is_null($invoice->getId_invoice())) {
            return $this->updateInvoice($invoice);
        }
        
        $stmt = $this->pdoInstance->prepare('

            INSERT INTO invoice (amount, invoice_date, id_tenancy_agreement, invoice_type, invoicenr, comment, payed)
            VALUES (:amount, :invoice_date, 
            (SELECT id_tenancy_agreement FROM tenancy_agreement WHERE id_tenancy_agreement = :id_tenancy_agreement),
            :invoice_type, :invoicenr, :comment, :payed);');
        
        $stmt->bindValue(':amount', $invoice->getAmount());
        $stmt->bindValue(':invoice_date', $invoice->getInvoice_date());
        $stmt->bindValue(':id_tenancy_agreement', $invoice->getId_tenancy_agreement());
        $stmt->bindValue(':invoice_type', $invoice->getInvoice_type());
        $stmt->bindValue(':invoicenr', $invoice->getInvoicenr());
        $stmt->bindValue(':comment', $invoice->getComment());
        $stmt->bindValue(':payed', $invoice->getPayed());
        $stmt->execute();
        unset($stmt);
        $invoice = $this->readInvoice($this->pdoInstance->lastInsertId());
        return $invoice;
    }

    /**
     * @param Customer $customer
     * @return Customer
     */
    public function updateInvoice(Invoice $invoice)
    {
        if (is_null($invoice->getId_invoice())) {
            throw new LogicException(
                'Cannot update invoice that does not yet exist in the database.'
            );
        }
        $stmt = $this->pdoInstance->prepare('
            UPDATE tenancymanager_t.invoice
            SET
            amount = :amount, 
            invoice_date = :invoice_date, 
            id_tenancy_agreement = (SELECT id_tenancy_agreement FROM tenancy_agreement WHERE id_tenancy_agreement =:id_tenancy_agreement), 
            invoice_type = :invoice_type, 
            invoicenr = :invoicenr, 
            comment = :comment,
            payed = :payed
            WHERE id_invoice = :id_invoice;
        ');
        $stmt->bindValue(':amount', $invoice->getAmount());
        $stmt->bindValue(':invoice_date', $invoice->getInvoice_date());
        $stmt->bindValue(':id_tenancy_agreement', $invoice->getId_tenancy_agreement());
        $stmt->bindValue(':invoice_type', $invoice->getInvoice_type());
        $stmt->bindValue(':invoicenr', $invoice->getInvoicenr());
        $stmt->bindValue(':comment', $invoice->getComment());
        $stmt->bindValue(':payed', $invoice->getPayed());
        $stmt->bindValue(':id_invoice', $invoice->getId_invoice());
        $stmt->execute();
        unset($stmt);
        return $invoice;
    }


    /**
     * @param $id
     * @return Customer
     */
    public function readInvoice($id_invoice)
    {
        $stmt = $this->pdoInstance->prepare('
        SELECT invoice.id_invoice, invoice.amount, invoice.invoice_date, invoice.id_tenancy_agreement, invoice.invoice_type, invoice.invoicenr, invoice.comment, invoice.payed,
            apartment.id_apartment, 
            property.id_property, 
            adress.street, adress.streetnumber, adress.postcode, 
            city.city, 
            tenant.firstname, tenant.lastname 
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
        JOIN tenant 
            ON tenancy_agreement.id_tenant=tenant.id_tenant
                WHERE id_invoice = :id_invoice;
        ');
        $stmt->bindValue(':id_invoice', $id_invoice);
        $stmt->execute();
        return $stmt->fetchObject("Invoice");
    }

    /**
     * @param Customer $customer
     */
    public function deleteInvoice(Invoice $invoice)
    {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM invoice
            WHERE id_invoice = :id
        ');
        $stmt->bindValue(':id', $invoice->getId_invoice());
        $stmt->execute();
        $invoice = null;
    }


    /**
     * @return Invoice[]
     */
    public function findAll()
    {
        $stmt = $this->pdoInstance->prepare('
        SELECT invoice.id_invoice, invoice.amount, invoice.invoice_date, invoice.id_tenancy_agreement, invoice.invoice_type, invoice.invoicenr, invoice.comment, invoice.payed,
            apartment.id_apartment, 
            property.id_property, 
            adress.street, adress.streetnumber, adress.postcode, 
            city.city, 
            tenant.firstname, tenant.lastname 
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
        JOIN tenant 
            ON tenancy_agreement.id_tenant=tenant.id_tenant
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Invoice');
    }
    
    public function findAllOpenOld($days)
    {
        $stmt = $this->pdoInstance->prepare('
        SELECT invoice.id_invoice, invoice.amount, invoice.invoice_date, invoice.id_tenancy_agreement, invoice.invoice_type, invoice.invoicenr, invoice.comment, invoice.payed,
            apartment.id_apartment, 
            property.id_property, 
            adress.street, adress.streetnumber, adress.postcode, 
            city.city, 
            tenant.firstname, tenant.lastname 
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
        JOIN tenant 
            ON tenancy_agreement.id_tenant=tenant.id_tenant
        WHERE DATEDIFF(NOW(),invoice.invoice_date)>=:days AND invoice.payed="0"
        ');
        $stmt->bindValue(':days', $days);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Invoice');
    }

        public function readTotalSquaremeter($id_property)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT SUM(apartment.squaremeter) AS totalSquaremeter 
            FROM property 
            JOIN apartment 
                ON property.id_property=apartment.id_property 
            WHERE property.id_property=:id_property
        ');
        $stmt->bindValue(':id_property', $id_property);
        $stmt->execute();
        return $stmt->fetchObject("TotalSquaremeter");
    }
}