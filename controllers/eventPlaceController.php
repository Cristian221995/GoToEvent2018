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

    include(ROOT. "views/createEventPlaceForm.php");
   }

   public function store($nombre, $capacidad)
    {
        $flag = $this->dao->retrideByName($nombre);
        if(!$flag){
            $eventPlace = new EventPlace('',$nombre, $capacidad);
            $this->dao->insert($eventPlace);
            $alertSuccess = "El lugar de evento se guardó con exito";
        }
        else{
            $alertError = "El lugar de evento ya exíste";
        }
        include(ROOT. "views/createEventPlaceForm.php");
    }

    public function delete($nombre)
    {
        $flag = $this->searchInDatabase($nombre);
        if($flag){
            $eventPlace = new EventPlace($nombre);
            $this->dao->delete($eventPlace);
        }
        else{
            throw new \Exception ('Ha ocurrido un error'); 
        }
    }

    public function update($nombre, $nuevoDato)
    {
        $flag = $this->searchInDatabase($nombre);
        if($flag){
            $category = new EventPlace($nombre);
            $this->dao->update($eventPlace, $nuevoDato);
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

}

?>