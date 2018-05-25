<?php


/** CREATION 05.12.16 14:30 Alex Noever**/



include_once "../model/Apartment.php";

class ApartmentValidator
{


    /**
     * @var Apartment
     */
    private $apartment;

    /**
     * @var bool
     */
    private $valid = true;
    private $apartment_typeError = null;
    private $roomsError = null;
    private $squaremeterError = null;
    private $id_propertyError = null;

    /**
     * ApartmentValidator constructor.
     * @param Apartment $apartment
     */
    public function __construct(Apartment $apartment = null)
    {
        $this->apartment = $apartment;
        $this->validate();
    }

    public function validate(){

        if(!is_null($this->apartment)) {
            if (empty($this->apartment->getApartment_type())) {
                $this->apartment_typeError = 'Bitte einen Typ eingeben.';
                $this->valid = false;
            }
            
            
            
            if(!(is_numeric($this->apartment->getRooms())) || empty($this->apartment->getRooms())){
                $this->roomsError = 'Bitte keine Buchstaben.';
                $this->valid = false;
            }
            
            if(!(is_numeric($this->apartment->getSquaremeter())) || empty($this->apartment->getSquaremeter())){
                $this->squaremeterError = 'Bitte keine Buchstaben.';
                $this->valid = false;
            }
            
        }
        else {
            $this->valid = false;
        }
        return $this->valid;

    }

    /**
     * @return Apartment
     */
    public function getApartment()
    {
        return $this->apartment;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->valid;
    }
    function getValid() {
        return $this->valid;
    }

    function getId_PropertyError() {
        return $this->id_propertyError;
    }

    function getApartment_typeError() {
        return $this->apartment_typeError;
    }
    
    function getRoomsError(){
        return $this->roomsError;
    }
    
    function getSquaremeterError(){
        return $this->squaremeterError;
    }
    
    

    function setValid($valid) {
        $this->valid = $valid;
    }

    function setId_PropertyError($id_propertyError) {
        $this->id_propertyError = $id_propertyError;
    }

    function setApartment_typeError($apartment_typeError) {
        $this->apartment_typeError = $apartment_typeError;
    }
    
    function setRoomsError(){
        $this->roomsError = $roomsError;
    }
    
    function setSquaremeterError(){
        $this->squaremeterError = $squaremeterError;
    }
    
}