
    <div id="content">
    <br>
   <center>
      <div  class="card w-75">
      <div class="card-body" >

      
<br>
<center>
<h1>Registro</h1>
</center>
<form action="?c=usuarios&a=save" id="usuario" class="sign-up-form" method="post" >
<br>
<div class="row">

<div class="col">
  <label for=""> Nombre Admin:</label>
  <input name="nombre" id='nombre' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Nombre">
  </div>

  <div class="col">
  <label for="">Apellido Admin:</label>
  <input name="apellido" id='apellido' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Apellido">
</div>

</div>
<br>
<div class="row">

<div class="col">
  <label for="">Correo Admin:</label>
  <input name="correo" id='correo' type="email" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Correo">
 

  </div>
  <div class="col">
  <label for="">Teléfono Admin:</label>
  <input name="telefono" id='telefono' type="number" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Teléfono">


  </div>

</div>
<br>


<div class="row">

<div class="col">
  <label for=""> Contraseña:</label>
  <input name="contrasena" id='contrasena' type="password" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Contraseña">


  </div>
  <div class="col">
  <label for=""> Confirmar contraseña:</label>
  <input name="" id='' type="password" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Confirmar contraseña">
</div>

</div>


  <br>


<div class="row">

<div class="col">
  <label for="">Rol:</label>


  <select name="rol" id='rol' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Confirmar contraseña">
  <option selected> Seleccione Rol</option>
  <option value="1">Coordinador</option>
  <option value="2">Instructor</option>
  <option value="2">Otro</option>
</select>


  </div>
  <div class="col">
<label for="">Documento:</label>
  <input name="documento" id='documento' type="number" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Documento">
</div>
  </div>

  <br><br>

 
  <div class="row">
  <div class="col">
  <center>
    <button type="submit" style="background-color: #39A900; color: white;"  class="bt"> Guardar</button>
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


<!--Mensaje de aviso -->
<?php
                if(isset($_SESSION['message']))
                {
                    echo "<h4>".$_SESSION['message']."</h4>";
                    unset($_SESSION['message']);
                }
                ?>

                <div class="card">

                        <form action="exel/CodeAdmin.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel_data" class="bt mt-3" style="background-color: #39A900; color:white;" >Importar</button>

                        </form>
                </div>



</div>
</div>

</center>
</div>