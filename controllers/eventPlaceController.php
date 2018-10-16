<?php

namespace controllers;
use daos\databases\EventPlaceDB as EventPlaceDB;
use models\EventPlace as EventPlace;


class EventPlaceController{

    protected $dao;

    public function __construct(){

        $this->dao = EventPlaceDB::getInstance();
   }

   public function index(){

    include(ROOT. "views/artistView.php");
    //include ROOT. views/noseque.php
   }

   public function store($nombre, $capacidad)
    {
        $eventPlace = new EventPlace($nombre, $capacidad);
        $this->dao->insert($eventPlace);
    }

    public function delete($nombre)
    {
        $eventPlace = new EventPlace($nombre);
        $this->dao->delete($eventPlace);
    }

    public function update($nombre, $nuevoDato)
    {
        $category = new EventPlace($nombre);
        $this->dao->update($eventPlace, $nuevoDato);
    }

    public function retride(){
        $list=$this->dao->retride();
        //var_dump($list);
    }

}

?>