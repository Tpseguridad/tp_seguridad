<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>TusPrecios.com.ar</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">	
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<link rel="author" type="text/plain" href="../humans.txt">
		<link rel="sitemap" type="application/xml" title="Sitemap" href="../sitemap.xml">
		<link href='http://fonts.googleapis.com/css?family=Asap' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="../css/estilos.css">
		<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="../js/jquery_validate.js"></script>
		<script type="text/javascript" src="../js/validacion.js"></script>
                <script type="text/javascript" src="../js/commonFunctions.js"></script>
                <script type="text/javascript" src="../js/auxiliarFunctions.js"></script>
                <script type="text/javascript" src="../js/md5.js"></script>
	</head>
	<body>
		<div id="header">
			<div id="login">
				<form name="formlogin" style="display: none" id="formlogin" action="#" method="GET">
					<label for="emailLogin">E-mail<input type="email" id="emailLogIn" name="emailLogIn"></label>
					<label for="password">Password<input type="password" id="password_us_logIn" name="password_us_logIn" autocomplete ="off"></label>
					<input type="submit" class="boton" value="login">
					<a href="registrousuario.php" class="boton2">Registrarme</a>
				</form>
                                <form name="logInfo" style="display: none" id="logInfo" action="#" method="GET">
                                        Bienvenido, <span id="logUserName"></span>
                                        <input type="button" id="logOut" class="boton" value="salir">
				</form>
			</div>
			<div id="logo">
			</div>
		</div>
		<div id="nav">
			<div id="menu">
				<ul class="menu">
					<li><a href="../index.php">Home</a></li>
					<li class="checkControls" id="subirPrecios"><a href="subirprecios.php">Subir Precios</a></li>
					<li class="checkControls" id="subirProductos"><a href="subirproductos.php">Subir Productos</a></li>
				</ul>
			</div>
		</div>
