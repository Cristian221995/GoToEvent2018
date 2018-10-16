<?php

namespace models;

class Event{

    private $name;
    private $category;
    private $eventPlace;

    public function __construct($name){

        $this->name = $name;
    }

    public function setName($name){

        $this->name = $name;
    }

    public function setCategory($category){

        $this->category = $category;
    }

    public function setEventPlace($eventPlace){

        $this->eventPlace = $eventPlace;
    }

    public function getName(){

        return $this->name;
    }

    public function getCategory(){

        return $this->category;
    }

    public function getEventPlace(){

        return $this->eventPlace;
    }

}

?>