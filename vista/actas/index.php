

<?php
require_once "modelo/basededatos.php";
require_once "modelo/acta.php";

?>
    <div id="content">
<br>

<center>


<h1> ACTAS </h1>

</center>



<table class="table" id="tabla">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nª Acta</th>
      <th scope="col">CIUDAD</th>
      <th scope="col">FICHA</th>
      <th scope="col">Opciones</th>
      </tr>
  </thead>
  <tbody>
    
  <?php foreach
  ($this->modelo->listar() as $r):?>
    <tr>
      <td><?=$r->n_acta?></td>

      
      <td><?=$r->ciudad?></td>
      <tr>
      <td><?=$r->ficha?></td>


      <td>Editar|Eliminar</td>

  </tr>

  <?php endforeach; ?>

  </tbody>
</table>

<script>

var tabla= document.querySelector("#tabla");
var dataTable=new DataTable(tabla);
</script>




</div>