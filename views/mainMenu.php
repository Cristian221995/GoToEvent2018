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

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0">El evento mas esperado<br><span>Lollapalooza</span> Argentina 2019</h1>
      <p class="mb-4 pb-0">29,30,31 de marzo, Hipodromo de San Isidro, Buenos Aires</p>
      <a href="https://www.youtube.com/watch?v=MeM6UZ4Y_wY" class="venobox play-btn mb-4" data-vbtype="video"
        data-autoplay="true"></a>
      <a href="#about" class="about-btn scrollto">Sobre el evento</a>
    </div>
  </section>

  <main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2>Sobre el evento:</h2>
            <p>Lollapalooza​ es un festival musical de los Estados Unidos que originalmente ofrecia bandas de rock alternativo, indie y punk rock; tambien hay actuaciones comicas y de danza. Concebido en 1991 por Perry Farrell, cantante de Jane's Addiction, Lollapalooza se realizo anualmente hasta 1997 y fue revivido en 2003. </p>
          </div>
        </div>
      </div>
    </section>

    <!--==========================
      Events Section
    ============================-->
    <section id="speakers" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Eventos</h2>
          <p>Aqui estan todos nuestros eventos:</p>
        </div>

        <div class="row">
          <?php if(isset($eventsFilter)){ ?>
            <?php if(is_array($eventsFilter)){ ?>
              <?php  foreach($eventsFilter as $key => $value){ ?>
                        <div class="col-lg-4 col-md-6">
                          <div class="speaker">
                            <img src="<?=FRONT_ROOT . $value->getImg() ?>" class="img-fluid">
                            <div class="details">
                              <h3><a href="<?=FRONT_ROOT?>Event/getAllEventData/<?=$value->getId();?>"><?=$value->getName();?></a></h3>
                              <p><?=$value->getCategory()->getName()?></p>
                            </div>
                          </div>
                        </div>
                <?php } 
                  }
                  else{ ?>
                    <div class="col-lg-4 col-md-6">
                      <div class="speaker">
                        <img src="<?=FRONT_ROOT . $eventsFilter->getImg() ?>" class="img-fluid">
                        <div class="details">
                          <h3><a href="<?=FRONT_ROOT?>Event/getAllEventData/<?=$eventsFilter->getId()?>"><?=$eventsFilter->getName()?></a></h3>
                          <p><?=$eventsFilter->getCategory()->getName()?></p>
                        </div>
                      </div>
                    </div>

                <?php }
              }
                  else{ ?>
                       <?php if(isset($eventList)){?>
                          <?php if(is_array($eventList)){ ?>
                            <?php foreach ($eventList as $key => $value){ ?>
                          <div class="col-lg-4 col-md-6">
                            <div class="speaker">
                              <img src="<?=FRONT_ROOT . $value->getImg() ?>" class="img-fluid">
                              <div class="details">
                                <h3><a href="<?=FRONT_ROOT?>Event/getAllEventData/<?=$value->getId();?>"><?=$value->getName();?></a></h3>
                                <p><?=$value->getCategory()->getName()?></p>
                              </div>
                            </div>
                          </div>
                  <?php }
                          }
                        }
                          else{ ?>
                              <div class="col-lg-4 col-md-6">
                              <div class="speaker">
                                <img src="<?=FRONT_ROOT . $eventList->getImg() ?>" class="img-fluid">
                                <div class="details">
                                  <h3><a href="<?=FRONT_ROOT?>Event/getAllEventData/<?=$eventList->getId()?>"><?=$eventList->getName()?></a></h3>
                                  <p><?=$eventList->getCategory()->getName()?></p>
                                </div>
                              </div>
                            </div>
                         <?php }
                  } ?>
        </div>
      </div>

    </section>

    <!--==========================
      Category seccion
    ============================-->
    <section id="category">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Categorias</h2>
          <p>Seleccione los eventos de la categoria que usted desee.</p>
        </div>

        <form method="POST" action="<?= FRONT_ROOT ?>Event/getEventsByCategoryName">
          <div class="form-row justify-content-center">
          <div class="col-auto">
                        <select class="custom-select my-1 mr-sm-2" name="category" required>
                            <option disabled selected value="">Elige una categoria: </option>
                            <?php
                            if($categoryList){
                                foreach ($categoryList as $key => $value) { ?>
                                    <option value="<?php echo $value->getName(); ?>"><?php echo $value->getName(); ?></option>
                                <?php }  
                            }
                            else{
                                echo "No hay nada";
                            } ?>
                        </select>
                    </div>
            <div class="col-auto">
              <button type="submit">Buscar</button>
            </div>
          </div>
        </form>

      </div>
    </section>

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">

      <div class="container">

        <div class="section-header">
          <h2>Contact Us</h2>
          <p>Si tienes alguna consulta no dudes en contactarnos.</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>Av. Dorrego 281, Mar del Plata, Buenos Aires</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+542234801220">(+54) 0223 480-1220</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:difusion@mdp.utn.edu.ar">difusion@mdp.utn.edu.ar</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>


  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="<?=FRONT_ROOT?>img/logo3.png" alt="GoToEvent">
            <p>GoToEvent es una pagina de venta de tickets para distintos espectáculos. ¿Qué esperas para conseguir el tuyo? </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contactanos</h4>
            <p>
              Av. Dorrego 281 <br>
              Mar del Plata, Buenos Aires<br>
              Argentina <br>
              <strong>Telefono:</strong> (+54) 0223 480-1220<br>
              <strong>Email:</strong> difusion@mdp.utn.edu.ar<br>
            </p>

            <div class="social-links">
              <a href="https://twitter.com/utnmardelplata?lang=es" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="https://www.facebook.com/utnmardelplata/" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/utnmardelplata/" class="instagram"><i class="fa fa-instagram"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>


  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

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
