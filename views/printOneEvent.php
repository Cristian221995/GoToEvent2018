<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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
    ?>
      <br>
      <br>
      
    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
          <h1 class="my-4">Informacion del evento:</h1>
          
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div class="card mt-4">
            <?php if(is_array($data)){ ?>
            <!--No muestra la foto del evento-->
            <img class="card-img-top img-fluid" src="<?=$data[0]->getEvent()->getImg()?>" alt="">
            <div class="card-body">
              <h3 class="card-title"><?=$data[0]->getEvent()->getName()?></h2>
            </div>
          </div>
          <!-- /.card -->

          <div class="card card-outline-secondary my-4">
            <div class="card-header">
                    <p>Categoria: <?= $data[0]->getEvent()->getCategory()->getName() ?></p>
                    <p>Lugar a realizarse: <?= $data[0]->getEventPlace()->getName() ?></p>
                    <p>Capacidad: <?= $data[0]->getEventPlace()->getCapacity() ?></p>
                    <p>Inicio de evento: <?= $data[0]->getEventDate() ?></p>
                    <p>Final de evento: <?= $data[$length]->getEventDate() ?></p>
                    <?php foreach ($data as $key => $value) { ?>
                        <p>Dia: <?=$value->getEventDate() ?></p>
                        <?php foreach ($value->getArtistList() as $key => $value) { ?>
                            <p>- <?= $value->getName() ?></p>
                        <?php }
                    }
                } 
                else{ ?>
                    <h2><?=$data->getEvent()->getName()?></h2><br>
                    <p>Nombre del evento: <?= $data->getEvent()->getName() ?></p>
                    <p>Categoria: <?= $data->getEvent()->getCategory()->getName() ?></p>
                    <p>Lugar a realizarse: <?= $data->getEventPlace()->getName() ?></p>
                    <p>Inicio de evento: <?= $data->getEventDate() ?></p>
                    <p>Final de evento: <?= $data->getEventDate() ?></p>
                    <p>Dia: <?= $data->getEventDate() ?></p>
                    <p>- <?= $data->getArtistList()->getName() ?></p>
                <?php } ?>
            </div>
            <div class="card-body">
                <div>
                  <a href="" class="btn btn-success" role="button" aria-pressed="true">Comprar tickets</a>
                </div>
            </div>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>

    
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; GoToEvent 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?=FRONT_ROOT?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=FRONT_ROOT?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
