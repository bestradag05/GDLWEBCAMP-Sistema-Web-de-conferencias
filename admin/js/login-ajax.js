$(document).ready(function()
{
  
  $('#login-admin').on('submit', function(e)     
    {
      e.preventDefault();  
      
      var datos= $(this).serializeArray();
      
      $.ajax({
         type:$(this).attr('method'),
         data: datos,
         url: $(this).attr('action'),
         dataType: 'json',
         success: function(data)
         {
             
            var resultado= data;
            
            if(resultado.respuesta== 'exito')
            {
                    Swal.fire(
                            'Login Correcto!',
                            'Bienvenid@ '+resultado.usuario+' !',
                            'success'
                            )
                    setTimeout(function () // settimeout es una funcion que espera cierto tiempo para ejecutarse
                    {
                        window.location.href='admin-area.php';
                    }, 2000);
                    
                   
            }else
            {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'Usuario o password Incorrecto!'
                    })
            }
         }
      })
      
    });
    
   
});