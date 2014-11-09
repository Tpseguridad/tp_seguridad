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
                '<td><a class="edit" href="#"></a></td>' +
                '<td><a class="delete" href="#"></a></td>' +
                '</tr>';
        $('#productos').append(newRow);
    }
}

$(document).ready(function(){
    cargarListaProductos();
});
