<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= FRONT_ROOT ?>images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= FRONT_ROOT ?>vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= FRONT_ROOT ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= FRONT_ROOT ?>fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= FRONT_ROOT ?>vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= FRONT_ROOT ?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= FRONT_ROOT ?>vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= FRONT_ROOT ?>vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= FRONT_ROOT ?>vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= FRONT_ROOT ?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= FRONT_ROOT ?>css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<header>
	<div id="logo" class="pull-left">
		<!-- Uncomment below if you prefer to use a text logo -->
		<!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
		<a href="<?= FRONT_ROOT ?>index" class="scrollto"><img src="<?= FRONT_ROOT ?>img/logo3.png" alt="GoToEvent" title=""></a>
		</div>
	</header>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?= FRONT_ROOT ?>images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
			<?php if(isset($alertSuccess)){ ?>
                <div class="alert alert-success">
                    <strong>MENSAJE:</strong> <?= $alertSuccess ?>
                </div>
            <?php } 
                else{
                    if(isset($alertError)){ ?>
                        <div class="alert alert-danger">
                            <strong>ERROR:</strong> <?= $alertError ?>
                        </div>
                <?php }
                }?>
				<form class="login100-form validate-form" action="<?= FRONT_ROOT ?>User/store" method="POST">
					<span class="login100-form-title p-b-49">
						Registro
                    </span>
                    
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Campo obligatorio">
						<span class="label-input100">Email:</span>
						<input class="input100" type="email" name="email" placeholder="Ingresa tu email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Campo obligatorio">
						<span class="label-input100">Nombre de usuario:</span>
						<input class="input100" type="text" name="userName" placeholder="Ingresa tu usuario">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Campo obligatorio">
						<span class="label-input100">Contraseña:</span>
						<input class="input100" type="password" name="pass" placeholder="Ingresa tu contraseña">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="text-right p-t-8 p-b-31"></div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Registrarse
							</button>
						</div>
					</div>

					<div class="text-right p-t-8 p-b-31"></div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								<a href="<?= FRONT_ROOT ?>index" class="login100-form-btn" role="button" aria-pressed="true">Volver al menú principal</a>
							</button>
						</div>
					</div>

                    
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?= FRONT_ROOT ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= FRONT_ROOT ?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= FRONT_ROOT ?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?= FRONT_ROOT ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= FRONT_ROOT ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= FRONT_ROOT ?>vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= FRONT_ROOT ?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= FRONT_ROOT ?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?= FRONT_ROOT ?>js/main.js"></script>

</body>
</html>