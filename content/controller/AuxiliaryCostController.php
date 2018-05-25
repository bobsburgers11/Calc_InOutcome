<?php

include_once '../dao/Database.php';
include_once '../dao/annualStatementDAO/AuxiliaryCostDAOImpl.php';


class AuxiliaryCostController
{
    
        public function create()
    {
        require_once('../view/viewAuxiliary_Cost/createAuxiliary_Cost.php');
    }
    
    public function show()
    {
        if (!empty($_POST)) {
            $date_begin = $_POST['date_begin'];
            $date_end = $_POST['date_end'];
            $_SESSION['date_begin'] = $date_begin;
            $_SESSION['date_end'] = $date_end;
            $date_begin_fm = (DateTime::createFromFormat('Y-m-d', $date_begin));
            $date_end_fm = (DateTime::createFromFormat('Y-m-d', $date_end));
            
            $invoiceTypes = array("Miete", "Reparatur", "Oel" , "Wasser", "Strom", "Hauswart", "Diverses");


            $auxTenants = (new AuxiliaryCostDAOImpl(Database::connect()))->findAll($date_begin, $date_end);
            foreach ($auxTenants as $auxTenant) {
                $auxInvoiceTypes = array();
                foreach ($invoiceTypes as $invoiceTypeString) {
                    $invoiceType = (new AuxiliaryCostDAOImpl(Database::connect()))->findAuxInvoiceType($auxTenant->getId_tenant(), $invoiceTypeString, $date_begin, $date_end);
                    if(!empty($invoiceType)){
                    array_push($auxInvoiceTypes, $invoiceType);
                    }
                }
                $auxTenant->setAuxInvoiceTypes($auxInvoiceTypes);
            } 
        }
        
        require_once('../view/viewAuxiliary_Cost/showAuxiliary_Cost.php');
    }
}