function cargarListaProductos () {
    var dataArray = [];
    var action = new MessageParameter('action', 'traerProds');
    dataArray.push(action);
    
    makeAJAXRequest('../php/MainController.php', dataArray, generarListaProductos, mostrarMensajeError);
}

function generarListaProductos (responseJSONMessage) {
    for (var i = 0; i < responseJSONMessage.length; i++) {
        var newOption = '<option value="' + responseJSONMessage[i].id + '">' + responseJSONMessage[i].nombre + '</option>';
        $('#productos').append(newOption);
    }
}

$(document).ready(function(){
    cargarListaProductos();
});