<?php
    use controllers\artistController as ArtistController;
    $_SESSION['eventData'] = $_POST;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= FRONT_ROOT ?>css/form.css">
    <title>Crear evento</title>
</head>
<body id="LoginForm">
    <div class="container">
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Artistas por día</h2>
                </div>
                <form action="store" method="POST">

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
                                <select class="custom-select my-1 mr-sm-2" multiple name="dia<?php echo $contador?>[]">
                                    <option disabled selected>Elige uno o mas artistas: </option>
                                    <?php
                                    $list = new ArtistController();
                                    if($list->retride()){
                                        foreach ($list->retride() as $key => $value) { ?>
                                            <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                        <?php }  
                                    } ?>
                                </select>
                            </div>
                    <?php $contador++; } ?>

                   <button type="submit" class="btn btn-primary btn-block">Crear Evento</button>
                    

                </form>
            </div>
        </div>
    </div>
</body>
</html>
