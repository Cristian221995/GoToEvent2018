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
</head>
    <body id="LoginForm">
        <div id="logo" class="pull-left">
            <!-- Uncomment below if you prefer to use a text logo -->
            <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
            <a href="Index" class="scrollto"><img src="<?=FRONT_ROOT?>img/logo3.png" alt="GoToEvent" title=""></a>
        </div class="btn-group">
    <div class="container">
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Nuevo Artista</h2><br>
                    
                </div>
                <form action="Artist/store" method="POST">
                    
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Nombre del Artista" required>
                    </div>
                   

                    <button type="submit" name="button" class="btn btn-primary">Crear Artista</button>
                    <a href="<?= FRONT_ROOT ?>index" class="btn btn-danger btn-block" role="button" aria-pressed="true">Volver al menú principal</a>

                </form>
            </div>
        </div>
    </div>
</body>
</html>