<?php
include_once '../dao/Database.php';
include_once '../dao/invoiceDAO/invoiceDAOImpl.php';
include_once '../validator/InvoiceValidator.php';

class HomepageController
{
    
    public function show()
    {
        $days = "30";
        $invoices = (new InvoiceDAOImpl(Database::connect()))->findAllOpenOld($days);
        require_once('../view/viewHomepage/showHomepage.php');
    }
    
}

