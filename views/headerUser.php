
<!-- <header id="header">
  <div class="container">

    <div id="logo" class="pull-left">
       Uncomment below if you prefer to use a text logo -->
      <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>
      <a href="<?=FRONT_ROOT?>Index" class="scrollto"><img src="<?=FRONT_ROOT?>img/logo3.png" alt="GoToEvent" title=""></a>
    </div>

    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <li class="menu-active"><a> Bienvenido, <?=$_SESSION["user"]->getUserName()?></a></li>
        <li class="buy-tickets"><a href="#">Carrito</a></li>
        <li class="buy-tickets"><a href="<?=FRONT_ROOT?>Login/logout">Cerrar Sesion</a></li>
      </ul>
    </nav> 
  </div>
</header> -->

<header id="header">
  <div class="container">
     <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
      <div id="logo" class="pull-left">
      <!-- Uncomment below if you prefer to use a text logo -->
      <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
      <a href="<?=FRONT_ROOT?>Index" class="scrollto"><img src="<?=FRONT_ROOT?>img/logo3.png" alt="GoToEvent" title=""></a>
      </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link"> Bienvenido, <?=$_SESSION["user"]->getName()?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Carrito</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=FRONT_ROOT?>Login/logout">Cerrar Sesion</a>
          </li>
          </ul>
        </div>
      </div>
    </nav> 
  </div>
</header>
