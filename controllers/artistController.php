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
        $flag = $this->searchInDatabase($nombre);
        if(!$flag){
            $artist = new Artist($nombre);
            $ultimoID=$this->dao->insert($artist);
            header("Location:".HOME);
        }
        else{
            throw new \Exception ('El artista ya existe');
        }
    }

    public function delete($nombre)
    {
        $flag = $this->searchInDatabase($nombre);
        if($flag){
            $artist = new Artist($nombre);
            $this->dao->delete($artist);
        }
        else{
            throw new \Exception ('Ha ocurrido un error'); 
        }
    }

    public function update($nombre, $nuevoDato)
    {
        $flag = $this->searchInDatabase($nombre);
        if($flag){
            $artist = new Artist($nombre);
            $this->dao->update($artist, $nuevoDato);
        }
        else{
            throw new \Exception ('Ha ocurrido un error');
        }
    }

    public function retride(){
        $list=$this->dao->retride();
        return $list;
    }

    public function getIdByName($nombre){
        $id = $this->dao->getIdByName($nombre);
    }
    
    public function searchInDatabase($nombre){
        $list = $this->retride();
        $flag = false;
        if($list){
            foreach ($list as $key => $value) {
                if($value === $nombre){
                    $flag = true;
                }
            }
        }
        return $flag;
    }

}
