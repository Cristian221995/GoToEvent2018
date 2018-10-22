<?php 

namespace models;
use models\Event as Event;

class Calendar{

    private $eventDate;
    //private $event;
    private $artist;

    function __construct($eventDate, $artistName){

        $this->eventDate = $eventDate;
        //$this->event = new Event($eventName, $categoryName, $eventPlace, $capacity);
        $this->artist = new Artist($artistName);
    }

    public function getEventDate(){
        return $this->eventDate;
    }

    /*public function getEvent(){
        return $this->event;
    }*/

    public function getArtist(){
        return $this->getArtist;
    }

}

?>