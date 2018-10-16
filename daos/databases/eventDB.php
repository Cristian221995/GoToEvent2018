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
        $eventList = $event->getName();
        $category = $event->getCategory();
        $eventPlace = $event->getEventPlace();
        $command->bindParam(':name',$eventList);
        $command->bindParam(':category',$category);
        $command->bindParam(':eventPlace',$eventPlace);
        $command->execute();

        //return $pdo->lastInsertId();/**/
    }

    public function delete($event){
        
        $query = 'DELETE FROM events WHERE event_name = :name';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $eventList = $artist->getName();
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
}

?>