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
            $('.menu-lateral-adm').css('left', '-20vw');
            $('.menu-lateral-adm').css('transition', 'all 1s');
            $('.prev-menu-adm').css('left', '-0.2vw');
            $('.prev-menu-adm').html('<i class="fas fa-angle-double-right fa-2x"></i>')
            $('.prev-menu-adm').css('transition', 'all 1s');
            $('.prev-menu-adm').val('2');
        }else {
            $('.menu-lateral-adm').css('left', '0vw');
            $('.menu-lateral-adm').css('transition', 'all 1s');
            $('.prev-menu-adm').css('left', '19.8vw');
            $('.prev-menu-adm').html('<i class="fas fa-angle-double-left fa-2x">');
            $('.prev-menu-adm').css('transition', 'all 1s');
            $('.prev-menu-adm').val('1');
        }
        
    });
});