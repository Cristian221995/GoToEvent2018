<?php

namespace controllers;
use daos\databases\UserDB as UserDB;
use models\User as User;
use controllers\IndexController as IndexController;


class UserController{

    protected $dao;
    public function __construct()
    {
        $this->dao=UserDB::getInstance();
    }

    public function index(){

        include(ROOT . "views/registerForm.php");
    }

    public function store($email, $username, $pass)
    {
        $flag = $this->dao->retrideByUsername($username);
        if(!$flag){
            $user = new User("", $email, $username, $pass, "user");
            $this->dao->insert($user);
            $indexController = new IndexController();
            $indexController->index();
        }
        else{
            throw new \Exception ('El email o nombre de usuario ya existe');
        }
    }

    /*public function delete($email)
    {
        $flag = $this->searchInDatabase($email);
        if($flag){
            $user = new User($email);
            $this->dao->delete($user);
        }
        else{
            throw new \Exception ('Ha ocurrido un error'); 
        }
    }*/

    public function retride(){
        $list=$this->dao->retride();
        return $list;
    }
}

?>