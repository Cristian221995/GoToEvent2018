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

    public function getEventbyName($nombre){
        
        $eventList= $this->getAll();
        $calendarList= new CalendarController();

        $list=$calendarList->retride();
        var_dump($list);
        foreach ($eventList as $key => $value) {
            if($value[0]===$nombre){
                return $value;
            }
        }

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

        include "views/oneEvent.php";
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
                //var_dump($this->getAll());
                //include "views/printEvent.php";
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

    public function getIdByName($dbName, $columnName, $name){
        $id = $this->dao->getIdByName($dbName, $columnName, $name);
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


    public function getAll(){

        $eventList = $this->retride();
        foreach ($eventList as $key => $value) {
            $nombreCategoria = $this->getNameById('categories','category',$value[1]);
            $eventList[$key][1] = $nombreCategoria;
        }
        return $eventList;
    }

    public function getAllEventData($id){
        $evento = $this->dao->retrideevent($id);
        $allEventData = array();    //Array a guardar los datos
        $calendarController = new CalendarController();
        $eventData = $this->getAll();   //Te trae los datos de la tabla eventos
        $calendarData = $calendarController->retrideCalendar(); //Te trae los datos de la tabla calendarios
        $artistxCalendar = $calendarController->retrideArtistxCalendar(); //Te trae los datos de la tabla artistas_x_calendario

        foreach ($eventData as $key => $event) {    //For each de la tabla eventos para acceder al id evento y hacer la conexion con la foreign key de la tabla calendario
            if($event[0]===$eventName){ //Event[0] devuelve el nombre del evento almacenado en la BD
                array_push($allEventData,$event[0]);    //AllEventData[0] = Nombre del evento;
                array_push($allEventData,$event[1]);    //AllEventData[1] = Categoria del evento;
                array_push($allEventData,$event[2]);    //AllEventData[2] = Ruta de imagen del evento;

                
                $idEvento=$this->getIdByName('events','event',$event[0]);        //Devuelve el id del evento pasado por nombre
                foreach ($calendarData as $key => $calendar) {  //For each de la tabla calendarios para acceder a la informacion de la fecha del id evento buscado

                    if($idEvento===$calendar[2]){   //Calendar[2] representa la foreign key de id_evento
                        $eventPlace = $this->getNameById('event_places','event_place', $calendar[3]);   //Devuelve el nombre del lugar del evento
                        $calendarData[$key][3]=$eventPlace;
                        array_push($allEventData,$calendar[1]);  //AllEventData[3..4] = Fechas del evento
                        foreach ($artistxCalendar as $key => $artistCalendar) {
                            if($calendar[0]===$artistCalendar[2]){
                                $artistName = $this->getNameById('artists','artist', $artistCalendar[1]);
                                $artistxCalendar[$key][1]=$artistName;
                                array_push($allEventData,$artistxCalendar[$key][1]); //AllEventData[5] = Artistas por dia
                            }
                        }
                    }
                    array_push($allEventData,$calendarData[$key][3]); //AllEventData[6] = Lugar de evento;
                }
            }
        }
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
        include(ROOT . "views/oneEvent.php");
    }

    public function getEventsByCategoryName($categoryName){

        $eventList = $this -> retride();
        $eventsFilter = array();

        foreach ($eventList as $key => $value){
            $nombreCategoria = $this->getNameById('categories','category',$value[1]);
            if($nombreCategoria === $categoryName){
                array_push($eventsFilter,$value);
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

}




?>