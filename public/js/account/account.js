async function checkPassword(input) {
    let password = input.value;

    let data = formData();
    data.append('password', password);

    let config = configObj('POST', data);
    let response = await sendData('/meu-perfil/check-password', config);
    if (response) return;

    clearErrors();
    showErrors({
        oldPassword: [
            'Senha incorreta'
        ]
    });
}