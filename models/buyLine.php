<?php
namespace models;
class Buy
{
    private $buyList;
    private $finalPrice;
    private $place;
    private $quantity;

    public function __construct($buyList, $finalPrice, $place, $quantity)
    {
        $this->buyList=$buyList;
        $this->finalPrice=$finalPrice;
        $this->place=$place;
        $this->quantity=$quantity;
    }

    public function getBuyList(){
        return $this->buy;
    }

    public function setBuyList($buyList){

        foreach ($buyList as $key => $value) {
            array_push($this->buyList, $value);
        }
    }

    public function getFinalPrice(){
        return $this->finalPrice;
    }

    public function setFinalPrice($finalPrice){
        $this->finalPrice=$finalPrice;
    }

    public function getPlace(){
        return $this->place;
    }

    public function setPlace($place){
        $this->place=$place;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function setQuantity($quantity){
        $this->quantity=$quantity;
    }
}
?>