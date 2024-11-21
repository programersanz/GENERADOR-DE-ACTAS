
    <div id="content">
    <br>
   <center>
      <div  class="card w-75">
      <div class="card-body" >

      
<br>
<center>
<h1>Registro Ficha</h1>
</center>
<form action="?c=Ficha&a=save" id="ficha" class="sign-up-form" method="post" >
<br>

<!-- Número de ficha y cantidad de aprendices-->
<div class="row">

<div class="col">
  <label for=""> Número Ficha</label>
  <input name="ficha_contador" id='ficha_contador' type="hidden" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="1">
  <input name="N_ficha" id='N_ficha' type="number" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Número ficha">
  </div>

  <div class="col">
  <label for="">Cantidad Aprendices</label>
  <input name="cantidad_apre" id='cantidad_apre' type="number" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Número de aprendices">
</div>
</div>
<br>

<!--Tipo de jornada y tipo de formación-->
<div class="row">

<div class="col">
  <label for="">Tipo Jornada</label>
  <select name="jornada" id='jornada' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Tipo de jornada">
  <option selected> Seleccione la jornada</option>
  <option value="Diruna">Diurna</option>
  <option value="Nocturna">Nocturna</option>
  </select>
</div>

<div class="col">
  <label for="">Tipo Formación</label>
  <select name="tipo_forma" id='tipo_forma' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Tipo de formación">
  <option selected> Seleccione el tipo de formación</option>
  <option value="Técnico">Técnico</option>
  <option value="Tecnológo">Tecnológo</option>
  </select>
</div>
</div>

<br>

<!--Fecha de inicio y fecha fin-->
<div class="row">

<div class="col">
  <label for=""> Fecha inicio (Electiva)</label>
  <input name="fecha_inicio" id='fecha_inicio' type="date" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Fecha inicio">
 
  </div>
  <div class="col">
  <label for=""> Fecha Fin (Electiva)</label>
  <input name="fecha_fin" id='fecha_fin' type="date" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Teléfono">
  </div>
</div>
<br>

<!--Tipo de programa-->
<div class="row">

<div class="col">
  <label for="">Programa Formación</label>
 <select name="programa" id='programa' type="text"  oninput="maxlengthNumber(this);" required  class="" placeholder="programa">

<option selected>Seleccione el programa</option>
<?php foreach($programas as $programa): ?>
<option value="<?=$programa->getPrograma()?>" <?=$programa->getId_programa() == $programa->getId_programa() ? 
'' : ''?> > 
<?=$programa->getPrograma()?> </option>
<?php endforeach;?>
</select> 
  </div> 
</div>
  <br><br>


  <!--Botón-->
  <div class="row">
  <div class="col">
  <center>
    <button type="submit" style="background-color: #39A900; color:white;"  class="bt"> Guardar</button>
    </center>
  </div>
</div>


<br>

</form>
</div>
</div>


<br>
<p>
<!--subir excel-->
<div  class="card w-75">
      <div class="card-body" >

      

<center>
<h1>Subir Excel</h1>
</center>


<?php
    if(isset($_SESSION['message']))
     {
        echo "<h4>".$_SESSION['message']."</h4>";
        unset($_SESSION['message']);
      }
?>

                <div class="card">

                        <form action="exel/CodeFicha.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel_data" class="bt mt-3" style="background-color: #39A900; color:white;" >Importar</button>

                        </form>

                </div>



</div>
</div>





</center>
</div>