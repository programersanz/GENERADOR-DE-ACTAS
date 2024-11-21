
    <div id="content">
    <br>
   <center>
      <div  class="card w-75">
      <div class="card-body" >

      
<br>
<center>
<h1>Registro Instructor</h1>
</center>
<form action="?c=instructor&a=save" id="instructor" class="sign-up-form" method="post" >
<br>

<!-- Nombre y apellido administrador-->
<div class="row">

<div class="col">
  <label for="">Nombre Instructor:</label>
  <input name="nombre" id='nombre' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Nombre">
  </div>

  <div class="col">
  <label for="">Apellido Instructor:</label>
  <input name="apellido" id='apellido' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Apellido">
</div>
</div>
<br>

<!--Número de teléfono-->
<div class="row">

<div class="col">
  <label for="">Teléfono Instructor:</label>
  <input name="telefono" id='telefono' type="number" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Teléfono">
 
  </div>

<div class="col">
  <label for="">Rol:</label>
  <select name="rol" id='rol' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Rol">
  <option selected>Rol</option>
  <option value="1">Administador</option>
  <option value="2">Instructor</option>
  </select>
</div>
</div>

<br>

<!--Correo y contraseña-->
<div class="row">

<div class="col">
  <label for="">Correo Instructor:</label>
  <input name="correo" id='correo' type="email" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Correo">
 
  </div>
  <div class="col">
  <label for="">Contraseña:</label>
  <input name="contraseña" id='contraseña' type="password" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Contraseña">
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

                        <form action="exel/CodeInstructor.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel_data" class="bt mt-3" style="background-color: #39A900; color:white;" >Importar</button>

                        </form>

                </div>




</div>
</div>






</center>
</div>