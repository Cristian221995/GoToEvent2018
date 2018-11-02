<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src=" //maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/form.css">
    </head>
    <body class="d-flex align-items-center justify-content-center">


        <form id="login-form" class="m-2" action="Artist/index" method="POST">
            <div class="text-center mb-4">
                <strong>Login</strong>
            </div>

            <?php if(isset($alert)) { ?>
                <div class="alert alert-danger text-center">
                    <?= $alert ?>
                </div>
            <?php } ?>

            <fieldset>
                <div class="form-group">
                    <label for="">Usuario:</label>
                    <input type="usuario" name="user" value="" class="form-control">
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label for="">Password:</label>
                    <input type="password" name="pass" value="" class="form-control">
                </div>
            </fieldset>
            <button type="submit" name="button" class="btn btn-primary btn-block">Iniciar Sesion</button>
        </form>
    </body>
</html>
