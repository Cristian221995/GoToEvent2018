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

        $categoryController = new CategoryController();
        $categoryList = $categoryController->retride();
        
        include(ROOT . "views/mainMenu.php");
    }
}

?>

