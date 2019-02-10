<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= FRONT_ROOT ?>css/formStyle.css">
    <title>Crear lugar de evento</title>
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
                    <h2>Nuevo Lugar de Evento</h2><br>
                    
                </div>
                <form action="<?= FRONT_ROOT ?>EventPlace/store" method="POST">
                    
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Nombre del lugar" required>
                    </div>
                    <div class="form-group">

                        <input type="text" name="capacity" class="form-control" placeholder="Capacidad" required>
                    </div>

                    <button type="submit" name="button" class="btn btn-danger btn-block">Crear lugar de Evento</button>
                    <a href="<?= FRONT_ROOT ?>index" class="btn btn-danger btn-block" role="button" aria-pressed="true">Volver al menú principal</a>

                </form>
            </div>
        </div>
    </div>
</body>
</html>