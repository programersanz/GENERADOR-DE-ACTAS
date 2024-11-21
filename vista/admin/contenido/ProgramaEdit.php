
    <div id="content">
    <br>
   <center>


<!--programa-->
      <div  class="card w-75">
      <div class="card-body" >

      
<br>
<center>
<h1>Editar Programa</h1>
</center>
<form  name="formulario" id="formulario" action="?c=programa&a=GuardarPrograma"   class="sign-up-form" method="post" >
<br>
<input name="id_programa" id='id_programa' type="hidden" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getId_Programa()?>">
<!-- Número de ficha y cantidad de aprendices-->
<div class="row">

<div class="col">
  <label for=""> Nombre Programa:</label>
  <input name="programa" id='programa' type="text" maxlength="" oninput="maxlengthNumber(this);" required  class=""value="<?=$p->getPrograma()?>">
  </div>
</div>
<br>

  <!--Botón-->
  <div class="row">
  <div class="col">
  <center>
  <button style="background-color: #39A900; color:white;"   onclick='return enviarFormulario();'  class="bt"   id="bt1"  class="btn solid" >Actualizar</button>
    <a    href="?c=Vistas&a=ConsultarPrograma" type="submit" style="background-color: #39A900; color:white;"  class="bt"> Cancelar</a>
    </center>
  </div>
</div>


<br>

<script>


function enviarFormulario() {

  event.preventDefault(); 


  Swal.fire({
  title: '¿ Guardar cambios ?',
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
   
    location.href="?c=Vistas&a=ConsultarPrograma"  
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