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

    include(ROOT. "views/createEventForm.php");
   }

   public function getEventData(){

    if($_POST){

        $arrayPost = $_POST;
        return $arrayPost;
    }
   }

   public function getCalendarData($eventDataParam){

        $eventData = $eventDataParam;
        include "views/artistsPerDay.php";
    }

    public function getAllData(){

        $parametersEvent = $this->getEventData();
        $this->getCalendarData($parametersEvent);

        /*if($_POST){
            $parametersCalendar = $_POST;
        }*/
    }

    public function prueba2(){
        include "views/artistsPerDay.php";
    }

    public function prueba(){
        if($_POST){
            var_dump($_POST);
            var_dump($_SESSION['eventData']);
        }
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