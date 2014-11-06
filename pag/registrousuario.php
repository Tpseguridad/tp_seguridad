<!doctype html>
<html lang ="es">
	<head>
		<meta charset="UTF-8">
		<title>TusPrecios.com.ar</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />	
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
		<link rel="author" type="text/plain" href="humans.txt"/>
		<link rel="sitemap" type="application/xml" title="Sitemap" href="sitemap.xml"/>
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href='http://fonts.googleapis.com/css?family=Asap' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="../css/estilos.css">
		<script type="text/javascript" src="../js/jquery_1.4.js"></script>
		<script type="text/javascript" src="../js/jquery_validate.js"></script>
		<script type="text/javascript" src="../js/validacion.js"></script>
	</head>
	<body>
		<header>
			<div id="login">
				<form name="formlogin" id="formlogin" action="" method="POST">
					<label for="email2">	<input type="email" name="email" placeholder="email" autocomplete="off" /></label>
					<label for="password">	<input type="password" name="password_us" placeholder="Password"  autocomplete="off"/></label>
					<input type="submit" class="boton" value="login" />
					<a href="registrousuario.php" class="boton2">Registrarme</a>
				</form>
			</div>
			<div id="logo">
			</div>
		</header>
		<nav>
			<div id="menu">
				<ul class="menu">
					<li><a href="../index.php">Home</a></li>
					<li><a href="subirprecios.php">Subir Precios</a>
					<li><a href="subirproductos.php">Subir Productos</a></li>
					</li>
				</ul>
			</div>
		</nav>
		<div id="main">
			<div id="main">
			<section>
				<h2>Registrate</h2>
				<div class="formulario">
					<form name="formregistro" id="formregistro" action="" method="post">
						<ul>
							<li>
								<label for="nombre">Nombre:</label>
								<input type="text"  name="nombre" id="nombre" placeholder="Ingresa tu nombre" autocomplete="off" />
							</li>
							<li>
								<label for="apellido">Apellido:</label>
								<input type="text"  name="apellido" id="apellido" placeholder="Ingresa tu apellido" autocomplete="off" />
							</li>
							<li>
								<label for="apodo">Apodo:</label>
								<input type="text"  name="nombre_usuario" id="nombre_usuario" placeholder="Ingresa tu apodo" autocomplete="off" />
							</li>
							<li>
								<label for="email">Email:</label>
								<input type="text"  name="email" id="email" placeholder="Ingresa tu Email" autocomplete="off" />
							</li>
							<li>
								<label for="paswword">Password:</label>
								<input type="password"  name="password_us" id="password_us" placeholder="" autocomplete="off" />
							</li>
							<li>
								<label for="repassword">Re-ingrese Password:</label>
								<input type="password"  name="repassword" id="repassword" autocomplete="off" />
							</li>
							<li>
								<input type="submit" class="boton" value="Enviar" />
							</li>
							<li id="mensaje"></li>
						</ul>
					</form>
				</div>
			</section>
			<a href="#" id ="top" ></a>
		</div>
		<footer>
			<a href="#">Acerca de Nosotros </a> | <a href="#">Ayuda </a> | <a href="#">Términos y condiciones </a> | <a href="#">Contacto </a>
		</footer>
		<div id="copyrigth">Tp Seguridad de Aplicaciones Web | Andrés Malagreca | Damián Berruezo | Celeste Coopa | Alicia Rosenthal</div>
	</body>
</html>
