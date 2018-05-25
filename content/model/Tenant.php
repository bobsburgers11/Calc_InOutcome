<?php


class Tenant
{
    private $id_tenant;
    private $title;
    private $firstname;
    private $lastname;
    private $birthday;
    private $marital_status;
    private $phone;
    private $mobile;
    private $email;
    private $postcode;
    private $city;
    private $id_adress;
    private $street;
    private $streetnumber;
    private $inactive;



    public function __construct($id_tenant=null, $title=null, $firstname=null, $lastname=null, $birthday=null, $marital_status=null,$phone=null, $mobile=null, $email=null,$postcode=null, $city=null, $id_adress=null, $street=null, $streetnumber=null, $inactive=null)
    {
        if (isset($id_tenant)){
            $this->id_tenant = $id_tenant;
        }
        if (isset($title)){
            $this->title = $title;
        }
        if (isset($firstname)){
            $this->firstname = $firstname;
        }
        if (isset($lastname)){
            $this->lastname = $lastname;
        }
        if (isset($birthday)){
            $this->birthday = $birthday;
        }
        if (isset($marital_status)){
            $this->marital_status= $marital_status;
        }
        if (isset($phone)){
            $this->phone = $phone;
        }
        if (isset($mobile)){
            $this->mobile = $mobile;
        }
        if (isset($email)){
            $this->email = $email;
        }
        if (isset($postcode)){
            $this->postcode = $postcode;
        }
        if (isset($city)){
            $this->city = $city;
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
        if (isset($inactive)){
            $this->inactive = $inactive;
        }

                
    }

    function getId_tenant() {
        return $this->id_tenant;
    }

    function getTitle() {
        return $this->title;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getBirthday() {
        return $this->birthday;
    }

    function getMarital_status() {
        return $this->marital_status;
    }

    function getPhone() {
        return $this->phone;
    }

    function getMobile() {
        return $this->mobile;
    }

    function getEmail() {
        return $this->email;
    }

    function getId_adress() {
        return $this->id_adress;
    }

    function setId_tenant($id_tenant) {
        $this->id_tenant = $id_tenant;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    function setMarital_status($marital_status) {
        $this->marital_status = $marital_status;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setMobile($mobile) {
        $this->mobile = $mobile;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setId_adress($id_adress) {
        $this->id_adress = $id_adress;
    }
    
    function getPostcode() {
        return $this->postcode;
    }

    function getCity() {
        return $this->city;
    }

    function getStreet() {
        return $this->street;
    }

    function getStreetnumber() {
        return $this->streetnumber;
    }
    
    function getInactive() {
        return $this->inactive;
    }

    function setPostcode($postcode) {
        $this->postcode = $postcode;
    }

    function setCity($city) {
        $this->city = $city;
    }

    function setStreet($street) {
        $this->street = $street;
    }

    function setStreetnumber($streetnumber) {
        $this->streetnumber = $streetnumber;
    }


}
