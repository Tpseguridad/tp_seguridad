function editarProducto (parIdProd) {
    var dataArray = [];
    var action = new MessageParameter ('action', 'traerUnProd');
    dataArray.push(action);
    var idProd = new MessageParameter ('idProd', parIdProd);
    dataArray.push(idProd);
    makeAJAXRequest('../php/MainController.php', dataArray, mostrarDatosProducto, mostrarMensajeError);
}

function borrarProducto () {
    var dataArray = [];
    var action = new MessageParameter ('action', 'delProd');
    dataArray.push(action);
    var idProd = new MessageParameter ('idProd', $('#idProd').val());
    dataArray.push(idProd);
    $('#idProd').val('');
    makeAJAXRequest('../php/MainController.php', dataArray, cargarListaProductos, mostrarMensajeErrorBorrado);
}

function mostrarMensajeErrorBorrado (responseJSONMessage) {
    alert(responseJSONMessage.errorMessage);
}

function promptBorrarProducto (parIdProd) {
    var borrar = confirm('Presione Aceptar para confirmar el borrado del producto. Esta accion no se puede deshacer!');
    
    if (borrar) {
        $('#idProd').val(parIdProd);
        borrarProducto(parIdProd);
    }
}

function mostrarDatosProducto (responseJSONMessage) {
    $('#action').val('actProd');
    $('#idProd').val('&idProd=' + responseJSONMessage[0].id);
    $('#descripcion').val(responseJSONMessage[0].descripcion);
    $('#nombre_producto').val(responseJSONMessage[0].nombre);
    $('#cancelar').show();
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
                '<td><a class="delete" href="javascript:promptBorrarProducto(' + responseJSONMessage[i].id + ')"></a></td>' +
                '</tr>';
        $('#productos').append(newRow);
    }
}

$(document).ready(function(){
    cargarListaProductos();
    
    $('#cancelar').click(function(){
        $(this).hide();
        $('#action').val('insProd');
        $('#idProd').val('');
        $('#descripcion').val('');
        $('#nombre_producto').val('');
    });
});
