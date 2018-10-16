<?php
namespace daos\lists;
use interfaces\IDao as IDao;
use daos\SingletonDao as SingletonDao;

class EventDao extends SingletonDao implements IDao
{
    private $list;
    public function __construct()
    {
        $this->list = array();
    }

    /*getSessionArtist(): Consulta si la sesión esta creada, si lo está, retorna la lista de artistas
    guardada en la sesión. De lo contrario guarda un array vacio en la sesión, y por último lo retorna*/

    public function getSessionEvent()
    {
        if (!isset($_SESSION['EventList'])) {
            $_SESSION['EventList'] = array();
        }
        return $_SESSION['EventList'];
    }

    /*setSessionArtist($value): Sirve para actualizar la lista de la sesión.
     Parametros: $value= la lista actualizada.*/

    public function setSessionEvent($value)
    {
        $_SESSION['EventList'] = $value;
    }

    /*insert($dato): Guarda en la variable $list el array de artistas retornado en getSessionArtist()
    y almacena en a última posición del array al nuevo artista que desea agregar. Finalmente llama
    a setSessionArtist() para guardar los cambios.
    Parámetros: $dato = nuevo artista a guardar.*/

    public function insert($dato)
    {
        $this->list=$this->getSessionEvent();
        if(!in_array($dato,$this->list)){
            array_push($this->list, $dato);
            $this->setSessionEvent($this->list);
        }
        else{
            echo "El artista ya existe<br>";
        }
    }

    public function delete($dato){
        $this->list=$this->getSessionEvent();
        if(!in_array($dato,$this->list)){
            echo "El artista no existe<br>";
        }
        else {
            foreach ($this->list as $key => $value) {
                if($value===$dato){
                    unset($this->list[$key]);
                    $this->setSessionEvent($this->list);
                }
            }
        }
    }

    public function update($dato, $datoNuevo){
        $this->list=$this->getSessionEvent();
        if(in_array($dato,$this->list)){
            foreach ($this->list as $key => $value) {
                if($value->getName()===$dato->getName()){
                    $value->setName($datoNuevo);
                    $this->setSessionEvent($this->list);
                    return;
                }
            }
        }
        else{
            echo "El artista no existe<br>";
        }
    }

    public function retride(){
        $this->list=$this->getSessionEvent();
        foreach ($this->list as $key => $value) {
            echo $value->getName() . "<br>";
        }
    }

}
