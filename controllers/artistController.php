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
        include(ROOT. "views/artistForm.php");
    }
  
    public function store($nombre)
    {
        $artistFlag = $this->searchByName($nombre);
        if(!$artistFlag){
            $this->dao->insert($nombre);
            header("Location:".HOME);
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

    /*public function update($nombre, $nuevoDato)
    {
        $flag = $this->searchInDatabase($nombre);
        if($flag){
            $artist = new Artist($nombre);
            $this->dao->update($artist, $nuevoDato);
        }
        else{
            throw new \Exception ('Ha ocurrido un error');
        }
    }*/

    public function retride(){
        $list=$this->dao->retride();
        return $list;
    }
    
    public function searchByName($nombre){
        $artist = $this->dao->searchByName($nombre);
        if($artist){
            return true;
        }
        else{
            return false;
        }
    }

}
