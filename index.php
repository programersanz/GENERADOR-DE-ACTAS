<?php
require_once "modelo/usuarios.php";
require_once "modelo/basededatos.php";


session_start();

if(isset($_SESSION['user']) || (isset($_POST['correo']) && isset($_POST['contrasena']))){ //esto valida que se necesite una sesion iniciada o hacer login para usar cualquier metodo 

if (!isset($_GET['c'])) { //home controller es login
  
  require_once 'Controller/inicio.controller.php';
  $controller = new InicioController();
  call_user_func(array($controller, "inicio"));
} else {
  $controller = $_GET['c'];
  require_once "Controller/$controller.controller.php";
  $controller = ucwords($controller) . "controller";


  $controller = new $controller;


  $action = isset($_GET['a']) ? $_GET['a'] : 'inicio'; //operador ternario
  call_user_func(array($controller,$action));
}
}else { // si no se cumple la condicion reenvia al login 
  require_once 'controller/inicio.controller.php';
  $controller = new InicioController();
  call_user_func(array($controller, "inicio"));
}



