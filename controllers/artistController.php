<?php
namespace controllers;
use daos\databases\ArtistDB as Artista;
//use daos\lists\ArtistDao as Artista;
use models\Artist as Artist;
<<<<<<< HEAD
use controllers\IndexController as IndexController;
=======
use controllers\LoginController as LoginController;
>>>>>>> f3ffacc1341a9fa0dbbb414624eb0b1df7ad4ebd

class ArtistController
{
    protected $dao;
    public function __construct()
    {
        $this->dao=Artista::getInstance();
    }

    public function index()
    {
        include(ROOT. "views/artistForm.php");
    }
  
    public function store($nombre)
    {
        $flag = $this->dao->retrideByName($nombre);
        if(!$flag){
            $this->dao->insert($nombre);
<<<<<<< HEAD
            $indexController = new IndexController();
            $indexController->index();
=======
            $alertSuccess = "El artista se guardó con exito";
>>>>>>> f3ffacc1341a9fa0dbbb414624eb0b1df7ad4ebd
        }
        else{
            $alertError = "El artista ya exíste";
        }
        include(ROOT. "views/artistForm.php");
    }

    /*public function delete($nombre)
    {
        $flag = $this->searchInDatabase($nombre);
        if($flag){
            $artist = new Artist($nombre);
            $this->dao->delete($artist);
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
