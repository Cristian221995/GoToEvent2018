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
    <title>Crear categoria</title>
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
                <?php var_dump($event->getCalendar());?>
                    <h2><?=$event->getName()?></h2><br>
                    <p>Nombre del evento: <?= $event->getName() ?></p>
                    <p>Categoria: <?= $event->getCategory()->getName() ?></p>
                    <p>Lugar a realizarse: <?= $event->getCalendar()[0]->getEventPlace()->getName() ?></p>
                    <p>Capacidad: <?= $event->getCalendar()[0]->getEventPlace()->getCapacity() ?></p>
                    <p>Inicio de evento: <?= $event->getCalendar()[0]->getEventDate() ?></p>
                    <p>Final de evento: <?= $event->getCalendar()[$length]->getEventDate() ?></p>
                    <?php foreach ($event->getCalendar() as $key => $value) { ?>
                        <p>Dia: <?=$value->getEventDate() ?></p>
                        <?php foreach ($value->getArtistList() as $key => $value) { ?>
                            <p>- <?= $value->getName() ?></p>
                        <?php }
                    }?>
                </div>
                <div>
                
                <a href="<?=FRONT_ROOT?>Event/buyTickets/<?=$id?>" class="btn btn-danger btn-block" role="button" aria-pressed="true">Comprar tickets</a>
                <a href="<?= FRONT_ROOT ?>index" class="btn btn-danger btn-block" role="button" aria-pressed="true">Volver al menu principal</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>