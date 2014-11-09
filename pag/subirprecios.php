<?php
	include ("header.php");
?>
<script type="text/javascript" src="../js/subirprecios.js"></script>
		<div id="main">
			<section>
				<h2>Subi tus precios</h2>
				<form name="formprecio" id="formprecio" action="" method="post">
					<table border="1" width="100%">
						<tr>
							<th>Producto</th>
							<th>Precio</th>
						</tr>
						<tr>
                                                    <td>
                                                        <select id="productos">
                                                            <option></option>
                                                        </select>
                                                    </td>
							<td><input type="text"  name="precio" id="precio" /></td>
						</tr>
					</table>
				<div class="der"><input id="submitBtn" type="submit" class="boton" value="Enviar" /></div>
				</form>
				<p id="mensaje"></p>
			</section>
<?php
	include ("footer.php");
?>
