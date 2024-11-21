
<?php
/*require_once "modelo/usuarios.php";
require_once "modelo/participantes.php";
require_once "modelo/rol.php";
require_once "modelo/participantes.php";
require_once "modelo/bd.php";*/
/*require_once "../vista/admin/contenido/prueba.php";*/

////////////////// CONEXION A LA BASE DE DATOS //////////////////
/*require_once "modelo/acta.php";*/


$host = 'localhost';
$basededatos = 'acta_completas';
$usuario = 'root';
$contraseña = '';



$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_errno) {
die( "Fallo la conexión : (" . $conexion -> mysqli_connect_errno() 
. ") " . $conexion -> mysqli_connect_error());
}
  ///////////////////CONSULTA DE LOS ALUMNOS///////////////////////

  if(isset($_POST['insertar']))
  {
  
  $items1=($_POST['n_acta']);
  $items2=($_POST['nombre_aprendiz']);
  $items3=($_POST['nombre_its']);
  $items4=($_POST['descripcion']);
  
  while(true){
  
  $item1 = current($items1);
  $item2 = current($items2);
  $item3 = current($items3);
  $item4 = current($items4);
  ////// ASIGNARLOSAVARIABLES ////
  $nombre=(( $item1 !== false) ? $item1 :",&nbsp;");
  $apellido=(( $item2 !== false) ? $item2 : ",&nbsp;");
  $cargo=(( $item3 !== false) ? $item3 : ",&nbsp;");
  $asistencia=(( $item4 !== false) ? $item4 : ",&nbsp;");
  
  $valores= "('$nombre','$apellido','$cargo','$asistencia'),";
  
  $valoresQ =substr($valores,0,-1);
  ///////// QUERY DE INSERCIÓN /////
  
   $instertar_casos = "INSERT INTO casos_especiales(n_acta,nombre_aprendiz,nombre_its,descripcion) VALUES $valoresQ ";
   $instertar_conclusiones = "INSERT INTO conclusiones(n_acta,Aprendiz,instructor,descripcion) VALUES $valoresQ ";
  
   mysqli_query ($conexion, $instertar_casos);                                            
   mysqli_query ($conexion, $instertar_conclusiones);  
  
                          
                          $item1 = next($items1);
                          $item2= next($items2);
                          $item3 = next($items3);
                          $item4= next($items4);
  
  //$this->envioMail();
  // $this->envioMail($Correo_Electronico,$Contrasena_participantes$participantes$participantes);
  if($item1 === false && $item2 === false && $item3 === false && $item4 === false)break;
  
  //$this->envioMail();
  // $this->envioMail($Correo_Electronico,$Contrasena_participantes$participantes$participantes);
  }
  
  if ($instertar_conclusiones) {
    header("location:../?c=vistas&a=ConsultarFicha");
  }
  }

  

?>