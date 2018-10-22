<?php

namespace models;
use models\Category as Category;
use models\EventPlace as EventPlace;
use models\Calendar as Calendar;

class Event{

    private $name;
    private $category;
    private $eventPlace;
    private $calendar;

    public function __construct($name, $categoryName, $eventPlace){

        $this->name = $name;
        $this->category = new Category($categoryName);
        $this->eventPlace = new EventPlace($eventPlace, $this->eventPlace->getCapacity());
        $this->calendar = array();
    }

    public function setName($name){

        $this->name = $name;
    }

    public function setCategory($categoryName){

        $this->category = new Category($categoryName);
    }

    public function setEventPlace($eventPlace, $capacity){

        $this->eventPlace = new EventPlace($eventPlace, $capacity);
    }

    public function setCalendar($eventDate, $artistName){

        $calendario = new Calendar($eventDate, $artistName);
        array_push($this->calendar, $calendario);
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

    public function getCalendar(){
        
        return $this->calendar;
    }

}

?>