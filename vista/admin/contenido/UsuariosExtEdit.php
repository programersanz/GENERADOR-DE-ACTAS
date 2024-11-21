
    <div id="content">
    <br>
   <center>
      <div  class="card w-75">
      <div class="card-body" >

      
<br>
<center>
<h1>Editar Funcionarios</h1>
</center>
<form action="?c=Funcionario&a=Guardarfuncionario" id="formulario" class="sign-up-form" method="post" >
<br>

<!-- Nombre y apellido usuarios externos-->
<div class="row">
<input name="id_funcionario" id='id_funcionario' type="hidden" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getId_funcionario()?>">
<div class="col">
  <label for="">Nombre Funcionario:</label>
  <input name="nombre" id='nombre' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getNombre()?>">
  </div>

  <div class="col">
  <label for="">Apellido Funcionario:</label>
  <input name="apellido" id='apellido' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getApellido()?>">
</div>
</div>
<br>

<!--Cargo-->
<div class="row">

<div class="col">
  <label for="">Cargo Funcionario:</label>
  <input name="cargo" id='cargo' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getCargo()?>">
 
  </div>

</div>

  <br><br> 


  <!--Botón-->
  <div class="row">
  <div class="col">
  <center>
  <button style="background-color: #39A900; color:white;"   onclick='return enviarFormulario();'  class="bt"   id="bt1"  class="btn solid" >Actualizar</button>
    <a    href="?c=Vistas&a=ConsultaUsuExternos" type="submit" style="background-color: #39A900; color:white;"  class="bt "> Cancelar</a>
    </center>
  </div>
</div>


<br>

<script>


function enviarFormulario() {

  event.preventDefault(); 


  Swal.fire({
  title: ' ¿ Guardar cambios ?',
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
   

    location.href="#"  
  }
})

} 

</script>

</form>
</div>
</div>
</center>
</div>