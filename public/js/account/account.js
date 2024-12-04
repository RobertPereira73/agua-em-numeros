async function checkPassword(input) {
    let password = input.value;

    let data = formData();
    data.append('password', password);

    let config = configObj('POST', data);
    let response = await sendData('/meu-perfil/check-password', config);
    clearErrors();
    
    if (response) return;

    showErrors({
        oldPassword: [
            'Senha incorreta'
        ]
    });
}