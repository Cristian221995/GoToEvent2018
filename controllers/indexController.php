<?php

namespace controllers;
use controllers\EventController as EventController;
use controllers\CategoryController as CategoryController;

class IndexController{


    function __construct(){

    }

    public function index(){
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
        $eventController = new EventController();
        $eventList = $eventController->getAll();
        $categoryController = new CategoryController();
        $categoryList = $categoryController->retride();


        include(ROOT . "views/mainMenu.php");
    }
}

?>