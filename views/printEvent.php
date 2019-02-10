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
        <title>Informacion del evento</title>

        
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
    </head>
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
    ?>
      <br>
      <br>
        <div class="container">
            <div class="login-form">
                <div class="main-div">
                    <div class="panel">
                        <div class="title">
                            <h2><?=$event->getName()?></h2><br>
                        </div>  
                        <p><span>Nombre del evento:</span> <?= $event->getName() ?></p>
                        <p><span>Categoria:</span> <?= $event->getCategory()->getName() ?></p>
                        <p><span>Lugar a realizarse:</span> <?= $event->getCalendar()[0]->getEventPlace()->getName() ?></p>
                        <p><span>Capacidad:</span> <?= $event->getCalendar()[0]->getEventPlace()->getCapacity() ?></p>
                        <p><span>Inicio de evento:</span> <?= $event->getCalendar()[0]->getEventDate() ?></p>
                        <p><span>Final de evento:</span> <?= $event->getCalendar()[$length]->getEventDate() ?></p>
                        <?php foreach ($event->getCalendar() as $key => $value) { ?>
                            <p><span>Dia:</span> <?=$value->getEventDate() ?></p>
                            <?php foreach ($value->getArtistList() as $key => $value) { ?>
                                <p>- <?= $value->getName() ?></p>
                            <?php }
                        }?>
                    </div>
                    
                    
                    <?php if(isset($_SESSION['user'])){ 
                            if($_SESSION['user']->getRole()=="user"){ ?>
                                <a href="<?=FRONT_ROOT?>Buy/index/<?=$id?>" class="btn btn-danger btn-block" role="button" aria-pressed="true">Comprar Tickets</a>
                        <?php }
                        else{ ?>
                            <a href="<?= FRONT_ROOT ?>Event/delete/<?=$id?>" class="btn btn-danger btn-block" role="button" aria-pressed="true">Eliminar Evento</a>
                    <?php }
                    } ?>
                    <a href="<?= FRONT_ROOT ?>index" class="btn btn-danger btn-block" role="button" aria-pressed="true">Volver al menú principal</a>
                    
                </div>
            </div>
            <div class="image-box">
                <p class="image-info">Imagen del evento: </p>    
                <img width="100%" src="<?= FRONT_ROOT.$event->getImg()?>" alt="Imagen del evento">
            </div>
        </div>
    </body>
</html>