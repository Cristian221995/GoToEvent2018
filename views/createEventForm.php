<?php
use controllers\categoryController as CategoryController;
use controllers\eventPlaceController as EventPlaceController;
?>

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
<body id="LoginForm">
    <div class="container">
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Nuevo Evento</h2>
                </div>
                <form action="Event/prueba2" method="POST">

                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Nombre del evento:">
                    </div>

                    <div class="form-group">
                             <select class="custom-select my-1 mr-sm-2" name="category">
                                <option disabled selected>Elige una categoría: </option>
                                <?php
                                $list = new CategoryController();
                                echo $list->retride();
                                if($list->retride()){
                                    foreach ($list->retride() as $key => $value) { ?>
                                        <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                    <?php }  
                                }
                                else{
                                    echo "No hay nada";
                                } ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label> Fecha de comienzo del evento </label>
                        <input type="date" name="eventDateStart" class="form-control">
                    </div>

                    <div class="form-group">
                        <label> Fecha de final del evento </label>
                        <input type="date" name="eventDateFinish" class="form-control">
                    </div>

                    <div class="form-group">
                            <select class="custom-select my-1 mr-sm-2" name="eventPlace">
                                <option disabled selected>Elige el lugar de evento: </option>
                                <?php
                                $listEventPlace = new EventPlaceController();

                                if($listEventPlace->retride()){
                                    foreach ($listEventPlace->retride() as $key => $value) { ?>
                                        <option value="<?php echo $value[0]; ?>"><?php echo $value[0] . " / Capacidad: " . $value[1]; ?></option>
                                    <?php }  
                                }
                                else{
                                    echo "No hay nada";
                                } ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label> Ingresar una imagen para el evento: </label>
                        <input type="file" class="form-control-file" name="eventIMG">
                    </div>

                    <button type="submit" name="button" class="btn btn-primary">Siguiente</button>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
