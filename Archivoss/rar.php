<?php
$conn=new PDO('mysql:host=localhost; dbname=acta_completas', 'root', '') or die(mysql_error());
if(isset($_POST['submit'])!=""){
  $acta_rar=$_POST['acta_rar'];
  $name=$_FILES['file']['name'];
  $size=$_FILES['file']['size'];
  $type=$_FILES['file']['type'];
  $temp=$_FILES['file']['tmp_name'];
  // $caption1=$_POST['caption'];
  // $link=$_POST['link'];
  $fname = date("YmdHis").'_'.$name;
  $chk = $conn->query("SELECT * FROM  upload where name = '$name' ")->rowCount();
  if($chk){
    $i = 1;
    $c = 0;
	while($c == 0){
    	$i++;
    	$reversedParts = explode('.', strrev($name), 2);
    	$tname = (strrev($reversedParts[1]))."_".($i).'.'.(strrev($reversedParts[0]));
    // var_dump($tname);exit;
    	$chk2 = $conn->query("SELECT * FROM  upload where name = '$tname' ")->rowCount();
    	if($chk2 == 0){
    		$c = 1;
    		$name = $tname;
    	}
    }
}
 $move =  move_uploaded_file($temp,"Archivoss/upload/".$fname);
 if($move){
 	$query=$conn->query("insert into upload(acta_rar,name,fname)values('$acta_rar','$name','$fname')");
	if($query){
    header("location:?c=vistas&a=ConsultarFicha");
	}
	else{
	die(mysql_error());
	}
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
    <link href="vista/admin/cabecera/estilos.css" rel="stylesheet" type="text/css">
    <link href="vista/admin/contenido/estilos.css" rel="stylesheet" type="text/css">
    <link href="vista/css/estilos.css" rel="stylesheet" type="text/css">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <!-- CSS only -->
    <script src="vista/js/alertas.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <script src="icons.js"></script>
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="Archivoss/css/estilos.css" >




	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
<body>

<nav class="navbar navbar-expand-lg navbar-light blue fixed-top">
    <button id="sidebarCollapse" class="btn navbar-btn">
      <i class="fas fa-lg fa-bars"></i>
    </button>
    <a class="navbar-brand" href="">

    <img src="multimedia/logogrande.png" class="fixed-left"  width="370" height="65">

    
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"   data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

  
      <ul class="navbar-nav ml-auto">
      <div class="borde">


    
        <li class="nav-item active">

          <a class="nav-link" id="link" href="?c=Usuarios&a=logout" >
          <i class="fas fa-sign-out-alt"></i>
          Cerrar sesión<span class="sr-only">(current) </span></a>
        </li>
      

      </ul>
      </div>
    </div>
  </nav>

  <div class="wrapper fixed-left  ">
    <nav id="sidebar">
    <div class="position-static">
      <div class="sidebar-header">

      </div>

      <ul class="list-unstyled components">

      <li>
          <a href="?c=vistas&a=Perfil"><i class="fas fa-circle-user"></i>Perfil</a>
        </li>
       
        <li>
          <a href="#" class="btn-regist"><i class="fas fa-user-cog"></i>Registar
                  <span id="direction" class="fas fa-caret-down first"></span>
          </a>

          <!--sub menú-->
          <ul class="show-regist">
             <li><a href="?c=vistas&a=RegistroUsuExternos">Funcionarios</a></li>
              <li><a href="?c=vistas&a=Registrar">Administrador</a></li>
              <li><a href="?c=vistas&a=RegistroInstructor">Instructor</a></li>
              <li><a href="?c=vistas&a=RegistroAprendiz">Aprendiz</a></li>
              <li><a href="?c=vistas&a=RegistroFicha">Ficha</a></li>
              <li><a href="?c=vistas&a=RegistroPrograma">Programa</a></li>
          </ul>
        </li>

        <li>
          <a href="#" class="btn-consul"><i class="fas fa-user"></i>Consultar
          <span id="directions" class="fas fa-caret-down second"></span>
          </a>
            <!--sub menú-->
          <ul class="show-consul">
          <li><a href="?c=vistas&a=ConsultaUsuExternos">Funcionarios</a></li>
              <li><a href="?c=vistas&a=usuario">Administrador</a></li>
              <li><a href="?c=vistas&a=ConsultarInstructor">Instructor</a></li>
              <li><a href="?c=vistas&a=ConsultarAprendiz">Aprendiz</a></li>
              <li><a href="?c=vistas&a=ConsultarFicha">Ficha</a></li>
              <li><a href="?c=vistas&a=ConsultarPrograma">Programa</a></li>
          </ul>


        </li>
      </ul>
      </div>
    </nav>
    
    <script>
 
       $('.btn-regist').click(function(){
             $('#sidebar ul .show-regist').toggleClass("show");
           });
      $('.btn-consul').click(function(){
             $('#sidebar ul .show-consul').toggleClass("consult");
           });    
    </script>

	
<div id="content">
<center>
<h1>
  Subir Rar
</h1>
</center>

<div  class="card">
      <div class="card-body" >
<br>


<form enctype="multipart/form-data" action="" name="form" method="post">
				
<label for="">Seleccion el archivo:</label>

        <div class="row">
          <div class="col">
            <br>
          <input type="file" class="form-control form-control-sm" name="file" id="file" /></td>
          </div>
          <div class="col">
          <input type="submit" class="bt" style="background-color: #39A900; color:white; width:110px;" name="submit" id="submit" value="Subir" />

<input type="hidden" name="acta_rar" value="<?=$p->getN_acta()?> ">
          </div>
        </div>
			
			</form>

    <table class="table" id="tabla" id="example">
      
  <thead class="thead-dark">
    <tr>
     
      <center> <th scope="col">Archvos</th> </center>
      <center><th scope="col"> <i class="fa-solid fa-gear"></i>Acciones</th> </center>
      </tr>
  </thead>
  <tbody>
  <?php 
    try{
        foreach($ra as $rar): ?> 

        <tr>
        <td> <?= $rar->getName()?></td>

          <td>
         
					<a class="btn " style="background-color: #39A900; color:white;" href="Archivoss/download.php?filename=<?php $rar->getName();?>&f=<?php echo  $rar->getFname()  ?>"><i class="fa-solid fa-download"></i></a>
				</td>
    
    <?php endforeach; 
    }catch(Exception $e){
        die($e->getMessage());
        die("No se pudo listar");
    }
    ?>

  </tr>
 
  </tbody>
</table>

<script>
var tabla= document.querySelector("#tabla");
var dataTable=new DataTable(tabla);
</script>
</div>

</body>
</html>