<?php 
namespace daos\lists;
use interfaces\IDao as IDao;
use daos\SingletonDao as SingletonDao;

class CartList extends SingletonDao implements IDao
{

    private $list;
    public function __construct() {
        $this->list = array();
    }
    public function getSessionCart() {
        if (!isset($_SESSION['CartList'])) {
            $_SESSION['CartList'] = array();
        }
        return $_SESSION['CartList'];
    }

    public function setSessionCart($value) {
        $_SESSION['CartList'] = $value;
    }

    public function add($objectCart) {
        if (!isset($_SESSION)) {
            session_start();
        }
        $arrayCart = $this->getSessionCart();
        array_push($arrayCart,$objectCart);
        $this->setSessionCart($arrayCart);

    }

    public function delete($objectCart) {
        $arrayCart = $this->getSessionCart();
        foreach ($arrayCart as $key => $value) {
            if($i == $value){
                unset($arrayCart[$key]);
                $this->setSessionCart($arrayCart);
            }
        }
    }
    public function update($dato, $datonuevo) {
        // TODO: Implement updateArtist() method.
        
    }
    public function insert($dato){}
    public function retride(){}

    function returnList() {
        return $this->list;
    }



}


?>