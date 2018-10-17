<?php

namespace models;

class EventPlace{

    private $name;
    private $capacity;

    public function __construct($name){

        $this->name = $name;
    }

    public function setName($name){

        $this->name = $name;
    }

    public function setCapacity($capacity){

        $this->capacity = $capacity;
    }

    public function getName(){

        return $this->name;
    }

    public function getCapacity(){

        return $this->capacity;
    }
}

?>