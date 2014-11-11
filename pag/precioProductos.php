<?php
	include ("header.php");
?>
<script type="text/javascript" src="../js/precioProductos.js"></script>
		<div id="main">
			<div>
				<h1>Listado de precios</h1>
				<p>Elegi la semana: </p> 

				<select name="semanas" id="semanas">
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
					</tr>
                                    </tbody>
				</table>
			</div>
<?php
	include ("footer.php");
?>