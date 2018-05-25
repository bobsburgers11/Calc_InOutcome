<?php


/** CREATION 06.12.16 14:30 Alex Noever**/



include_once "../model/Tenancy_agreement.php";

class Tenancy_agreementValidator
{


    /**
     * @var Tenancy_agreement
     */
    private $tenancy_agreement;

    /**
     * @var bool
     */
    private $valid = true;
    private $start_of_tenancyError = null;
    private $end_of_tenancyError = null;
    private $netrentError = null;
    private $id_apartmentError = null;
    private $id_tenantError = null;

    /**
     * Tenancy_agreementValidator constructor.
     * @param Tenancy_agreement $tenancy_agreement
     */
    public function __construct(Tenancy_agreement $tenancy_agreement = null)
    {
        $this->tenancy_agreement = $tenancy_agreement;
        $this->validate();
    }

    public function validate(){

         if(!is_null($this->tenancy_agreement)) {
            
            if((!$this->validateDate($this->tenancy_agreement->getStart_of_tenancy())) || empty($this->tenancy_agreement->getStart_of_tenancy())){
                $this->start_of_tenancyError = 'Falsches Datumsformat (yyyy-mm-dd)';
                $this->valid = false;
            }
            
            if((!$this->validateDate($this->tenancy_agreement->getEnd_of_tenancy())) || empty($this->tenancy_agreement->getEnd_of_tenancy())){
                $this->end_of_tenancyError = 'Falsches Datumsformat (yyyy-mm-dd)';
                $this->valid = false;
            }
              
            if($this->tenancy_agreement->getStart_of_tenancy()>$this->tenancy_agreement->getEnd_of_tenancy()){
                $this->end_of_tenancyError = 'Das Enddatum darf nicht vor dem Startdatum liegen.';
                $this->valid = false;
            }
                
                if(empty($this->tenancy_agreement->getNetrent()) || is_nan($this->tenancy_agreement->getNetrent())){
                $this->netrentError = 'Bitte keine Buchstaben eingeben.';
                $this->valid = false;
                }           
            
         }
        
        else {
            $this->valid = false;
        }
        return $this->valid;

    }

    /**
     * @return Tenancy_agreement
     */
    public function getTenancy_agreement()
    {
        return $this->tenancy_agreement;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->valid;
    }

    function getStart_of_tenancyError(){
    return $this->start_of_tenancyError;
    }
    
    function getEnd_of_tenancyError(){
    return $this->end_of_tenancyError;
    }
    
    function getNetrentError(){
    return $this->netrentError;
    }
    
    function getId_ApartmentError(){
    return $this->id_apartmentError;
    }
    
    function getId_TenantError(){
    return $this->id_tenantError;
    }
    
    function validateDate($date)
    {
    $format = 'Y-m-d';
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
     }
}

