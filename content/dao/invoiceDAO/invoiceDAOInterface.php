<?php


include("../model/Invoice.php");

interface InvoiceDAOInterface
{

    public function createInvoice(Invoice $invoice);

    public function readInvoice($id_invoice);

    public function updateInvoice(Invoice $invoice);

    public function deleteInvoice(Invoice $invoice);

    public function findAll();
}