<?php namespace controllers;

use models\CartLine as CartLine;
use daos\lists\CartList as CartList;
use controllers\BuyController as BuyController;

class CartController{

    protected $dao;
    public function __construct()
    {
        $this->dao=CartList::getInstance();
    }


    public function index(){

        include(ROOT. "views/cartView.php");
    }

    public function agregar($placeName, $price, $quantity){

        settype($price,"integer");
        settype($quantity,"integer");
        $finalPrice = $price * $quantity;

        $placedb = new PlaceDB();
        $place = $placedb->

        $cartLine = new CartLine($placeName, $quantity, $finalPrice);
        $this->dao->add($cartLine);

        $eventId = $_SESSION['idEvent'];
        $buyController = new BuyController();
        $buyController->index($eventId);
    }

    public function eliminar($objectCartLine){

        $this->dao->delete($objectCartLine);


    }



}

?>