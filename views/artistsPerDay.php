
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
                <div class="panel">
                    <h2>Artistas por día</h2>
                </div>
                <form action="<?=FRONT_ROOT?>Event/store" method="POST" enctype="multipart/form-data">

                    <?php
                        $dateStart = new DateTime($_SESSION['eventData']['eventDateStart']);
                        $dateFinish = new DateTime($_SESSION['eventData']['eventDateFinish']);
                        $dayCounter = $dateStart->diff($dateFinish);
                        $dayCounter = $dayCounter->format('%a');
                        $_SESSION['eventData']['eventDates'] = array();
                        array_push($_SESSION['eventData']['eventDates'], $dateStart->format('Y-m-d'));

                        $contador = 1;

                        while($contador <= $dayCounter+1){ 
                            
                            if(($dateStart->modify('+1 day') <= $dateFinish)){
                                $aux = $dateStart;
                                array_push($_SESSION['eventData']['eventDates'], $aux->format('Y-m-d'));
                            }
                            ?>
                                
                            <div class="form-group">
                            <h2><?php echo "Día " . $contador ?></h2>
                                <select class="custom-select my-1 mr-sm-2" multiple name="dia<?php echo $contador?>[]" required>
                                    <option disabled selected value="">Elige uno o mas artistas: </option>
                                    <?php
                                    if($listArtist){
                                        foreach ($listArtist as $key => $value) { ?>
                                            <option value="<?php echo $value->getName(); ?>"><?php echo $value->getName(); ?></option>
                                        <?php }  
                                    } ?>
                                </select>
                            </div>
                    <?php $contador++; } ?>

                    <div class="form-group">
                        <label> Ingresar una imagen para el evento: </label>
                        <input type="file" class="form-control-file" name="eventIMG" required>
                    </div> 

                    <?php foreach ($_SESSION["eventData"]["place"] as $key => $value) { ?>
                        <label for="">Nombre: <?=$value?></label><br>
                        <label for="">Precio de entrada: </label>
                            <input type="text" name="price[]"><br>
                        <label for="">Cantidad a vender: </label>
                            <input type="text" name="quantity[]"><br><br>
                    <?php } ?>



                   <button type="submit" class="btn btn-danger btn-block">Crear Evento</button>

                </form>
            </div>
        </div>
    </div>
   
</body>
</html>
