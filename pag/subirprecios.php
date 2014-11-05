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
	</head>
	<body>
		<header>
			<div id="login">
				<form name="formlogin" action="" method="POST">
					<label for="email">	<input type="email" name="email" placeholder="Email" autocomplete="off" /></label>
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
				<h2>Subi tus precios</h2>
				<form name="formprecio" id="formprecio" action="" method="post">
					<table border="1" width="100%">
						<tr>
							<th>Producto</th>
							<th>Precio</th>
						</tr>
						<tr>
							<td>Producto</td>
							<td><input type="text"  name="precio" id="precio" /></td>
						</tr>
					</table>
				<div class="der"><input type="submit" class="boton" value="Enviar" /></div>
				</form>
			</section>
			<a href="#" id ="top" ></a>
		</div>
		<footer>
			<a href="#">Acerca de Nosotros </a> | <a href="#">Ayuda </a> | <a href="#">Términos y condiciones </a> | <a href="#">Contacto </a>
		</footer>
		<div id="copyrigth">Tp Seguridad de Aplicaciones Web | Andrés Malagreca | Damián Berruezo | Celeste Coopa | Alicia Rosenthal</div>
	</body>
</html>
