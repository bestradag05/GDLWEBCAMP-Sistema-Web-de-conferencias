<?php

require 'paypal/autoload.php';

define('URL_SITIO', 'http://localhost/GDLWEBCAMPHP/');
// Instalacion del sdk en la aplicacion
$apiContext = new \PayPal\Rest\ApiContext(
              new \PayPal\Auth\OAuthTokenCredential(
                      
                  // ClienteID
                    'AaXcGgE6FFU5vI-4YRsVFz8ZreqnoLqH8cFo_FOffsjW4Sq4w4FvUPhS_KakV4_OuJPlaTSuQI_Vck1n',
                    'EI7SZjk8-_WayW5VryKNhOXUDeXW58PPmGxKI3uFDtx80wmS5gqMjLnTnm2d4RjRpSUsDaUL1nYOu8hM'
                   //Secret   
                      )
        
        );

      