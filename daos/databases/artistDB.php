<?php
namespace daos\databases;
use interfaces\IDao as IDao;
use daos\SingletonDao as SingletonDao;
use daos\databases\Connection as Connection;
use models\Artist as Artist;

class ArtistDB extends SingletonDao implements IDao
{
    
    public function __construct()
    {

    }

    public function insert($artist){

        $query = 'INSERT INTO artists (artist_name) VALUES (:name)';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $artistName = $artist->getName();
        $command->bindParam(':name',$artistName);
        if(!$this->searchByName($artistName)){

            $command->execute();
            $lastId = $connection->lastInsertId();
            return $lastId;
        }
        else{
            return null;            
        }
    }

    public function delete($artist){
        
        $query = 'DELETE FROM artists WHERE artist_name = :name';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $artistName = $artist->getName();
        $command->bindParam(':name',$artistName);
        $resultDelete = $command->execute();

        return $resultDelete;
    }

    public function update($dato, $datoNuevo){

        $query = 'UPDATE artists SET name = $datoNuevo WHERE name = $dato';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);

        $resultUpdate = $command->execute();


        return $resultUpdate;
    }

    public function retride(){

        $artistList = array();

        $query = 'SELECT * FROM artists';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->execute();

        while($result = $command->fetch()){
            
            array_push($artistList,$result['artist_name']);
        }
        return $artistList;
    }

    public function getIdByName($name){

        $query = "SELECT * FROM artists WHERE artist_name = :name";
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->bindParam(':name',$name);
        $command->execute();

        if($result = $command->fetch()){
            return $result['id_artist'];
        }
        else{
            return null;
        }
    }

    public function searchByName($name){

        $list = $this->retride();
        $flag = false;
        foreach ($list as $key => $value) {
            if($name === $value){
                $flag = true;
            }
        }
        return $flag;
    }



}
