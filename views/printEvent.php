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
    <title>Crear categoria</title>
</head>
<body id="LoginForm">
    <header>
    <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
        <a href="<?= FRONT_ROOT ?>index" class="scrollto"><img src="<?= FRONT_ROOT ?>img/logo3.png" alt="GoToEvent" title=""></a>
        </div>
    </header>
    <div class="container">
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Your Event</h2><br>
                    
                </div>
                <div>
                <p>Nombre del evento: <?php echo $_SESSION['eventData']['name'] ?></p>
                <p>Categoria: <?php echo $_SESSION['eventData']['category'] ?></p>
                <p>Lugar a realizarse: <?php echo $_SESSION['eventData']['eventPlace'] ?></p>
                <p>Inicio de evento: <?php echo $_SESSION['eventData']['eventDateStart'] ?></p>
                <p>Final de evento: <?php echo $_SESSION['eventData']['eventDateFinish'] ?></p>
                
                 <?php if($_POST)
                {?>
                    
                <?php foreach ($_POST as $clave=>$valor)
                    {?>
                    <p><?php echo "Los artistas del $clave son:"; ?> </p>
                    <?php foreach ($valor as $artistas){ ?>
                        <p> <?php echo $artistas; ?> </p>
                        <?php }
                        }
                }?>
                </div>
                



            </div>
        </div>
    </div>
</body>
</html>