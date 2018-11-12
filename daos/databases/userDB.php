<?php

namespace daos\databases;
use interfaces\IDao as IDao;
use daos\SingletonDao as SingletonDao;
use daos\databases\Connection as Connection;
use models\User as User;

class UserDB extends SingletonDao implements IDao{

    public function __construct()
    {

    }

    public function insert($user){

        $query = 'INSERT INTO users (user_email, user_name, user_pass, user_role) VALUES (:email, :userName, :pass, :role)';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $userEmail = $user->getEmail();
        $userName = $user->getUserName();
        $userPass = $user->getPass();
        $userRole = $user->getRole();
        $command->bindParam(':email',$userEmail);
        $command->bindParam(':userName',$userName);
        $command->bindParam(':pass',$userPass);
        $command->bindParam(':role',$userRole);
        echo $userEmail."<br>";
        echo $userName."<br>";
        echo $userPass."<br>";
        echo $userRole."<br>";
        $command->execute();
        $lastId = $connection->lastInsertId();
        return $lastId;
    }

    public function delete($user){
        
        $query = 'DELETE FROM users WHERE user_name = :userName';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $userName = $user->getUserName();
        $command->bindParam(':userName',$userName);
        $resultDelete = $command->execute();

        return $resultDelete;
    }

    public function update($dato, $datoNuevo){

    }

    public function retride(){

        $userList = array();

        $query = 'SELECT * FROM users order by id_user';

        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $command->execute();

        while($result = $command->fetch()){
            
            $userData = array();
            array_push($userData,$result['user_email']);
            array_push($userData,$result['user_name']);
            array_push($userData,$result['user_pass']);
            array_push($userData,$result['user_role']);
            array_push($userList,$userData);
        }
        return $userList;
    }
    
}


?>