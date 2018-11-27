<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Crear Categoria</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/form.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
    <body class="d-flex align-items-center justify-content-center">
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


        <form id="category-form" class="m-2" action="" method="POST">
            <div class="text-center mb-4">
                <strong>Cargar Categoria</strong>
            </div>

            <?php if(isset($alert)) { ?>
                <div class="alert alert-danger text-center">
                    <?= $alert ?>
                </div>
            <?php } ?>

            <fieldset>
                <div class="form-group">
                    <label for="">Nombre Categoria:</label>
                    <input type="name" name="name" class="form-control" required>
                </div>
            </fieldset>
            <button type="submit" name="button" class="btn btn-primary btn-block">Crear Categoria</button>
        </form>


        
    </body>
</html>