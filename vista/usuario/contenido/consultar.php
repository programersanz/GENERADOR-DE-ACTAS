
    <div id="content">
    

<div id="imp1"><div style="">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <div  class="col">
 <!--<img src="multimedia/logo-naranja.png" class="fixed-righ"  width="200" height="200">-->
<center>
<br>
<h1 class="fixed-center" > ACTA DE REUNIÓN</h1>

<h8 for="">ACTA <?=$p->getActa_no()?> </h8>
</center>
</div>
<br>

<div class="card">
<div class="card-body" style="border: 1px solid black;">
<form action="" id="acta" class="sign-up-form" method="post" >


  <div class="row">
<center>
  <img src="multimedia/logo-sena.png" class="fixed-left" id="logo-sena"  style="width:100px; height:100px;">
  </center>
  <br>
  <div class="col">
  <br>
      <center>
      <H6 for="">NOMBRE DEL COMITÉ O REUNIÓN:  </H6>

      
      <p name="nom_rev" id='nom_rev' type="text"  oninput="maxlengthNumber(this);" required  value="" disabled> <?=$p->getNom_rev()?></p>
      </center>
    </div>



    <div class="col">

    <br>
    <input name="n_acta" id='n_acta' type="hidden"  oninput="maxlengthNumber(this);"   class="form-control" value="<?=$p->getN_acta()?>" disabled>

     <center>
      <H6 for="">FICHA:</H6>
      <label name="ficha" id='ficha'  > <?=$p->getFicha ()?> </label>
      </center>
    </div>


    
    <div class="col">
    <br>

    <input name="n_acta" id='n_acta' type="hidden"  oninput="maxlengthNumber(this);"   class="form-control" value="<?=$p->getN_acta()?>" disabled>

     <center>
      <H6 for="">PROGRAMA:</H6>
      <label name="ficha" id='ficha'  > <?=$p->getPrograma()?></label>
      </center>
    </div>


    </div>

    <div class="row">
    <div class="col">
    <br>
    <center>
      <H6 for="">FECHA:</H6>
      <label name="ciudad" id='ciudad' type="text"  oninput="maxlengthNumber(this);" required   value="" disabled>   <?=$p->getFecha ()?>  </label> 
      </center>
    </div>


    <div class="col">
    <br>
    <center>
      <H6 for="">HORA INICIO:</H6>
      <p  name="hora_in" id='hora_in' type="text"  oninput="maxlengthNumber(this);" required   value="" disabled>  <?=$p->getHora_in ()?> </p> 
      </center>
    </div>
 
    <div class="col">
    <br>
    <center>
      <H6 for="">HORA FIN:</H6>
      <label  name="hora_fin" id='hora_fin' type="text"  oninput="maxlengthNumber(this);" required   value="" disabled> <?=$p->getHora_fin ()?> </label> 
      </center>
    </div>

    </div>

  <div class="row">
<div class="col">
<br>
      <center>
      <H6 for="">LUGAR Y/O ENLACE: </H6>
      <label name="lu_en" id='lu_en' type="text"  oninput="maxlengthNumber(this);" required  value=" <?=$p->getLu_en()?>" disabled> <?=$p->getLu_en()?></label>
      </center>
    </div>


    <div class="col">
    <br>
    <center>
      <H6 for="">CIUDAD</H6>
      <label name="direccion" id='direccion' type="text"  oninput="maxlengthNumber(this);" required   > <?=$p->getCiudad ()?>   </label> 
      </center>
    </div>  


    <div class="col">
    <br>
    <center>
      <H6 for="">DIRECCIÓN / REGIONAL /CENTRO</H6>
      <label name="direccion" id='direccion' type="text"  oninput="maxlengthNumber(this);" required   > <?=$p->getDireccion ()?>  </label> 
      </center>
    </div>  

  </div>




    <div class="row" style="margin-top:50px;">
    <h4> <label for="">AGENDA O PUNTOS PARA DESARROLLAR:</label></h4>
      <a name="agenda" id='agenda' type="text" maxlength="9000" cols="60" rows="10" oninput="maxlengthNumber(this);" > <?=$p->getAgenda ()?> </a>
    </div>
  
    <div class="row" style="margin-top:50px;">
    <h4><label for="">OBJETIVO(S) DE LA REUNIÓN:</label> </h4>
    <p name="objetivos" id='objetivos' type="text" maxlength="9000" style = "width: 100%;"  ><?=$p->getObjetivos ()?> </p >
  </div>
 
  <center> <h3>Desarrollo de la reunion</h3>   </center>

  <div  class="row" style="margin-top:50px;">
      <div class="col">
        <h5>1.Participantes</h5>

<table class="table" id="tabla">
  <thead class="thead-dark">
    <tr>
      <th scope="col">   <i class="fa-solid fa-list-ol"></i>nombre </th>
      <th scope="col">   <i class="fa-solid fa-calendar"></i> cargo</th>
      <th scope="col">  <i class="fa-solid fa-gear"></i>Asistencia </th>
      </tr>
  </thead>
  <tbody>

  <?php 
    try{
        foreach($parti as $participantes): ?> 

        <tr>
        <td> <?= $participantes->getNombre()?></td>
        <td> <?= $participantes->getCargo() ?> </td>
        <td> <?= $participantes->getAsistencia() ?> </td>


    
    <?php endforeach; 
    }catch(Exception $e){
        die($e->getMessage());
        die("No se pudo listar");
    }
    ?>
    </tr>
</tbody>
</table>
    </div>
    </div>


  <div  class="row" style="margin-top:50px;">
      <div class="col">
        <br>
      <h5>2.Informacion conformacion de la ficha</h5>
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
  <div class="row" style="margin-top:50px;">
  <h4>3.Verificación del acta(s) anteriores(es)</h4>
    <?php foreach
  ($this->modelo->obtenerVerificacion($_GET['ficha'], $_GET['acta_contador']) as $tra):?>
   <p>Acta Comité No.<?=$tra->getN_acta()?> - <?=$tra->getFecha()?></p>

  <?php endforeach; ?>
  <p></p>
</div>
<br>

<div  class="row" style="margin-top:50px;">
      <div class="col">
        <h4>4.Casos anterior al comité</h4>

<br>

  <p>  <p>
  

<table class="table" id="tabla">
<thead class="thead-dark">
    <tr>
      <th scope="col">   <i class="fa-solid fa-list-ol"></i>nombre </th>
      <th scope="col">  <i class="fa-solid fa-hashtag"></i>instructor</th>
      <th scope="col">   <i class="fa-solid fa-calendar"></i>Descripción</th>
      <th scope="col">   <i class="fa-solid fa-calendar"></i>Cumplimiento</th>
      </tr>
  </thead>
  <tbody>

  <?php foreach
  ($this->modelo->obtenerAnteriores($_GET['ficha'], $_GET['acta_contador']) as $r):?>
    <tr>
    <td><?=$r->A_aprendiz?></td>
      <td><?=$r->A_medida?></td>
      <td><?=$r->A_descripcion?></td>
      <td><?=$r->A_cumplimiento?></td>
  </tr>

  <?php endforeach; ?>
    </tr>
</tbody>
</table>
    </div>
   

  </div>


  <p>  <p>
  <div  class="row" style="margin-top:50px;">
      <div class="col">
        <h5>5.Aprendices destacados</h5>

<br>

<p><p>

<table class="table" id="tabla">
  <thead class="thead-dark">
    <tr>
      <th scope="col">   <i class="fa-solid fa-list-ol"></i>Nombres</th>
      <th scope="col">   <i class="fa-solid fa-calendar"></i>Apellidos</th>

      </tr>
  </thead>
  <tbody>

  <?php 
    try{
        foreach($des as $destacados): ?> 

        <tr>
        <td> <?= $destacados->getNombre_des()?></td>
        <td> <?= $destacados->getApellido_des() ?> </td>
    
    <?php endforeach; 
    }catch(Exception $e){
        die($e->getMessage());
        die("No se pudo listar");
    }
    ?>
    </tr>
</tbody>
</table>
    </div>
   

  </div>

<p>

<p>

<br><br>
<div  class="row" style="margin-top:100px;">
      <div class="col">
        <br><br>
        <h5>6.Casos particulares:</h5>

<br>



<table class="table" id="tabla">
  <thead class="thead-dark">
    <tr>
      <th scope="col">nombre </th>
      <th scope="col">instructor</th>
      <th scope="col">Descripción</th>
      <th scope="col">Falta</th>
      <th scope="col">Reglamento</th>
      <th scope="col">Reglamento</th>
      <th scope="col">Reglamento</th>
      <th scope="col">Reglamento</th>
      </tr>
  </thead>
  <tbody>

  <?php 
    try{
        foreach($casos as $particulares): ?> 

        <tr>
        <td> <?= $particulares->getNombre_aprendiz()?></td>
        <td> <?= $particulares->getNombre_its() ?> </td>
        <td> <?= $particulares->getDescription() ?> </td>
        <td> <?= $particulares->getFalta() ?> </td>
        <td> <?= $particulares->getReglamento() ?> </td>
        <td> <?= $particulares->getReglamento_a() ?> </td>
        <td> <?= $particulares->getReglamento_b() ?> </td>
        <td> <?= $particulares->getReglamento_c() ?> </td>



    
    <?php endforeach; 
    }catch(Exception $e){
        die($e->getMessage());
        die("No se pudo listar");
    }
    ?>
    </tr>
</tbody>
</table>
    </div>
   

  </div>

  <p>  <p>
  <div class="row" style="margin-top:50px;">
    <br> 
    <h4><label for="">7.Hechos Actuales:</label> </h4>
    

    
    <p name="hechos_actuales" id='hechos_actuales' type="text" maxlength="9000" style = "width: 100%;"  ><?=$p->getHechos_actuales()?> </p >
    <br>

  </div>
<p>
<p>
<div  class="row" style="margin-top:50px;">
      <div class="col">
        <h5>8.Desarrollo Comité</h5>

<br>

<p><p>

<table class="table" id="tabla">
  <thead class="thead-dark">
    <tr>
      <th scope="col">   <i class="fa-solid fa-list-ol"></i>Nombre del aprendiz</th>
      <th scope="col">   <i class="fa-solid fa-list-ol"></i>Descargos instructor</th>
      <th scope="col">   <i class="fa-solid fa-list-ol"></i>Descargos instructora</th>
      <th scope="col">   <i class="fa-solid fa-list-ol"></i>Descargos instructorb</th>
      <th scope="col">   <i class="fa-solid fa-list-ol"></i>Descargos aprendiz</th>
     <!--  <th scope="col">   <i class="fa-solid fa-calendar"></i>Apellidos</th> -->

      </tr>
  </thead>
  <tbody>

  <?php 
    try{
        foreach($desa as $desarrollocomite): ?> 

        <tr>
        <td> <?= $desarrollocomite->getD_nombre_aprendiz()?> </td>
        <td> <?= $desarrollocomite->getD_descargos_its() ?> </td>
        <td> <?= $desarrollocomite->getD_descargos_its_b()?> </td>
        <td> <?= $desarrollocomite->getD_descargos_its_c()?> </td>
        <td> <?= $desarrollocomite->getD_descargos_aprendiz()?> </td>
    
    <?php endforeach; 
    }catch(Exception $e){
        die($e->getMessage());
        die("No se pudo listar");
    }
    ?>
    </tr>
</tbody>
</table>
    </div>
   

  </div>


<p>
<div class="row" style="margin-top:100px;">
  <div class="col">
  <br><br><br>
  <h4><label for="">9.informe vocero</label></h4>
    <a name="informe_vocero" id='informe_vocero' type="text" maxlength="" cols="60" rows="10" oninput="maxlengthNumber(this);"  placeholder="DESARROLLO DEL COMITE"><?=$p->getInforme_vocero()?></a >
  </div>
 <div>

<p>



<div  class="row" style="margin-top:50px;">
      <div class="col">
        <h5>Conclusiones:</h5>

<br>



<table class="table" id="tabla">
  <thead class="thead-dark">
    <tr>
      <th scope="col">   <i class="fa-solid fa-list-ol"></i>Aprendiz</th>
      <th scope="col">  <i class="fa-solid fa-hashtag"></i>Medida</th>
      <th scope="col">   <i class="fa-solid fa-calendar"></i>Descripción</th>
      </tr>
  </thead>
  <tbody>

  <?php 
    try{
        foreach($concu as $conclusiones): ?> 

        <tr>
        <td> <?= $conclusiones->getAprendiz()?></td>
        <td> <?= $conclusiones->getMedida() ?> </td>
        <td> <?= $conclusiones->getDescripcion_m() ?> </td>


    
    <?php endforeach; 
    }catch(Exception $e){
        die($e->getMessage());
        die("No se pudo listar");
    }
    ?>
    </tr>
</tbody>
</table>
    </div>
   

  </div>
<p>
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
        <h3><?=$p->getPrivacidad()?></h3>
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
     <p>


    <div id='excluir'class="excluir ">
    
    <br>
    <br>

    </div>
    <center>
    <button  id='parte1' style="background-color: #39A900; color:white;"  class="bt" type="button" onclick="javascript:imprim1(imp1);">Imprimir</button>
   
    </center>
    </div>
    </div>
  </div>

  </div>
  <style type="text/css" media="print">
@media print {
#excluir {display:none;}
#parte1 {display:none;}
}
</style>

</form>
</div>
</div>




<script>




function imprim1(imp1){
var printContents = document.getElementById('imp1').innerHTML;
        w = window.open();
        w.document.write(printContents);
        w.document.close(); // necessary for IE >= 10
        w.focus(); // necessary for IE >= 10
		w.print();
		w.close();
        return true;}


</script>

</div>