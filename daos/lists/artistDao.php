<?php
namespace daos\lists;
use interfaces\IDao as IDao;
use daos\SingletonDao as SingletonDao;

class ArtistDao extends SingletonDao implements IDao
{
    private $list;
    public function __construct()
    {
        $this->list = array();
    }

    /*getSessionArtist(): Consulta si la sesión esta creada, si lo está, retorna la lista de artistas
    guardada en la sesión. De lo contrario guarda un array vacio en la sesión, y por último lo retorna*/

    public function getSessionArtist()
    {
        if (!isset($_SESSION['ArtistList'])) {
            $_SESSION['ArtistList'] = array();
        }
        return $_SESSION['ArtistList'];
    }

    /*setSessionArtist($value): Sirve para actualizar la lista de la sesión.
     Parametros: $value= la lista actualizada.*/

    public function setSessionArtist($value)
    {
        $_SESSION['ArtistList'] = $value;
    }

    /*insert($dato): Guarda en la variable $list el array de artistas retornado en getSessionArtist()
    y almacena en a última posición del array al nuevo artista que desea agregar. Finalmente llama
    a setSessionArtist() para guardar los cambios.
    Parámetros: $dato = nuevo artista a guardar.*/

    public function insert($dato)
    {
        $this->list=$this->getSessionArtist();
        if(!in_array($dato,$this->list)){
            array_push($this->list, $dato);
            $this->setSessionArtist($this->list);
        }
        else{
            echo "El artista ya existe<br>";
        }
    }

    public function delete($dato){
        $this->list=$this->getSessionArtist();
        if(!in_array($dato,$this->list)){
            echo "El artista no existe<br>";
        }
        else {
            foreach ($this->list as $key => $value) {
                if($value===$dato){
                    unset($this->list[$key]);
                    $this->setSessionArtist($this->list);
                }
            }
        }
    }

    public function update($dato, $datoNuevo){
        $this->list=$this->getSessionArtist();
        if(in_array($dato,$this->list)){
            foreach ($this->list as $key => $value) {
                if($value->getNombre()===$dato->getNombre()){
                    $value->setNombre($datoNuevo);
                    $this->setSessionArtist($this->list);
                    return;
                }
            }
        }
        else{
            echo "El artista no existe";
        }
    }

    public function retride(){
        $this->list=$this->getSessionArtist();
        foreach ($this->list as $key => $value) {
            echo $value->getNombre() . "<br>";
        }
    }

}
