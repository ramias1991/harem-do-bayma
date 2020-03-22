$(function(){

    // Modal Início do Site // Confirmar se é maior de 18 anos
    var modalInicio = $('.modalInicio');
    var caixaModal = $('.caixaModalInicio');
    var h = 4;
    var m = 60;
    var s = 60;
    var ms = 1000;
    var limite = h * m * s * ms;

    if(localStorage.getItem('visit') == 'ok'){
        modalInicio.css('display', 'none');
        caixaModal.css('display', 'none');
        setTimeout(function(){
            localStorage.removeItem('visit');
        }, limite);
    } else {
        modalInicio.fadeIn();
        caixaModal.fadeIn();
    }

    function dimensionarModal(){
        var caixaModal = $('.caixaModalInicio');
        var widthImg = caixaModal.width();
        var heightImg = caixaModal.height();
        
        caixaModal.css('margin-left', -(widthImg/2));
        caixaModal.css('margin-top', -(heightImg/2));
    }

    $(document).ready(function(){
        dimensionarModal();

        $(window).resize(function(){
            dimensionarModal();
        });
    });

    $('.caixaModalInicio button').bind('click', function(){
        modalInicio.fadeOut();
        caixaModal.fadeOut();
        localStorage.setItem('visit', 'ok');
        
    });
    // Fim do Modal do Início do Site


    //Início Modal de Fotos da Modelo
    var modalInicioFoto =  $('.modalInicioFoto');
    var caixaModalFoto = $('.caixaModalFoto');
    modalInicioFoto.fadeOut();
    caixaModalFoto.fadeOut();

    function dimensionarModalFoto(){
        let widthImg = caixaModalFoto.find('img').width();
        let heightImg = caixaModalFoto.find('img').height();
        caixaModalFoto.css('margin-left', -(widthImg/2));
        caixaModalFoto.css('margin-top', -(heightImg/2));
    }

    $('.carousel-item img').bind('click', function(){
        let caminho = $(this).attr('src');
        caixaModalFoto.find('img').attr('src', caminho); 
        modalInicioFoto.fadeIn();
        caixaModalFoto.fadeIn();
        dimensionarModalFoto();
         
    });

    modalInicioFoto.bind('click', function(){
        $(this).fadeOut();
        caixaModalFoto.fadeOut();
    });

    $('.caixaModalFotoFechar').bind('click', function(){
        modalInicioFoto.fadeOut();
        caixaModalFoto.fadeOut();
    });

    if($(window).width() < 500 ){
        caixaModalFoto.css('width', '100%');
    } else {
        caixaModalFoto.css('width', '65%');
    }

});