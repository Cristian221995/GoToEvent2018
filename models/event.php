<?php

namespace models;
use models\Category as Category;
use models\EventPlace as EventPlace;

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

    public function setCategory($categoryName){

        $this->category = new Category($categoryName);
    }

    public function setEventPlace($eventPlace, $capacity){

        $this->eventPlace = new EventPlace($eventPlace,$capacity);
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