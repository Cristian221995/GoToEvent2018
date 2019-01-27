<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= FRONT_ROOT ?>css/form.css">
    <title>Buy Tickets</title>
</head>
<body id="LoginForm">
    <header>
        <div id="logo" class="pull-left">
            <!-- Uncomment below if you prefer to use a text logo -->
            <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
            <a href="<?= FRONT_ROOT ?>index" class="scrollto"><img src="<?= FRONT_ROOT ?>img/logo3.png" alt="GoToEvent" title=""></a>
        </div>
    </header>

    <div class="container">
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Comprar Tickets</h2>
                    <p>Precio de las entradas: </p>
                    <?php foreach ($place as $key => $value) { ?>
                        - <strong><?=$value->getPlaceType()->getName()?>: $<?=$value->getPrice()?></strong><br>
                    <?php } ?>
                    <br><select class="custom-select my-1 mr-sm-2" name="entrance" required>
                            <option disabled selected value="">Seleccione entrada a comprar: </option>
                            <?php
                            foreach ($place as $key => $value) { ?>
                                <option value="<?= $value->getPrice(); ?>"><?= $value->getPlaceType()->getName() . " / Entradas Restantes: " . $value->getRemainder()?></option>
                            <?php } ?>
                    </select>
                    <br><br><label for="">Ingrese cantidad de entradas a comprar: </label>
                    <input type="text" name="quantity" required><br><br>
                    <a href="#" class="btn btn-danger btn-block" role="button" aria-pressed="true">Agregar al carrito</a>
                    <a href="<?= FRONT_ROOT ?>index" class="btn btn-danger btn-block" role="button" aria-pressed="true">Volver al menu principal</a>
                </div>
            </div> 
        </div>
    </div>

</body>
</html>