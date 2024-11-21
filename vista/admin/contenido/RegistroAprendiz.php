<div id="content">
    <br>
   <center>
      <div  class="card w-75">
      <div class="card-body" >

      
<br>
<center>
<h1>Registro Aprendiz</h1>
</center>
<form action="?c=aprendiz&a=save" id="aprendiz" class="sign-up-form" method="post" >
<br>

<!-- Nombre y apellido administrador-->
<div class="row">

<div class="col">
  <label for="">Nombre Aprendiz:</label>
  <input name="Nombre_aprendiz" id='Nombre_aprendiz' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Nombre">
  </div>

  <div class="col">
  <label for="">Apellido Aprendiz:</label>
  <input name="Apellido_aprendiz" id='Apellido_aprendiz' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Apellido">
</div>
</div>
<br>

<!--Correo y número de teléfono-->
<div class="row">

<div class="col">
  <label for="">Correo Aprendiz:</label>
  <input name="Correo" id='Correo' type="email" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Correo">
 
  </div>
<div class="col">
  <label for="">Celular:</label>
  <input name="Celular" id='Celular' type="number" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Celular">
 
  </div>


</div>

<br>

<!--Modalidad y nivel de formación-->
<div class="row">

<div class="col">
  <label for="">Tipo documento:</label>
  <select name="Tipo" id='Tipo' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Modalidad">
  <option selected>Tipo</option>
  <option value="CC">CC</option>
  <option value="TI">TI</option>
  <option value="CE">CE</option>
  <option value="TE">TE</option>
  <option value="PAS">PAS</option>

  </select>
</div>

<div class="col">
<label for="">Documento:</label>
  <input name="Numero" id='Numero' type="number" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="documento">
  </select>
</div>
</div>
<br>

<!--Tipo de programa-->
<div class="row">

<div class="col">
  <label for="">Estado de formación:</label>
  <select name="Estado" id='Estado' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Estado de formación">
  <option selected> Seleccione el estado del aprendiz</option>
  <option value="EN FORMACIÓN">EN FORMACIÓN</option>
  <option value="TRANSLADADO">TRANSLADADO</option>
  <option value="CANCELADO">CANCELADO</option>
  <option value="RETIRO VOLUNTARIO">RETIRO VOLUNTARIO</option>
  <option value="CONDICIONADO">CONDICIONADO</option>
  <option value="APLAZADO">APLAZADO</option>
  </select>
</div>


<!--ficha-->
<div class="col">
  <label for="">Ficha:</label>
  <select name="ficha" id='ficha' type="text"  oninput="maxlengthNumber(this);" required  class="" >
      <option selected>Seleccione la ficha</option>
  <?php foreach($fichas as $ficha): ?>
 
    <option value="<?=$ficha->getN_ficha()?>" <?=$ficha->getId_ficha() == $ficha->getId_ficha() ? 
    '' : ''?> > 
     <?=$ficha->getN_ficha()?> </option>
    <?php endforeach;?>
</select>
</div>
</div>
<br>

  <br>
  <br> 


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

                        <form action="exel/CodeAprendiz.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel_data" class="bt mt-3" style="background-color: #39A900; color:white;" >Importar</button>

                        </form>

                </div>



</div>
</div>



</center>
</div>