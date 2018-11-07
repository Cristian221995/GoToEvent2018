<?php
namespace controllers;
class LoginController
{

    public function __construct()
    {
        
    }

    public function index()
    {
        include(ROOT.'views/login.html');
    }

    

}
?>