<?php 
namespace daos\lists;
use interfaces\IDao as IDao;
use daos\SingletonDao as SingletonDao;
use controllers\CartController as CartController;

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
        $flag = 0;

        if (!isset($_SESSION)) {
            session_start();
        }
        $arrayCart = $this->getSessionCart();
        foreach ($arrayCart as $key => $value) {
            if($value->getEvent()->getName() === $objectCart->getEvent()->getName() && $value->getPlaceName() === $objectCart->getPlaceName()){
                $value->sumQuantity($objectCart->getQuantity());
                $value->sumFinalPrice($objectCart->getFinalPrice());
                $flag = 1;
            }
        }
        if($flag == 0){
            array_push($arrayCart,$objectCart);
        }
        $this->setSessionCart($arrayCart);

    }

    public function delete($key) {
        if($key == 0){
            unset($_SESSION['CartList'][0]);
        }else{
            unset($_SESSION['CartList'][$key]);
        }
        sort($_SESSION['CartList']);

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