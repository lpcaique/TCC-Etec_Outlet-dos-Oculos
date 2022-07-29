const urlParams = new URLSearchParams(window.location.search);
const id_arm = urlParams.get('id_arm');
let dados;
// pegando html

const lugarMarca = document.getElementById('marca')
const lugarMaterial = document.getElementById('material')
const lugarCorPrincipal = document.getElementById('corPrincipal')
const lugarcorSecundaria = document.getElementById('corSecundaria')
const lugarImagem = document.getElementById('imgOculos')
const lugarNomeOculos = document.getElementById('nomeOculos')

function carregarDados(cb){
    fetch("../adm/selecionaOculos.php")
        .then(conteudo => conteudo.text())
        .then((texto) => {
            dados = JSON.parse(texto);
            cb();
        });
}

function  exibirTabela(){
    try{    
        for(let i=0; i<= dados.length; i++){
            if(dados[i].id_arm == id_arm){
                console.log(dados[i]);
                lugarImagem.src = `adm/${dados[i].foto_arm}`
                lugarNomeOculos.innerHTML = `${dados[i].nome_arm}`
                lugarMarca.innerHTML += `${dados[i].id_mar}`
                lugarCorPrincipal.innerHTML += `${dados[i].corPrincipal_arm}`
                lugarMaterial.innerHTML += `${dados[i].id_mat}`
                lugarcorSecundaria.innerHTML += `${dados[i].corSecund_arm}`
            }
        }
    }catch(e){
        
    }
}

function iniciar(){
    carregarDados(exibirTabela)
}

window.onload = iniciar;