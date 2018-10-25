<?php
namespace controllers;
use daos\databases\ArtistDB as Artista;
//use daos\lists\ArtistDao as Artista;
use models\Artist as Artist;

class ArtistController
{
    protected $dao;
    public function __construct()
    {
        $this->dao=Artista::getInstance();
    }

    public function index()
    {
        include(ROOT. "views/createEventForm.php");
    }
  
    public function store($nombre)
    {
        $artist = new Artist($nombre);
        $this->dao->insert($artist);
    }

    public function delete($nombre)
    {
        $artist = new Artist($nombre);
        $this->dao->delete($artist);
    }

    public function update($nombre, $nuevoDato)
    {
        $artist = new Artist($nombre);
        $this->dao->update($artist, $nuevoDato);
    }

    public function retride(){
        $list=$this->dao->retride();
        return $list;
    }

    public function getIdByName($nombre){
        $id = $this->dao->getIdByName($nombre);
    }
    
}
