<?php

namespace controllers;

use daos\databases\CalendarDB as CalendarDB;
use models\Calendar as Calendar;

class CalendarController{

    protected $dao;
    public function __construct()
    {
        $this->dao=CalendarDB::getInstance();
    }

    public function index()
    {
        //??
    }

    public function store($event)
    {
        $calendarList = $event->getCalendar();
        if($calendarList){
            foreach ($calendarList as $key => $value) {
                $calendar = $value;
                $this->dao->insert($calendar);
            }
        }
    }

    public function delete($nombre)
    {
        //no hecho
        $artist = new Calendar($nombre);
        $this->dao->delete($artist);
    }

    public function update($nombre, $nuevoDato)
    {
        //no hecho
        $artist = new Calendar($nombre);
        $this->dao->update($artist, $nuevoDato);
    }

    public function retride(){
        //no hecho
        $list=$this->dao->retride();
        return $list;
    }

    public function getIdByName($nombre){
        //no hecho
        $id = $this->dao->getIdByName($nombre);
    }
}

?>
