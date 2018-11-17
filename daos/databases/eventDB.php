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

        $query = 'INSERT INTO events (event_name, id_category, img_path) VALUES (:event_name, :id_category, :img_path)';
        $parameters['event_name'] = $event->getName();
        $parameters['id_category'] = $this->getCategoryIdByName($event->getCategory()->getName());
        $parameters['img_path'] = $event->getImg();
        try{
            $pdo = Connection::getInstance();
            $pdo->connect();
            $pdo->executeNonQuery($query, $parameters);
        }
        catch(\PDOException $ex){
            throw $ex;
        }
    }

    public function delete($event){
        
        /*$query = 'DELETE FROM events WHERE event_name = :name';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $eventList = $event->getName();
        $command->bindParam(':name',$eventList);
        $resultDelete = $command->execute();

        return $resultDelete;*/
    }

    public function update($dato, $datoNuevo){

        /*$query = 'UPDATE events SET name = $datoNuevo WHERE name = $dato';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);

        $resultUpdate = $command->execute();


        return $resultUpdate;*/
    }

    public function retride(){

        $query = 'SELECT * FROM events order by id_event';
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

        $query = "SELECT * FROM events where id_event = :id_event";
        $parameters['id_event'] = $id;
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

    public function getNameById($dbName, $columnName, $id){

        $query = "SELECT " . $columnName . "_name FROM " . $dbName . " WHERE id_" . $columnName . " = :id";
        $parameters['id'] = $id;
        try {
            $this->connection = Connection::getInstance();
            $this->connection->connect();
            $result = $this->connection->execute($query, $parameters);
            if($result){
                return $result[0][$columnName."_name"];
            }
            else{
                return false;
            }
        }
        catch(Exception $ex) {
            throw $ex;
        }
    }

    public function getIdByName($name){

        $query = "SELECT id_event FROM events WHERE event_name = :event_name";
        $parameters['event_name'] = $name;
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

    public function getCategoryIdByName($name){

        $query = "SELECT id_category FROM categories WHERE category_name = :category_name";
        $parameters['category_name'] = $name;
        try {
            $pdo = Connection::getInstance();
            $pdo->connect();
            $result = $pdo->execute($query, $parameters);
            if($result){
                return $result[0]['id_category'];
            }
            else{
                return false;
            }
        }
        catch(Exception $ex) {
            throw $ex;
        }
    }

    public function searchByName($name){        //Funciona bien

        $query = "SELECT * FROM events WHERE event_name = :event_name";
        $parameters['event_name'] = $name;
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
            return new Event ($p['event_name'], $p['id_category'], $p['img_path']);
        }, $value);
        return count($resp) > 1 ? $resp : $resp['0'];
    }
}

?>