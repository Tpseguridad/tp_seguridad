<?php
	include ("header.php");
?>
            <script type="text/javascript" src="../js/producto.js"></script>
		<div id="main">
			<div>
				<h1 id="titProd"></h1>
				<p id="promProd"></p>
				<p id="minProd"></p>
				<p id="maxProd"></p>
				<div class="formulario">
					<h2>Deja tu comentario</h2>
					<form name="formcomentario" id="formcomentario" action="" method="post">
						<ul>
							<li>
								<label for="titulo">Titulo Comentario:</label>
								<input type="text"  name="titulo" id="titulo">
							</li>
							<li>
								<label for="comentario">Comentario:</label>
								<textarea  name="comentario" id="comentario"></textarea>
							</li>
							<li>
								<input type="submit" class="boton" value="Enviar">
							</li>
							<li id="mensaje"></li>
						</ul>
					</form>
				<div>
				<div class="clearfix"></div>
				<div id="tablaComentarios" class="comentario">
                                    No hay comentarios para este producto.
				</div>
			</div>
<?php
	include ("footer.php");
?>