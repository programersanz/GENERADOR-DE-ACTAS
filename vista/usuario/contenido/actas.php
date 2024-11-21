
    <div id="content">
<br>

<center>


<h1> <i class="fas fa-clipboard"></i> ACTAS </h1>

</center>


<div  class="card">
      <div class="card-body" >

<table class="table" id="tabla">
  <thead class="thead-dark">
    <tr>
      <th scope="c"> <center> <i class="fa-solid fa-list-ol"></i> Nª Acta </center> </th>
      <th scope=""> <center> <i class="fa-solid fa-hashtag"></i>Ficha </center></th>
      <th scope=""> <center> <i class="fa-solid fa-calendar"></i> Fecha </center></th>
      <th scope=""> <center> <i class="fa-solid fa-gear"></i> Opciones </center></th>
      </tr>
  </thead>
  <tbody>
    
  <?php foreach

  ($this->modelo->Listar() as $r):?>
    <tr>
      <td> <center><?=$r->n_acta?></center></td>
      <td> <center><?=$r->ficha?> </center></td>
      <td> <center><?=$r->fecha?> </center></td>
    



      <td>  <center> <a   href="?c=Acta&a=FormCrearusu&id=<?=$r->n_acta?>" type="button" class="btn btn-primary" ><i class="fa-solid fa-eye"></i></a > </center> </td>

  </tr>

  <?php endforeach; ?>

  </tbody>
</table>

<script>

var tabla= document.querySelector("#tabla");
var dataTable=new DataTable(tabla);
</script>




</div>