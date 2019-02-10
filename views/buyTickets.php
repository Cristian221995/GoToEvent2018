<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= FRONT_ROOT ?>css/formStyle.css">
    <title>Buy Tickets</title>
</head>

<script>
    function calcularTotal(){
        var num1 = document.form.entrance.value;
        var num2 = document.form.quantity.value;
        var resultado = parseInt(num1)*parseInt(num2);
        document.form.finalPrice.value="AR$ "+resultado;
    }
</script>

<body id="LoginForm">
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
    ?><br><br><br>

    <div class="container">
        <div class="login-form-all">
            <div class="main-div-all">
                <div class="panel">
                    <form action="" method="post" id="form" name="form">
                        <h2>Comprar Tickets</h2>
                        <p>Precio de las entradas: </p>
                        <?php foreach ($place as $key => $value) { ?>
                            - <strong><?=$value->getPlaceType()->getName()?>: AR$ <?=$value->getPrice()?></strong><br>
                        <?php } ?>
                        <br><select class="custom-select my-1 mr-sm-2" name="entrance" required OnKeyUp="calcularTotal()">
                                <option disabled selected value="">Seleccione entrada a comprar: </option>
                                <?php
                                foreach ($place as $key => $value) { ?>
                                    <option value="<?= $value->getPrice(); ?>"><?= $value->getPlaceType()->getName() . " / Entradas Restantes: " . $value->getRemainder()?></option>
                                <?php } ?>
                        </select>
                        <br><br><label for="">Ingrese cantidad de entradas a comprar: </label><br>
                        <input type="text" name="quantity" required OnKeyUp="calcularTotal()"><br><br>
                        <label for=""><strong>Precio Final: </strong></label>
                        <input type="text" name="finalPrice" disabled ><br><br>
                        <button type="submit" class="btn btn-danger btn-block">Agregar al carrito</button>
                        <a href="<?= FRONT_ROOT ?>index" class="btn btn-danger btn-block" role="button" aria-pressed="true">Volver al menu principal</a>
                    </form>
                </div>
            </div> 
        </div>
    </div>

</body>
</html>