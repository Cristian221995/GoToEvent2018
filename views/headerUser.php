<html>
<header id="header">
  <div class="container">

    <div id="logo" class="pull-left">
      <!-- Uncomment below if you prefer to use a text logo -->
      <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
<<<<<<< HEAD
      <a href="#intro" class="scrollto"><img src="img/logo3.png" alt="GoToEvent" title=""></a>
=======
      <a href="#intro" class="scrollto"><img src="<?=FRONT_ROOT?>img/logo3.png" alt="GoToEvent" title=""></a>
>>>>>>> d1100ba17a54a9a636567f81ce32c0f6c2de8d78
    </div>

    <nav id="nav-menu-container">
      <ul class="nav-menu">
<<<<<<< HEAD
        <li class="menu-active"><a href="#intro">Home</a></li>
        <li class="buy-tickets"><a href="#">Carrito</a></li>
        <li class="buy-tickets"><a href="Login">Cerrar Sesion</a></li>
=======
        <li class="menu-active"><a> Bienvenido, <?=$_SESSION["userName"]?></a></li>
        <li class="buy-tickets"><a href="#">Carrito</a></li>
        <li class="buy-tickets"><a href="<?=FRONT_ROOT?>Login/logout">Cerrar Sesion</a></li>
>>>>>>> d1100ba17a54a9a636567f81ce32c0f6c2de8d78
      </ul>
    </nav> 
  </div>
</header>
</html>
