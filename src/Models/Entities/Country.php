<?php

class Country{

    private $Country_Id = 0;
    private $Code;
    private $Name;
    private $Continent;
    private $Region;
    private $SurfaceArea;
    private $IndepYear;
    private $Population;
    private $LifeExpectancy;
    private $GNP;
    private $GNPOld;
    private $LocalName;
    private $GovernmentForm;
    private $HeadOfState;
    private $Capital;
    private $Code2;
    private $Image1;
    private $Image2;

    public function getCountry_Id(){
        return $this->Country_Id;
    }

    public function getCode(){
        return strtoupper($this->Code);
    }

    public function getName(){
        return strtoupper($this->Name);
    }

    public function getContinent(){
        return strtoupper($this->Continent);
    }

    public function getRegion(){
        return strtoupper($this->Region);
    }

    public function getSurfaceArea(){
        return $this->SurfaceArea;
    }

    public function getInDepYear(){
        return $this->IndepYear;
    }

    public function getPopulation(){
        return $this->Population;
    }
    
    public function getLifeExpectancy(){
        return $this->LifeExpectancy;
    }

    public function getGNP(){
        return $this->GNP;
    }

    public function getGNPOld(){
        return $this->GNPOld;
    }

    public function getLocalName(){
        return strtoupper($this->LocalName);
    }

    public function getGovernmentForm(){
        return strtoupper($this->GovernmentForm);
    }

    public function getHeadOfState(){
        return strtoupper($this->HeadOfState);
    }

    public function getCapital(){
        return $this->Capital;
    }

    public function getCode2(){
        return strtoupper($this->Code2);
    }

    public function getImage1(){
        return $this->Image1;
    }

    public function getImage2(){
        return $this->Image2;
    }

    
    
    public function setCode($Code){
        $this->Code = $Code;
    }

    public function setName($Name){
        $this->Name = $Name;
    }

    public function setContinent($Continent){
        $this->Continent = $Continent;
    }

    public function setRegion($Region){
        $this->Region = $Region;
    }

    public function setSurfaceArea($SurfaceArea){
        $this->SurfaceArea = $SurfaceArea;
    }

    public function setInDepYear($IndepYear){
        $this->IndepYear = $IndepYear;
    }

    public function setPopulation($Population){
        $this->Population = $Population;
    }
    
    public function setLifeExpectancy($LifeExpectancy){
        $this->LifeExpectancy = $LifeExpectancy;
    }

    public function setGNP($GNP){
        $this->GNP = $GNP;
    }

    public function setGNPOld($GNPOld){
        $this->GNPOld = $GNPOld;
    }

    public function setLocalName($LocalName){
        $this->LocalName = $LocalName;
    }

    public function setGovernmentForm($GovernmentForm){
        $this->GovernmentForm = $GovernmentForm;
    }

    public function setHeadOfState($HeadOfState){
        $this->HeadOfState = $HeadOfState;
    }

    public function setCapital($Capital){
        $this->Capital = $Capital;
    }

    public function setCode2($Code2){
        $this->Code2 = $Code2;
    }

    public function setImage1($Image1){
        $this->Image1 = $Image1;
    }

    public function setImage2($Image2){
        $this->Image2 = $Image2;
    }

}
