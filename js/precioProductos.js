function loadSemanasDisponibles () {
    var dataArray = [];
    var action = new MessageParameter ('action', 'semanasProd');
    dataArray.push(action);
    
    makeAJAXRequest('../php/MainController.php', dataArray, cargarListaSemanas, mostrarMensajeError);
}

function cargarListaSemanas (responseJSONMessage) {
    for (var i = 0; i < responseJSONMessage.length; i++) {
		var newOption = '<option value="' + responseJSONMessage[i].semana + '">' + responseJSONMessage[i].semana + '</option>';
		if (i+1 == responseJSONMessage.length)
		{
			newOption = '<option selected value="' + responseJSONMessage[i].semana + '">' + responseJSONMessage[i].semana + '</option>';
        }
        $('#semanas').append(newOption);
    }
	cargarTablaProductos($('#semanas').val());
}

function cargarTablaProductos (parSemana) {
    $('#productos').empty();
    var dataArray = [];
    var action = new MessageParameter('action', 'traerProdsDeSemana');
    dataArray.push(action);
    var semana = new MessageParameter('semana', parSemana);
    dataArray.push(semana);
    
    makeAJAXRequest('../php/MainController.php', dataArray, generarRegistrosProductos, mostrarMensajeError);
}

function verProducto (parIdProd) {
    var dataArray = [];
    var action = new MessageParameter('action', 'verProducto');
    dataArray.push(action);
    var producto = new MessageParameter('idProducto', parIdProd);
    dataArray.push(producto);
    
    makeAJAXRequest('../php/MainController.php', dataArray, mostrarProducto, mostrarMensajeError);
}

function mostrarProducto () {
    window.location.href = './producto.php';
}

function generarRegistrosProductos (responseJSONMessage) {
    for (var i = 0; i < responseJSONMessage.length; i++) {
        var newRow = '<tr><td><a href="javascript:verProducto(' + responseJSONMessage[i].id + ')">' + responseJSONMessage[i].nombreProducto + '</a></td>' + 
                '<td>' + responseJSONMessage[i].promedio + '</td>' +
                '<td>' + responseJSONMessage[i].maximo + '</td>' +
                '<td>' + responseJSONMessage[i].minimo + '</td>' +
                '</tr>';
        $('#productos').append(newRow);
    }
}

$(document).ready(function(){
    loadSemanasDisponibles();
    
    $('#semanas').change(function(){
        cargarTablaProductos($(this).val());
    });
});