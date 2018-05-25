<?php


/** CREATION 06.12.16 14:30 Alex Noever**/



include_once "../model/Invoice.php";

class InvoiceValidator
{


    /**
     * @var Invoice
     */
    private $invoice;

    /**
     * @var bool
     */
    private $valid = true;
    private $amountError = null;
    private $invoice_dateError = null;
    private $id_tenancy_agreementError = null;
    private $invoice_typeError = null;
    private $invoicenrError = null;

    /**
     * InvoiceValidator constructor.
     * @param Invoice $invoice
     */
    public function __construct(Invoice $invoice = null)
    {
        $this->invoice = $invoice;
        $this->validate();
    }

    public function validate(){

        if(!is_null($this->invoice)) {
            
           
                
            if(!is_numeric($this->invoice->getAmount()) || empty($this->invoice->getAmount())){
                $this->amountError = 'Bitte keine Buchstaben';
                $this->valid = false;
            }
            
            
            
            if((!$this->validateDate($this->invoice->getInvoice_date())) || empty($this->invoice->getInvoice_date())){
                $this->invoice_dateError = 'Falsches Datumsformat (yyyy-mm-dd)';
                $this->valid = false;
            }
            
            if (!is_numeric($this->invoice->getInvoicenr())|| empty($this->invoice->getInvoicenr())){
                    $this->invoicenrError = 'Bitte keine Buchstaben';
                    $this->valid = false;
            }
                
        }else {
                    $this->valid = false;
            }
            
        return $this->valid;
        
    }
             
    function getInvoice() {
        return $this->invoice;
    }

    function isValid() {
        return $this->valid;
    }

    function getAmountError() {
        return $this->amountError;
    }

    function getInvoice_dateError() {
        return $this->invoice_dateError;
    }

    function getId_tenancy_agreementError() {
        return $this->id_tenancy_agreementError;
    }

    function getInvoice_typeError() {
        return $this->invoice_typeError;
    }

    function getInvoicenrError() {
        return $this->invoicenrError;
    }

    function validateDate($date)
    {
    $format = 'Y-m-d';
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
     }

}
