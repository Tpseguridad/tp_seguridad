function formatMessage (dataArray) {
    var iteratorA = 0;
    var resultObject = {};
    for (iteratorA = 0; iteratorA < dataArray.length; iteratorA++) {
        resultObject[dataArray[iteratorA].propertyName] = dataArray[iteratorA].propertyValue;
    }
    
    return resultObject;
}

function sendMessage (urlString, buildDataObject, processResponse, handleResponseError) {
    $.getJSON(urlString, buildDataObject).done(function(responseJSONMessage) {
            handleResponse(responseJSONMessage, processResponse, handleResponseError);
    });
}

function handleResponse (responseJSONMessage, processResponse, handleResponseError) {
    if (responseJSONMessage != null) {
        if (responseJSONMessage.errorMessage === undefined) {
            processResponse(responseJSONMessage);
        } else {
            handleResponseError(responseJSONMessage);
        }
    }
    //else {   processResponse(responseJSONMessage); }
}