<?php

namespace models;
use models\Category as Category;
use models\Calendar as Calendar;

class Event{

    private $id;
    private $name;
    private $category;
    private $calendar;
    private $img;

    public function __construct($id, $name, $category, $img){

        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->calendar = array();
        $this->img = $img;
    }

    public function setId($id){

        $this->id = $id;
    }

    public function setName($name){

        $this->name = $name;
    }

    public function setCategory($categoryName){

        $this->category = new Category($categoryName);
    }

    public function setCalendar($eventDate, $eventPlace, $artistList){

        $calendario = new Calendar($eventDate, $this->name, $eventPlace);
        $calendario->setArtistList($artistList);
        array_push($this->calendar, $calendario);
    }

    public function getId(){

        return $this->id;
    }

    public function getName(){

        return $this->name;
    }

    public function getCategory(){

        return $this->category;
    }

    public function getCalendar(){
        
        return $this->calendar;
    }

    public function getImg(){

        return $this->img;
    }
}

?>