<?php


class Invoice
{
    private $id_invoice;
    private $amount;
    private $invoice_date;
    private $id_tenancy_agreement;
    private $invoice_type;
    private $invoicenr;
    private $comment;
    private $payed;
    
    /*
     * Werte aus der Apartment Tabelle
     */
    private $id_apartment;
    
    /*
     * Adress of the tenancy_agreements property (NOT tenant adress)
     */
    private $id_property;
    
    private $id_adress;
    private $street;
    private $streetnumber;
    
    private $postcode;
    private $city;
    
    /*
     * Tenant Information
     */
    private $id_tenant;
    private $firstname;
    private $lastname;
    



    public function __construct($id_invoice=null,$amount=null,$invoice_date=null,$id_tenancy_agreement=null,$invoice_type=null,$invoicenr=null,$comment=null,$payed=null,
            $id_apartment=null,$id_property=null,$id_adress=null,$street=null,$streetnumber=null,$postcode=null,$city=null,$id_tenant=null,$firstname=null,$lastname=null)
    {
        if (isset($id_invoice)) {
            $this->id_invoice = $id_invoice;
        }
        if (isset($amount)){
            $this->amount = $amount;
        }
        if (isset($invoice_date)){
            $this->invoice_date = $invoice_date;
        }
        if (isset($id_tenancy_agreement)){
            $this->id_tenancy_agreement = $id_tenancy_agreement;
        }
        if (isset($invoice_type)){
            $this->invoice_type = $invoice_type;
        }
        if (isset($invoicenr)){
            $this->invoicenr = $invoicenr;
        }
        if (isset($comment)){
            $this->comment = $comment;
        }
        if (isset($payed)){
            $this->payed = $payed;
        }
        /*
         * Only set with read() & findAll() function
         */
        if (isset($id_apartment)){
            $this->id_apartment = $id_apartment;
        }
        if (isset($id_adress)){
            $this->id_adress = $id_adress;
        }
        if (isset($street)){
            $this->street = $street;
        }
        if (isset($streetnumber)){
            $this->streetnumber = $streetnumber;
        }
        if (isset($postcode)){
            $this->postcode = $postcode;
        }
        if (isset($city)){
            $this->city = $city;
        }
        if (isset($id_tenant)){
            $this->id_tenant = $id_tenant;
        }
        if (isset($firstname)){
            $this->firstname = $firstname;
        }
        if (isset($lastname)){
            $this->lastname = $lastname;
        }
    }
    function getId_invoice() {
        return $this->id_invoice;
    }

    function getAmount() {
        return $this->amount;
    }

    function getInvoice_date() {
        return $this->invoice_date;
    }

    function getId_tenancy_agreement() {
        return $this->id_tenancy_agreement;
    }

    function getInvoice_type() {
        return $this->invoice_type;
    }

    function getInvoicenr() {
        return $this->invoicenr;
    }

    function getComment() {
        return $this->comment;
    }
    function getId_apartment() {
        return $this->id_apartment;
    }

    function getId_property() {
        return $this->id_property;
    }

    function getId_adress() {
        return $this->id_adress;
    }

    function getStreet() {
        return $this->street;
    }

    function getStreetnumber() {
        return $this->streetnumber;
    }

    function getPostcode() {
        return $this->postcode;
    }

    function getCity() {
        return $this->city;
    }

    function getId_tenant() {
        return $this->id_tenant;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getLastname() {
        return $this->lastname;
    }
    function getPayed() {
        return $this->payed;
    }
    function getPayedPic() {
        if ($this->payed=='0'){
            return '<div align="center"><span class="glyphicon glyphicon-remove" style="color:red" align="center" aria-hidden="true"></span></div>';
        }
        return '<div align="center"><span class="glyphicon glyphicon-ok" style="color:green" aria-hidden="true"></span></div>';
    }
    
}


