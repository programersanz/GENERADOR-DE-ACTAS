
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
      <th scope="col">   <i class="fa-solid fa-list-ol"></i>  Nª Acta </th>
      <th scope="col">  <i class="fa-solid fa-hashtag"></i> Ficha  </th>
      <th scope="col">   <i class="fa-solid fa-calendar"></i> Fecha </th>
      <th scope="col">  <i class="fa-solid fa-gear"></i>Opciones </th>
      </tr>
  </thead>
  <tbody>

  <?php 
    try{
        foreach($actal as $acta): ?> 

        <tr id="pi">
        <td> <?= $acta->getActa_no()?></td>
        <td> <?= $acta->getFicha() ?> </td>
        <td> <?= $acta->getFecha() ?> </td>

        <td> 
          
        <a  href="?c=Acta&a=FormCrear&id=<?= $acta->getN_acta()?>&ficha=<?=$acta->getFicha() ?> &acta_contador=<?=$acta->getActa_contador()?>" type="button" style="background-color: #39A900; color:white;"  class="btn " ><i class="fa-solid fa-pen"></i></a > 
        <a href="?c=Acta&a=Borrar&id=<?= $acta->getN_acta()?>"  type="button" class="btn " style="background-color: #39A900; color:white;" ><i class="fa-solid fa-trash-can"></i></a>
        <a   href="?c=Acta&a=FormCrearimp&id=<?= $acta->getN_acta()?>&ficha=<?=$acta->getFicha() ?> &acta_contador=<?=$acta->getActa_contador()?>" type="button" style="background-color: #39A900; color:white;" class="btn " ><i class="fa-solid fa-eye"></i></a >
        <a   href="?c=Acta&a=FormCrearRar&id=<?= $acta->getN_acta()?>&ficha=<?=$acta->getFicha() ?>" type="button" style="background-color: #39A900; color:white;" class="btn " ><i class="fa-solid fa-file-zipper"></i></a >  
      </td>        

    </tr>
    <?php endforeach; 
    }catch(Exception $e){
        die($e->getMessage());
        die("No se pudo listar");
    }
    ?>


  <script>  



const showAlert = () => {



  Swal.fire({
    
  title: 'Eliminar?',
  text: "Quieres eliminar el acta numero  ?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#FF8000',
  cancelButtonColor: '#d33',
  cancelButtonText: 'No, cancelar!',
  confirmButtonText: 'Si, eliminar!'

 
}).then((result) => {
  if (result.isConfirmed) {
   
    
    
  }
})
  
}


</script>

  </tbody>
</table>

<script>


var tabla= document.querySelector("#tabla");
var dataTable=new DataTable(tabla);
</script>




</div>