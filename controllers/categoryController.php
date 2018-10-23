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

    include(ROOT. "views/artistView.php");
    //include ROOT. views/noseque.php
   }

   public function store($nombre)
    {
        $category = new Category($nombre);
        $this->dao->insert($category);
        include ROOT . "views/artistForm.php";
    }

    public function delete($nombre)
    {
        $category = new Category($nombre);
        $this->dao->delete($category);
    }

    public function update($nombre, $nuevoDato)
    {
        $category = new Category($nombre);
        $this->dao->update($category, $nuevoDato);
    }

    public function retride(){
        $list=$this->dao->retride();
        return $list;
    }

}

?>