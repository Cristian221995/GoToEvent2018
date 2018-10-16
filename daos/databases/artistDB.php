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

    public function insert($artistName){

        $query = 'INSERT INTO artists (artist_name) VALUES (:name)';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->bindParam(':name',$artistName);
        $command->execute();

        //return $pdo->lastInsertId();/**/
    }

    public function delete($name){
        
        $query = 'DELETE FROM artists WHERE artist_name = :name';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->bindParam(':name',$name);
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
            var_dump($artistList);
        }
        return $artistList;
    }

}
