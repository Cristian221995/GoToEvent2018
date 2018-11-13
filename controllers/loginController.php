<?php
namespace controllers;
use controllers\UserController as UserController;
use controllers\IndexController as IndexController;

class LoginController
{

    public function __construct()
    {
        
    }

    public function index()
    {
        include(ROOT.'views/login.php');
    }

    public function login(){

        $flag = false;
        $userName = $_POST['userName'];
        $pass = $_POST['pass'];
        $userController = new UserController();
        $list = $userController->retride();
        foreach ($list as $key => $value) {
            if($value[1] === $userName && $value[2] === $pass){
                $_SESSION['userName'] = $userName;
                $_SESSION['userRole'] = $value[3];
                $flag = true;
                $indexController = new IndexController();
                $indexController->index();
            }
        }
        if($flag===false)
        {
            header("Location:" . HOME . "Login");
        }
    }

    public function logout(){

        if(isset($_SESSION["userName"])){

            session_unset();
            session_destroy();
            session_start();
            header("Location:" . HOME);
        }
    }

    

}
?>