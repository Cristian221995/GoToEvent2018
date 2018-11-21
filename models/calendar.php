<?php 

namespace models;

class Calendar{

    private $eventDate;
    private $event;
    private $artistList;
    private $eventPlace;

    function __construct($eventDate, $event, $artistList, $eventPlace){

        $this->eventDate = $eventDate;
        $this->event = $event;
        $this->artistList = $artistList;
        $this->eventPlace = $eventPlace;
    }

    public function setArtistList($artistList){

        foreach ($artistList as $key => $value) {
            array_push($this->artistList, $value);
        }
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