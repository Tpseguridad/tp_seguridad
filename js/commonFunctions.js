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

