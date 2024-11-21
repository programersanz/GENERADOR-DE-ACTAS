
    <div id="content">
    <div class="col">
 <!--<img src="multimedia/logo-naranja.png" class="fixed-righ"  width="200" height="200">-->
<center>
<br>
<h1 class="fixed-center" > ACTA DE REUNIÓN</h1>
</center>
</div>
<br>
<input name="id_ficha" id='id_ficha' type="hidden" maxlength="25" oninput="maxlengthNumber(this);" required  class="form-control" value="<?=$p->getId_ficha()?>">
<div class="card w-100">
<div class="card-body">
<?php $a=$this->modelo->ObtenerCont($_GET['ficha']) ?>
 <H5>ACTAS CREADAS: <?=$a->cont?></H5>
<form action="?c=acta&a=save" id="acta" name="acta" class="sign-up-form" method="post">
  <br>
  <center>
  <div class="row">
    <div class="col">
    <H5 for="">Acta no:</H5>
    <input name="acta_no" id='acta_no' type="text" style="width:250px;" oninput="maxlengthNumber(this);" required  class="" value="" >
    </div>
  </div>
</center>
<br>
<br>
  <div class="row">
    <div class="col">
  
      <?php 
      $c=0;
      $c=$this->modelo->obtenercontador($_GET['ficha']);
      ?>
      <input type="hidden"  value=" <?php   $c = $c->acta_contador; ?>">
    <input name="acta_contador" id='ficha' type="hidden"  oninput="maxlengthNumber(this);" required  class="" value="<?=$c+1; ?>" >
      <H5 for="">Ficha:</H5>


      <input name="ficha" id='ficha' type="text"  oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getN_ficha()?>" >
      

    </div>


    <div class="col">
      <H5 for="">  Programa:</H5>
      

      <input name="programa" id='programa' type="text"  oninput="maxlengthNumber(this);" required  class="" placeholder="programa" value=" <?=$p->getPrograma()?>">

    </div>


    <div class="col">
    <H5 for=""> Nombre comité:</H5>
    
    <select  name="nom_rev" id='nom_rev' type="text"  oninput="maxlengthNumber(this);" required  class="" placeholder="programa"> 

      <option>Seleccione el comité</option>
      <option value="Comité Académico">Comité Académico</option>
      <option value="Comité Étapa Productiva">Comité Etapa Productiva</option>
      <option value="Comité de Seguimiento">Comité de Seguimiento</option>
      <option value="Comité Extraordinarios">Comité Extraordinarios</option>
      <option value="Comité de Cierre">Comité de Cierre</option>
  
  
  </select>
    </div>


    </div>

    <div class="row">
    <div class="col">
    <br>
      <H5 for="">  Fecha:</H5>
      <input name="fecha" id='fecha' type="date"  oninput="maxlengthNumber(this);" required  class="" placeholder="fecha">
    </div>

    <div class="col">
    <br>
      <H5 for="">  Hora Inicio:</H5>
      <input name="hora_in" id='hora_in' type="time"  oninput="maxlengthNumber(this);" required  class="" placeholder="Hora inicio">
    </div>
    <br>
    <div class="col">
    <br>
      <H5 for="">  Hora Fin:</H5>
      <input name="hora_fin" id='hora_fin' type="time"  oninput="maxlengthNumber(this);" required  class="" placeholder="hora fin">
    </div>


  </div>

  <div class="row">
    <div class="col">
    <br>
      <H5 for=""> Lugar/Enlace:</H5>
      <input name="lu_en" id='lu_en' type="text"  oninput="maxlengthNumber(this);" required  class="" placeholder="Lugar/Enlace">
    </div>

    <div class="col">
    <br>
      <H5 for="">  Dirección:</H5>
      <input name="direccion" id='direccion' type="text"  oninput="maxlengthNumber(this);" required  class="" placeholder="Dirección" value="Cl. 15 #31-42" >
    </div>

    <div class="col">
    <br>
      <H5 for="">  Ciudad:</H5>
      <input name="ciudad" id='ciudad' type="text"  oninput="maxlengthNumber(this);" required  class="" placeholder="Ciudad" value="Bogotá D.C.">
    </div>


  </div>





    <div class="row">
    <div class="col">
    <br>
      <h3 for="">      Agenda o puntos a desarrollar:</h3>   
      <textarea name="agenda" id='agenda' type="text" placeholder="Agenda o puntos a desarrollar"  cols="60" rows="10" oninput="maxlengthNumber(this);" required  class="" value="">1.Comité de evaluación y seguimiento aprendices ficha - <?=$p->getN_ficha()?> de <?=$p->getPrograma()?>
    </textarea >
    </div>
<div>
  

    <div class="row">
    <div class="col">
    <br>
    <h3 for="">        Objetivos</h3>
      <textarea name="objetivos" id='objetivos' type="text"  cols="60" rows="10" oninput="maxlengthNumber(this);" required  class="" value="">Se reúne el ________________________________________, como instancia competente para investigar y analizar los casos tanto académicos como disciplinarios de los aprendices de la ficha- <?=$p->getN_ficha()?> de <?=$p->getPrograma()?>.</textarea >
    </div>
  </div>

  <!--inicio participantes-->


  <!--inicio participantes-->



 <!-- <form action="?c=acta&a=save" id="acta" name="acta" class="sign-up-form" method="post">-->

 <?php 
$zz= 0;
$r=1;

  foreach

  

($this->modelo->ListarActas() as $r):



?>



<?php


$r->n_acta+1;
endforeach;



  ?>
<br>

<p>
  <div class="row">
    <div class="participantes">
    <br>
    <center>
    <h3>1.Participantes:</h3>
    </center>
   
    <div class="part">

<center>

<table   class="tablas" id="table">
<p>
<thead class="t-head">
<p>
    <tr>
      <th scope="col"></th>
      <th scope="col">Nombres y Apellidos</th>
      <th scope="col">Cargo</th>
      <th scope="col">Asistencia</th>
    </tr>
  </thead>
  <tbody  class="t-body">
  <p>
    <center>
    <tr id="tr">
    <input type="hidden"  value=" <?php   $zz = $r->n_acta; ?>">
  <td><input  class='form-control' type='hidden' name='n_acta[]'  id='n_acta' placeholder='acta' required value="<?=$zz+1?>"/></td>    
  <td><select name='nombre[]' style="width:350px; height:50px;" id='nombre' type="text"  oninput="maxlengthNumber(this);" required  class="form-control" >
    <?php foreach($funco as $fun): ?>
 
    <option value="<?=$fun->getNombre(),$fun->getApellido()?>" <?=$fun->getId_funcionario() == $fun->getId_funcionario() ? 
    '' : ''?> > 
     <?=$fun->getNombre(),$fun->getApellido()?></option>
    <?php endforeach;?>
  </select></td> 
  <td> <select   name='cargo[]' id='cargo' style="width:320px; height:50px;"   class='form-control' >  <option value='instructor jefe de taller'>instructor jefe de taller</option> <option value='instructora jefe de taller'>instructora jefe de taller</option> <option value='Instructora'>Instructora</option> <option value='Instructor'>Instructor</option> <option value="Funcionario de apoyo a Bienestar de Aprendices">Funcionario de apoyo a Bienestar de Aprendices</option> <option value="Coordinador Académico">Coordinador Académico</option> <option value="Coordinador de Formación Profesional Integral o quien haga sus veces">Coordinador de Formación Profesional Integral o quien haga sus veces</option> <option value="Vocero de la ficha">Vocero de la ficha</option> <option value="Representante del centro de formación">Representante del centro de formación</option></select></td>
  <td> <select   name='asistencia[]' id='asistencia' style="width:250px; height:50px;"   class='form-control' >  <option value='Asistio'>Asistio</option>  <option value='No Asistio'>No Asistio</option> </select></td>

</tr>

<tr id="tr">

<td><input  class='form-control' type='hidden' name='n_acta[]'  id='n_acta' placeholder='acta' required value="<?=$zz+1?>"/></td>    
<td><select name='nombre[]' id='nombre' style="width:350px; height:50px;" type="text"  oninput="maxlengthNumber(this);" required  class="form-control" >
    <?php foreach($funco as $fun): ?>
 
    <option value="<?=$fun->getNombre(),$fun->getApellido()?>" <?=$fun->getId_funcionario() == $fun->getId_funcionario() ? 
    '' : ''?> > 
     <?=$fun->getNombre(),$fun->getApellido()?></option>
    <?php endforeach;?>
  </select></td> 
<td> <select   name='cargo[]' id='cargo' style="width:320px; height:50px;"   class='form-control' >  <option value='instructor jefe de taller'>instructor jefe de taller</option> <option value='instructora jefe de taller'>instructora jefe de taller</option> <option value='Instructora'>Instructora</option> <option value='Instructor'>Instructor</option> <option value="Funcionario de apoyo a Bienestar de Aprendices">Funcionario de apoyo a Bienestar de Aprendices</option> <option value="Coordinador Académico">Coordinador Académico</option> <option value="Coordinador de Formación Profesional Integral o quien haga sus veces">Coordinador de Formación Profesional Integral o quien haga sus veces</option> <option value="Vocero de la ficha">Vocero de la ficha</option> <option value="Representante del centro de formación">Representante del centro de formación</option></select></td>
<td> <select   name='asistencia[]' id='asistencia' style="width:250px; height:50px;"   class='form-control' >  <option value='Asistio'>Asistio</option>  <option value='No Asistio'>No Asistio</option> </select></td>

</tr>
<tr id="tr">

<td><input  class='form-control' type='hidden' name='n_acta[]'  id='n_acta' placeholder='acta' required value="<?=$zz+1?>"/></td>    
<td><select name='nombre[]' style="width:350px; height:50px;" id='nombre' type="text"  oninput="maxlengthNumber(this);" required  class="form-control" >
    <?php foreach($funco as $fun): ?>
 
    <option value="<?=$fun->getNombre(), $fun->getApellido()?>" <?=$fun->getId_funcionario() == $fun->getId_funcionario() ? 
    '' : ''?> > 
     <?=$fun->getNombre(), $fun->getApellido()?></option>
    <?php endforeach;?>
  </select></td> 
  <td> <select   name='cargo[]' id='cargo' style="width:320px; height:50px;"   class='form-control' >  <option value='instructor jefe de taller'>instructor jefe de taller</option> <option value='instructora jefe de taller'>instructora jefe de taller</option> <option value='Instructora'>Instructora</option> <option value='Instructor'>Instructor</option> <option value="Funcionario de apoyo a Bienestar de Aprendices">Funcionario de apoyo a Bienestar de Aprendices</option> <option value="Coordinador Académico">Coordinador Académico</option> <option value="Coordinador de Formación Profesional Integral o quien haga sus veces">Coordinador de Formación Profesional Integral o quien haga sus veces</option> <option value="Vocero de la ficha">Vocero de la ficha</option> <option value="Representante del centro de formación">Representante del centro de formación</option></select></td>
<td> <select   name='asistencia[]' id='asistencia' style="width:250px; height:50px;"  class='form-control' >  <option value='Asistio'>Asistio</option>  <option value='No Asistio'>No Asistio</option> </select></td>

</tr>
</center>
<p>
</tbody>
</table>
<br /><br />
<bootom id="add" style="background-color: #39A900; color:white;"  class="bt"  >Agregar</bootom>
<bootom id="del" style="background-color: #39A900; color:white;"  class="bt">Eliminar</bootom>
<br /><br />

    </div>
   

    <script type="text/javascript">

$(document).ready(function(){                                                           

$("#add").click(function(){
// Obtenemos el numero de columnas (td) que tiene la primera fila
// (tr) del id "tabla"
var tds=$("#table tr:first td").length;
// Obtenemos el total de filas (tr) del id "tabla"
var trs=$("#table tr").length;
var nuevaFila="<tr>";
cant = $('#contador-filas').val();
cant++;
$('#contador-filas').val(cant)
nuevaFila+="<td><input class='form-control' type='hidden' name='n_acta[]'  id='n_acta' placeholder='acta"+ " ' required value='<?=$zz+1?>'/> </td>"+
"<td><select name='nombre[]' id='nombre' type='text' style='width:350px; height:50px;' oninput='maxlengthNumber(this);' required  class='form-control' ><?php foreach($funco as $fun): ?><option value='<?=$fun->getNombre(),$fun->getApellido()?>' <?=$fun->getId_funcionario() == $fun->getId_funcionario() ? '' : ''?> > <?=$fun->getNombre(),$fun->getApellido()?></option> <?php endforeach;?> </select> </td>"+
"<td> <select  name='cargo[]' id='cargo' style='width:320px; height:50px;'  class='form-control' >  <option value='instructor jefe de taller'>instructor jefe de taller</option> <option value='instructora jefe de taller'>instructora jefe de taller</option> <option value='Instructor tecnico'>Instructor tecnico</option> <option value='Instructora tecnica'>Instructora tecnica</option> <option value='Instructora'>Instructora</option> <option value='Instructor'>Instructor</option> </select></td>"+
"<td> <select  name='asistencia[]' id='asistencia' style='width:250px; height:50px;'   class='form-control' >  <option value='Asistio'>Asistio</option>  <option value='No Asistio'>No Asistio</option> </select></td>";
// Añadimos una columna con el numero total de columnas.
// Añadimos uno al total, ya que cuando cargamos los valores para la
// columna, todavia no esta añadida
nuevaFila+="</tr>";
$("#table").append(nuevaFila);
});
/**
* Funcion para eliminar la ultima columna de la tabla.
* Si unicamente queda una columna, esta no sera eliminada
*/
$("#del").click(function(){
// Obtenemos el total de filas (tr) del id "tabla"
var trs=$("#table tr").length;
if(trs>0)
{
// Eliminamos la ultima fila
cant--;
$('#contador-filas').val(cant)
$("#table tr:last").remove();

}
});
});
</script>

  </div>
  </div>


  <div class="row">
    <div class="col">
    <br>
    <center>
      <h3 for="">2.Información conformación de la ficha</h3>
      </center>
     <div  class="">
      <div class="">
<br>
    <table class="table" id="tabla">
     
  <thead class="thead-dark">
    <tr>
     
     <th scope="col" class="text-center">ESTADO DEL APRENDIZ</th> 
      <th scope="col" class="text-center">CUENTA</th> 
      </tr>
  </thead>
  
  <tbody>
  <tr>
    <td > <H5>TRANSLADO</H5>  </td>
    <?php $a=$this->modelo->ObtenerTranslado($_GET['ficha']) ?>
    <td  ><H5><?=$a->Translado ?></H5></td>
    </tr>
    <tr>
    <td>  <H5>EN FORMACION</H5> </td>

    <?php $b=$this->modelo->ObtenerFormacion($_GET['ficha']) ?>
    <td ><H5><?=$b->Formacion ?></H5> 
    </tr>
    <tr>
    <td s> <H5> CANCELADO  </H5>   </td>
    <?php $c=$this->modelo->ObtenerCancelado($_GET['ficha']) ?>
    <td style="background-color: rgb(255, 255, 255 );"><H5><?=$c->Cancelado ?></H5> </td>
    </tr>
    <tr>
    <td >  <H5>RETIRO VOLUNTARIO</H5> </td>

    <?php $d=$this->modelo->ObtenerRetiro($_GET['ficha']) ?>
    <td><H5><?=$d->Retiro ?> </H5>  </td>
    </tr>


    <tr>
    <td >  <H5>CONDICIONADO</H5> </td>

    <?php $e=$this->modelo->ObtenerCondicionado($_GET['ficha']) ?>
    <td><H5><?=$e->CONDICIONADO ?> </H5>  </td>
    </tr>

    
    <tr>
    <td >  <H5>APLAZADO</H5> </td>

    <?php $h=$this->modelo->ObtenerAplazado($_GET['ficha']) ?>
    <td><H5><?=$h->APLAZADO ?> </H5>  </td>
    </tr>

    <tr>
    <td >  <H5>INDUCCIÓN</H5> </td>

    <?php $j=$this->modelo->ObtenerInduccion($_GET['ficha']) ?>
    <td><H5><?=$j->INDUCCION ?> </H5>  </td>
    </tr>

    <tr>
    <td > <H5>SUMA TOTAL</H5></td>

    <td ><H5><?=  $total= $d->Retiro + $c->Cancelado + $b->Formacion + $a->Translado + $e->CONDICIONADO + $h->APLAZADO + $j->INDUCCION ?></H5> </td>
    </tr>
  </tbody>
</table>

    </div>
   

  </div>
  <p>
  <br>
  <div class="ro">
  <h3>3.Verificación del acta(s) anteriores(es)</h3>
    <?php foreach
  ($this->modelo->obtenerVerificacion($_GET['ficha'], $_GET['acta_contador']) as $tra):?>
   <p>Acta Comité No.<?=$tra->getN_acta()?> - <?=$tra->getFecha()?></p>

  <?php endforeach; ?>
  <p></p>
</div>
<br>
  <div  class="row">
      <div class="">
        <h3>4.Casos anterior al comité</h3>

<br>



<table class="table" id="tabla" >
<thead class="thead-dark">
    <tr>
      </tr>
  </thead>
  <tbody>
  <tr class="back-head">
    <td><input type="hidden"></td>
    <td><input type="hidden"></td>
    <td><input type="hidden"></td>
    <td><center><h5>Aprendiz</h5></center></td>
    <td><center><h5>Instructor</h5></center></td>
    <td><center><h5>Descripción</h5></center></td>
     <td><center><h5>Cumplimiento</h5></center></td>
  </tr>
  <?php foreach
  ($this->modelo->casosAnteriores($_GET['ficha'], $_GET['acta_contador']) as $ww):?>
    <tr>
    <td><input  class='form-control' type='hidden' name='A_ficha[]'  id='A_ficha' placeholder='acta' required value="<?=$ww->n_ficha?>"/></td>
    <td><input  class='form-control' type='hidden' name='A_contador[]'  id='A_contador' placeholder='acta' required value="<?=$ww->c_contador?>"/></td>
    <td><input  class='form-control' type='hidden' name='A_acta[]'  id='A_acta' placeholder='acta' required value="<?=$ww->q_acta+1?>"/></td>
    <td><input  class="parti" type='text' name='A_aprendiz[]'  id='A_aprendiz' placeholder='acta' required value="<?=$ww->Aprendiz?>"/></td>
    <td><input  class="parti" type='text' name='A_medida[]'  id='A_medida' placeholder='acta' required value="<?=$ww->medida?>"/></td>
    <td><input  class="parti" type='text' name='A_descripcion[]'  id='A_descripcion' placeholder='acta' required value="<?=$ww->descripcion_m?>"/></td>
    <td> <select   name='A_cumplimiento[]'  id='A_cumplimiento'  class="parti" > <option><?=$ww->cumplimiento?></option> <option value="Cumplio">N/A</option> <option value="Cumplio">Cumplio</option>  <option value='No cumplio'>No cumplio</option></select></td>
  </tr>

  <?php endforeach; ?>
    </tr>
</tbody>
</table>
    </div>
   

  </div>

  <p>  <p>
  <div class="row">
    <div class="participantes">
    <br>
    <center>
    <h3>5.Aprendices Destacados:</h3>
    </center>
   
    <div class="part">

<center>

<table   class="tablas" id="table5">
<p>
<thead class="t-head">
<p>
    <tr>
      <th scope="col"></th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
    </tr>
  </thead>
  <tbody  class="t-body">
  <p>
    <center>
    <tr id="tr">
    <input type="hidden"  value=" <?php   $zz = $r->n_acta; ?>">
  <td><input  class='form-control' type='hidden' name='acta_des[]'  id='acta_des' placeholder='acta'  value="<?=$zz+1?>"/></td>    
  <td><input  class='parti' type='text' name='nombre_des[]'  id='nombre_des' placeholder='Nombres'  value=""/></td> 
  <td><input  class='parti' type='text' name='apellido_des[]'  id='apellido_des' placeholder='Apellidos'  value=""/></td>
  </tr>
</center>
<p>
</tbody>
</table>
<br /><br />
<bootom id="add5" style="background-color: #39A900; color:white;"  class="bt"  >Agregar</bootom>
<bootom id="del5" style="background-color: #39A900; color:white;"  class="bt">Eliminar</bootom>
<br /><br />

    </div>
   

    <script type="text/javascript">

$(document).ready(function(){                                                           

$("#add5").click(function(){
// Obtenemos el numero de columnas (td) que tiene la primera fila
// (tr) del id "tabla"
var tds=$("#table5 tr:first td").length;
// Obtenemos el total de filas (tr) del id "tabla"
var trs=$("#table5 tr").length;
var nuevaFila="<tr>";
cant = $('#contador-filas').val();
cant++;
$('#contador-filas').val(cant)
nuevaFila+="<td><input class='form-control' type='hidden' name='acta_des[]'  id='acta_des' placeholder='acta"+ " '  value='<?=$zz+1?>'/></td>"+
"<td><input class='parti' type='text' name='nombre_des[]'  id='nombre' placeholder='nombres"+ " '  value=''/></td>"+
"<td><input class='parti' type='text' name='apellido_des[]'  id='apellido' placeholder='apellidos"+ " '  value=''/></td>";
// Añadimos una columna con el numero total de columnas.
// Añadimos uno al total, ya que cuando cargamos los valores para la
// columna, todavia no esta añadida
nuevaFila+="</tr>";
$("#table5").append(nuevaFila);
});
/**
* Funcion para eliminar la ultima columna de la tabla.
* Si unicamente queda una columna, esta no sera eliminada
*/
$("#del5").click(function(){
// Obtenemos el total de filas (tr) del id "tabla"
var trs=$("#table5 tr").length;
if(trs>0)
{
// Eliminamos la ultima fila
cant--;
$('#contador-filas').val(cant)
$("#table5 tr:last").remove();

}
});
});
</script>

  </div>
  </div>

  <p>  <p>
  
  <p>


 <!--casos particulares-->
 <div class="row">
    <div class="col">
    <br>
    <div style="">

<center>
<h3>6.Casos Particulares</h3>
<table class="tablas" id="table3" style="width:100px">
<tbody >
<tr>
<input type="hidden"  value=" <?php   $zz = $r->n_acta; ?>">
<td><input class="parti" type="hidden" name="C_ficha[]" style="width:50px; height:50px;" id="n_ficha" placeholder="ficha" required value="<?=$p->getN_ficha()?>"/> </td>
<td><input class="parti" type="hidden" name="C_acta[]"  style="width:50px; height:50px;" id="C_acta" placeholder="acta" required value="<?=$zz+1?>"/> </td>
<td><input class="parti"  type="text" name="nombre_aprendiz[]"  id=" nombre_aprendiz" placeholder="Aprendiz" required /> </td>
<td><input class="parti"  type="text" name="nombre_its[]" id="nombre_its" placeholder="instructor" required /> </td>
<td><textarea class="area"  type="text" name="description[]" style="width:310px; height:55px;" id="description" placeholder="descripcion" required></textarea></td>
<td>
   <select  name="falta[]" id="falta"   class="parti" >  
    <option value="Académica">Académica</option> 
    <option value="disciplinaria">disciplinaria</option>  
    <option value="Académica y Disciplinaria">Académica y Disciplinaria</option>
  </select>
</td>
  <td><select name="reglamento[]" id='reglamento' class="selectt" type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>N/A</option>
  <?php foreach($reca as $reg): ?>
 
    <option value="<?=$reg->getNombre_falta()?>" <?=$reg->getId_regla() == $reg->getId_regla() ? 
    '' : ''?> > 
     <?=$reg->getNombre_falta()?> </option>
    <?php endforeach;?>
</select></td>
<!--regla 2-->
<td>  <select name="reglamento_a[]" id='reglamento_a' class="selectt" type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>N/A</option>
  <?php foreach($reca as $reg): ?>
 
    <option value="<?=$reg->getNombre_falta()?>" <?=$reg->getId_regla() == $reg->getId_regla() ? 
    '' : ''?> > 
     <?=$reg->getNombre_falta()?> </option>
    <?php endforeach;?>
</select></td>
<!--regla 3-->
<td>  <select name="reglamento_b[]" id='reglamento_b' class="selectt" type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>N/A</option>
  <?php foreach($reca as $reg): ?>
 
    <option value="<?=$reg->getNombre_falta()?>" <?=$reg->getId_regla() == $reg->getId_regla() ? 
    '' : ''?> > 
     <?=$reg->getNombre_falta()?> </option>
    <?php endforeach;?>
</select></td>
<!--regla 4-->
<td>  <select name="reglamento_c[]" id='reglamento_c' class="selectt" type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>N/A</option>
  <?php foreach($reca as $reg): ?>
 
    <option value="<?=$reg->getNombre_falta()?>" <?=$reg->getId_regla() == $reg->getId_regla() ? 
    '' : ''?> > 
     <?=$reg->getNombre_falta()?> </option>
    <?php endforeach;?>
</select></td>
</tr>
<tr>
  
<td><input class="parti" type="hidden" name="C_ficha[]"  id="n_ficha" placeholder="ficha" required value="<?=$p->getN_ficha()?>"/> </td>
<td><input class="parti" type="hidden" name="C_acta[]"  id="C_acta" placeholder="acta" required value="<?=$zz+1?>"/> </td>
<td><input class="parti"  type="text" name="nombre_aprendiz[]"  id=" nombre_aprendiz" placeholder="Aprendiz" required /> </td>
<td><input class="parti"  type="text" name="nombre_its[]" id="nombre_its" placeholder="instructor" required /> </td>
<td><textarea class="area"  type="text" name="description[]" style="width:310px; height:55px;" id="description" placeholder="descripcion" required></textarea></td>
<td>
   <select   name="falta[]" id="falta"   class="parti" >  
    <option value="Académica">Académica</option> 
    <option value="disciplinaria">disciplinaria</option>  
    <option value="Académica y Disciplinaria">Académica y Disciplinaria</option>
  </select>
  </td>
  <td>  <select name="reglamento[]" id='reglamento' class="selectt" type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>N/A</option>
  <?php foreach($reca as $reg): ?>
 
    <option value="<?=$reg->getNombre_falta()?>" <?=$reg->getId_regla() == $reg->getId_regla() ? 
    '' : ''?> > 
     <?=$reg->getNombre_falta()?> </option>
    <?php endforeach;?>
</select></td>
<td>  <select name="reglamento_a[]" id='reglamento_a' class="selectt" type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>N/A</option>
  <?php foreach($reca as $reg): ?>
 
    <option value="<?=$reg->getNombre_falta()?>" <?=$reg->getId_regla() == $reg->getId_regla() ? 
    '' : ''?> > 
     <?=$reg->getNombre_falta()?> </option>
    <?php endforeach;?>
</select></td>
<!--regla 3-->
<td>  <select name="reglamento_b[]" id='reglamento_b' class="selectt" type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>N/A</option>
  <?php foreach($reca as $reg): ?>
 
    <option value="<?=$reg->getNombre_falta()?>" <?=$reg->getId_regla() == $reg->getId_regla() ? 
    '' : ''?> > 
     <?=$reg->getNombre_falta()?> </option>
    <?php endforeach;?>
</select></td>
<!--regla 4-->
<td>  <select name="reglamento_c[]" id='reglamento_c' class="selectt" type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>N/A</option>
  <?php foreach($reca as $reg): ?>
 
    <option value="<?=$reg->getNombre_falta()?>" <?=$reg->getId_regla() == $reg->getId_regla() ? 
    '' : ''?> > 
     <?=$reg->getNombre_falta()?> </option>
    <?php endforeach;?>
</select></td>
</tr>
<tr>
<td><input class="parti"  type="hidden" name="C_ficha[]"  id="n_ficha" placeholder="ficha" required value="<?=$p->getN_ficha()?>"/> </td>
<td><input class="parti"  type="hidden" name="C_acta[]"  id="C_acta" placeholder="acta" required value="<?=$zz+1?>"/> </td>
<td><input class="parti"   type="text" name="nombre_aprendiz[]"  id=" nombre_aprendiz" placeholder="Aprendiz" required /> </td>
<td><input class="parti"  type="text" name="nombre_its[]" id="nombre_its" placeholder="instructor" required /> </td>
<td><textarea class="area"  type="text" name="description[]" style="width:310px; height:55px;" id="description" placeholder="descripcion" required></textarea></td>
<td>
   <select   name="falta[]" id="falta"   class="parti" >  
    <option value="Académica">Académica</option> 
    <option value="disciplinaria">disciplinaria</option>  
    <option value="Académica y Disciplinaria">Académica y Disciplinaria</option>
  </select>
  </td>
  <td>  <select name="reglamento[]" id='reglamento' class="selectt" type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>N/A</option>
  <?php foreach($reca as $reg): ?>
 
    <option value="<?=$reg->getNombre_falta()?>" <?=$reg->getId_regla() == $reg->getId_regla() ? 
    '' : ''?> > 
     <?=$reg->getNombre_falta()?> </option>
    <?php endforeach;?>
</select></td>
<td>  <select name="reglamento_a[]" id='reglamento_a' class="selectt" type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>N/A</option>
  <?php foreach($reca as $reg): ?>
 
    <option value="<?=$reg->getNombre_falta()?>" <?=$reg->getId_regla() == $reg->getId_regla() ? 
    '' : ''?> > 
     <?=$reg->getNombre_falta()?> </option>
    <?php endforeach;?>
</select></td>
<!--regla 3-->
<td>  <select name="reglamento_b[]" id='reglamento_b' class="selectt" type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>N/A</option>
  <?php foreach($reca as $reg): ?>
 
    <option value="<?=$reg->getNombre_falta()?>" <?=$reg->getId_regla() == $reg->getId_regla() ? 
    '' : ''?> > 
     <?=$reg->getNombre_falta()?> </option>
    <?php endforeach;?>
</select></td>
<!--regla 4-->
<td>  <select name="reglamento_c[]" id='reglamento_c' class="selectt" type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>N/A</option>
  <?php foreach($reca as $reg): ?>
 
    <option value="<?=$reg->getNombre_falta()?>" <?=$reg->getId_regla() == $reg->getId_regla() ? 
    '' : ''?> > 
     <?=$reg->getNombre_falta()?> </option>
    <?php endforeach;?>
</select></td>
</tr>
</tbody>
</table>
<br>
<bootom id="add3" style="background-color: #39A900; color:white;"  class="bt">Agregar</bootom>
<bootom id="del3" style="background-color: #39A900; color:white;"  class="bt" >Eliminar</bootom>
<br /><br />

    </div>
   

    <script type="text/javascript">

$(document).ready(function(){

$("#add3").click(function(){
// Obtenemos el numero de columnas (td) que tiene la primera fila
// (tr) del id "tabla"
var tds=$("#table3 tr:first td").length;
// Obtenemos el total de filas (tr) del id "tabla"
var trs=$("#table3 tr").length;
var nuevaFila="<tr>";
cant = $('#contador-filas').val();
cant++;
$('#contador-filas').val(cant)
nuevaFila+="<td><input class='parti' type='hidden' name='C_ficha[]'  id='n_ficha' placeholder='ficha"+ " ' required value='<?=$p->getN_ficha()?>'/> </td>"+
"<td><input class='parti' type='hidden' name='C_acta[]'  id='C_acta' placeholder='acta"+ " ' required value='<?=$zz+1?>'/> </td>"+
"<td><input class='parti' type='text' name='nombre_aprendiz[]'  id='nombre_aprendiz' placeholder='Aprendiz"+ " ' required /> </td>"+
"<td><input class='parti' type='text' name='nombre_its[]' id='nombre_its' placeholder='instructor" +"' required /> </td>"+
"<td><textarea class='area' type='text' name='description[]' style='width:310px; height:55px;' id='description' placeholder='descripcion" +"' required></textarea> </td>"+
"<td><select   name='falta[]' id='falta'   class='parti' >  <option value='Académica'>Académica</option> <option value='disciplinaria'>disciplinaria</option>  <option value='Académica y Disciplinaria'>Académica y Disciplinaria</option></select> </td>"+
"<td> <select name='reglamento[]' id='reglamento' class='parti' type='text'  oninput='maxlengthNumber(this);' required  class='' ><option selected>Seleccione</option><?php foreach($reca as $reg): ?><option value='<?=$reg->getNombre_falta()?>' <?=$reg->getId_regla() == $reg->getId_regla() ?  '' : ''?> > <?=$reg->getNombre_falta()?> </option><?php endforeach;?></select></td>"+
"<td> <select name='reglamento_a[]' id='reglamento_a' class='parti' type='text'  oninput='maxlengthNumber(this);' required  class='' ><option selected>Seleccione</option><?php foreach($reca as $reg): ?><option value='<?=$reg->getNombre_falta()?>' <?=$reg->getId_regla() == $reg->getId_regla() ?  '' : ''?> > <?=$reg->getNombre_falta()?> </option><?php endforeach;?></select></td>"+
"<td> <select name='reglamento_b[]' id='reglamento_b' class='parti' type='text'  oninput='maxlengthNumber(this);' required  class='' ><option selected>Seleccione</option><?php foreach($reca as $reg): ?><option value='<?=$reg->getNombre_falta()?>' <?=$reg->getId_regla() == $reg->getId_regla() ?  '' : ''?> > <?=$reg->getNombre_falta()?> </option><?php endforeach;?></select></td>"+
"<td> <select name='reglamento_c[]' id='reglamento_c' class='parti' type='text'  oninput='maxlengthNumber(this);' required  class='' ><option selected>Seleccione</option><?php foreach($reca as $reg): ?><option value='<?=$reg->getNombre_falta()?>' <?=$reg->getId_regla() == $reg->getId_regla() ?  '' : ''?> > <?=$reg->getNombre_falta()?> </option><?php endforeach;?></select></td>";
// Añadimos una columna con el numero total de columnas.
// Añadimos uno al total, ya que cuando cargamos los valores para la
// columna, todavia no esta añadida
nuevaFila+="</tr>";
$("#table3").append(nuevaFila);
});
/**
* Funcion para eliminar la ultima columna de la tabla.
* Si unicamente queda una columna, esta no sera eliminada
*/
$("#del3").click(function(){
// Obtenemos el total de filas (tr) del id "tabla"
var trs=$("#table3 tr").length;
if(trs>0)
{
// Eliminamos la ultima fila
cant--;
$('#contador-filas').val(cant)
$("#table3 tr:last").remove();

}
});
});
</script>

    </div>
  </div>

   

  </div>
  <p>
  <div class="row">
    <div class="col">
    <br>
    <h3 for="">        7.Hechos Actuales</h3>
      <textarea name="hechos_actuales" id='hechos_actuales' type="text"  cols="60" rows="10" oninput="maxlengthNumber(this);" required  class="" value=""></textarea >
    </div>
  </div>
    <p>

   <p>
   <?php 
      $c=0;
      $c=$this->modelo->obtenercontador($_GET['ficha']);
  ?>
  <div class="row">
    <div class="col">
    <br>
    <div>

<center>
<h3>8.Desarrollo Comité</h3>
<br>
<table class="tablas" id="table4">
<tr>
<input type="hidden"  value=" <?php   $zz = $r->n_acta; ?>">
<input type="hidden"  value=" <?php   $c = $c->acta_contador; ?>">

<td><input class="parti" type="hidden" name="d_acta[]"  id="d_acta" placeholder="acta " required value="<?=$zz+1?>"/> </td>
<td><input class="parti" type="text" name="d_nombre_aprendiz[]"  id="d_nombre_aprendiz" placeholder="Nombre aprendiz " /> </td>
<td><textarea class="comit"  type="text" name="d_descargos_its[]"  id="d_descargos_its" placeholder="Descargos instructor" ></textarea></td>
<td><textarea class="comit"  type="text" name="d_descargos_its_b[]"  id="d_descargos_its" placeholder="Descargos instructor" ></textarea></td>
<td><textarea class="comit"  type="text" name="d_descargos_its_c[]"  id="d_descargos_its" placeholder="Descargos instructor" ></textarea></td>
<td><textarea class="comit"  type="text" name="d_descargos_aprendiz[]"  id="d_descargos_its" placeholder="Descargos aprendiz" ></textarea></td>
</tr>
<tr>
<td><input class="parti" type="hidden" name="d_acta[]"  id="d_acta" placeholder="acta " required value="<?=$zz+1?>"/> </td>
<td><input class="parti" type="text" name="d_nombre_aprendiz[]"  id="d_nombre_aprendiz" placeholder="Nombre aprendiz "  /> </td>
<td><textarea class="comit"  type="text" name="d_descargos_its[]"  id="d_descargos_its" placeholder="Descargos instructor" ></textarea></td>
<td><textarea class="comit"  type="text" name="d_descargos_its_b[]"  id="d_descargos_its" placeholder="Descargos instructor" ></textarea></td>
<td><textarea class="comit"  type="text" name="d_descargos_its_c[]"  id="d_descargos_its" placeholder="Descargos instructor"></textarea></td>
<td><textarea class="comit"  type="text" name="d_descargos_aprendiz[]"  id="d_descargos_its" placeholder="Descargos aprendiz" ></textarea></td>
</tr>

<tr>
<td><input class="parti" type="hidden" name="d_acta[]"  id="d_acta" placeholder="acta " required value="<?=$zz+1?>"/> </td>
<td><input class="parti" type="text" name="d_nombre_aprendiz[]"  id="d_nombre_aprendiz" placeholder="Nombre aprendiz "  /> </td>
<td><textarea class="comit"  type="text" name="d_descargos_its[]"  id="d_descargos_its" placeholder="Descargos instructor" ></textarea></td>
<td><textarea class="comit"  type="text" name="d_descargos_its_b[]"  id="d_descargos_its" placeholder="Descargos instructor" ></textarea></td>
<td><textarea class="comit"  type="text" name="d_descargos_its_c[]"  id="d_descargos_its" placeholder="Descargos instructor" ></textarea></td>
<td><textarea class="comit"  type="text" name="d_descargos_aprendiz[]"  id="d_descargos_its" placeholder="Descargos aprendiz" ></textarea></td>
</tr>

</tbody>
</table>
<br>
<bootom id="add4" style="background-color: #39A900; color:white;"  class="bt" >Agregar</bootom>
<bootom id="del4" style="background-color: #39A900; color:white;"  class="bt">Eliminar</bootom>
<br /><br />

    </div>
       
       <!--  Javascript -->

    <script type="text/javascript">

$(document).ready(function(){

$("#add4").click(function(){
// Obtenemos el numero de columnas (td) que tiene la primera fila
// (tr) del id "tabla"
var tds=$("#table4 tr:first td").length;
// Obtenemos el total de filas (tr) del id "tabla"
    var trs=$("#table4 tr").length;
    var nuevaFila="<tr>";
    cant = $('#contador-filas').val();
    cant++;
$('#contador-filas').val(cant)
nuevaFila+="<td><input class='parti' type='hidden' name='d_acta[]'  id='d_acta' placeholder='acta"+ " ' required value='<?=$zz+1?>'/> </td>"+
  "<td><input class='parti' type='text' name='d_nombre_aprendiz[]'  id='d_nombre_aprendiz' placeholder='Nombre aprendiz"+ " '  /> </td>"+
  "<td><textarea class='comit' type='text' name='d_descargos_its[]' id='d_descargos_its' placeholder='Descargos instructor" +"' ></textarea> </td>"+
  "<td><textarea class='comit' type='text' name='d_descargos_its_b[]' id='d_descargos_its_b' placeholder='Descargos instructor" +"'></textarea> </td>"+
  "<td><textarea class='comit' type='text' name='d_descargos_its_c[]' id='d_descargos_its_c' placeholder='Descargos instructor" +"' ></textarea> </td>"+
  "<td><textarea class='comit' type='text' name='d_descargos_aprendiz[]' id='d_descargos_aprendiz' placeholder='Descargos aprendiz" +"' ></textarea> </td>";
// Añadimos una columna con el numero total de columnas.
// Añadimos uno al total, ya que cuando cargamos los valores para la
// columna, todavia no esta añadida
nuevaFila+="</tr>";
$("#table4").append(nuevaFila);
});
/**
* Funcion para eliminar la ultima columna de la tabla.
* Si unicamente queda una columna, esta no sera eliminada
*/
$("#del4").click(function(){
// Obtenemos el total de filas (tr) del id "tabla"
var trs=$("#table4 tr").length;
if(trs>0)
{
// Eliminamos la ultima fila
cant--;
$('#contador-filas').val(cant)
$("#table4 tr:last").remove();

}
});
});
</script>

    </div>
  </div>
  


    <p>


  
<br>
<div class="row">
    <div class="col">
    <br>
      <H5 for="">9.Informe Vocero</H5>
      <textarea name="informe_vocero" id='informe_vocero' type="text" cols="60" rows="10" oninput="maxlengthNumber(this);" required  class="" placeholder="Informe vocero"></textarea >
    </div>
   

  </div>
  

 <!-- <form id="conclu" name="conclu" method="post" action="?c=acta&a=save">-->
<br>

<p>
<?php 
      $c=0;
      $c=$this->modelo->obtenercontador($_GET['ficha']);
  ?>
  <div class="row">
    <div class="col">
    <br>
    <div>

<center>
<h2>Conclusiones</h2>
<table class="tablas" id="table2">
<tr>
<input type="hidden"  value=" <?php   $zz = $r->n_acta; ?>">
<input type="hidden"  value=" <?php   $c = $c->acta_contador; ?>">
<td><input class="parti" type="hidden" name="c_contador[]"  id="acta_contador"  required value="<?=$c+1; ?>"/> </td>
<td><input class="parti" type="hidden" name="n_ficha[]"  id="n_ficha" placeholder="ficha " required value="<?=$p->getN_ficha()?>"/> </td>
<td><input class="parti" type="hidden" name="q_acta[]"  id="#_acta" placeholder="acta " required value="<?=$zz+1?>"/> </td>
<td><input class="parti" type="text" name="Aprendiz[]"  id="Aprendiz" placeholder="Aprendiz " required /> </td>
<td>  <select name="medida[]" id='medida' class="parti" type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>N/A</option>
  <?php foreach($medida as $med): ?>
 
    <option value="<?=$med->getMedida_formativa()?>" <?=$med->getId_medida() == $med->getId_medida() ? 
    '' : ''?> > 
     <?=$med->getMedida_formativa()?> </option>
    <?php endforeach;?>
</select></td>
<td>  <select name="descripcion_m[]" id='descripcion_m' class="select" type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>N/A</option>
  <?php foreach($medida as $med): ?>
 
    <option value="<?=$med->getDescripcion_medida()?>" <?=$med->getId_medida() == $med->getId_medida() ? 
    '' : ''?> > 
     <?=$med->getDescripcion_medida()?> </option>
    <?php endforeach;?>
</select></td>

</tr>
<tr>
<td><input class="parti" type="hidden" name="c_contador[]"  id="acta_contador"  required value="<?=$c+1; ?>"/> </td>
<td><input class="parti" type="hidden" name="n_ficha[]"  id="n_ficha" placeholder="ficha " required value="<?=$p->getN_ficha()?>"/> </td>
<td><input class="parti" type="hidden" name="q_acta[]"  id="#_acta" placeholder="acta " required value="<?=$zz+1?>"/> </td>
<td><input class="parti" type="text" name="Aprendiz[]"  id="Aprendiz" placeholder="Aprendiz " required /> </td>
<td>  <select name="medida[]" id='medida' class="parti" type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>N/A</option>
  <?php foreach($medida as $med): ?>
 
    <option value="<?=$med->getMedida_formativa()?>" <?=$med->getId_medida() == $med->getId_medida() ? 
    '' : ''?> > 
     <?=$med->getMedida_formativa()?> </option>
    <?php endforeach;?>
</select></td>
<td>  <select name="descripcion_m[]" id='descripcion_m'  class="select" type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>N/A</option>
  <?php foreach($medida as $med): ?>
 
    <option value="<?=$med->getDescripcion_medida()?>" <?=$med->getId_medida() == $med->getId_medida() ? 
    '' : ''?> > 
     <?=$med->getDescripcion_medida()?> </option>
    <?php endforeach;?>
</select></td>


</tr>
<tr>
<td><input class="parti" type="hidden" name="c_contador[]"  id="acta_contador"  required value="<?=$c+1; ?>"/> </td>
<td><input class="parti" type="hidden" name="n_ficha[]"  id="n_ficha" placeholder="ficha " required value="<?=$p->getN_ficha()?>"/> </td>
<td><input class="parti" type="hidden" name="q_acta[]"  id="#_acta" placeholder="acta " required value="<?=$zz+1?>"/> </td>
<td><input class="parti" type="text" name="Aprendiz[]"  id="Aprendiz" placeholder="Aprendiz " required /> </td>
<td>  <select name="medida[]" id='medida'  class="parti" type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>N/A</option>
  <?php foreach($medida as $med): ?>
 
    <option value="<?=$med->getMedida_formativa()?>" <?=$med->getId_medida() == $med->getId_medida() ? 
    '' : ''?> > 
     <?=$med->getMedida_formativa()?> </option>
    <?php endforeach;?>
</select></td>
<td>  <select name="descripcion_m[]" id='descripcion_m'  class="select" type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>N/A</option>
  <?php foreach($medida as $med): ?>
 
    <option value="<?=$med->getDescripcion_medida()?>" <?=$med->getId_medida() == $med->getId_medida() ? 
    '' : ''?> > 
     <?=$med->getDescripcion_medida()?> </option>
    <?php endforeach;?>
</select></td>


</tr>
</tbody>
</table>
<br>
<bootom id="add2" style="background-color: #39A900; color:white;"  class="bt">Agregar</bootom>
<bootom id="del2" style="background-color: #39A900; color:white;"  class="bt">Eliminar</bootom>
<br /><br />

    </div>
   

    <script type="text/javascript">

$(document).ready(function(){

$("#add2").click(function(){
// Obtenemos el numero de columnas (td) que tiene la primera fila
// (tr) del id "tabla"
var tds=$("#table2 tr:first td").length;
// Obtenemos el total de filas (tr) del id "tabla"
var trs=$("#table2 tr").length;
var nuevaFila="<tr>";
cant = $('#contador-filas').val();
cant++;
$('#contador-filas').val(cant)
nuevaFila+="<td><input class='parti' type='hidden' name='c_contador[]'  id='acta_contador' placeholder='ficha"+ " ' required value='<?=$c+1; ?>'/> </td>"+
"<td><input class='parti' type='hidden' name='n_ficha[]'  id='n_ficha' placeholder='ficha"+ " ' required value='<?=$p->getN_ficha()?>'/> </td>"+
"<td><input class='parti' type='hidden' name='q_acta[]'  id='#_acta' placeholder='acta"+ " ' required value='<?=$zz+1?>'/> </td>"+
"<td><input class='parti' type='text' name='Aprendiz[]'  id='Aprendiz' placeholder='Aprendiz"+ " ' required /> </td>"+
"<td>  <select name='medida[]' id='medida' class='parti' type='text'  oninput='maxlengthNumber(this);' required  class='' ><option selected>Seleccione</option><?php foreach($medida as $med): ?><option value='<?=$med->getMedida_formativa()?>' <?=$med->getId_medida() == $med->getId_medida() ? '' : ''?> ><?=$med->getMedida_formativa()?> </option><?php endforeach;?></select></td>"+
"<td>  <select name='descripcion_m[]' id='descripcion_m'  class='select' type='text'  oninput='maxlengthNumber(this);' required  class='' ><option selected>N/A</option><?php foreach($medida as $med): ?><option value='<?=$med->getDescripcion_medida()?>' <?=$med->getId_medida() == $med->getId_medida() ? '' : ''?> > <?=$med->getDescripcion_medida()?> </option><?php endforeach;?></select></td>";

// Añadimos una columna con el numero total de columnas.
// Añadimos uno al total, ya que cuando cargamos los valores para la
// columna, todavia no esta añadida
nuevaFila+="</tr>";
$("#table2").append(nuevaFila);
});
/**
* Funcion para eliminar la ultima columna de la tabla.
* Si unicamente queda una columna, esta no sera eliminada
*/
$("#del2").click(function(){
// Obtenemos el total de filas (tr) del id "tabla"
var trs=$("#table2 tr").length;
if(trs>0)
{
// Eliminamos la ultima fila
cant--;
$('#contador-filas').val(cant)
$("#table2 tr:last").remove();

}
});
});
</script>

    </div>
  </div>
  
<center>
<div class="privacidad">
  <div class="col">
    <p class="parrafo">De acuerdo con la Ley 1581 de 2012, Proteccion de datos personales se debe garantizar la
      seguridad y protección de los datos personales que se encuentran almacenados en este 
      documento. El servicio Nacional de Aprendizake SENA solicita la siguiente clasificación de la 
      información:
    </p>
    <h6>La información de este documento se debe clasificar como:</h6> 
    <br>
    <label for="">publica</label> <input class="parti" type="radio" name="privacidad"  id="privacidad"  required value="publica"/>
    <label for="">privado</label> <input class="parti" type="radio" name="privacidad"  id="privacidad"  required value="privada"/> 
    <label for="">semiprivado</label><input class="parti" type="radio" name="privacidad"  id="privacidad"  required value="semiprivada"/> 
    <label for=""> sensible</label><input class="parti" type="radio" name="privacidad"  id="privacidad"  required value="sensible"/>

    <p>Nota: antes de contestar esta información por favor remetirse al instructivos</p>

    <table class="table" id="tabla">
  <thead class="thead-dark">
    <h3>Compromisos</h3>
    <tr>
      <th scope="col">Actividad</th>
      <th scope="col">Responsable</th>
     <!--  <th scope="col">   <i class="fa-solid fa-calendar"></i>Apellidos</th> -->
      </tr>
  </thead>
  <tbody>
      <tr>
        <td>Programación sesión acompañamiento a ficha por parte del área de bienestar al aprendiz.</td>
        <td>Área bienestar al Aprendiz</td>
      </tr>  
</tbody>
</table>
<h6>ASISTENTES: (incorporar registro de asistencia)</h6>
<p class="parrafo">Nota: Puede incluirse imagen o captura de pantalla de los assitentes, si se trata de una reunión
   virtual o, de los asistentes que participan a través de una plataforma virtual, se pasa link para
  asistencia y aprovación del acta. Que reposa en el drive de comités de la ficha</p>
  </div>
</div>
      </center>

  <p>


    <div class="row">
    <div class="col">
    <br>
    <center>
     
    <button type="submit" name="insertar"  style="background-color: #39A900; color:white;"   onclick='return enviarFormulario();'  class="bt"> Guardar</button>
    </center>
    </div>
    </div>
  


    <script>




function enviarFormulario() {



    
conclu.submit();




} 



</script>
</form>
</div>
</div>

</div>