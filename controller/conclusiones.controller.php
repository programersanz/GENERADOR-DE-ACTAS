<?php
require_once "modelo/usuarios.php";
require_once "modelo/acta.php";
require_once "modelo/rol.php";
require_once "modelo/participantes.php";
require_once "modelo/basededatos.php";
require_once "modelo/conclusiones.php";


$usuario        = "root";
      $password       = "";
      $servidor       = "localhost";
      $basededatos    = "acta_completas";
      $con            = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
      $db             = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");
    
      $APRENDIZ       = $_REQUEST['Aprendiz'];
      $INSTRUCTOR    = $_REQUEST['instructor'];
      $DESCRIPCION         = $_REQUEST['descripcion'];
      
      
      /*function codAleatorio($length = 5) {
          return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
      }
      $CODE_REFERENCIA  = codAleatorio();*/
      
      
      for ($i=0; $i < count($APRENDIZ); $i++){
      
      $InserData =("INSERT INTO conclusiones (Aprendiz,instructor,descripcion) VALUES ('".$APRENDIZ[$i]."','".$INSTRUCTOR[$i]."','".$DESCRIPCION[$i]."')");
      $resultadoInsertUser = mysqli_query($con, $InserData);
        
        }
