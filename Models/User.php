<?php

require_once 'Address.php';

class User{
    private $name;
    private $surname;
    public $address;
    private $email;
    private $password;

    public function __construct($name, $surname, /*Address $address,*/ $email, $password){
        $this->name = $name;
        $this->surname = $surname;
        // $this->address = $address;
        $this->email = $email;
        $this->password = $password;
    }

    public function getName() : string{
        return $this->name;
    }

    public function getSurname() : string{
        return $this->surname;
    }

    public function getAccount() : string{
        return $this->account;
    }

    public function getEmail() : string{
        return $this->email;
    }

    public function getPassword() : string{
        return $this->password;
    }
}