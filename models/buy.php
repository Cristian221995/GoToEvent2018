<?php

namespace models;

class Buy
{
    private $date;
    private $user;

    public function __construct($date, $user)
    {
        $this->date=$date;
        $this->user=$user;
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date=$date;
    }

    public function getUser(){
        return $this->user;
    }

    public function setUser($user){
        $this->user=$user;
    }
}
?>