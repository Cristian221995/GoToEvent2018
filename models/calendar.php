<?php 

namespace models;

class Calendar{

    private $id;
    private $eventDate;
    private $event;
    private $artistList;
    private $eventPlace;

    function __construct($id, $eventDate, $event, $artistList, $eventPlace){

        $this->id = $id;
        $this->eventDate = $eventDate;
        $this->event = $event;
        $this->artistList = $artistList;
        $this->eventPlace = $eventPlace;
    }

    public function getId(){
        return $this->id;
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

    public function setId($id){
        $this->id = $id;
    }

    public function setArtistList($artistList){

        foreach ($artistList as $key => $value) {
            array_push($this->artistList, $value);
        }
    }

}

?>