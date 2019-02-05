<?php namespace models;

class CartLine {
    private $placeName;
    private $quantity;
    private $finalPrice;


    public function __construct($placeName, $quantity, $finalPrice){
        $this->placeName=$placeName;
        $this->quantity=$quantity;
        $this->finalPrice=$finalPrice;
    }

    public function getPlaceName(){
        return $this->placeName;
    }

    public function getQuantity(){
        return $this->quantity;
    }
    
    public function getFinalPrice(){
        return $this->finalPrice;
    }

}


?>