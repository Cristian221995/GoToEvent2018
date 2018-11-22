<?php

namespace models;

class EventPlace{

    private $id;
    private $name;
    private $capacity;

    public function __construct($id, $name, $capacity){

        $this->id = $id;
        $this->name = $name;
        $this->capacity = $capacity;
    }

    public function setId($id){

        $this->id = $id;
    }

    public function setName($name){

        $this->name = $name;
    }

    public function setCapacity($capacity){

        $this->capacity = $capacity;
    }

    public function getId(){

        return $this->id;
    }

    public function getName(){

        return $this->name;
    }

    public function getCapacity(){

        return $this->capacity;
    }
}

?>