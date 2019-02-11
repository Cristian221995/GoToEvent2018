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
<<<<<<< HEAD
        $placedb = new PlaceDB();
        $place = $placedb->retrideByIdEvent($id);
        $_SESSION['idEvent'] = $id;
        include(ROOT."views/buyTickets.php");
       
=======

        $placedb = new PlaceDB();
        $placeAux = $placedb->retrideByIdEvent($id);
        if(!is_array($placeAux)){
            $place[] = $placeAux;
        }
        else{
            $place = $placeAux;
        }
        include(ROOT."views/buyTickets.php");
>>>>>>> f3ffacc1341a9fa0dbbb414624eb0b1df7ad4ebd
    }
}

?>