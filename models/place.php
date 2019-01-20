<?php

namespace models;

class Place
{
    private $id;
    private $placeType;
    private $price;
    private $quantity;
    private $remainder;

    public function __construct($id, $placeType, $price, $quantity, $remainder)
    {
        $this->id=$id;
        $this->placeType=$placeType;
        $this->price=$price;
        $this->quantity=$quantity;
        $this->remainder=$remainder;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function getId(){
        return $this->id;
    }

    public function getPlaceType(){
        return $this->placeType;
    }

    public function setPlaceType($placeType){
        $this->placeType = $placeType;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price=$price;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function setQuantity($quantity){
        $this->quantity=$quantity;
    }

    public function getRemainder(){
        return $this->remainder;
    }

    public function setRemainder($remainder){
        $this->remainder=$remainder;
    }
}
?>