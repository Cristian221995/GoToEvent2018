<?php

namespace controllers;
use daos\databases\eventDB as eventDB;
//use daos\lists\eventDao as eventDB;
use models\Event as Event;
use models\Image as Image;
use controllers\CalendarController as CalendarController;
use controllers\ImageController as ImageController;


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

   public function store()
    {
        $eventFlag = $this->searchByName($_SESSION['eventData']['name']);
        if(!$eventFlag){
            if($_POST){
                $counter = 0;
                $imageController = new ImageController();
                $rutaImagen = $imageController -> subirImage($_FILES['eventIMG'], "eventImg");
                $event = new Event($_SESSION['eventData']['name'], $_SESSION['eventData']['category'], $rutaImagen);
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

    public function getIdByName($name){
        $id = $this->dao->getIdByName($name);
        return $id;
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

    public function getAllEventData($eventName){


        $id = $this->getIdByName($eventName);
        $calendarController = new CalendarController();
        $data = $calendarController->retrideCalendar($id);
        /*if(isset($_SESSION["userName"])){
            if($_SESSION['userRole']==="user"){
                include(ROOT . "views/headerUser.php");
            }
            else{
                include(ROOT . "views/headerAdmin.php");
            }
        }
        else{
            include(ROOT . "views/headerNotLogued.php");
        }
        include(ROOT . "views/oneEvent.php");*/
    }

    public function getAll(){

        $eventList = $this->retride();
        if($eventList){
            if(is_array($eventList)){
                foreach ($eventList as $key => $value) {
                    $value->setCategory($this->getNameById('categories','category',$value->getCategory()->getName()));
                }
            }
            else{
                $eventList->setCategory($this->getNameById('categories','category',$eventList->getCategory()->getName()));
            }
            return $eventList;
        }
    }

    public function getEventsByCategoryName($categoryName){

        $eventList = $this->retride();
        if($eventList){
            $eventsFilter = array();
            if(is_array($eventList)){
                foreach ($eventList as $key => $value){
                    $nombreCategoria = $this->getNameById('categories','category',$value->getCategory()->getName());
                    if($nombreCategoria === $categoryName){
                        $value->setCategory($nombreCategoria);
                        array_push($eventsFilter,$value);
                    }
                }
            }
        }

        $categoryController = new CategoryController();
        $categoryList= $categoryController->retride();
        
        if(isset($_SESSION["userName"])){
            if($_SESSION['userRole']==="user"){
                include(ROOT . "views/headerUser.php");
            }
            else{
                include(ROOT . "views/headerAdmin.php");
            }
        }
        else{
            include(ROOT . "views/headerNotLogued.php");
        }
        include(ROOT. "views/mainMenu.php");
    }

    public function searchByName($nombre){
        $event = $this->dao->searchByName($nombre);
        return $event;
    }

}




?>