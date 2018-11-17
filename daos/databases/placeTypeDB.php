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

        $query = 'INSERT INTO place_types (place_type_description) VALUES (:place_type_description)';
        $parameters['place_type_description'] = $placeType->getDescription();
        try{
            $pdo = Connection::getInstance();
            $pdo->connect();
            $pdo->executeNonQuery($query, $parameters);
        }
        catch(\PDOException $ex){
            throw $ex;
        }
    }

    public function delete($placeType){
        
        /*$query = 'DELETE FROM place_types WHERE place_type_description = :description';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $description = $placeType->getDescription();
        $command->bindParam(':description',$description);
        $resultDelete = $command->execute();

        return $resultDelete;*/
    }

    public function update($dato, $datoNuevo){

        /*$query = 'UPDATE place_types SET description = $datoNuevo WHERE description = $dato';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);

        $resultUpdate = $command->execute();


        return $resultUpdate;*/
    }

    public function retride(){

        $query = 'SELECT * FROM place_types order by id_place_type';
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

        $query = "SELECT * FROM place_types where id_place_type = :id_place_type";
        $parameters['id_place_type'] = $id;
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

    public function getIdByDescription($description){

        $query = "SELECT id_place_type FROM place_types WHERE place_type_description = :place_type_description";
        $parameters['place_type_description'] = $description;
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
            return new PlaceType ($p['place_type_description']);
        }, $value);
        return count($resp) > 1 ? $resp : $resp['0'];
    }

}