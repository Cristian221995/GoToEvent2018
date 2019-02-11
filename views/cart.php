<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= FRONT_ROOT ?>css/cart.css">
    <!-- Bootstrap core CSS -->
    <link href="<?=FRONT_ROOT?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=FRONT_ROOT?>css/shop-item.css" rel="stylesheet">

    <!-- Favicons -->
    <link href="<?=FRONT_ROOT?>images/icons/favicon.ico" rel="icon">
    <link href="<?=FRONT_ROOT?>img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="<?=FRONT_ROOT?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="<?=FRONT_ROOT?>lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=FRONT_ROOT?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?=FRONT_ROOT?>lib/venobox/venobox.css" rel="stylesheet">
    <link href="<?=FRONT_ROOT?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="<?=FRONT_ROOT?>css/style.css" rel="stylesheet">
    <title>Cart</title>
    <style>
        body{
            background-image: url("https://previews.123rf.com/images/davidfranklinstudioworks/davidfranklinstudioworks1603/davidfranklinstudioworks160300042/54149988-admit-one-cinema-tickets-background-with-one-unique-blue-ticket.jpg");)
            background-repeat:no-repeat; 
            background-position:center; 
            background-size:cover;
        }
    </style>
</head>
<body>
    <?php
    if(isset($_SESSION["user"])){
            if($_SESSION["user"]->getRole()==="user"){
                include(ROOT . "views/headerUser.php");
            }
            else{
                include(ROOT . "views/headerAdmin.php");
            }
        }
        else{
            include(ROOT . "views/headerNotLogued.php");
        }
    ?><br><br>
    <div class="container">
        <h2 class="title">Carrito</h2>
        <div class="box">
        <?php $sum = 0; ?>
        <?php foreach ($_SESSION['CartList'] as $key => $value) { ?>
                        <div class="cart-item">
                        <strong>Título de evento: </strong><p><?= $value->getEvent()->getName();?></p><br>
                        <strong>Nombre de plaza: </strong><p><?= $value->getPlaceName();?></p>
                        <strong>Cantidad: </strong><p><?= $value->getQuantity(); ?></p><br>
                        <strong>Precio: </strong><p><?= $value->getFinalPrice();?></p>
                        <?php  
                                $price = $value->getFinalPrice();
                                 $fPrice = explode(" ",$price); 
                                $sum = $sum + $fPrice[1];
                                 ?>
                        <form action="<?=FRONT_ROOT?>Cart/eliminar" method="post">
                            <input type= hidden name="keyList" value="<?=$key?>">
                            <button type="submit" name="button" class="btn btn-danger btn-block">Eliminar</button>
                        </form>
                    </div>
        <?php } ?>

            <div class="cart-item">
                <strong>Precio final: </strong><p>AR$ <?= $sum?></p><br>
                <form action="<?=FRONT_ROOT?>Checkout" method="post">
                    <button type="submit" name="button" class="btn btn-danger btn-block">Finalizar compra</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>