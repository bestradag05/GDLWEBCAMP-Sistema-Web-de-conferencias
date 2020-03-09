
$(function()
{
    

    //Leterring
    
    $('.nombre-sitio').lettering();
    
    
    //Agregar Clase a menu
    
    
    $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
    $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
    $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');
   
    
    
    // Menu fijo
    var windowHeight =$(window).height();
    var barraAltura =$('.barra').innerHeight();
    $(window).scroll(function()
    {
       var scroll =$(window).scrollTop(); 
       if(scroll > windowHeight)
       {
           $('.barra').addClass('fixed');
           $('body').css({'margin-top': barraAltura +'px' });
       }else
       {
           $('.barra').removeClass('fixed'); 
           $('body').css({'margin-top': 0 +'px' });
       }
      
    });
    
    
    //Menu Responsive
    
     $('.menu-movil').on('click',function(){
        
        $('.navegacion-principal').slideToggle();
        
    });
    
    
    //Programa de conferencia
    
    
    $('div.ocultar').hide();
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');
    $('.menu-programa a').on('click',function()
    {
        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        $('.ocultar').hide();
        var enlace=$(this).attr('href');
        $(enlace).fadeIn(1000);
        
        return false;
    }) ;
    
    //Animaciones para los numeros
    
    $('.resumen-evento li:nth-child(1) p').animateNumber({number:6}, 1200);
    $('.resumen-evento li:nth-child(2) p').animateNumber({number:15}, 1200);
    $('.resumen-evento li:nth-child(3) p').animateNumber({number:3}, 1500);
    $('.resumen-evento li:nth-child(4) p').animateNumber({number:9}, 1500);
    
    //Cuenta Regresiva con el plugin countdown
    
    $('.cuenta-regresiva').countdown('2019/12/10 09:00:00',function(event)
    {
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });
     //Colorbox
 

    $('.invitado-info').colorbox({inline:true, width:"50%"});
    $('.boton_newsletter').colorbox({inline:true, width:"50%"});
});
