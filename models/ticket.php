<?php

namespace models;

class Ticket
{
    private $number;
    private $qrCode;

    public function __construct($number, $qrCode)
    {
        $this->number=$number;
        $this->qrCode=$qrCode;
    }

    public function getNumber(){
        return $this->number;
    }

    public function setNumber($number){
        $this->number=$number;
    }

    public function getQrCode(){
        return $this->qrCode;
    }

    public function setQrCode($qrCode){
        $this->qrCode=$qrCode;
    }
}
?>