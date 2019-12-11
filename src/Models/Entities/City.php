<?php

class City{

    private $City_Id = 0;
    private $Name;
    private $CountryCode;
    private $District;
    private $Population;

    public function getCity_Id(){
        return $this->City_Id;
    }

    public function getName(){
        return strtoupper($this->Name);
    }

    public function getCountryCode(){
        return strtoupper($this->CountryCode);
    }

    public function getDistrict(){
        return strtoupper($this->District);
    }

    public function getPopulation(){
        return $this->Population;
    }


    public function setName($Name){
        $this->Name = $Name;
    }

    public function setCountryCode($CountryCode){
        $this->CountryCode = $CountryCode;
    }

    public function setDistrict($District){
        $this->District = $District;
    }

    public function setPopulation($Population){
        $this->Population = $Population;
    }
    
}

?>