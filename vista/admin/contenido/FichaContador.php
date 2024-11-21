
    <div id="content">
    <br>
   <center>
      <div  class="card w-75">
      <div class="card-body" >

      
<br>
<center>
<h1>Ficha Contador</h1>
</center>
<form action="?c=Ficha&a=GuardarFichaContador" id="programa" class="sign-up-form" method="post" >
<br>

<!-- Nombre y apellido usuarios externos-->
<div class="row">
<div class="row">
<input name="id_ficha" id='id_ficha' type="hidden" maxlength="25" oninput="maxlengthNumber(this);" required  class="form-control" value="<?=$l->getId_ficha()?>">
<div class="col">


<div class="col">
  <label for="">Ficha Contador:</label>
  <input name="ficha_contador" id='ficha_contador' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="form-control" value="<?=$l->getFicha_contador()+1?>">
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