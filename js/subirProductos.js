
function accionProducto () {
    var dataArray = [];
    var action = new MessageParameter ('action', 'busProd');
    dataArray.push(action);
    makeAJAXRequest('./php/MainController.php', dataArray, listarProducto, mostrarMensajeError);
}

function listarProducto (responseJSONMessage) {
    for (var i = 0; i < responseJSONMessage.length; i++) {
        var newRow = '<tr>' + responseJSONMessage[i].producto + '</td>' +
                '<td>' + responseJSONMessage[i].descripcion + '</td>' +
                '</tr>';
        $('#productos').append(newRow);
    }
}
