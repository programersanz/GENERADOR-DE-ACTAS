
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


        if(isset($_POST['']))
        {
        $items0=($_POST['n_acta']);
        $items1=($_POST['nombre']);
        $items2=($_POST['apellido']);
        $items3=($_POST['cargo']);
        $items4=($_POST['asistencia']);
        
        while(true){
        
        $item0 = current($items0);  
        $item1 = current($items1);
        $item2 = current($items2);
        $item3 = current($items3);
        $item4 = current($items4);
        ////// ASIGNARLOSAVARIABLES ////
        $n_acta=(( $item0 !== false) ? $item0 :",&nbsp;");
        $nombre=(( $item1 !== false) ? $item1 :",&nbsp;");
        $apellido=(( $item2 !== false) ? $item2 : ",&nbsp;");
        $cargo=(( $item3 !== false) ? $item3 : ",&nbsp;");
        $asistencia=(( $item4 !== false) ? $item4 : ",&nbsp;");
        
        //$valores= '('.$nombre.',"'.$apellido.'","'.$cargo.'","'.$asistencia.'"),';
        $valores= "('$n_acta','$nombre','$apellido','$cargo','$asistencia'),";
        
        $valoresQ =substr($valores,0,-1);
        ///////// QUERY DE INSERCIÓN /////
        
        $query = "INSERT INTO participantes (n_acta,nombre,apellido,cargo,asistencia) VALUES $valoresQ ";
        $sqlRes=$conexion->query($query) or mysql_error();
        
                                $item0 = next( $items0 );
                                $item1 = next( $items1 );
                                $item2= next($items2);
                                $item3 = next($items3);
                                 $item4= next($items4);
        
        //$this->envioMail();
        // $this->envioMail($Correo_Electronico,$Contrasena_participantes$participantes$participantes);
        if($item0 === false && $item1 === false && $item2 === false && $item3 === false && $item4 === false)break;
        
        //$this->envioMail();
        // $this->envioMail($Correo_Electronico,$Contrasena_participantes$participantes$participantes);
        }
        if ($query) {
         header("location:../?c=vistas&a=Particulares");
        }
        }

?>