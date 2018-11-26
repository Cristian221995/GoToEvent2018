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

    public function index()
    {
        
    }

    public function store($calendar, $placeType, $price, $quantity, $remainder){
        
        $place = new Place($calendar, $placeType, $price, $quantity, $remainder);
        $this->dao->insert($place);
        header("Location:".HOME);
    }

    public function retrideAll(){

        $list = $this->dao->retride();
        return $list;
    }

    public function retrideById($id){

        $list = $this->dao->retrideById($id);
        return $list;
    }
}

?>