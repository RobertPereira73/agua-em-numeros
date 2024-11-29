async function sendData(url, config) {
    try {
        let request = await fetch(url, config);
        let response = await request.json();
    
        return response.message;
    } catch (error) {
        console.log(error);
    }
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