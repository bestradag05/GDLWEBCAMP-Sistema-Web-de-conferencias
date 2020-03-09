$(document).ready(function()
{
    $('#contenido').append("Con jquery es mas facil");
});

document.addEventListener('DOMContentLoaded', function (event)
{
    var elemeto = document.getElementById('contenido2');
    var parrafo = document.createElement('p');
    
    var texto = document.createTextNode('Con javaScript es mas dificil');
    parrafo.appendChild(texto);
    elemeto.appendChild(parrafo);
    
});