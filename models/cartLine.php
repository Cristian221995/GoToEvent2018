<?php namespace models;

class CartLine {

    private $placeName;
    private $quantity;
    private $finalPrice;
    private $event;

    public function __construct($placeName, $quantity, $finalPrice, $event){
        
        $this->placeName=$placeName;
        $this->quantity=$quantity;
        $this->finalPrice=$finalPrice;
        $this->event = $event;
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

    public function getEvent(){
        return $this->event;
    }

    public function sumQuantity($quantityPlus){
        $this->quantity +=  $quantityPlus;
    }
    public function sumFinalPrice($finalPricePlus){
        $price = $this->finalPrice;
        $fPrice = explode(" ",$price); 
        $fPrice2 = explode(" ",$finalPricePlus); 
        $this->finalPrice =  $fPrice[1] + $fPrice2[1];
        $this->finalPrice = "AR$" . " " .  $this->getFinalPrice();
    }

}


?>