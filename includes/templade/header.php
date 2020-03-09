<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  
  <meta http-equiv="x-ua-compatible" content="ie=edge" >
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
 <?php 
    //Cargando archivos de acuerdo a la página abierta.
    $archivo = basename($_SERVER['PHP_SELF']); //Retorna el nombre del archivo que está cargando actualmente.
    $pagina = str_replace(".php", "", $archivo); //busca , reemplaza y fuente de datos.

    if($pagina == 'invitados' || $pagina == 'index'){ //Valida si la pagg cargada es invitados.
      echo '<link rel="stylesheet" href="css/colorbox.css">';
    } else if($pagina == 'conferencia') { //Valida si la pagg cargada es conferencia.
      echo '<link rel="stylesheet" href="css/lightbox.css">';
    }
  ?>
 
  <link href="css/main.css" rel="stylesheet" type="text/css"/>
  <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina; ?>">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <header class="site-header">
      <div class="hero">
          <div class="contenido-header">
              <nav class="redes-sociales">
                  <a href="#"> <i class="fab fa-facebook-f"></i></a> 
                  <a href="#"> <i class="fab fa-twitter"></i></a> 
                  <a href="#"> <i class="fab fa-pinterest"></i></a> 
                  <a href="#"> <i class="fab fa-youtube"></i></a> 
                  <a href="#"> <i class="fab fa-instagram"></i></a> 
              </nav>
              <div class="informacion-evento">
                  <p class="fecha"><i class="fas fa-calendar-alt"></i> 10-12-Dic</p>
                  <p class="ciudad"><i class="fas fa-map-marker-alt"></i> Guadalajara, MX</p>
                  <h1 class="nombre-sitio"> GdlWebCamp</h1>
                  <p class="slogan">La mejor conferencia de <span>diseño web</span></p>
              </div><!-- informacion del evento -->
              
          </div>
      </div><!-- hero-->
  </header>
  <div class="barra">
      <div class="contenedor clearfix">
          <div class="logo">
              <a href="index.php">
              <img src="img/logo.svg" alt="logo gdlwebcap">
              </a>
          </div>
          <div class="menu-movil">
              <span></span>
              <span></span>
              <span></span>
                
          </div>
          <nav class="navegacion-principal clearfix" >
              <a href="conferencia.php">Conferencia</a>
              <a href="calendario.php">Calendario</a>
              <a href="invitados.php">Invitados</a>
              <a href="registro.php">Reservaciones</a>
          </nav>
          
      </div><!--contenedor -->
      
  </div><!--barra-->