<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>TusPrecios.com.ar</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">	
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<link rel="author" type="text/plain" href="humans.txt">
		<link rel="sitemap" type="application/xml" title="Sitemap" href="sitemap.xml">
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href='http://fonts.googleapis.com/css?family=Asap' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="js/jquery_validate.js"></script>
		<script type="text/javascript" src="js/validacion.js"></script>
                <script type="text/javascript" src="js/commonFunctions.js"></script>
                <script type="text/javascript" src="js/auxiliarFunctions.js"></script>
                <script type="text/javascript" src="js/index.js"></script>
                <script type="text/javascript" src="js/md5.js"></script>
	</head>
	<body>
		<div id="header">
			<div id="login">
				<form name="formlogin" id="formlogin" action="#" method="POST">
					<label for="email">E-mail<input type="email" id="email" name="email"></label>
					<label for="password">Password<input type="password" id="password_us" name="password_us" autocomplete = "off"></label>
					<input type="submit" class="boton" value="login">
					<a href="pag/registrousuario.php" class="boton2">Registrarme</a>
				</form>
			</div>
			<div id="logo">
			</div>
		</div>
		<div id="nav">
			<div id="menu">
				<ul class="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="pag/subirprecios.php">Subir Precios</a></li>
					<li><a href="pag/subirproductos.php">Subir Productos</a></li>
				</ul>
			</div>
		</div>
		<div id="main">
			<div>
				<h1>Listado de precios</h1>
				<p>Elegi la semana: </p> 

				<select id="semanas">
					<option></option>
				</select>
				<!-- aca meter combobox-->
				<table>
					<tr>
						<th>Producto</th>
						<th>Precio Promedio</th>
						<th>Precio Máximo</th>
						<th>Precio Mínimo</th>
					</tr>
                                    </thead>
                                    <tbody id="productos">
					<tr>
						<td><a href="pag/producto.php">texto</a></td>
						<td>texto</td>
						<td>texto</td>
						<td>texto</td>
					</tr>
                                    </tbody>
				</table>
			</div>
			<a href="#" id ="top" ></a>
		</div>
		<div id="footer">
			<a href="#">Acerca de Nosotros </a> | <a href="#">Ayuda </a> | <a href="#">Términos y condiciones </a> | <a href="#">Contacto </a>
		</div>
		<div id="copyrigth">Tp Seguridad de Aplicaciones Web | Andrés Malagreca | Damián Berruezo | Celeste Coopa | Alicia Rosenthal</div>
	</body>
</html>
=======
<?php
    header('Location: ./pag/precioProductos.php');
?>
>>>>>>> 7d2377c929a081b6e18edc3c8c3e3e567c4701ac
