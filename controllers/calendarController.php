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
                $this->dao->insert($value);
            }
        }
    }

    public function delete($nombre)
    {
        $artist = new Calendar($nombre);
        $this->dao->delete($artist);
    }

    public function update($nombre, $nuevoDato)
    {
        $artist = new Calendar($nombre);
        $this->dao->update($artist, $nuevoDato);
    }

    public function retrideCalendar($id){
        $calendar=$this->dao->retrideCalendar($id);
        return $calendar;
    }

    public function getIdByName($nombre){
        //no hecho
        $id = $this->dao->getIdByName($nombre);
    }

}

?>
