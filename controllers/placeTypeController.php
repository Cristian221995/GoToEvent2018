<?php

namespace controllers;
use daos\databases\PlaceTypeDB as PlaceTypeDB;
use models\PlaceType as PlaceType;

class PlaceTypeController{

    protected $dao;
    function __construct(){
        $this->dao=PlaceTypeDB::getInstance();
    }

    public function index(){
        include(ROOT."views/placeTypeForm.php");
    }

    public function store($name){

        $flag = $this->searchInDatabase($name);
        if(!$flag){
            $this->dao->insert($name);
            $alertSuccess = "La plaza se guardó con exito";
        }
        else{
            $alertError = "La plaza ya exíste";
        }
        include(ROOT. "views/placeTypeForm.php");
    }

    public function retride(){
        $list=$this->dao->retride();
        if(!is_array($list)){
            $listAux[] = $list;
        }
        else{
            $listAux = $list;
        }
        return $listAux;
    }
    
    public function searchInDatabase($name){
        $list = $this->dao->retrideByName($name);
        if($list){
            return true;
        }
        else{
            return false;
        }
    }


}

?>