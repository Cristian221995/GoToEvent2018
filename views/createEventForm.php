
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src=" //maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/form.css">
    <title>Crear evento</title>

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
<header>
</header>
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
?><br><br>
    <div class="container">
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Nuevo Evento</h2>
                </div>
              <!--  <?php if(isset($alert)) { ?>
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="position: absolute; width: 90%; margin: 5%; top: 0; left: 0;">
                    <small><?= $alert ?></small>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
                /*<?php } ?>-->
                <form action="Event/index2" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Nombre del evento:" required>
                    </div>

                    <div class="form-group">
                        <select class="custom-select my-1 mr-sm-2" name="category" required>
                            <option disabled selected value="">Elige una categoría: </option>
                            <?php
                            if($listCategory){
                                foreach ($listCategory as $key => $value) { ?>
                                    <option value="<?php echo $value->getName(); ?>"><?php echo $value->getName(); ?></option>
                                <?php }  
                            }
                            else{
                                echo "No hay nada";
                            } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label> Fecha de comienzo del evento </label>
                        <input type="date" name="eventDateStart" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label> Fecha de final del evento </label>
                        <input type="date" name="eventDateFinish" class="form-control" required>
                    </div>

                    <div class="form-group">
                            <select class="custom-select my-1 mr-sm-2" name="eventPlace" required>
                                <option disabled selected value="">Elige el lugar de evento: </option>
                                <?php
                                if($listEventPlace){
                                    foreach ($listEventPlace as $key => $value) { ?>
                                        <option value="<?php echo $value->getName(); ?>"><?php echo $value->getName() . " / Capacidad: " . $value->getCapacity(); ?></option>
                                    <?php }  
                                }
                                else{
                                    echo "No hay nada";
                                } ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label> Ingresar tipos de plaza a vender: </label><br>
                        <?php
                        if($listPlaceType){
                            foreach ($listPlaceType as $key => $value) { ?>
                                <?php if($value){ ?>
                                    <?=$value->getName()?> <input onClick="checkboxPlace()" type="checkbox" name="place[]" value="<?=$value->getName()?>"> <br>
                               <?php }
                             }
                        } ?>
                    </div>  
                    <!-- Div en el que se va a insertar el codigo con Js -->
                    <div id="toComplete">

                    </div>

                    

                    <button type="submit" class="btn btn-primary">Siguiente</button>
                    
                </form>

                    <a href="<?= FRONT_ROOT ?>index" class="btn btn-danger btn-block" role="button" aria-pressed="true">Volver al menú principal</a>
                    
                    <!--<button type="button" class="btn btn-outline-danger btn-lg btn-block">Volver</button>-->

                
            </div>
        </div>
    </div>
    <script src="<?=FRONT_ROOT?>js/event.js"></script>
</body>
</html>
