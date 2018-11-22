<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>GoToEvent - Buy Tickets Online Now!</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

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

<body>

<section id="speakers" class="wow fadeInUp">
    <div class="container">
        <div class="section-header">
          <h2><?=$data->getEvent()->getName()?></h2>
          <p>Informacion del Evento:</p>
        </div>    
        <div class="speaker col-lg-4 col-md-6">
        <h3>Categoria: <?=$data->getEvent()->getCategory()->getName()?></h3>
        </div>
        <div class="speaker col-lg-4 col-md-6">
        <h3>Imagen de evento:</h3>
          <img src="<?=FRONT_ROOT . $data->getEvent->getImg() ?>" class="img-fluid">
        </div>
    </div>  


</section>



<!-- JavaScript Libraries -->
  <script src="<?=FRONT_ROOT?>lib/jquery/jquery.min.js"></script>
  <script src="<?=FRONT_ROOT?>lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?=FRONT_ROOT?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=FRONT_ROOT?>lib/easing/easing.min.js"></script>
  <script src="<?=FRONT_ROOT?>lib/superfish/hoverIntent.js"></script>
  <script src="<?=FRONT_ROOT?>lib/superfish/superfish.min.js"></script>
  <script src="<?=FRONT_ROOT?>lib/wow/wow.min.js"></script>
  <script src="<?=FRONT_ROOT?>lib/venobox/venobox.min.js"></script>
  <script src="<?=FRONT_ROOT?>lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="<?=FRONT_ROOT?>contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<?=FRONT_ROOT?>js/mainMenu.js"></script>
</body>

</html>