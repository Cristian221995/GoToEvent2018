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

    public function login($username, $pass){

        $flag = false;
        $userController = new UserController();
        $user = $userController->searchByUsername($username);
        if($user){
            if($user->getPass() === $pass){
                $_SESSION['userName'] = $username;
                $_SESSION['userRole'] = $user->getRole();
                $flag = true;
                $indexController = new IndexController();
                $indexController->index();
            }
        }
        /*if($flag===false)
        {
            header("Location:" . HOME . "Login");
        }*/
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