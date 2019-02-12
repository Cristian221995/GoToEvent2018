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
                $i=0;
                while ($i<=$carrito) {
                    if(isset($_SESSION['CartList'][$i])){
                        $nro_ticket = rand(0,999999999);
                        $_SESSION["auxData"]["nroTicket"][$i] = $nro_ticket;
                        $event = $_SESSION['CartList'][$i]->getEvent()->getName();
                        $place = $_SESSION['CartList'][$i]->getPlaceName();
                        $quantity = $_SESSION['CartList'][$i]->getQuantity();
                         $qr->text("Gracias por la compra en GoToEvent!
                                    Numero de ticket: $nro_ticket --
                                    Fecha de compra: $fechanow --
                                    Evento: $event --
                                    Plaza: $place --
                                    Cantidad: $quantity --
                                    Nombre: $name --
                                    Email: $email");
                $imageDirectory = ROOT . "img/qr" . '/';
                if (!file_exists($imageDirectory)) {
                    mkdir($imageDirectory);
                }
                $namear = str_replace(array("\\", "¨", "º", "-", "~", "#", "@", "|", "!", "\"", "·", "$", "%", "&", "/", "(", ")", "?", "'", "¡", "¿", "[", "^", "<code>", "]", "+", "}", "{", "¨", "´", ">", "< ", ";", ",", ":", ".", " "), '', $nro_ticket);
                $ruta = "img/qr" . '/' . $namear . ".png";
                $_SESSION["auxData"]["qr"][$i] = $ruta;
                $file = $imageDirectory . $namear . ".png";
                $qr->qrCode(300, $file);
                $ticketController->insert($nro_ticket,$ruta);
                    }
                    $i++;
                 }
            } else {
                $nro_ticket = rand(0,999999999);
                        $_SESSION["auxData"]["nroTicket"][$i] = $nro_ticket;
                        $event = $_SESSION['CartList'][$i]->getEvent()->getName();
                        $place = $_SESSION['CartList'][$i]->getPlaceName();
                        $quantity = $_SESSION['CartList'][$i]->getQuantity();
                         $qr->text("Gracias por la compra en GoToEvent!
                                    Numero de ticket: $nro_ticket --
                                    Fecha de compra: $fechanow --
                                    Evento: $event --
                                    Plaza: $place --
                                    Cantidad: $quantity --
                                    Nombre: $name --
                                    Email: $email");
                $imageDirectory = ROOT . "img/qr" . '/';
                if (!file_exists($imageDirectory)) {
                    mkdir($imageDirectory);
                }
                $namear = str_replace(array("\\", "¨", "º", "-", "~", "#", "@", "|", "!", "\"", "·", "$", "%", "&", "/", "(", ")", "?", "'", "¡", "¿", "[", "^", "<code>", "]", "+", "}", "{", "¨", "´", ">", "< ", ";", ",", ":", ".", " "), '', $nro_ticket);
                $ruta = "img/qr" . '/' . $namear . ".png";
                $_SESSION["auxData"]["qr"][$i] = $ruta;
                $file = $imageDirectory . $namear . ".png";
                $qr->qrCode(300, $file);
                $ticketController->insert($nro_ticket,$ruta);
        }
        include(ROOT."views/ticket.php");
        unset($_SESSION['CartList']);
        
    }
}
}
?>
