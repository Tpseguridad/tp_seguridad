<?php
	include ("header.php");
?>
		<div id="main">
			<div>
				<h2>Registrate</h2>
				<div class="formulario">
					<form name="formregistro" id="formregistro" action="" method="post">
						<ul>
							<li>
								<label for="nombre">Nombre:</label>
								<input type="text"  name="nombre" id="nombre">
							</li>
							<li>
								<label for="apellido">Apellido:</label>
								<input type="text"  name="apellido" id="apellido">
							</li>
							<li>
								<label for="apodo">Apodo:</label>
								<input type="text"  name="nombre_usuario" id="nombre_usuario">
							</li>
							<li>
								<label for="email">Email:</label>
								<input type="text"  name="email" id="email">
							</li>
							<li>
								<label for="paswword">Password:</label>
								<input type="password"  name="password_us" id="password_us">
							</li>
							<li>
								<label for="repassword">Re-ingrese Password:</label>
								<input type="password"  name="repassword" id="repassword">
							</li>
							<li>
								<input type="submit" class="boton" value="Enviar">
							</li>
							<li id="mensaje"></li>
						</ul>
					</form>
				</div>
			</div>
<?php
	include ("footer.php");
?>
