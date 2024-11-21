
    <div id="content">
    <br>
   <center>
      <div  class="card w-75">
      <div class="card-body" >

      
<br>
<center>
<h1>Registro Programa</h1>
</center>
<form action="?c=programa&a=save" id="programa" class="sign-up-form" method="post" >
<br>

<!-- Nombre y apellido usuarios externos-->
<div class="row">

<div class="col">
  <label for="">Nombre Programa:</label>
  <input name="programa" id='programa' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Nombre Programa">
  </div>
</div>
<br>

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

                        <form action="exel/CodePrograma.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel_data" class="bt mt-3" style="background-color: #39A900; color:white;" >Importar</button>

                        </form>

                </div>



</div>
</div>


</center>
</div>