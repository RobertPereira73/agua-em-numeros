async function sendData(url, config) {
    try {
        let request = await fetch(url, config);
        let response = await request.json();
        
        return returnResponse(response);
    } catch (error) {
        console.log(error);
        return;
    }
}

function returnResponse(response) {
    let errors = Object.values(response?.errors ?? {});
    if (errors?.length) {
        clearErrors();
        showErrors(response?.errors);
        return false;
    }

    return response.message;
}

function clearErrors() {
    let containerErros = document.querySelectorAll('.containerError');
    containerErros.forEach(container => container.innerHTML = '');    
}

function showErrors(errors) {
    for (let index in errors) {
        let errorList = errors[index];
        let errorContainerElement = containerError(index);
        if (!errorContainerElement) continue;

        errorList.forEach(error => {
            let spanError = createSpanError(error);
            errorContainerElement.appendChild(spanError);
        });
    }
}

function createSpanError(message) {
    let span = document.createElement('span');
    span.className = "roboto font12"
    span.innerText = message;

    return span;
}

function containerError(index) {
    return document.querySelector(`#${index}Errors`);
}

function configObj(method, body={}) {
    let _token = metaToken();
    
    return {
        method: method,
        headers: {
            'X-CSRF-TOKEN': _token,
            'Accept': "application/json, text-plain, */*",
        },
        body: body
    }
}

function metaToken() {
    return document.querySelector('meta[name="_token"]').content;
}

function formData() {
    return new FormData();
}