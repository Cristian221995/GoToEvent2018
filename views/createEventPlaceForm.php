<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/form.css">
    <title>Crear categoria</title>

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
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Nuevo Lugar de Evento</h2><br>
                    
                </div>
                <form action="eventPlace/store" method="POST">
                    
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Nombre del lugar" required>
                    </div>
                    <div class="form-group">

                        <input type="text" name="capacity" class="form-control" placeholder="Capacidad" required>
                    </div>

                    <button type="submit" name="button" class="btn btn-primary">Crear lugar de Evento</button>
                    <a href="<?= FRONT_ROOT ?>index" class="btn btn-danger btn-block" role="button" aria-pressed="true">Volver al menú principal</a>

                </form>
            </div>
        </div>
    </div>
</body>
</html>