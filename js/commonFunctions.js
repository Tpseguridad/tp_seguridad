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

function verificarPermisosControles () {
    var controles = $('.checkControls');
    
    if (controles.size() > 0) {
        controles.each(function(){
            var dataArray = [];
            var action = new MessageParameter('action', 'checkCtrlPermission');
            dataArray.push(action);
            var control = new MessageParameter('control', this.id);
            dataArray.push(control);
            var nombrePagina = window.location.pathname.split("/").slice(-1).toString();
            var pagina = new MessageParameter('pagina', nombrePagina);
            dataArray.push(pagina);
            
            makeAJAXRequest('../php/MainController.php', dataArray, bloquearControl, mostrarMensajeError);
        });
    }
}

function bloquearControl (responseJSONMessage) {
   if (responseJSONMessage.tienePermisos === false) {
        $('#' + responseJSONMessage.id).hide();
    } else {
        $('#' + responseJSONMessage.id).show();
    }
}

function verificarPermisosPaginaActual () {
    var dataArray = [];
    var action = new MessageParameter('action', 'checkPermission');
    dataArray.push(action);
    var nombrePagina = window.location.pathname.split("/").slice(-1).toString();
    var pagina = new MessageParameter('pagina', nombrePagina);
    dataArray.push(pagina);
    
    makeAJAXRequest('../php/MainController.php', dataArray, bloquearContenido, mostrarMensajeError);
}

function bloquearContenido (responseJSONMessage) {
   if (responseJSONMessage.tienePermisos === false) {
        $('#main').empty();
        $('#main').text(responseJSONMessage.mensaje);
    }
}

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
    
    verificarPermisosPaginaActual();
    verificarPermisosControles();
}