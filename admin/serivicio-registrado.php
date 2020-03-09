<?php

include_once 'funciones/sessiones.php';
include_once 'funciones/funciones.php';

$sql="SELECT fecha_registrado, COUNT(*) AS resultado FROM registrados GROUP BY DATE(fecha_registrado) ORDER BY fecha_registrado";
$resultado = $conn->query($sql);

$arreglo_registro= array();
while ($registro_dia = $resultado->fetch_assoc())
{
    $fecha = $registro_dia['fecha_registrado'];
    $registro['fecha'] =date('Y-m-d', strtotime($fecha));
    $registro['cantidad'] = $registro_dia['resultado'];
    
    $arreglo_registro[]= $registro;
}

echo json_encode($arreglo_registro);




?>