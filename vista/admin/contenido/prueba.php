>
   <div id="content">
    <br>
   <center>
      <div  class="card w-85">
      <div class="card-body" >

      
<br>
<center>
<h1>Participantes </h1>
<?php foreach

($this->modelo->ListarActas() as $r):?>



<?php endforeach; ?>
</center>


<form    id="parti" name="parti" method="post" action="?c=acta&a=save" >


<br>

<p>
  <div class="row">
    <div class="participantes">
    <br>
    <h1 class="fixed-center" > ACTA DE REUNIÓN</h1>
<h8 > ACTA no. <?=$r->n_acta?></h8>
    <div class="part">

<center>

<table   class="tablas" id="table">
<p>
<thead class="t-head">
<p>
    <tr>
      <th scope="col"></th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Cargo</th>
      <th scope="col">Asistencia</th>
    </tr>
  </thead>
  <tbody  class="t-body">
  <p>
    <center>
    <tr id="tr">

  <td><input  class='form-control' type='hidden' name='n_acta[]'  id='n_acta' placeholder='acta' required value="<?=$r->n_acta?>"/></td>    
  <td><input  class='form-control' type='text' name='nombre[]'  id='nombre' placeholder='Nombres ' required /></td> 
  <td><input  class='form-control' type='text' name='apellido[]' id='apellido' placeholder='Apellidos' required /> </td>
  <td> <select   name='cargo[]' id='cargo'   class='form-control' >  <option value='instructor jefe de taller'>instructor jefe de taller</option> <option value='instructora jefe de taller'>instructora jefe de taller</option> <option value='Instructor tecnico'>Instructor tecnico</option> <option value='Instructora tecnica'>Instructora tecnica</option> <option value='Instructora'>Instructora</option> <option value='Instructor'>Instructor</option> </select></td>
  <td> <select   name='asistencia[]' id='asistencia'   class='form-control' >  <option value='Asistio'>Asistio</option>  <option value='No Asistio'>No Asistio</option> </select></td>

</tr>
</center>
<p>
</tbody>
</table>
<br /><br />
<bootom id="add" class="bt btn-success" >Agregar</bootom>
<bootom id="del" class="bt btn-danger">Eliminar</bootom>
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
"<td><input class='form-control' type='text' name='nombre[]'  id='nombre' placeholder='Nombres"+ " ' required /> </td>"+
"<td><input class='form-control' type='text' name='apellido[]' id='apellido' placeholder='Apellidos" +"' required /> </td>"+

"<td> <select  name='cargo[]' id='cargo'   class='form-control' >  <option value='instructor jefe de taller'>instructor jefe de taller</option> <option value='instructora jefe de taller'>instructora jefe de taller</option> <option value='Instructor tecnico'>Instructor tecnico</option> <option value='Instructora tecnica'>Instructora tecnica</option> <option value='Instructora'>Instructora</option> <option value='Instructor'>Instructor</option> </select></td>"+
"<td> <select  name='asistencia[]' id='asistencia'   class='form-control' >  <option value='Asistio'>Asistio</option>  <option value='No Asistio'>No Asistio</option> </select></td>";
// Añadimos una columna con el numero total de columnas.
// Añadimos uno al total, ya que cuando cargamos los valores para la
// columna, todavia no esta añadida
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

  <button type="submit" name="insertar" class="bt mt-3" style="background-color: #FF890C;color:white;" >guardar</button>

</form>


</div>
</div>