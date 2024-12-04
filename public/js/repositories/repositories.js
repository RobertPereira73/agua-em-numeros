async function loadRepositories(page=1, search=null) {
    let data = formData();
    data.append('page', page);
    data.append('search', search);

    let config = configObj('POST', data);
    let response = await sendData('/repositories/search', config);

    element('#repositories').innerHTML = response;
    activatePagination();
}

function openModal(repository=null) {
    let form = document.querySelector('#modalRepositories form');
    clearInputs(form);
    if (repository) {
        fillInputs(repository, form);
    }

    $('#modalRepositories').modal('show');
}

async function deleteRepository(id) {
    let config = configObj('DELETE', formData());
    await sendData(`/repositories/delete-repository/${id}`, config);
    
    return window.location.reload();
}

function activatePagination() {
    let paginationItens = document.querySelectorAll('.paginationItem');
    paginationItens.forEach(item => {
        item.addEventListener('click', function () {
            let page = item.getAttribute('data-page');
            let search = document.querySelector('input[name="search"]')?.value ?? null;

            loadRepositories(page, search);
        });
    })
}

document.addEventListener('DOMContentLoaded', function () {
    activatePagination();

    let search = document.querySelector('[name="search"]'); 
    search.addEventListener('blur', () => {
        return loadRepositories(1, search.value);
    })
})