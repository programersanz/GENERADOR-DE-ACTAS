
    <div id="content">
    <div class="col">
 <!--<img src="multimedia/logo-naranja.png" class="fixed-righ"  width="200" height="200">-->
<center>
<br>
<h1 class="fixed-center" > ACTA DE REUNIÓN</h1>
 

    <label for=""> Numero acta  <?=$p->getN_acta()?></label>
</center>
</div>
<br>

<div class="">
<div class="card-body">
<form  name="formulario" id="formulario" action="?c=Acta&a=Guardar"   class="sign-up-form" method="post" >
  <div class="row">
    <div class="col">

    <input name="n_acta" id='n_acta' type="hidden" maxlength="25" oninput="maxlengthNumber(this);" required  class="form-control" value="<?=$p->getN_acta()?>">
      <label for="">Ficha:</label>
      <input name="ficha" id='ficha' type="number" maxlength="25" oninput="maxlengthNumber(this);" required  class="form-control" value="<?=$p->getFicha ()?>">
    </div>

    


    <div class="col">
      <label for="">Programa:</label>
      <input name="programa" id='programa' type="text"  oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getPrograma()?>">
    </div>


    <div class="col">
      <label for="">Nombre revisión:</label>
      <input name="nom_rev" id='nom_rev' type="text"  oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getNom_rev()?>">
    </div>


    </div>

    <div class="row">
    <div class="col">
    <br>
      <label for="">Fecha:</label>
      <input name="fecha" id='fecha' type="date" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getFecha ()?>">
    </div>

    <div class="col">
    <br>
      <label for="">Hora Inicio:</label>
      <input name="hora_in" id='hora_in' type="time" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getHora_in ()?>">
    </div>
    <br>
    <div class="col">
    <br>
      <label for="">Hora Fin:</label>
      <input name="hora_fin" id='hora_fin' type="time" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getHora_fin ()?>">
    </div>


  </div>

  <div class="row">
    <div class="col">
    <br>
      <label for="">Lugar/Enlace:</label>
      <input name="lu_en" id='lu_en' type="text" maxlength="100" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getLu_en ()?>">
    </div>

    <div class="col">
    <br>
      <label for="">Dirección:</label>
      <input name="direccion" id='direccion' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getDireccion ()?>">
    </div>

    <div class="col">
    <br>
      <label for="">Ciudad:</label>
      <input name="ciudad" id='ciudad' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getCiudad ()?>">
    </div>


  </div>





    <div class="row">
    <div class="col">
    <br>
      <label for="">Agenda o puntos a desarrollar:</label>
      <textarea name="agenda" id='agenda' type="text" maxlength="9000" cols="60" rows="10" oninput="maxlengthNumber(this);" required  class="" > <?=$p->getAgenda ()?> </textarea >
    </div>

    <div class="row">
    <div class="col">
    <br>
      <label for="">Objetivos:</label>
      <textarea name="objetivos" id='objetivos' type="text" maxlength="9000"  cols="60" rows="10" oninput="maxlengthNumber(this);" required  class="" value=""><?=$p->getObjetivos ()?> </textarea >
    </div>
   

  </div>

<P>

<br>

<P>
<P>

  <div  class="card">
      <div class="">
      <br>
    <center>
    <h3>1.Participantes:</h3>
    </center>
<br>

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

  <p>  <p>
  
  <p>
    
  <p>


 
 
     
     <div  class="card">
      <div class="">
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
  <br>
  <div class="ro">
  <h4>3.Verificación del acta(s) anteriores(es)</h4>
    <?php foreach
  ($this->modelo->obtenerVerificacion($_GET['ficha'], $_GET['acta_contador']) as $tra):?>
   <p>Acta Comité No.<?=$tra->getN_acta()?> - <?=$tra->getFecha()?></p>

  <?php endforeach; ?>
  <p></p>
</div>
<br>
  <p>

  <div  class="row">
      <div class="">
        <h4>4.Casos anterior al comité</h4>

<br>



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
  <div  class="card">
      <div class="">
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


<div  class="card">
      <div class="">
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
  <div class="row">
    <div class="col">
    <br>
      <label for="">7.Hechos Actuales:</label>
      <textarea name="hechos_actuales" id='hechos_actuales' type="text" maxlength="9000"  cols="60" rows="10" oninput="maxlengthNumber(this);" required  class="" value=""><?=$p->getHechos_actuales()?> </textarea >
    </div>
   

  </div>
<p>

<div  class="card">
      <div class="">
        <h5>8.Desarrollo Comité</h5>

<br>

<p><p>

<table class="table" id="tabla">
  <thead class="thead-dark">
    <tr>
      <th scope="col">   <i class="fa-solid fa-list-ol"></i>Desarrollo</th>
      <th scope="col">   <i class="fa-solid fa-list-ol"></i>Acta</th>
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
        <td> <?= $desarrollocomite->getId_desarrollo()?> </td>
        <td> <?= $desarrollocomite->getD_acta()?> </td>
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
<div class="row">
    <div class="col">
    <br>
      <label for="">9.Informe Vocero:</label>
      <textarea name="informe_vocero" id='informe_vocero' type="text" maxlength="9000"  cols="60" rows="10" oninput="maxlengthNumber(this);" required  class="" value=""><?=$p->getInforme_vocero()?> </textarea >
    </div>
   

  </div>
<p>



<div  class="card">
      <div class="">
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


    <div class="row">
    
    <div class="col">
    <br>
    <center>
    <button style="background-color: #39A900; color:white;"   class="bt"  onclick='return enviarFormulario();' id="bt1"  class="btn solid" >Actualizar</button>
    <a    href="?c=Vistas&a=ConsultarFicha" type="submit" style="background-color: #39A900; color:white;"  class="bt"> Cancelar</a>
    </center>
    </div>
    </div>
  </div>


<script>




function enviarFormulario() {
  event.preventDefault(); 


  Swal.fire({
  title: ' ¿ GUARDAR CAMBIOS ?',
  icon: 'question',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonColor: '#39A900',
  denyButtonColor: '#39A900',
  confirmButtonText: 'Guardar ',
  denyButtonText: `No guardar`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {


    formulario.submit();


  } else if (result.isDenied) {
   

    location.href="?c=Vistas&a=ConsultarFicha"  
  }
})

} 



</script>

</form>
</div>
</div>

</div>