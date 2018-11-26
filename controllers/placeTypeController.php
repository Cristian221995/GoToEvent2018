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
            $ultimoID=$this->dao->insert($name);
            header("Location:".HOME);
        }
        else{
            throw new \Exception ('El tipo de plaza ya existe');
        }
    }

    public function retride(){
        $list=$this->dao->retride();
        return $list;
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