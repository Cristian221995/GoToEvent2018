<?php

namespace controllers;
use daos\databases\CategoryDB as CategoryDB;
use models\Category as Category;


class CategoryController{

    protected $dao;

    public function __construct(){

        $this->dao = CategoryDB::getInstance();
    }

   public function index(){
       
       include(ROOT. "views/createCategoryForm.php");
    }

    public function store($nombre)
    {
        $categoryFlag = $this->searchByName($nombre);
        if(!$categoryFlag){
            $this->dao->insert($nombre);
            $alertSuccess = "La categoría se guardó con exito";
        }
        else{
            $alertError = "La categoría ya exíste";
        }
        include(ROOT. "views/createCategoryForm.php");
    }

    /*public function delete($nombre)
    {
        $flag = $this->searchInDatabase($nombre);
        if($flag){
            $category = new Category($nombre);
            $this->dao->delete($category);
        }
        else{
            throw new \Exception ('Ha ocurrido un error'); 
        }
    }*/

    /*public function update($nombre, $nuevoDato)
    {
        $flag = $this->searchInDatabase($nombre);
        if($flag){
            $category = new Category($nombre);
            $this->dao->update($category, $nuevoDato);
        }
        else{
            throw new \Exception ('Ha ocurrido un error'); 
        }
    }*/

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
    
    public function searchByName($nombre){
        $category = $this->dao->searchByName($nombre);
        if($category){
            return true;
        }
        else{
            return false;
        }
    }

}

?>