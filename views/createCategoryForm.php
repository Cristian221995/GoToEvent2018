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
    <div class="container">
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Nueva Categoría</h2>
                    <p>Ingrese el nombre de la categoria:</p>
                </div>
                <form action="Category/store" method="POST">

                    <div class="form-group">
                        <input type="text" name="name" class="form-control" id="" placeholder="Nombre de la categoria">
                    </div>

                    <button type="submit" name="button" class="btn btn-primary">Crear Categoría</button>

                </form>
            </div>
        </div>
    </div>
</body>
</html>