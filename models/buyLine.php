<?php
namespace models;
class BuyLine
{
    private $buyList;       //array de compras (buy)
    private $finalPrice;

    public function __construct($buyList, $finalPrice)
    {
        $this->buyList=$buyList;
        $this->finalPrice=$finalPrice;
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
}
?>