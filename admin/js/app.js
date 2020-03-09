  $(document).ready(function () {
    $('.sidebar-menu').tree()
    
    $('#registros').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'language'    :{
          paginate:{
              next: 'Siguiente',
              previous: 'Anterior',
              last: 'Ultimo',
              frist: 'Primero'
          },
          info: 'Mostando _START_ a _END_ de _TOTAL_ resultados',
          emptyTable: 'No hay registros',
          infoEmpty: '0 Registros',
          search: 'Buscar: '
      }
    });
    
  
    
  $('#repetir_password').on('input', function(){
    
    var password_nuevo = $('#password').val();
    
    if($(this).val() == password_nuevo)
    {
        $('#resultado_password').text('Correcto');
        $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
         $('#crear_registro').attr('disabled', false);
    }else
    {
         $('#resultado_password').text('No son iguales');
         $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
         $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
    }
      
      
  });
   
        //Date picker
    $('#fecha').datepicker({
      autoclose: true
    });
      
      //Initialize Select2 Elements
       $('.seleccionar').select2();    
       
        //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    });
    
    //Código para inicializar Selector de íconos font-awesome
    $('#icono').iconpicker();
    
    $.getJSON('serivicio-registrado.php', function(data)
    {
        var line = new Morris.Line({
      element: 'grafica-registros',
      resize: true,
      data: data,
      xkey: 'fecha',
      ykeys: ['cantidad'],
      labels: ['Item 1'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
    });
     // LINE CHART
    

  
  
    
    
  });
  
  
  
  