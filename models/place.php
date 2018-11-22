<?php

namespace models;

class Place
{
    private $calendar;
    private $placeTypeList;
    private $price;
    private $quantity;
    private $remainder;

    public function __construct($calendar, $placeTypeList, $price, $quantity, $remainder)
    {
            $this->calendar=$calendar;
            $this->placeTypeList=$placeTypeList;
            $this->price=$price;
            $this->quantity=$quantity;
            $this->remainder=$remainder;
    }

    public function getCalendar(){
        return $this->calendar;
    }

    public function setCalendar($calendar){
        $this->calendar=$calendar;
    }

    public function getPlaceTypeList(){
        return $this->placeTypeList;
    }

    public function setPlaceType($placeTypeList){
        foreach ($placeTypeList as $key => $value) {
            array_push($this->placeTypeList, $value);
        }
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