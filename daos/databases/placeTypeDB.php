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

    public function insert($name){

        $query = 'INSERT INTO place_types (place_type_name) VALUES (:place_type_name)';
        $parameters['place_type_name'] = $name;
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
        
        /*$query = 'DELETE FROM place_types WHERE place_type_name = :name';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $name = $placeType->getname();
        $command->bindParam(':name',$name);
        $resultDelete = $command->execute();

        return $resultDelete;*/
    }

    public function update($dato, $datoNuevo){

        /*$query = 'UPDATE place_types SET name = $datoNuevo WHERE name = $dato';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);

        $resultUpdate = $command->execute();


        return $resultUpdate;*/
    }

    public function retride(){

        $query = 'SELECT * FROM place_types order by place_type_name desc';
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

        $query = "SELECT * FROM place_types where id_place_type = '$id'";
        try {
            $this->connection = Connection::getInstance();
            $this->connection->connect();
            $result = $this->connection->execute($query);
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

        $query = "SELECT * FROM place_types WHERE place_type_name = '$name'";
        try {
            $this->connection = Connection::getInstance();
            $this->connection->connect();
            $result = $this->connection->execute($query);
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
            return new PlaceType ($p['id_place_type'], $p['place_type_name']);
        }, $value);
        return count($resp) > 1 ? $resp : $resp['0'];
    }

}