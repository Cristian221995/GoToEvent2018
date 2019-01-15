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

        $query = 'INSERT INTO users (user_email, user_name, user_pass, user_role) VALUES (:user_email, :user_name, :user_pass, :user_role)';
        $parameters['user_email'] = $user->getEmail();
        $parameters['user_name'] = $user->getUserName();
        $parameters['user_pass'] = $user->getPass();
        $parameters['user_role'] = $user->getRole();
        try{
            $pdo = Connection::getInstance();
            $pdo->connect();
            $pdo->executeNonQuery($query, $parameters);
        }
        catch(\PDOException $ex){
            throw $ex;
        }
    }

    public function delete($user){
        
        /*$query = 'DELETE FROM users WHERE user_name = :userName';
        $pdo = new Connection();
        $connection = $pdo->Connect();
        $command = $connection->prepare($query);
        $userName = $user->getUserName();
        $command->bindParam(':userName',$userName);
        $resultDelete = $command->execute();

        return $resultDelete;*/
    }

    public function update($dato, $datoNuevo){

    }

    public function retride(){

        $query = 'SELECT * FROM users order by id_user';
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

        $query = "SELECT * FROM users where id_user = '$id'";
        try {
            $pdo = Connection::getInstance();
            $pdo->connect();
            $result = $pdo->execute($query);
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

    public function retrideByUsername($username){

        $query = "SELECT * FROM users WHERE user_name = '$username'";
        try {
            $pdo = Connection::getInstance();
            $pdo->connect();
            $result = $pdo->execute($query);
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
            return new User ($p['id_user'], $p['user_email'], $p['user_name'], $p['user_pass'], $p['user_role']);
        }, $value);
        return count($resp) > 1 ? $resp : $resp['0'];
    }
    
}


?>