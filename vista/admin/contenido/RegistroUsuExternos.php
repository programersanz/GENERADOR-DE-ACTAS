
<div id="content">
    <br>
   <center>
      <div  class="card w-75">
      <div class="card-body" >

      
<br>
<center>
<h1>Registro Funcionarios</h1>
</center>
<form action="?c=Funcionario&a=save" id="funcionario" class="sign-up-form" method="post" >
<br>

<!-- Nombre y apellido usuarios externos-->
<div class="row">

<div class="col">
  <label for="">Nombre Funcionario:</label>
  <input name="nombre" id='nombre' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Nombre">
  </div>

  <div class="col">
  <label for="">Apellido Funcionario:</label>
  <input name="apellido" id='apellido' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Apellido">
</div>
</div>
<br>

<!--tipo doc y documento-->
<div class="row">

<div class="col">
<label for="">Tipo de documento:</label>
  <select name="tipodocf" id='tipodocf' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Tipo de documento">
  <option selected>Tipo de documento</option>
  <option value=" C.C">C.C</option>
  <option value="T.I">T.I</option>
  <option value="C.E">C.E</option>
  <option value="P.E.P">P.E.P</option>
  </select>
</div>

<div class="col">
  <label for="">Número de documento:</label>
  <input name="documentof" id='documentof' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Numero ocumento">
</div>
 
</div>
<br>
<!--correo y cargo-->
<div class="row">

<div class="col">
  <label for="">Correo funcionario:</label>
  <input name="correof" id='correof' type="email" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Correo">

  </div>

<div class="col">
  <label for="">Cargo Funcionario:</label>
  <input name="cargo" id='cargo' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Cargo">
 </div>
 </div>
  <br><br> 


  <!--Botón-->
  <div class="row">
  <div class="col">
  <center>
    <button type="submit" style="background-color:#39A900; color:white;"  class="bt"> Guardar</button>
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

                        <form action="exel/CodeFuncionarios.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel_data" class="bt mt-3" style="background-color: #39A900; color:white;" >Importar</button>

                        </form>

                </div>



</div>
</div>


</center>
</div>