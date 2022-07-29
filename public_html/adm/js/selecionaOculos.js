let dados;

function carregarDados(cb){
    fetch("https://provadorvirtual.000webhostapp.com/adm/selecionaOculos.php")
        .then(conteudo => conteudo.text())
        .then((texto) => {
            dados = JSON.parse(texto);
            cb();
        });
}

function exibirTabela(){
    console.log(dados);
    let tabela = ``;
    for(let linha in dados){
        tabela += `<li class="list-group-item blocoCard">`;
        tabela += `<div class="card text-center" style="width: 220px">`;
        tabela += `<img `;
        tabela += `src="${dados[linha].foto_arm}"`;
        tabela += `class="card-img-top" alt="fotoÓculos:${dados[linha].nome_arm}"`;
        tabela += `style="heigth: 150px; width:150px;"`;
        tabela += `/>`;
        tabela += `<div class="card-body">`
        tabela += `<h5 class="card-title">${dados[linha].nome_arm}</h5>`;
        tabela += `</div>`;
        tabela += `<ul class="list-group list-group-flush">`;
        tabela += `<li class="list-group-item txtCard">${dados[linha].id_mat}</li>`;
        tabela += `<li class="list-group-item txtCard">${dados[linha].id_mar}</li>`;
        tabela += `<li class="list-group-item txtCard">Cores: ${dados[linha].corPrincipal_arm} </li>`;
        tabela += `<li class="list-group-item txtCard"> e ${dados[linha].corSecund_arm}</li>`;
        tabela += `</ul>`;
        tabela += `<div class="card-body">`;
        tabela += `<a href="#" class="card-link">Editar</a>`;
        tabela += `<a href="processaDeleta.php?id_arm=${dados[linha].id_arm}" class="card-link">Apagar</a>`;
        tabela += `</div>`;
        tabela += `</div>`;
        tabela += `</li> `;
    }
    // console.log(tabela);
    let html = document.getElementById('lista')
    html.innerHTML = tabela
}

function iniciar(){
    carregarDados(exibirTabela)
}

window.onload = iniciar;