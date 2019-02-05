
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
                                    <?=$value->getName()?> <input type="checkbox" name="place[]" value="<?=$value->getName()?>"> <br>
                               <?php }
                             }
                        } ?>
                        
                    </div>

                    <button type="submit" class="btn btn-primary">Siguiente</button>
                    
                </form>

                    <a href="<?= FRONT_ROOT ?>index" class="btn btn-danger btn-block" role="button" aria-pressed="true">Volver al menú principal</a>
                    
                    <!--<button type="button" class="btn btn-outline-danger btn-lg btn-block">Volver</button>-->

                
            </div>
        </div>
    </div>
</body>
</html>
