$(document).ready(function(){
    verificarUsuarioConectado();
    
    $('#logOut').click(function(){
        desconectarUsuario();
    });
});

function makeAJAXRequest (urlString, dataArray, processResponse, handleResponseError) {
    var buildDataObject = formatMessage(dataArray);
    sendMessage(urlString, buildDataObject, processResponse, handleResponseError);
}

function MessageParameter (propertyName, propertyValue) {
    this.propertyName = propertyName;
    this.propertyValue = propertyValue;
}

function mostrarMensajeError (responseJSONMessage) {
    alert(responseJSONMessage.errorMessage);
}

//______________


function verificarUsuarioConectado () {
    var dataArray = [];
    var action = new MessageParameter('action', 'checkUser');
    dataArray.push(action);
    
    makeAJAXRequest('../php/MainController.php', dataArray, mostrarUsuarioLogueado, mostrarMensajeError);
}

function desconectarUsuario () {
    var dataArray = [];
    var action = new MessageParameter('action', 'logOutUser');
    dataArray.push(action);
    
    makeAJAXRequest('../php/MainController.php', dataArray, mostrarUsuarioLogueado, mostrarMensajeError);
}

function mostrarUsuarioLogueado (responseJSONMessage) {
    $('#formlogin').hide();
    $('#logInfo').hide();
    
    if (responseJSONMessage.estaConectado === "1") {
        $('#logUserName').text(responseJSONMessage.apellido + ' ' + responseJSONMessage.nombre);
        $('#logInfo').show();
    } else {
        $('#formlogin').show();
    }
}