<?php

class Role{

    private $Role_Id;
    private $Role_Name;
    private $Permissions;

    public function getRole_Id(){
        return $this->Role_Id;
    }

    public function getRole_name(){
        return $this->Role_Name;
    }

    public function getPermissions(){
        return $this->Permissions;
    }

    
    public function setRole_Id($Role_Id){
        $this->Role_Id = $Role_Id;
    }

    public function setRole_Name($Role_Name){
        $this->Role_Name = $Role_Name;
    }

    public function setPermissions($Permissions){
        $this->Permissions = $Permissions;
    }
    
}
