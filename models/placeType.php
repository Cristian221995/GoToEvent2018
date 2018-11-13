<?php

namespace models;

class PlaceType{

    private $description;

    function __construct($description){

        $this->description = $description;
    }

    public function setDescription($description){

        $this->description = $description;
    }

    public function getDescription(){

        return $this->description;
    }
}

?>