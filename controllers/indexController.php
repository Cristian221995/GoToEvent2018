<?php

namespace controllers;

class IndexController{


    function __construct(){

    }

    public function index(){

        include (ROOT . "views/mainMenu.php");
    }
}

?>