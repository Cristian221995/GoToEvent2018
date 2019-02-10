<?php

namespace daos\databases;
use interfaces\IDao as IDao;
use daos\SingletonDao as SingletonDao;
use daos\databases\Connection as Connection;
use models\EventPlace as EventPlace;

class EventPlaceDB extends SingletonDao implements IDao{

    public function __construct(){

    }

    public function insert($eventPlace){

        $query = 'INSERT INTO event_places (event_place_name, capacity) VALUES (:event_place_name, :capacity)';
        $parameters['event_place_name'] = $eventPlace->getName();
        $parameters['capacity'] = $eventPlace->getCapacity();
        try{
            $pdo = Connection::getInstance();
            $pdo->connect();
            $pdo->executeNonQuery($query, $parameters);
        }
        catch(\PDOException $ex){
            throw $ex;
        }
    }

    public function delete($eventPlace){
        
        /*$query = 'DELETE FROM event_places WHERE place_name = :name';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $eventName = $eventPlace->getName();
        $command->bindParam(':name',$eventName);
        $resultDelete = $command->execute();

        return $resultDelete;*/
    }

    public function update($dato, $datoNuevo){

        /*$query = 'UPDATE event_places SET name = $datoNuevo WHERE name = $dato';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);

        $resultUpdate = $command->execute();


        return $resultUpdate;*/
    }

    public function retride(){

        $query = 'SELECT * FROM event_places order by id_event_place';
        try{
            $pdo = Connection::getInstance();
            $pdo->connect();
            $result = $pdo->execute($query);
        }
        catch(\PDOException $ex){
            throw $ex;
        }
        if(!empty($result)){
            return $this->mapear($result);
        }
        else{
            return false;
        }
    }

    public function retrideById($id){

        $query = "SELECT * FROM event_places where id_event_place = :id_event_place";
        $parameters['id_event_place'] = $id;
        try {
            $this->connection = Connection::getInstance();
            $this->connection->connect();
            $result = $this->connection->execute($query, $parameters);
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

    public function retrideByName($name){
        $query = "SELECT * FROM event_places WHERE event_place_name = '$name'";
        try{
            $pdo = Connection::getInstance();
            $pdo->connect();
            $result = $pdo->execute($query);
        }
        catch(\PDOException $ex){
            throw $ex;
        }
        if(!empty($result)){
            return $this->mapear($result);
        }
        else{
            return false;
        }
    }

    public function getIdByName($name){

        $query = "SELECT id_event_place FROM event_places WHERE event_place_name = :event_place_name";
        $parameters['event_place_name'] = $name;
        try {
            $this->connection = Connection::getInstance();
            $this->connection->connect();
            $result = $this->connection->execute($query, $parameters);
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

    protected function mapear($value) {
        $value = is_array($value) ? $value : [];
        $resp = array_map(function ($p) {
            return new EventPlace ($p['id_event_place'], $p['event_place_name'], $p['capacity']);
        }, $value);
        return count($resp) > 1 ? $resp : $resp['0'];
    }
}

?>