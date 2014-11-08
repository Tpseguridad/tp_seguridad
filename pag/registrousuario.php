<?php
	include ("header.php");
?>
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
<?php
	include ("footer.php");
?>
