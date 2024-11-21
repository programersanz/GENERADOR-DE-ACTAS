
    <div id="content">
    <br>
   <center>
      <div  class="card w-75">
      <div class="card-body" >

      
<br>
<center>
<h1>Editar usuario</h1>
</center>
<form  action="?c=Usuarios&a=Guardarusu"   id="formulario" class="sign-up-form" method="post" >
<br>
<div class="row">

<div class="col">
<input name="id" id='id' type="hidden" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getId()?>">
  <label for=""> Nombre Admin:</label>
  <input name="nombre" id='nombre' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class=""  value="<?=$p->getNombre()?>">
  </div>

  <div class="col">
  <label for="">Apellido Admin:</label>
  <input name="apellido" id='apellido' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getApellido()?>">
</div>

</div>
<br>
<div class="row">

<div class="col">
  <label for="">Correo Admin:</label>
  <input name="correo" id='correo' type="email" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getCorreo()?>">
 

  </div>
  <div class="col">
  <label for=""> Teléfono:</label>
  <input name="telefono" id='telefono' type="number" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getTelefono()?>">


  </div>

</div>
<br>


<div class="row">
  <div class="col">
<label for="">Documento:</label>
  <input name="documento" id='documento' type="number" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getDocumento()?>">
</div>
  </div>
  <br>



  <div class="row">
    
    <div class="col">
    <br>
    <center>
    <button style="background-color: #39A900; color:white;"   class="bt"  onclick='return enviarFormulario();' id="bt1"  class="btn solid" >Actualizar</button>
    <a    href="?c=Vistas&a=Usuario" style="background-color: #39A900; color:white;"  type="submit" class="bt "> Cancelar</a>
    </center>
    </div>
  </div>


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
   

    location.href="?c=Vistas&a=Usuario"  
  }
})

} 

</script>

<br>




</form>
</div>
</div>
</center>
</div>