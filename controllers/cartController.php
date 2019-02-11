<?php namespace controllers;

use models\CartLine as CartLine;
use daos\lists\CartList as CartList;
use controllers\BuyController as BuyController;
use daos\databases\PlaceDB as PlaceDB;
use daos\databases\EventDB as EventDB;
use controllers\IndexController as IndexController;

class CartController{

    protected $dao;
    public function __construct()
    {
        $this->dao=CartList::getInstance();
    }


    public function index(){

        include(ROOT. "views/cart.php");
    }

    public function agregar($quantity, $finalPrice, $placeName){
        
        $eventId = $_SESSION['idEvent'];
        $eventDB = new EventDB();
        $event = $eventDB->retrideById($eventId);

        $cartLine = new CartLine($placeName, $quantity, $finalPrice, $event);
        $this->dao->add($cartLine);

        
        $buyController = new BuyController();
        $buyController->index($eventId);
    }

    public function eliminar($key){

        echo "Key: ".$key;
        $this->dao->delete($key);
        //$this->index();

    }



}

?>