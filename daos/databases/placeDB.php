<?php

namespace daos\databases;
use interfaces\IDao as IDao;
use daos\SingletonDao as SingletonDao;
use daos\databases\Connection as Connection;
use daos\databases\PlaceTypeDB as PlaceTypeDB;
use daos\databases\EventDB as EventDB;
use models\Place as Place;

class PlaceDB{

    public function __construct()
    {

    }

    public function insert($place, $event){

        $query = "INSERT INTO place_types_x_event (id_event, id_place_type, price, quantity, remainder) VALUES (:id_event, :id_place_type, :price, :quantity, :remainder)";
        $placeTypeDB = new PlaceTypeDB();
        $eventDB = new EventDB();
        $placeType = $placeTypeDB->retrideByName($place->getPlaceType()->getName());
        $eventAux = $eventDB->getByName($event->getName());
        $parameters['id_event'] = $eventAux->getId();
        $parameters['id_place_type'] = $placeType->getId();
        $parameters['price'] = $place->getPrice();
        $parameters['quantity'] = $place->getQuantity();
        $parameters['remainder'] = $place->getRemainder();
        try{
            $pdo = Connection::getInstance();
            $pdo->connect();
            $pdo->executeNonQuery($query, $parameters);
        }
        catch(\PDOException $ex){
            throw $ex;
        }
    }

    public function delete($place){

    }

    public function update($dato, $datonuevo){  //modificar el update para que funcione el remainder

    }

    public function retride(){

        $query = "SELECT * FROM place_types_x_event order by id_place_type_x_event";
        try{
            $pdo = Connection::getInstance();
            $pdo->connect();
            $result = $pdo->execute($query);
        }
        catch(Exception $ex) {
            throw $ex;
        }
        if (!empty($result)){
            return $this->mapear($result);
        }
        else{
            return false;
        }
    }

    public function retrideByPlaceType($idPlaceType){

        $query = "SELECT * FROM place_types_x_event WHERE id_place_type = '$idPlaceType'";
        try{
            $pdo = Connection::getInstance();
            $pdo->connect();
            $result = $pdo->execute($query);
        }
        catch(Exception $ex) {
            throw $ex;
        }
        if (!empty($result)){
            return $this->mapear($result);
        }
        else{
            return false;
        }
    }

    public function retrideByIdEvent($idEvent){

        $query = "SELECT * FROM place_types_x_event WHERE id_event = '$idEvent'";
        try{
            $pdo = Connection::getInstance();
            $pdo->connect();
            $result = $pdo->execute($query);
        }
        catch(Exception $ex) {
            throw $ex;
        }
        if (!empty($result)){
            return $this->mapear($result);
        }
        else{
            return false;
        }
    }

    public function updateRemainder(){
        
         $query "UPDATE place_types_x_event SET remainder =  "
    }

    protected function mapear($value) {
        $value = is_array($value) ? $value : [];
        $resp = array_map(function ($p) {
            $placeTypeDB = new PlaceTypeDB();
            $placeTypeList = $placeTypeDB->retrideById($p['id_place_type']);
            return new Place ($p['id_place_type_x_event'], $placeTypeList, $p['price'], $p['quantity'], $p['remainder']);
        }, $value);
        return count($resp) > 1 ? $resp : $resp['0'];
    }
}

?>