<?php

namespace controllers;
use controllers\EventController as EventController;
use controllers\CategoryController as CategoryController;

class IndexController{


    function __construct(){

    }

    public function index(){

        $eventController = new EventController();
        $eventList = $eventController->getAll();
        var_dump($eventList);
        $categoryController = new CategoryController();
        $categoryList = $categoryController->retride();


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
        
        include(ROOT . "views/mainMenu.php");
    }
}

?>