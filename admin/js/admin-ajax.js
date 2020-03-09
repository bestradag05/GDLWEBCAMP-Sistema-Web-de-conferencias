$(document).ready(function()
{
    $('#guardar-registro').on('submit', function(e)     
    {
      e.preventDefault();  
      
      var datos= $(this).serializeArray(); // toma todos los datos del formulario y los junta en un arreglo
      
      $.ajax({
         type:$(this).attr('method'),
         data: datos,
         url: $(this).attr('action'),
         dataType: 'json',
         success: function(data)
         {
            console.log(data);
            var resultado= data;
            
            if(resultado.respuesta== 'exito')
            {
                    Swal.fire(
                            'Correcto!',
                            'Se guardó Correctamente!',
                            'success'
                            )
            }else
            {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'Hubo un Error!'
                    })
            }
         }
      })
      
    });
    
    // Se ejecuta cuando hay un archivo
    
     $('#guardar-registro-archivo').on('submit', function(e)     
    {
      e.preventDefault();  
      
      var datos= new FormData(this);
      
      $.ajax({
         type:$(this).attr('method'),
         data: datos,
         url: $(this).attr('action'),
         dataType: 'json',
         contentType: false,
         processData: false,
         async: true,
         cache: false,
         success: function(data)
         {
            console.log(data);
            var resultado= data;
            
            if(resultado.respuesta== 'exito')
            {
                    Swal.fire(
                            'Correcto!',
                            'Se guardó Correctamente!',
                            'success'
                            )
            }else
            {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'Hubo un Error!'
                    })
            }
         }
      })
      
    });
    
    
    
    
    
    //Eliminar un registro
    $('.borrar_registro').on('click', function(e)     
    {
      e.preventDefault();  
      
      var id= $(this).attr('data-id');
      var tipo =$(this).attr('data-tipo');
     
        Swal.fire({
            title: '¿Estas Seguro?',
            text: "Un registro eliminado no se puede recuperar!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            
             $.ajax({
                type: 'post',
                data: {
                    'id': id,
                    'registro': 'eliminar'
                },
                url: 'modelo-' + tipo + '.php',
                success: function (data)
                {
                    var resultado = JSON.parse(data);
                    
                    if(resultado.respuesta == 'exito')
                    {
                        
                         if (result.value) {
                            Swal.fire(
                                    'Eliminado!',
                                    'Registro Eliminado.',
                                    'success'
                                    );
                            jQuery('[data-id="' + resultado.id + '"]').parents('tr').remove();
                        }
                        
                    }else
                    {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error...',
                            text: 'No se pudo eliminar!'
                        })
                    }
                    

                }
            });
           
        })
     
     
     
      
    });
    
    
    
  
   
});