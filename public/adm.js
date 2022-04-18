$(document).ready(() => {
    if($('.titulo-secao').html() == 'Painel'){
        $('#painel').attr('id', 'active');
        $('#active').children('.hover-menu-item').css('background-color', '#64cafa');
    }
    else if($('.titulo-secao').html() == 'Posts'){
        $('#active').children('.hover-menu-item').css('background-color', '#00001b');
        $('#painel').removeAttr('id');
        $('#midia').removeAttr('id');
        $('#comentarios').removeAttr('id');
        $('#posts').attr('id', 'active');
        $('#active').children('.hover-menu-item').css('background-color', '#64cafa');
    }
    else if($('.titulo-secao').html() == 'Mídia'){
        $('#active').children('.hover-menu-item').css('background-color', '#00001b');
        $('#painel').removeAttr('id');
        $('#posts').removeAttr('id');
        $('#comentarios').removeAttr('id');
        $('#midia').attr('id', 'active');
        $('#active').children('.hover-menu-item').css('background-color', '#64cafa');
    }
    else if($('.titulo-secao').html() == 'Comentários'){
        $('#active').children('.hover-menu-item').css('background-color', '#00001b');
        $('#painel').removeAttr('id');
        $('#posts').removeAttr('id');
        $('#midia').removeAttr('id');
        $('#comentarios').attr('id', 'active');
        $('#active').children('.hover-menu-item').css('background-color', '#64cafa');
    }

    // menu - esconder

    $('.prev-menu-adm').on('click', ()=>{
        if($('.prev-menu-adm').val() == 1){
            $('.menu-lateral-adm').css('left', '-15vw');
            $('.menu-lateral-adm').css('transition', 'all 0.8s');
            $('.prev-menu-adm').css('left', '-0.2vw');
            $('.prev-menu-adm').html('<i class="fas fa-angle-double-right fa-2x"></i>')
            $('.prev-menu-adm').css('transition', 'all 0.8s');
            $('.prev-menu-adm').val('2');

            // redimensionando container do conteúdo
            $('.container-quando-maberto').removeClass('col-10');
            $('.container-quando-maberto').addClass('col-12');
            $('.menu-aberto').css('margin-right', '0vw');
            $('.menu-aberto').css('transition', 'all 1s');
        }else {
            $('.menu-lateral-adm').css('left', '0vw');
            $('.menu-lateral-adm').css('transition', 'all 0.8s');
            $('.prev-menu-adm').css('left', '14.8vw');
            $('.prev-menu-adm').html('<i class="fas fa-angle-double-left fa-2x">');
            $('.prev-menu-adm').css('transition', 'all 0.8s');
            $('.prev-menu-adm').val('1');

            // redimensionando container do conteúdo
            $('.container-quando-maberto').removeClass('col-12');
            $('.container-quando-maberto').addClass('col-10');
            $('.menu-aberto').css('margin-right', '10vw');
            $('.menu-aberto').css('transition', 'all 1s');
        }
    });

    // midia

    function ajax(){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function(){
            // verifica se a conexão com o bd deu certo (parte comunicação)
            if (req.readyState == 4 && req.status == 200) {
                
                let array1 = req.responseText.split('@@@fim@@@');

                var dividindoMsg = [];
                for(let i = 0; i < array1.length; i++){
                    dividindoMsg = new Array;
                }

                for(let i = 0; i < array1.length; i++){
                    
                    for(let j = 0; j < 3 ; j++){
                        dividindoMsg[i] = array1[i].split('@@@y@@@');
                    }
                }

                dividindoMsg.forEach(div => {
                    console.log(div);
                });
                
                for(let i = 0; i < dividindoMsg.length; i++){
                    if(dividindoMsg[i].length == 1 ){
                        continue;
                    }
                    let div = document.createElement('div');
                    let excluir = document.createElement('span');
                    excluir.className = 'excluir-midia';
                    excluir.addEventListener("click", excluiImagem);
                    let descricao = document.createElement('small');
                    div.style.textAlign = "center";
                    descricao.style.fontStyle = "italic";
                    div.style.display = "flex";
                    div.style.flexDirection = "column";
                    div.style.padding = '10px 10px';
                    div.style.position = 'relative';

                    let img = document.createElement('img');
                    img.src = "imagens/"+dividindoMsg[i][1]; // tamanhos: 155px, 250px, 350px, 450px, 650px
                    img.style.width = dividindoMsg[i][2] +'px';
                    
                    $(descricao).html(dividindoMsg[i][0]);
                    $(excluir).html('<i class="fas fa-times fa-2x"></i>');
                    $(div).prepend(descricao);
                    $(div).prepend(img);
                    $(div).prepend(excluir);
                    
                    
                    $('.galeria-container').prepend(div);
                }
            }
        }

        // recuperando dados da comunicação -- chat --
        req.open('POST', '/recupera_midia', true);
        req.send();
    }

    $('.add-midia').on('click', function(){
        $('.form-midia').css('display', 'block');
        $('.add-midia').css('display', 'none');
    });

    $('.galeria-midia').on('click', function(){
        $('.galeria-midia').css('display', 'none');
        ajax();
        
    });

    function excluiImagem(){
        let img = $(this).next().attr('src');
        img = img.split('/');
        img = img[1];
        //console.log(img); // retorna o nome do arquivo salvo no banco de dados
        
        $.ajax({ // realiza uma requisição para o servidor
            // busca no servidor por via POST
            type: 'POST', 
            // url da página que interage com o servidor
            url: '/exclui_imagem',
            // envia os dados que serão parametros para busca no servidor (neste caso a data)
            data: 'src=' + img, // x-ww-form-urlencoded - sintaxe usada, formato urlencoded passa quantos valores quanto necessário (&parametro=valor)
            dataType: 'text',// modifica o tipo de retorno (padrao html)
            success: dados => {
                location.reload();
            }, // mostra os dados de erro do back
            error: function ( status, error)  {
                alert('Deu erro na recuperação dos dados');
                console.log(arguments);
                console.log(status);
                console.log(error.message);
            }
        }); 
    }
});