
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src=" //maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= FRONT_ROOT ?>css/formStyle.css">
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
        <div class="login-form-all">
            <div class="main-div-all">
            <?php if(isset($alertSuccess)){ ?>
                <div class="alert alert-success">
                    <strong>MENSAJE:</strong> <?= $alertSuccess ?>
                </div>
            <?php } 
                else{
                    if(isset($alertError)){ ?>
                        <div class="alert alert-danger">
                            <strong>ERROR:</strong> <?= $alertError ?>
                        </div>
                <?php }
                }?>

                <div class="panel">
                    <h2>Nuevo Evento</h2>
                </div>
                <form action="<?= FRONT_ROOT ?>Event/index2" method="POST" enctype="multipart/form-data">

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
<<<<<<< HEAD
                                    <?=$value->getName()?> <input type="checkbox" name="place[]" value="<?=$value->getName()?>"> <br>
                               <?php }
                             }
                        } ?>
                        
                    </div>

                    <button type="submit" class="btn btn-primary">Siguiente</button>
                    
                </form>
=======
                                    <?=$value->getName()?> <input onClick="checkboxPlace()" type="checkbox" name="place[]" value="<?=$value->getName()?>"> <br>
                               <?php }
                             }
                        } ?>
                    </div>  
                    <!-- Div en el que se va a insertar el codigo con Js -->
                    <div id="toComplete">
>>>>>>> f3ffacc1341a9fa0dbbb414624eb0b1df7ad4ebd

                    </div>

                    <button type="submit" class="btn btn-danger btn-block">Siguiente</button>
                    <a href="<?= FRONT_ROOT ?>index" class="btn btn-danger btn-block" role="button" aria-pressed="true">Volver al menú principal</a>
                    
                </form>
            </div>
        </div>
    </div>
    <script src="<?=FRONT_ROOT?>js/event.js"></script>
</body>
</html>
