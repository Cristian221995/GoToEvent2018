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
        $flag = $this->searchInDatabase($nombre);
        if(!flag){
            $category = new Category($nombre);
            $this->dao->insert($category);
            include ROOT . "views/artistForm.php";
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