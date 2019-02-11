<?php

namespace controllers;
use daos\databases\eventDB as eventDB;
//use daos\lists\eventDao as eventDB;
use models\Event as Event;
use models\Image as Image;
use models\PlaceType as PlaceType;
use models\Place as Place;
use controllers\CalendarController as CalendarController;
use controllers\ImageController as ImageController;
use controllers\PlaceTypeController as PlaceTypeController;
use controllers\IndexController as IndexController;
use daos\databases\PlaceDB as PlaceDao;


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

        $placeTypeController = new PlaceTypeController();
        $listPlaceType = $placeTypeController->retride();

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
<<<<<<< HEAD

        $artistController = new ArtistController();
        $listArtist = $artistController->retride();
    
        include "views/artistsPerDay.php";
=======
        $_POST['name'] = ucwords(strtolower($_POST['name']));
        $_SESSION['eventData'] = $_POST;
        if($_SESSION['eventData']['eventDateFinish']<$_SESSION['eventData']['eventDateStart']){

            $categoryController = new CategoryController();
            $listCategory = $categoryController->retride();

            $eventPlaceController = new EventPlaceController();
            $listEventPlace = $eventPlaceController->retride();

            $placeTypeController = new PlaceTypeController();
            $listPlaceType = $placeTypeController->retride();

            $alertError = "La fecha de final del evento es anterior a la de comienzo del mismo";

            include(ROOT. "views/createEventForm.php");
        }
        else{
            $artistController = new ArtistController();
            $listArtist = $artistController->retride();
            include "views/artistsPerDay.php";
        }
>>>>>>> f3ffacc1341a9fa0dbbb414624eb0b1df7ad4ebd
    }

    public function setEventPlaces(){
        $array = array();
        foreach ($_SESSION["eventData"]["place"] as $key1 => $value) {
            foreach ($_POST as $key2 => $valuePost) {
                if($key2=="price" || $key2=="quantity"){
                    foreach ($valuePost as $key3 => $valueIndex) {
                        if($key1 === $key3){
                            $array[$key2]=$valueIndex;
                        }
                    }
                }
            }
            unset($_SESSION["eventData"]["place"][$key1]); //Hago unset para modificar el nombre del indice. Pasa de 0 y 1 a Platea y Popular
            $_SESSION["eventData"]["place"][$value]=$array;
        }
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
                    if($key!="price" && $key!="quantity"){
                        $eventDate = $_SESSION['eventData']['eventDates'][$counter];
                        $eventPlace = $_SESSION['eventData']['eventPlace'];
                        $event->setCalendar($eventDate, $eventPlace, $value);
                        $counter++;
                    }
                }
                $this->dao->insert($event);
                $calendarControl = new CalendarController();
                $calendarControl->store($event);

                $this->setEventPlaces();
                $placeDao = new PlaceDao();
                $price = "";
                $quantity = "";
                foreach ($_SESSION["eventData"]["place"] as $key => $value) {
                    foreach ($value as $key2 => $value2) {
                        if($key2=="price"){
                            $price=$value2;
                        }
                        else{
                            $quantity=$value2;
                        }
                        $placeType = new PlaceType('', $key);
                        $place = new Place('', $placeType, $price, $quantity, $quantity);
                    }
                    $placeDao->insert($place, $event);
                }
                $indexController = new IndexController();
                $indexController->index();
            }
        }
        else{
            throw new \Exception ('El evento ya existe');
        }
    }

    public function delete($id){
        $event = $this->getById($id);
        if($event){
            $this->dao->delete($event->getId());
            $indexController = new IndexController();
            $indexController->index();
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
        $list = $this->dao->getByName($name);
        return $list;
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

        $aux = '';
        $event = $this->dao->retrideById($id);
        $calendarController = new CalendarController();
        $data = $calendarController->retrideCalendar($id);
        foreach ($data as $key => $value) {
            if($aux!=$value){
                $event->setCalendar($value->getEventDate(), $value->getEventPlace(), $value->getArtistList());
                $aux = $value;
            }
        }
        $length = sizeof($event->getCalendar()) - 1;
        include(ROOT . "views/printEvent.php");
    }


    public function getAll(){

        $eventList = $this->dao->retride();
        if(!is_array($eventList)){
            $eventListAux[] = $eventList;
        }
        else{
            $eventListAux = $eventList;
        }
        return $eventListAux;
    }

    public function getEventsByCategoryName($categoryName){

        $eventsFilter = $this->retrideByCategory($categoryName);
        $categoryController = new CategoryController();
        $categoryList = $categoryController->retride();
        include(ROOT. "views/mainMenu.php");
    }

<<<<<<< HEAD
=======
    public function getEventsByName($eventName){
        $list = $this->dao->getByNameLike($eventName);
        if($list){
            if(!is_array($list)){
                $eventList[] = $list; 
            }
            else{
                $eventList = $list;
            }
        }
        else{
            $alertError = "No se han encontrado resultados para: '".$eventName."'";
            $eventList = $this->getAll();
        }
        $categoryController = new CategoryController();
        $categoryList = $categoryController->retride();
        include(ROOT. "views/mainMenu.php");
    }

>>>>>>> f3ffacc1341a9fa0dbbb414624eb0b1df7ad4ebd
    public function searchByName($nombre){
        $event = $this->dao->searchByName($nombre);
        return $event;
    }

    public function retrideByCategory($category){

        $eventList = $this->dao->retrideByCategory($category);
        if(!is_array($eventList)){
            $eventListAux[] = $eventList;
        }
        else{
            $eventListAux = $eventList;
        }
        return $eventListAux;
    }

    public function getById($id){

        $eventList = $this->dao->retrideById($id);
        return $eventList;
    }
<<<<<<< HEAD
=======

    
>>>>>>> f3ffacc1341a9fa0dbbb414624eb0b1df7ad4ebd
}

?>