<?php
////////////////// CONEXION A LA BASE DE DATOS //////////////////

$host = 'localhost';
$basededatos = 'acta_completas';
$usuario = 'root';
$contraseña = '';



$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_errno) {
die( "Fallo la conexión : (" . $conexion->connect_errno 
. ") " . $conexion->connect_error);
}
  ///////////////////CONSULTA DE LOS ALUMNOS///////////////////////

?>