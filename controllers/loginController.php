<?php
namespace controllers;
use controllers\UserController as UserController;

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
                $_SESSION['userRole'] = $value[4];
                $flag = true;
                header("Location:" . HOME);
            }
        }
        if($flag===false)
        {
            header("Location:" . HOME . "Login");
        }
    }

    

}
?>