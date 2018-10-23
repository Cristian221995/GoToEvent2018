<?php

namespace daos\databases;
use interfaces\IDao as IDao;
use daos\SingletonDao as SingletonDao;
use daos\databases\Connection as Connection;
use models\Category as Category;

class CategoryDB extends SingletonDao implements IDao{

    public function __construct(){

    }

    public function insert($category){

        $query = 'INSERT INTO categories (category_name) VALUES (:name)';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $categoryName = $category->getName();
        $command->bindParam(':name',$categoryName);
        $command->execute();

        //return $pdo->lastInsertId();/**/
    }

    public function delete($category){
        
        $query = 'DELETE FROM categories WHERE category_name = :name';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $categoryName = $category->getName();
        $command->bindParam(':name',$categoryName);
        $resultDelete = $command->execute();

        return $resultDelete;
    }

    public function update($dato, $datoNuevo){

        $query = 'UPDATE categories SET name = $datoNuevo WHERE name = $dato';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);

        $resultUpdate = $command->execute();


        return $resultUpdate;
    }

    public function retride(){

        $categoryList = array();

        $query = 'SELECT * FROM categories order by id_category';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->execute();

        while($result = $command->fetch()){
            
            array_push($categoryList,$result['category_name']);
            var_dump($categoryList);
        }
        return $categoryList;
    }

    public function getIdByName($name){

        $query = "SELECT * FROM categories WHERE category_name = :name";
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->bindParam(':name',$name);
        $command->execute();

        if($result = $command->fetch()){
            return $result['id_category'];
        }
        else{
            return null;
        }
    }
}

?>