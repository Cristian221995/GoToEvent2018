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

    public function store($description){

        $flag = $this->searchInDatabase($description);
        if(!$flag){
            $placeType = new PlaceType($description);
            $ultimoID=$this->dao->insert($placeType);
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
    
    public function searchInDatabase($description){
        $list = $this->retride();
        $flag = false;
        if($list){
            foreach ($list as $key => $value) {
                if($value === $description){
                    $flag = true;
                }
            }
        }
        return $flag;
    }


}

?>