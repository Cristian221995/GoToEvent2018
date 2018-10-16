<?php

namespace daos\databases;

class Connection{

    function __construct(){

    }

    public function connect(){

        try{
            return new \PDO("mysql:host=".HOST."; dbname=".DB, USER, PASS);
        }
        catch(PDOException $e){

            echo "Connection failed: " . $e->getMessage();
            throw $e;
        }
    }
}

?>