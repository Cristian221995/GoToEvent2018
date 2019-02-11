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
        $placeAux = $placedb->retrideByIdEvent($id);
        $_SESSION['idEvent'] = $id;
        if(!is_array($placeAux)){
            $place[] = $placeAux;
        }
        else{
            $place = $placeAux;
        }
        include(ROOT."views/buyTickets.php");
    }
}

?>