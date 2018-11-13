<?php

namespace daos\databases;
use interfaces\IDao as IDao;
use daos\SingletonDao as SingletonDao;
use daos\databases\Connection as Connection;
use models\PlaceType as PlaceType;

class PlaceTypeDB extends SingletonDao implements IDao
{
    
    public function __construct()
    {

    }

    public function insert($placeType){

        $query = 'INSERT INTO place_types (place_type_description) VALUES (:description)';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $description = $placeType->getDescription();
        $command->bindParam(':description',$description);
        $command->execute();
        $lastId = $connection->lastInsertId();
        return $lastId;
    }

    public function delete($placeType){
        
        $query = 'DELETE FROM place_types WHERE place_type_description = :description';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $description = $placeType->getDescription();
        $command->bindParam(':description',$description);
        $resultDelete = $command->execute();

        return $resultDelete;
    }

    public function update($dato, $datoNuevo){

        $query = 'UPDATE place_types SET name = $datoNuevo WHERE name = $dato';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);

        $resultUpdate = $command->execute();


        return $resultUpdate;
    }

    public function retride(){

        $placeTypeList = array();

        $query = 'SELECT * FROM place_types order by id_place_type';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->execute();

        while($result = $command->fetch()){
            
            array_push($placeTypeList,$result['place_type_description']);
        }
        return $placeTypeList;
    }

}