
    <div id="content">
    <br>
   <center>
      <div  class="card w-75">
      <div class="card-body" >

      
<br>
<center>
<h1>Editar Instructor</h1>
</center>
<form action="?c=Instructor&a=save" id="formulario" class="sign-up-form" method="post" >
<br>

<!-- Nombre y apellido administrador-->
<div class="row">
<input name="id_instructor" id='id_instructor' type="hidden" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getId_instructor()?>">
<div class="col">
  <label for="">Nombre Instructor:</label>
  <input name="nombre" id='nombre' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getNombre()?>">
  </div>

  <div class="col">
  <label for="">Apellido Instructor:</label>
  <input name="apellido" id='apellido' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getApellido()?>">
</div>
</div>
<br>

<!--Número de teléfono-->
<div class="row">

<div class="col">
  <label for="">Teléfono:</label>
  <input name="telefono" id='telefono' type="number" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getTelefono()?>">
 
  </div>

<div class="col">
  <label for="">Rol:</label>
  <select name="rol" id='rol' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getRol()?>">
  <option selected><?=$p->getRol()?></option>
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
  <input name="correo" id='correo' type="email" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getCorreo()?>">
 
  </div>
  <div class="col">
  <label for="">Contraseña:</label>
  <input name="contraseña" id='contraseña' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getContraseña()?>">
  </div>
</div>
  <br><br> 


  <!--Botón-->
  <div class="row">
  <div class="col">
  <center>
    <button type="submit" style="background-color: #39A900; color:white;"  onclick='return enviarFormulario();' id="bt1" class="bt"> Guardar</button>
    <a href="?c=Vistas&a=ConsultarInstructor"  style="background-color: #39A900; color:white;"  type="submit" class="bt "> Cancelar</a>
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
   

    location.href="?c=Vistas&a=ConsultarInstructor"  
  }
})

} 

</script>
</form>
</div>
</div>
</center>
</div>