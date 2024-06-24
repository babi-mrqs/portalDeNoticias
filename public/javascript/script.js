function validarCamposCadastrarNoticia(event) {
    const idAutor = document.getElementById('idAutor').value;
    const titulo = document.getElementById('titulo').value;
    const conteudo = document.getElementById('conteudo').value;

    if (idAutor == 0 || titulo == '' || conteudo == '') {
        alert('Preencha os campos corretamente!');

        event.preventDefault();

        return false;
    }

    return true;
}

function validarCamposLogin(event) {
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;

    if (email === '' || senha === '') {
        alert('Preencha os campos corretamente!');

        event.preventDefault();

        return false;
    }

    return true;
}

function validarCamposCadastro(event) {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;

    if (nome === '' || email === '' || senha === '') {
        alert('Preencha os campos corretamente!');

        event.preventDefault();

        return false;
    }

    return true;
}

function validarCamposCadastrarAutor(event) {
    const nome = document.getElementById('nome').value;

    if (nome === '') {
        alert('Preencha todos os campos corretamente!');

        event.preventDefault();

        return false;
    }

    return true;
}