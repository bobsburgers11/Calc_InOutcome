<?php


class User
{
    private $id_user;
    private $firstname;
    private $lastname;
    private $username;
    private $password;
    private $password2;
    private $hash;
    private $email;


    public function __construct($id_user=null, $firstname=null, $lastname=null, $username=null, $password=null, $password2=null,$hash=null, $email=null)
    {
        if (isset($id_user)) {
            $this->id_user = $id_user;
        }
        if (isset($firstname)) {
            $this->firstname = $firstname;
        }
        if (isset($lastname)) {
            $this->lastname = $lastname;
        }
        if (isset($username)) {
            $this->username = $username;
        }
        if (isset($password)) {
            $this->password = $password;
        }
        if (isset($password2)){
            $this->password2 =$password2;
        }
        if (isset($hash)){
            $this->hash =$hash;
        }
        if (isset($email)) {
            $this->email = $email;
        }

    }

    function getId_user() {
        return $this->id_user;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }
    
    function getPassword2(){
        return $this->password2;
    }

    function getEmail() {
        return $this->email;
    }
    
    function getHash() {
        return $this->hash;
    }
    
    function setHash($hash) {
        $this->hash = $hash;
    }
}
