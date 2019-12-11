<?php

class User{

    private $User_Id;
    private $Name;
    private $Login;
    private $Password;

    public function getUser_Id(){
        return $this->User_Id;
    }

    public function getName(){
        return ucfirst($this->Name);
    }

    public function getLogin(){
        return $this->Login;
    }

    public function getPassword(){
        return $this->Password;
    }

    
    public function setUser_Id($User_Id){
        $this->User_Id = $User_Id;
    }

    public function setName($Name){
        $this->Name = $Name;
    }

    public function setLogin($Login){
        $this->Login = $Login;
    }

    public function setPassword($Password){
        $this->Password = hash('sha512', $Password);
    }
    
}
