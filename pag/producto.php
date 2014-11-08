<?php
	include ("header.php");
?>
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
<?php
	include ("footer.php");
?>