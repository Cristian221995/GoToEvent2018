<?php

namespace daos\databases;
use interfaces\IDao as IDao;
use daos\SingletonDao as SingletonDao;
use daos\databases\Connection as Connection;
use models\Event as Event;
use models\Category as Category;

class EventDB extends SingletonDao implements IDao{

    public function __construct(){

    }

    public function insert($event){

        $query = 'INSERT INTO events (event_name, id_category, img_path) VALUES (:event_name, :id_category, :img_path)';
        $parameters['event_name'] = $event->getName();
        $parameters['id_category'] = $this->getCategoryIdByName($event->getCategory());
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

    public function delete($eventId){
        
        $query = "DELETE FROM events WHERE id_event = '$eventId'";
        try{
            $pdo = Connection::getInstance();
            $pdo->connect();
            $result = $pdo->execute($query);
        }
        catch(\PDOException $ex){
            throw $ex;
        }
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

        $query = 
        'SELECT
            e.id_event,
            e.event_name,
            e.img_path,
            c.id_category,
            c.category_name 
        FROM 
            events e inner join categories c on e.id_category = c.id_category 
        ORDER BY 
            id_event';
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

    $query = 
        "SELECT
            e.id_event,
            e.event_name,
            e.img_path,
            c.id_category,
            c.category_name 
        FROM 
            events e inner join categories c on e.id_category = c.id_category
        WHERE
            e.id_event = '$id'
        ORDER BY 
            id_event";
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

    public function retrideByCategory($category){
        
        $query = 
        "SELECT
            e.id_event,
            e.event_name,
            e.img_path,
            c.id_category,
            c.category_name 
        FROM 
            events e inner join categories c on e.id_category = c.id_category
        WHERE
            c.category_name = '$category'
        ORDER BY 
            id_event";
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

    public function getByName($name){

        $query = "SELECT e.id_event,
        e.event_name,
        e.img_path,
        c.id_category,
        c.category_name  FROM  events e inner join categories c on e.id_category = c.id_category WHERE e.event_name = '$name'";
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

    public function getCategoryIdByName($name){

        $query = "SELECT id_category FROM categories WHERE category_name = '$name'";
        try {
            $pdo = Connection::getInstance();
            $pdo->connect();
            $result = $pdo->execute($query);
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

    public function getNextEvents(){

        $query = "SELECT id_event, calendar_name FROM calendars GROUP BY id_event ORDER BY calendar_name asc limit 6";

        try {
            $this->connection = Connection::getInstance();
            $this->connection->connect();
            $result = $this->connection->execute($query);
        }catch(Exception $ex){
            throw $ex;
        }

    }

    public function searchByName($name){        //Funciona bien

        $query = "SELECT * FROM events WHERE event_name = '$name'";
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
            $category = new Category($p['id_category'], $p['category_name']);
            return new Event($p['id_event'], $p['event_name'], $category, $p['img_path']);
        }, $value);
        return count($resp) > 1 ? $resp : $resp['0'];
    }



}

?>