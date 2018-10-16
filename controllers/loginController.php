<?php
namespace controllers;
class HomeController
{

    public function __construct()
    {
        
    }

    public function index()
    {
        include(ROOT.'views/login.php');
    }

}
?>