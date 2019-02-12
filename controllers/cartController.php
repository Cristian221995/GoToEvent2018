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

        if(isset($_SESSION['CartList'])){
            if(empty($_SESSION['CartList'])){
                $alertError = "¡Su carrito está vacio!";
            }
        }
        else{
            $alertError = "¡Su carrito está vacio!";
        }
        include(ROOT. "views/cart.php");
    }

    public function agregar($quantity, $finalPrice, $placeName){
        
        $eventId = $_SESSION['idEvent'];
        $eventDB = new EventDB();
        $event = $eventDB->retrideById($eventId);

        $cartLine = new CartLine($placeName, $quantity, $finalPrice, $event);
        $this->dao->add($cartLine);
        
        $placeDB = new PlaceDB();
        $placeDB->updateRemainder($placeName,$quantity,$eventId);
        
        $buyController = new BuyController();
        $buyController->index($eventId);
    }

    public function eliminar($key){
        $carrito = $this->dao->getSessionCart();
        $placeName = $carrito[$key]->getPlaceName();
        $quantity = $carrito[$key]->getQuantity();
        $eventId = $carrito[$key]->getEvent()->getId();

        $placeDB = new PlaceDB();
        $placeDB->updateRemainderPlus($placeName,$quantity,$eventId);
        $this->dao->delete($key);
        $this->index();

    }



}

?>