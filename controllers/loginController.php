<?php
namespace controllers;
class LoginController
{

    public function __construct()
    {
        
    }

    public function index()
    {
        include(ROOT.'views/login.php');
    }

    public function register()
    {
        include(ROOT.'views/registerForm.php');
    }

}
?>