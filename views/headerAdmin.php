<!-- <header id="header">
  <div class="container">

    <div id="logo" class="pull-left">
       Uncomment below if you prefer to use a text logo -->
      <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>
      <a href="<?=FRONT_ROOT?>Index" class="scrollto"><img src="<?=FRONT_ROOT?>img/logo3.png" alt="GoToEvent" title=""></a>
        </div class="btn-group">

        <nav id="nav-menu-container">
        <ul class="nav-menu">
            <li class="menu-active"><a> Administrador </a></li>
            
            <li><div class="dropdown">
            <button class="btn btn-secundary dropdown-toggle" type="button" data-toggle="dropdown">Administrar Eventos
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="<?=FRONT_ROOT?>Artist">Agregar Artista</a></li>
                <li><a href="<?=FRONT_ROOT?>Category">Agregar Categoria</a></li>
                <li><a href="<?=FRONT_ROOT?>EventPlace">Agregar Lugar de Evento</a></li>
                <li><a href="<?=FRONT_ROOT?>PlaceType">Agregar Tipo de plaza</a></li>
                <li><a href="<?=FRONT_ROOT?>Event">Agregar Evento</a></li>
            </ul>
            </div></li>
                
            
            <li class="buy-tickets menu-active"><a href="<?=FRONT_ROOT?>Login/logout">Cerrar Sesion</a></li>
        </ul>
        </nav> 
    </div>
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
            <a class="nav-link">Administrador</a>
          </li>
          <li><div class="dropdown">
            <button class="btn btn-secundary dropdown-toggle" type="button" data-toggle="dropdown">Administrar Eventos
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="<?=FRONT_ROOT?>Artist">Agregar Artista</a></li>
                <li><a href="<?=FRONT_ROOT?>Category">Agregar Categoria</a></li>
                <li><a href="<?=FRONT_ROOT?>EventPlace">Agregar Lugar de Evento</a></li>
                <li><a href="<?=FRONT_ROOT?>PlaceType">Agregar Tipo de plaza</a></li>
                <li><a href="<?=FRONT_ROOT?>Event">Agregar Evento</a></li>
            </ul>
            </div></li>
          <li class="nav-item">
            <a class="nav-link" href="<?=FRONT_ROOT?>Login/logout">Cerrar Sesion</a>
          </li>
          </ul>
        </div>
      </div>
    </nav> 
  </div>
</header>
