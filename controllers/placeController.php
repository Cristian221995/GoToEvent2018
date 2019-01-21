<?php

namespace controllers;
use daos\databases\PlaceDB as PlaceDB;
use models\Place as Place;

class PlaceController{

    protected $dao;
    public function __construct()
    {
        $this->dao=PlaceDB::getInstance();
    }

    public function index($event)
    {
        /*$placeType = $this->dao->retrideByIdEvent($event->getId());
        include "views/buyTickets.php";*/
    }
}

?>