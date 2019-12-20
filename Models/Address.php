<?php

class Address{
    private $country;
    private $locality;
    private $street;
    private $street_num;
    private $flat_num;
    private $post_num;
    private $post_locality;

    public function __construct($country, $locality, $street, $street_num, $flat_num, $post_num, $post_locality){
        $this->country = $country;
        $this->locality = $locality;
        $this->street = $street;
        $this->street_num = $street_num;
        $this->flat_num = $flat_num;
        $this->post_num = $post_num;
        $this->post_locality = $post_locality;
    }

    public function getCountry() : string{
        return $this->country;
    }

    public function getLocality() : string{
        return $this->locality;
    }

    public function getStreet() : string{
        return $this->street;
    }

    public function getStreetNum() : string{
        return $this->street_num;
    }

    public function getFlatNum() : int{
        return $this->flat_num;
    }

    public function getPostNum() : string{
        return $this->post_num;
    }

    public function getPostLocality() : string{
        return $this->post_locality;
    }
}