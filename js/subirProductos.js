function editarProducto (parIdProd) {
    var dataArray = [];
    var action = new MessageParameter ('action', 'traerUnProd');
    dataArray.push(action);
    var idProd = new MessageParameter ('idProd', parIdProd);
    dataArray.push(idProd);
    makeAJAXRequest('../php/MainController.php', dataArray, mostrarDatosProducto, mostrarMensajeError);
}

function borrarProducto (parIdProd) {
    var dataArray = [];
    var action = new MessageParameter ('action', 'delProd');
    dataArray.push(action);
    var idProd = new MessageParameter ('idProd', parIdProd);
    dataArray.push(idProd);
    makeAJAXRequest('../php/MainController.php', dataArray, promptBorrarProducto, mostrarMensajeError);
}

function promptBorrarProducto () {
    
}

function mostrarDatosProducto (responseJSONMessage) {
    $('#action').val('actProd');
    $('#idProd').val('&idProd=' + responseJSONMessage[0].id);
    $('#descripcion').val(responseJSONMessage[0].descripcion);
    $('#nombre_producto').val(responseJSONMessage[0].nombre);
}

function cargarListaProductos () {
    $('#productos').empty();
    var dataArray = [];
    var action = new MessageParameter ('action', 'traerProds');
    dataArray.push(action);
    makeAJAXRequest('../php/MainController.php', dataArray, listarProducto, mostrarMensajeError);
}

function listarProducto (responseJSONMessage) {
    for (var i = 0; i < responseJSONMessage.length; i++) {
        var newRow = '<tr><td>' + responseJSONMessage[i].nombre + '</td>' +
                '<td>' + responseJSONMessage[i].descripcion + '</td>' +
                '<td><a class="edit" href="javascript:editarProducto(' + responseJSONMessage[i].id + ')"></a></td>' +
                '<td><a class="delete" href="javascript:borrarProducto(' + responseJSONMessage[i].id + ')"></a></td>' +
                '</tr>';
        $('#productos').append(newRow);
    }
}

$(document).ready(function(){
    cargarListaProductos();
});
