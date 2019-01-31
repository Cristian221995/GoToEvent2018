<?php
namespace daos\lists;
use interfaces\IDao as IDao;
use daos\SingletonDao as SingletonDao;

class EventDao extends SingletonDao implements IDao
{
    private $list;

    public function __construct() {

        $this->list = array();
    }
    /*getSessionEvent(): Consulta si la sesión esta creada, si lo está, retorna la lista de eventos
    guardada en la sesión. De lo contrario guarda un array vacio en la sesión, y por último lo retorna*/

    public function getSessionEvent()
    {
        if (!isset($_SESSION['EventList'])) {
            $_SESSION['EventList'] = array();
        }
        return $_SESSION['EventList'];
    }

    /*setSessionEvent($value): Sirve para actualizar la lista de la sesión.
     Parametros: $value= la lista actualizada.*/

    public function setSessionEvent($value)
    {
        $_SESSION['EventList'] = $value;
    }

    /*insert($EventObject: Guarda en la variable $list el array de eventos retornado en getSessionEvent()
    y almacena en a última posición del array al nuevo evento que desea agregar. Finalmente llama
    a setSessionEvent() para guardar los cambios.
    Parámetros: $EventObject = nuevo evento a guardar.*/

    public function insert($EventObject)
    {
        $this->list=$this->getSessionEvent();
        if(!in_array($EventObject,$this->list)){
            array_push($this->list, $EventObject);
            $this->setSessionEvent($this->list);
        }
        else{
            echo "El evento ya existe<br>";
        }
    }

    public function delete($EventName){
        $this->list = $this->getSessionEvent();
        if (isset($this->list)) {
          foreach ($this->list as $key => $value) {
                if ($EventName == $value->getName()) {
                    unset($this->list[$key]);
                }
            }
        }
        $this->setSessionEvent($this->list);
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
            echo "El evento no existe<br>";
        }
    }

    public function retride(){
        $this->list=$this->getSessionEvent();
        foreach ($this->list as $key => $value) {
            echo $value->getName() . "<br>";
        }
    }

}
