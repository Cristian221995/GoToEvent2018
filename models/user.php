<?php 

namespace models;

class User{

    private $email;
    private $userName;
    private $pass;
    private $role;      //user or admin

    function __construct($email, $userName, $pass, $role){
        
        $this->email = $email;
        $this->userName = $userName;
        $this->pass = $pass;
        $this->role = $role;
    }

    public function setEmail($email){

        $this->email = $email;
    }

    public function setUserName($userName){

        $this->userName = $userName;
    }

    public function setPass($pass){

        $this->pass = $pass;
    }

    public function setRole($role){

        $this->role = $role;
    }

    public function getEmail(){

        return $this->email;
    }

    public function getUserName(){

        return $this->userName;
    }

    public function getPass(){

        return $this->pass;
    }

    public function getRole(){

        return $this->role;
    }

}