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
            $category = new Category($nombre);
            $this->dao->insert($category);
            header("Location:".HOME);
        }
        else{
            throw new \Exception ('La categoría ya existe');
        }
    }

    public function delete($nombre)
    {
        $flag = $this->searchInDatabase($nombre);
        if($flag){
            $category = new Category($nombre);
            $this->dao->delete($category);
        }
        else{
            throw new \Exception ('Ha ocurrido un error'); 
        }
    }

    public function update($nombre, $nuevoDato)
    {
        $flag = $this->searchInDatabase($nombre);
        if($flag){
            $category = new Category($nombre);
            $this->dao->update($category, $nuevoDato);
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
    
    public function searchByName($nombre){
        $category = $this->dao->searchByName($nombre);
        return $category;
    }

}

?>