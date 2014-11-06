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
					<label for="email2">	<input type="email" name="email" placeholder="Email" autocomplete="off" /></label>
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
				<div class="formulario">
					<h2>Subí un producto</h2>
					<form name="formproducto" id="formproducto" action="" method="post">
						<ul>
							<li>
								<label for="nombre_producto">Nombre Producto:</label>
								<input type="text"  name="nombre_producto" id="nombre_producto" placeholder="Ingresa el nombre del producto" autocomplete="off" />
							</li>
							<li>
								<label for="descripcion">Descripción Producto:</label>
								<textarea  name="descripcion" id="descripcion" />
								</textarea>
							</li>
							<li>
								<input type="submit" class="boton" value="Enviar" />
							</li>
							<li id="mensaje"></li>
						</ul>
					</form>
				<div>
				<table border="1" width="100%">
					<tr>
						<th>Producto</th>
						<th>Descripcion</th>
						<th width="40px">Editar</th>
						<th width="40px">Borrar</th>
					</tr>
					<tr>
						<td>xxxx</td>
						<td>xxxx</td>
						<td><a href="#" class="edit"></a></td>
						<td><a href="#" class="delete"></a></td>
					</tr>
				</table>
			</section>
			<a href="#" id ="top" ></a>
		</div>
		<footer>
			<a href="#">Acerca de Nosotros </a> | <a href="#">Ayuda </a> | <a href="#">Términos y condiciones </a> | <a href="#">Contacto </a>
		</footer>
		<div id="copyrigth">Tp Seguridad de Aplicaciones Web | Andrés Malagreca | Damián Berruezo | Celeste Coopa | Alicia Rosenthal</div>
	</body>
</html>
