function makeAJAXRequest (urlString, dataArray, processResponse, handleResponseError) {
    var buildDataObject = formatMessage(dataArray);
    sendMessage(urlString, buildDataObject, processResponse, handleResponseError);
}

function thisProcessResponse (resultJSONString) {
    alert(resultJSONString.holiwis + '');
}

function MessageParameter (propertyName, propertyValue) {
    this.propertyName = propertyName;
    this.propertyValue = propertyValue;
}