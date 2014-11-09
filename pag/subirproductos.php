<?php
	include ("header.php");
?>
		<div id="main">
			<section>
				<div class="formulario">
					<h2>Subí un producto</h2>
					<form name="formproducto" id="formproducto" method="post">
					<script src="../js/subirProductos.js" type="text/javascript"></script>
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
                                                                <input type="hidden" id="idProd" value="">
                                                                <input type="hidden" id="action" value="insProd"/>
								<input type="submit" class="boton" value="Enviar" />
							</li>
							<li id="mensaje"></li>
						</ul>
					</form>
				<div>
				<table border="1" width="100%">
                                    <thead>
					<tr>
						<th>Producto</th>
						<th>Descripcion</th>
						<th width="40px">Editar</th>
						<th width="40px">Borrar</th>
					</tr>
                                    </thead>
                                    <tbody id="productos">
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
                                    </tbody>
				</table>
			</section>
<?php
	include ("footer.php");
?>
