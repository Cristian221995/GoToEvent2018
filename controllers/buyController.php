<?php

namespace controllers;
use daos\databases\BuyDB as BuyDB;
use daos\databases\PlaceDB as PlaceDB;
use models\Buy as Buy;

class BuyController{

    protected $dao;
    public function __construct()
    {
        $this->dao=BuyDB::getInstance();
    }

    public function index($id){

        $placedb = new PlaceDB();
        $place = $placedb->retrideByIdEvent($id);
        include(ROOT."views/buyTickets.php");
    }
}

?>