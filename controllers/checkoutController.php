<?php namespace controllers;
class CheckoutController {
    public function __construct() {
    }
    public function index() {
        $ticketController = new \controllers\ticketsController();
        $cartcontroller = new \controllers\cartController();
        $eventPlaceController = new \controllers\eventPlaceController();
        $calendarController = new \controllers\calendarController();
        $qr = new \models\Qr_barcode();
        if (isset($_SESSION['CartList'])) {
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $fechanow = date("Y-m-d H:i:s");
            $user = $_SESSION['user'];
            $email = $user->getEmail();
            $name = $user->getUserName();
            if (is_array($_SESSION['CartList'])) {
                $carrito = count($_SESSION['CartList']);
                $i=1;
                while ($i<$carrito) {
                    $nro_ticket = rand(0,999999999);
                    var_dump($_SESSION['CartList']);
                    $event = $_SESSION['CartList'][$i]->getEvent()->getName();
                    $place = $_SESSION['CartList'][$i]->getPlaceName();
                     $qr->text("Gracias por la compra en TicketMaster
                                Numero de ticket: $nro_ticket
                                Fecha de compra: $fechanow
                                Evento: $event
                                Plaza: $place
                                Nombre: $name
                                Email: $email");
            $imageDirectory = ROOT . "img/qr" . '/';
            if (!file_exists($imageDirectory)) {
                mkdir($imageDirectory);
            }
            $namear = str_replace(array("\\", "¨", "º", "-", "~", "#", "@", "|", "!", "\"", "·", "$", "%", "&", "/", "(", ")", "?", "'", "¡", "¿", "[", "^", "<code>", "]", "+", "}", "{", "¨", "´", ">", "< ", ";", ",", ":", ".", " "), '', $nro_ticket);
            $ruta = "img/qr" . '/' . $namear . ".png";
            $file = $imageDirectory . $namear . ".png";
            $qr->qrCode(300, $file);
            $ticketController->insert($nro_ticket,$ruta);
            $i++;
                 }
            } else {
                $nro_ticket = rand(0,999999999);
                $event = $_SESSION['CartList'][$i]->getEvent()->getName();
                $place = $_SESSION['CartList'][$i]->getPlaceName();
                    $qr->text("Gracias por la compra en TicketMaster
                    Numero de ticket: $nro_ticket
                    Fecha de compra: $fechanow
                    Evento: $event
                    Plaza: $place
                    Nombre: $name
                    Email: $email");
            $imageDirectory = ROOT . "img/qr" . '/';
            if (!file_exists($imageDirectory)) {
                mkdir($imageDirectory);
            }
            $namear = str_replace(array("\\", "¨", "º", "-", "~", "#", "@", "|", "!", "\"", "·", "$", "%", "&", "/", "(", ")", "?", "'", "¡", "¿", "[", "^", "<code>", "]", "+", "}", "{", "¨", "´", ">", "< ", ";", ",", ":", ".", " "), '', $fechanow);
            $ruta = "img/qr" . '/' . $namear . ".png";
            $file = $imageDirectory . $namear . ".png";
            $qr->qrCode(300, $file);
            $ticketController->insert($nro_ticket,$ruta);
            
        unset($_SESSION['CartList']);  
        }
        $url = URl;
        echo "<script type=\"text/javascript\">alert('Muchas gracias por tu compra!');</script>";

        //$this->ticketController->index();
        
    }
}
}
?>
