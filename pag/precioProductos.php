<?php
	include ("header.php");
?>
<script type="text/javascript" src="../js/precioProductos.js"></script>
		<div id="main">
			<section>
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
			</section>
<?php
	include ("footer.php");
?>