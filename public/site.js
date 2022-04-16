// icon Redes Sociais
function icEnter(i) {
    i.style.color = 'white';
}

// carrossel
const imagens = [
    {'id':'0', 'url':'imagens/1.png', 'note': '4', 'titulo': 'A Culpa é das Estrelas'},    
    {'id': '1', 'url': 'imagens/2.png', 'note': '3,5', 'titulo': 'O Hobbit'},
    {'id': '2', 'url': 'imagens/3.png', 'note': '3,5', 'titulo': 'Toda Mafalda'},
    {'id':'3', 'url':'imagens/4.jpg', 'note': '3', 'titulo': 'Morte no Nilo'},
    {'id': '4', 'url': 'imagens/5.jpg', 'note': '4,5', 'titulo': 'Grimório das Bruxas'},
    {'id': '5', 'url': 'imagens/6.jpg', 'note': '4,5', 'titulo': 'Um Encontro de Sombras'},
    {'id': '6', 'url': 'imagens/7.jpg', 'note': '4,5', 'titulo': 'Confissões do Crematório'},
    {'id': '7', 'url': 'imagens/8.jpg', 'note': '4,5', 'titulo': 'Os Segredos de Colin Bridgerton'},
    {'id': '8', 'url': 'imagens/9.jpg', 'note': '5', 'titulo': 'Uma Conjuração de Luz'},
    {'id': '9', 'url': 'imagens/10.jpg', 'note': '5', 'titulo': 'Escola dos Mortos'},
    {'id': '10', 'url': 'imagens/11.jpg', 'note': '5', 'titulo': 'Paixão Sem Limites'},
    {'id': '11', 'url': 'imagens/12.jpg', 'note': '3,5', 'titulo': 'Grimório Oculto'},
    {'id': '12', 'url': 'imagens/13.jpg', 'note': '3,5', 'titulo': 'Bruxa Natural'},

    {'id': '13', 'url': 'imagens/14.jpg', 'note': '3', 'titulo': 'Um Casamento Conveniente'},
    {'id': '14', 'url': 'imagens/15.jpg', 'note': '3', 'titulo': 'Gente Ansiosa'},
    {'id': '15', 'url': 'imagens/16.jpg', 'note': '3', 'titulo': 'Um de Nós Está Mentindo'},
    {'id': '16', 'url': 'imagens/17.jpg', 'note': '5', 'titulo': 'Um Tom Mais Escuro de Magia'},
    {'id': '17', 'url': 'imagens/18.jpg', 'note': '2,5', 'titulo': 'Serial Killers - Anatomia do Mal'}
];



// estrela completa : <i class="fas fa-star"></i>
// meia estrela : <i class="fas fa-star-half-alt"></i>
// estrela vazia : <i class="far fa-star"></i>

const colectionStars = [
    {'nota':'1', 'stars':'<i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>'},
    {'nota':'1,5', 'stars':'<i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>'},
    {'nota':'2', 'stars':'<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>'},
    {'nota':'2,5', 'stars':'<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i>'},
    {'nota':'3', 'stars':'<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>'},
    {'nota': '3,5', 'stars': '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i>'},
    {'nota': '4', 'stars': '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>'},
    {'nota': '4,5', 'stars':'<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>'},
    {'nota': '5', 'stars': '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>'}
];

function starsBookNote(note) {
    let resultado;
    colectionStars.forEach(nota => {
        if(note == nota.nota){
            resultado = nota.stars;
        }
    });
    
    return resultado;
}

let insereStar = [], i=0;
const loadImagens = (imagens, containerItems) => {
    imagens.forEach(image => {
        
        insereStar[i] = starsBookNote(image.note);
        //console.log(image.url+image.titulo)
        containerItems.innerHTML += `
            <div class='item'>
                <h1 class='titulo-slide' onmouseenter='exibeTitulo(this)'  onmouseleave='removeTitulo(this)'>${image.titulo}</h1>
                <img src='${image.url}'/>
                <span class='notasEmEstrelas'>${insereStar[i]}</span>
            </div>
        `
    });
    
}

const containerItems = document.querySelector('#container-items');
loadImagens(imagens, containerItems);

let items = document.querySelectorAll('.item');

const next = ()=> {
    containerItems.appendChild(items[0]);
    items[0].style.marginRight = '3px'
    items[0].style.transition = 'all 1s'
    items = document.querySelectorAll('.item');
    
};

const previous = ()=> {
    let lastItem = items[items.length - 1];
    items[items.length - 1].style.marginRight = '3px'
    items[items.length - 1].style.transition = 'all 1s'
    containerItems.insertBefore(lastItem, items[0]);
    items = document.querySelectorAll('.item');

};

document.querySelector('#previous').addEventListener('click', previous);
document.querySelector('#next').addEventListener('click', next);

function exibeTitulo(i){
    i.id = 'exibe-titulo-slide';
    let irmao = i.nextElementSibling;
    irmao.style.transform = 'scale(1.09)'
    irmao.style.transition = 'all 0.5s'
    console.log(irmao)
}

function removeTitulo(i){
    let irmao = i.nextElementSibling;
    irmao.style.transform = 'scale(1)'
    irmao.style.transition = 'all 0.5s'
    i.removeAttribute("id");
    
    console.log(irmao)
}