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

        $query = 'INSERT INTO events (event_name, id_category, img_path) VALUES (:name, :category, :imgPath)';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $eventName = $event->getName();
        $category = $event->getCategory()->getName();

        $idCategory = $this->getIdByName("categories", "category", $category);
        
        $idImg = $event->getImg();
        
        $command->bindParam(':name',$eventName);
        $command->bindParam(':category',$idCategory);
        $command->bindParam(':imgPath',$idImg);
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

        $query = 'SELECT * FROM events order by id_event';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->execute();

        while($result = $command->fetch()){
            
            $eventData = array();
            array_push($eventData,$result['event_name']);
            array_push($eventData,$result['id_category']);
            array_push($eventData,$result['img_path']);
            array_push($eventList, $eventData);
            //var_dump($eventList);
        }
        return $eventList;
    }

    public function getIdByName($dbName, $columnName, $name){

        $query = 'SELECT * FROM '. $dbName .' WHERE '. $columnName .'_name = (:name)';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->bindParam(':name',$name);
        $command->execute();

        if($result = $command->fetch()){
            return $result['id_'.$columnName];
        }
        else{
            return null;
        }
    }

    public function getNameById($dbName, $columnName, $id){

        $query = 'SELECT * FROM '. $dbName .' WHERE id_' . $columnName . ' = (:id)';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->bindParam(':id',$id);
        $command->execute();

        if($result = $command->fetch()){
            return $result[$columnName. "_name"];
        }
        else{
            return null;
        }
    }
}

?>