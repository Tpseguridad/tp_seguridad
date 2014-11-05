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
					<a href="pag/registrousuario.php" class="boton2">Registrarme</a>
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
				<h1>Nombre Producto</h1>
				<p>Precio Promedio: $</p>
				<p>Precio Minimo: $</p>
				<p>Precio Maximo: $</p>
				<div class="formulario">
					<h2>Deja tu comentario</h2>
					<form name="formcomentario" id="formcomentario" action="" method="post">
						<ul>
							<li>
								<label for="titulo">Titulo Comentario:</label>
								<input type="text"  name="titulo" id="titulo" placeholder="Ingresa el titulo del comentario" />
							</li>
							<li>
								<label for="comentario">Comentario:</label>
								<textarea  name="comentario" id="comentario" /></textarea>
							</li>
							<li>
								<input type="submit" class="boton" value="Enviar" />
							</li>
							<li id="mensaje"></li>
						</ul>
					</form>
				<div>
				<div class="clearfix"></div>
				<div class="comentario">
					<h3>Titulo</h3>
					<p>Comentarios</p>
					<p class="autor">Autor</p>
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
