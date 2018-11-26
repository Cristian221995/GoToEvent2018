<?php
namespace controllers;
use daos\databases\UserDB as UserDB;
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

        $userDB = new UserDB();
        $user = $userDB->searchByUsername($username);
        if($user){
            if($user->getPass() === $pass){
                $_SESSION['user'] = $user;
                $indexController = new IndexController();
                $indexController->index();
            }
        }
    }

    public function logout(){

        if(isset($_SESSION["user"])){
            session_unset();
            session_destroy();
            $indexController = new IndexController();
            $indexController->index();
        }
    }

    

}
?>