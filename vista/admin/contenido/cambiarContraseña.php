
    <div id="content">
    <br>
   <center>
      <div  class="card w-75">
      <div class="card-body" >

      
<br>
<center>
<h1>Cambiar Contraseña</h1>
</center>
<form action="?c=Usuarios&a=GuardarContra" id="programa" class="sign-up-form" method="post" >
<br>

<!-- Nombre y apellido usuarios externos-->
<div class="row">
<div class="row">
<input name="id" id='id' type="hidden" maxlength="25" oninput="maxlengthNumber(this);" required  class="form-control" value="<?=$p->getId()?>">
<div class="col">


<div class="col">
  <label for="">Contraseña:</label>
  <input name="contrasena" id='contrasena' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="form-control" value="<?=$p->getContrasena()?>">
  </div>
</div>
<br>

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