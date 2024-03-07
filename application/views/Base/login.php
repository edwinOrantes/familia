<!DOCTYPE html>
<html lang="en">
<head>
	<title>CMLF</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>public/tema/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/tema/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/tema/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/tema/login/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/tema/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/tema/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url(); ?>public/tema/login/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="<?php echo base_url() ?>Home/validar_usuario">
					<div class="text-center">
						<img src="<?php echo base_url(); ?>public/img/logo.jpg" width="250" class="mb-3">
					</div>	

					<span class="login100-form-title p-b-34 p-t-27">
						Ingresar datos
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Ingrese su nombre de usuario">
						<input class="input100" type="text" id="nombreUsuario" name="nombreUsuario" placeholder="Usuario">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingrese la contraseña">
						<input class="input100" type="password" id="psUsuario" name="psUsuario" placeholder="Contraseña">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Ingresar
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>public/tema/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url(); ?>public/tema/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>public/tema/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>