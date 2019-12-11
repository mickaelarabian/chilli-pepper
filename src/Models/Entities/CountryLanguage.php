<?php

class CountryLanguage{

    private $CountryLanguage_Id = 0;
    private $CountryCode;
    private $Language;
    private $IsOfficial;
    private $Percentage;

    public function getCountryLanguage_Id(){
        return $this->CountryLanguage_Id;
    }
    
    public function getCountryCode(){
        return $this->CountryCode;
    }

    public function getLanguage(){
        return strtoupper($this->Language);
    }

    public function getIsOfficial(){
        return $this->IsOfficial;
    }

    public function getPercentage(){
        return $this->Percentage;
    }

   
    public function setCountryCode(string $CountryCode){
        $this->CountryCode = $CountryCode;
    }

    public function setLanguage(string $Language){
        $this->$Language = $Language;
    }

    public function setIsOfficial($IsOfficial){
        $this->IsOfficial = $IsOfficial;
    }

    public function setPercentage($Percentage){
        $this->Percentage = $Percentage;
    }
    
}
