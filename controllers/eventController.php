<?php

namespace controllers;
use daos\databases\eventDB as eventDB;
//use daos\lists\eventDao as eventDB;
use models\Event as Event;
use models\Image as Image;
use controllers\CalendarController as CalendarController;
use controllers\ImageController as ImageController;
use controllers\PlaceTypeController as PlaceTypeController;


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
       
      /*  $completeDate = getdate();
        $year = $completeDate['year'];
        $month = $completeDate['mon'];
        $day = $completeDate['mday'];
        $myConcatenate = $year . "-" . $month . "-" . $day;

        $actualDate = new DateTime($myConcatenate);
        $dateStart = new DateTime($_POST['eventDateStart']);

        if($dateStart < $actualDate){
            $alert = 'La fecha de inicio del evento es incorrecta.';
            include "views/createEventForm.php";
        }else{*/
            $artistController = new ArtistController();
            $listArtist = $artistController->retride();
    
            $placeTypeController = new PlaceTypeController();
            $listPlaceType = $placeTypeController->retride();
    
            include "views/artistsPerDay.php";
        /*}*/

    }

   public function store()
    {
        $eventFlag = $this->searchByName($_SESSION['eventData']['name']);
        if(!$eventFlag){
            if($_POST){
                $counter = 0;
                $imageController = new ImageController();
                $rutaImagen = $imageController -> subirImage($_FILES['eventIMG'], "eventImg");
                $event = new Event('',$_SESSION['eventData']['name'], $_SESSION['eventData']['category'], $rutaImagen);
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

    public function getByName($name){
        $id = $this->dao->getByName($name);
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

    public function getAllEventData($id){

        $calendarController = new CalendarController();
        $data = $calendarController->retrideCalendar($id);
        $length = sizeof($data) - 1;
        include(ROOT . "views/printEvent.php");
    }

    public function getAll(){

        $eventList = $this->retride();
        return $eventList;
    }

    public function getEventsByCategoryName($categoryName){

        $eventsFilter = $this->retrideByCategory($categoryName);
        $categoryController = new CategoryController();
        $categoryList = $categoryController->retride();
        include(ROOT. "views/mainMenu.php");
    }

    public function getNextSixEvents(){

        


    }

    public function searchByName($nombre){
        $event = $this->dao->searchByName($nombre);
        return $event;
    }

    public function retrideByCategory($category){

        $eventList = $this->dao->retrideByCategory($category);
        return $eventList;
    }

    public function getById($id){

        $eventList = $this->dao->retrideById($id);
        return $eventList;
    }

}




?>