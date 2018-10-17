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

        $query = 'INSERT INTO event_places (place_name, capacity) VALUES (:name, :capacity)';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $eventName = $eventPlace -> getName();
        $eventCapacity = $eventPlace -> getCapacity();
        $command->bindParam(':name',$eventName);
        $command->bindParam(':capacity',$eventCapacity);
        $command->execute();

        //return $pdo->lastInsertId();/**/
    }

    public function delete($eventPlace){
        
        $query = 'DELETE FROM event_places WHERE place_name = :name';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $eventName = $eventPlace->getName();
        $command->bindParam(':name',$eventName);
        $resultDelete = $command->execute();

        return $resultDelete;
    }

    public function update($dato, $datoNuevo){

        $query = 'UPDATE event_places SET name = $datoNuevo WHERE name = $dato';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);

        $resultUpdate = $command->execute();


        return $resultUpdate;
    }

    public function retride(){

        $eventList = array();

        $query = 'SELECT * FROM event_places';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->execute();

        while($result = $command->fetch()){
            
            $event = array();
            array_push($event,$result['place_name']);
            array_push($event,$result['capacity']);
            array_push($eventList,$event);
            unset($event);
            
        }
        var_dump($eventList);
        return $eventList;
    }

    public function getIdByName($name){

        $query = "SELECT * FROM event_places WHERE place_name = :name";
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->bindParam(':name',$name);
        $command->execute();

        if($result = $command->fetch()){
            return $result['id_event_place'];
        }
        else{
            return null;
        }
    }
}

?>