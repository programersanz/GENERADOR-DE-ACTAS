<?php foreach

($this->modelo->ListarActas() as $r):?>


<?php endforeach; ?>





   <div id="content">
    <br>
   <center>
      <div  class="card w-75">
      <div class="card-body" >

      


      <center>
<br>
<h1 class="fixed-center" > ACTA DE REUNIÓN</h1>
<h8 > ACTA no. <?=$r->n_acta?></h8>
</center>
<br>
<center>
<h3>Casos Particulares</h3>

</center>


<form  method="post" action="controller/particulares.controller.php" >


<br>

<p>
  <div class="row">
    <div  class="participantes">
    <br>
    <div  class="part">

<center>
<table   class="tablas" id="table">
<p>

<thead class="t-head">
<p>
    <tr>
    <th scope="col"></th>
  
      <th scope="col">Aprendiz</th>
      <th scope="col">Instructor</th>
      <th scope="col">Descripción</th>
    </tr>

  </thead >

  <tbody class="t-body">
  <p>
  <tr id="tr">
    
  <td><input class='form-control' type='hidden' name='n_acta[]' style="with:50px; height:50px" id='n_acta' placeholder='acta' required value="<?=$r->n_acta?>"/></td>    
  <td><input class='form-control' type='text' name='nombre_aprendiz[]' style="with:50px; height:50px" id='nombre_aprendiz' placeholder='Aprendiz' required /></td> 
  <td><input class='form-control' type='text' name='nombre_its[]' id='nombre_its' style="with:50px; height:50px" placeholder='Instructor' required /> </td>
  <td><textarea name='descripcion[]' id='descripcion' type='text' cols='60' rows='' style="with:90px; height:50px"  oninput='maxlengthNumber(this);' required  class='form-control' placeholder='Descripción'></textarea > </td>
  </tr>

<p>
</tbody>

</table>
<br /><br />
<bootom id="add" class="btn btn-success" >Agregar</bootom>
<bootom id="del" class="btn btn-danger">Eliminar</bootom>
<br /><br />

    </div>
   

    <script type="text/javascript">

$(document).ready(function(){

$("#add").click(function(){
// Obtenemos el numero de columnas (td) que tiene la primera fila
// (tr) del id "tabla"
var tds=$("#table tr:first td").length;
// Obtenemos el total de filas (tr) del id "tabla"
var trs=$("#table tr").length;
var nuevaFila="<tr>";
cant = $('#contador-filas').val();
cant++;
$('#contador-filas').val(cant)
nuevaFila+="<td><input class='form-control' type='hidden' name='n_acta[]'  id='n_acta' placeholder='acta"+ " ' required value='<?=$r->n_acta?>'/> </td>"+
" <td><input class='form-control' type='text' name='nombre_aprendiz[]' style='with:50px; height:50px' id='nombre_aprendiz' placeholder='Aprendiz' required /></td> "+
"  <td><input class='form-control' type='text' name='nombre_its[]' id='nombre_its' style='with:50px; height:50px' placeholder='Instructor' required /> </td>"+

"  <td><textarea name='descripcion[]' id='descripcion' type='text' cols='60' rows='' style='with:90px; height:50px'  oninput='maxlengthNumber(this);' required  class='form-control' placeholder='Descripción'></textarea > </td>";

nuevaFila+="</tr>";
$("#table").append(nuevaFila);
});
/**
* Funcion para eliminar la ultima columna de la tabla.
* Si unicamente queda una columna, esta no sera eliminada
*/
$("#del").click(function(){
// Obtenemos el total de filas (tr) del id "tabla"
var trs=$("#table tr").length;
if(trs>0)
{
// Eliminamos la ultima fila
cant--;
$('#contador-filas').val(cant)
$("#table tr:last").remove();

}
});
});
</script>

    </div>
  </div>

  <button type="submit" name="insertar" class="btn btn-primary mt-3" style="background-color: #FF890C;" >guardar</button>

</form>


</div>
</div>