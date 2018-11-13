<?php

namespace controllers;

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
        include(ROOT . "views/mainMenu.php");
    }
}

?>