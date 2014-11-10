function cargarDatosProducto () {
    var dataArray = [];
    var action = new MessageParameter ('action', 'datosProd');
    dataArray.push(action);
    
    makeAJAXRequest('../php/MainController.php', dataArray, mostrarDatosProducto, mostrarMensajeError);
}

function mostrarDatosProducto (responseJSONMessage) {
    $('#titProd').text(responseJSONMessage[0].nombreProducto);
    $('#promProd').text('Precio Promedio: $' + responseJSONMessage[0].promedio);
    $('#minProd').text('Precio Minimo: $' + responseJSONMessage[0].minimo);
    $('#maxProd').text('Precio Maximo: $' + responseJSONMessage[0].maximo);
}

function cargarComentarios () {
    var dataArray = [];
    var action = new MessageParameter ('action', 'traerCommments');
    dataArray.push(action);
    
    makeAJAXRequest('../php/MainController.php', dataArray, mostrarComentarios, mostrarMensajeError);
}

function mostrarComentarios (responseJSONMessage) {
    $('#tablaComentarios').empty();
    for (var i = 0; i < responseJSONMessage.length; i++) {
        var newRow = '<hr><h3>' + responseJSONMessage[i].titulo + '</h3>' + 
                '<p>' + responseJSONMessage[i].comentario + '</p>';
        
        newRow += (responseJSONMessage[i].apellido != null && responseJSONMessage[i].nombre != null) ? 
            '<p class="autor">' + responseJSONMessage[i].apellido + ', ' + responseJSONMessage[i].nombre + '</p>' :
            '<p class="autor">Anonimo</p>'
        ;
        console.log(responseJSONMessage);
        $('#tablaComentarios').prepend(newRow);
    }
}

$(document).ready(function(){
    cargarDatosProducto();
    cargarComentarios();
});