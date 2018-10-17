<?php

namespace daos\databases;
use interfaces\IDao as IDao;
use daos\SingletonDao as SingletonDao;
use daos\databases\Connection as Connection;
use models\Event as Event;

class EventDB extends SingletonDao implements IDao{

    public function __construct(){

    }

    public function insert($event){

        $query = 'INSERT INTO events (event_name, id_category, id_event_place) VALUES (:name, :category, :eventPlace)';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $eventName = $event->getName();
        $category = $event->getCategory()->getName();
        $eventPlace = $event->getEventPlace()->getName();

        $idCategory = $this->getIdByName("categories", "category", $category);
        $idEventPlace = $this->getIdByName("event_places", "event_place", $eventPlace);

        
        $command->bindParam(':name',$eventName);
        $command->bindParam(':category',$idCategory);
        $command->bindParam(':eventPlace',$idEventPlace);
        $command->execute();

        //return $pdo->lastInsertId();/**/
    }

    public function delete($event){
        
        $query = 'DELETE FROM events WHERE event_name = :name';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $eventList = $event->getName();
        $command->bindParam(':name',$eventList);
        $resultDelete = $command->execute();

        return $resultDelete;
    }

    public function update($dato, $datoNuevo){

        $query = 'UPDATE events SET name = $datoNuevo WHERE name = $dato';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);

        $resultUpdate = $command->execute();


        return $resultUpdate;
    }

    public function retride(){

        $eventList = array();

        $query = 'SELECT * FROM events';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->execute();

        while($result = $command->fetch()){
            
            array_push($eventList,$result['event_name']);
            var_dump($eventList);
        }
        return $eventList;
    }

    public function getIdByName($dbName, $rowName, $name){

        $query = 'SELECT * FROM '. $dbName .' WHERE '. $rowName .'_name = (:name)';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->bindParam(':name',$name);
        $command->execute();

        if($result = $command->fetch()){
            return $result['id_'.$rowName];
        }
        else{
            return null;
        }
    }
}

?>