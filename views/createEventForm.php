
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
</head>
<header>
</header>
<body id="LoginForm">
        <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
        <a href="<?= FRONT_ROOT ?>index" class="scrollto"><img src="<?= FRONT_ROOT ?>img/logo3.png" alt="GoToEvent" title=""></a>
        </div>
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
                                    <?=$value->getName()?> <input type="checkbox" name="place[]" value="<?=$value->getName()?>"> <br>
                               <?php }
                             }
                        } ?>
                        
                    </div>

                    <button type="submit" class="btn btn-danger btn-block">Siguiente</button>
                    <a href="<?= FRONT_ROOT ?>index" class="btn btn-danger btn-block" role="button" aria-pressed="true">Volver al menú principal</a>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>
