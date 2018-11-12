<?php

namespace controllers;

class IndexController{


    function __construct(){

    }

    public function index(){

        include (ROOT . "views/headerAdmin.php");
        include (ROOT . "views/mainMenu.php");
    }
}

?>