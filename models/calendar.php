<?php 

namespace models;

class Calendar{

    private $eventDate;
    private $event;
    private $artistList;
    private $eventPlace;

    function __construct($eventDate, $event, $eventPlace){

        $this->eventDate = $eventDate;
        $this->event = $event;
        $this->artistList = array();
        $this->eventPlace = $eventPlace;
    }

    public function setArtistList($artist){

        array_push($this->artistList, $artist);
    }

    public function getEventDate(){
        return $this->eventDate;
    }

    public function getEvent(){
        return $this->event;
    }

    public function getArtistList(){
        return $this->artistList;
    }

    public function getEventPlace(){
        return $this->eventPlace;
    }

}

?>