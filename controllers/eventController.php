<?php

namespace controllers;
use daos\databases\eventDB as eventDB;
//use daos\lists\eventDao as eventDB;
use models\Event as Event;


class EventController{

    protected $dao;

    public function __construct(){

        $this->dao = eventDB::getInstance();
   }

   public function index(){

    include(ROOT. "views/artistView.php");
    //include ROOT. views/noseque.php
   }

   public function store($nombre, $category, $eventPlace, $capacity)
    {
        $event = new Event($nombre, $category);
        $this->dao->insert($event);
    }

    public function delete($nombre)
    {
        $event = new Event($nombre);
        $this->dao->delete($event);
    }

    public function update($nombre, $nuevoDato)
    {
        $event = new Event($nombre);
        $this->dao->update($event, $nuevoDato);
    }

    public function retride(){
        $list=$this->dao->retride();
        //var_dump($list);
    }

}

?>