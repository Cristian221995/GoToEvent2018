<?php
namespace controllers;
use daos\databases\ArtistDB as Artista;
//use daos\lists\ArtistDao as Artista;
use models\Artist as Artist;
use controllers\IndexController as IndexController;

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
            $indexController = new IndexController();
            $indexController->index();
        }
        else{
            throw new \Exception ('El artista ya existe');
        }
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
