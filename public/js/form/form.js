async function send(event) {
    event.preventDefault();

    let form = event.target;
    let formData = new FormData(form);
    let config = configObj(form.method, formData);
    let response = await sendData(form.action, config);

    if (!response) {
        return;
    }

    window.location.reload();
}