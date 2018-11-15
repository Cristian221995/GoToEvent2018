<?php

namespace controllers;
use daos\databases\eventDB as eventDB;
//use daos\lists\eventDao as eventDB;
use models\Event as Event;
use models\Image as Image;
use controllers\CalendarController as CalendarController;


class EventController{

    protected $dao;

    public function __construct(){

        $this->dao = eventDB::getInstance();
   }

   public function index(){
    $categoryController = new CategoryController();
    $listCategory = $categoryController->retride();

    $eventPlaceController = new EventPlaceController();
    $listEventPlace = $eventPlaceController->retride();

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
    }

    public function index2(){

        $artistController = new ArtistController();
        $listArtist = $artistController->retride();

        include "views/artistsPerDay.php";
    }

    /*public function prueba(){
        if($_POST){
            var_dump($_POST);
            var_dump($_SESSION['eventData']);
        }
    }*/

   public function store()
    {
        $flag = $this->searchInDatabase($_SESSION['eventData']['name']);
        if(!$flag){
            if($_POST){
                $counter = 0;
                //$foto = $_SESSION['eventData']['eventIMG'];
                //$_FILES['eventIMG'] = $foto;
                //var_dump($_FILES['eventIMG']);
                $rutaImagen = new Image();
                $rutaImagen -> subirImage($_FILES['eventIMG'], "eventImg");
                $event = new Event($_SESSION['eventData']['name'], $_SESSION['eventData']['category'], $rutaImagen->getDireccion());
                foreach ($_POST as $key => $value) {
                    $eventDate = $_SESSION['eventData']['eventDates'][$counter];
                    $eventPlace = $_SESSION['eventData']['eventPlace'];
                    $event->setCalendar($eventDate, $eventPlace, $value);
                    $counter++;
                }
                $this->dao->insert($event);
                $calendarControl = new CalendarController();
                $calendarControl->store($event);
                header("Location:".HOME);
            }
        }
        else{
            throw new \Exception ('El evento ya existe');
        }
    }

    public function delete($nombre)
    {
        $flag = $this->searchInDatabase($nombre);
        if($flag){
            $event = new Event($nombre);
            $this->dao->delete($event);
        }
        else{
            throw new \Exception ('Ha ocurrido un error'); 
        }
    }

    public function update($nombre, $nuevoDato)
    {
        $flag = $this->searchInDatabase($nombre);
        if($flag){
            $event = new Event($nombre);
            $this->dao->update($event, $nuevoDato);
        }
        else{
            throw new \Exception ('Ha ocurrido un error'); 
        }
    }

    public function retride(){
        $list=$this->dao->retride();
        return $list;
    }

    public function getIdByName($nombre){
        $id = $this->dao->getIdByName($nombre);
    }

    public function searchInDatabase($nombre){
        $list = $this->retride();
        $flag = false;
        if($list){
            foreach ($list as $key => $value) {
                if($value === $nombre){
                    $flag = true;
                }
            }
        }
        return $flag;
    }

    public function getNameById($dbName, $columnName, $id){

        $name = $this->dao->getNameById($dbName, $columnName, $id);
        return $name;
    }


    public function getAll(){

        $eventList = $this->retride();
        foreach ($eventList as $key => $value) {
            $nombreCategoria = $this->getNameById('categories','category',$value[1]);
            $eventList[$key][1] = $nombreCategoria;
        }
        return $eventList;
    }

}

?>