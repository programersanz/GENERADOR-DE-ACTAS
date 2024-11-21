<form id="conclu" name="conclu" method="post" action="controlador.php">
<br>

<p>
  <div class="row">
    <div class="col">
    <br>
    <div style="margin: 0px 200px 0px 200px; padding-bottom: 0px;padding-top: 0px; background-color: ##FFFFFF">

<center>
<h2>Conclusiones</h2>
<table class="tablas" id="table2">


<!--<input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombres" required />
<input class="form-control" type="text" name="apellido" id="apellido" placeholder="Apellidos" required />
 <select  name="cargo" id="cargo"   class='form-control' >  <option value='instructor jefe de taller'>instructor jefe de taller</option> <option value='instructora jefe de taller'>instructora jefe de taller</option> <option value='Instructor tecnico'>Instructor tecnico</option> <option value='Instructora tecnica'>Instructora tecnica</option> <option value='Instructora'>Instructora</option> <option value='Instructor'>Instructor</option> </select>
<select name="asistencia" id="asistencia"   class="form-control" >
<option value="Asistio">Asistio</option>
<option value="NO Asistio">No Asistio</option>
</select>-->



</tr>
</tbody>
</table>
<br>
<bootom id="add2" class="btn btn-success" >Agregar</bootom>
<bootom id="del2" class="btn btn-danger">Eliminar</bootom>
<br /><br />

    </div>
   

    <script type="text/javascript">

$(document).ready(function(){

$("#add2").click(function(){
// Obtenemos el numero de columnas (td) que tiene la primera fila
// (tr) del id "tabla"
var tds=$("#table2 tr:first td").length;
// Obtenemos el total de filas (tr) del id "tabla"
var trs=$("#table2 tr").length;
var nuevaFila="<tr>";
cant = $('#contador-filas').val();
cant++;
$('#contador-filas').val(cant)
nuevaFila+="<td><input class='form-control' type='text' name='Aprendiz[]'  id='Aprendiz' placeholder='Aprendiz"+ " ' required /> </td>"+
"<td><input class='form-control' type='text' name='instructor[]' id='instructor' placeholder='instructor" +"' required /> </td>"+
"<td><input class='form-control' type='text' name='descripcion[]' id='descripcion' placeholder='descripcion" +"' required /> </td>";
// Añadimos una columna con el numero total de columnas.
// Añadimos uno al total, ya que cuando cargamos los valores para la
// columna, todavia no esta añadida
nuevaFila+="</tr>";
$("#table2").append(nuevaFila);
});
/**
* Funcion para eliminar la ultima columna de la tabla.
* Si unicamente queda una columna, esta no sera eliminada
*/
$("#del2").click(function(){
// Obtenemos el total de filas (tr) del id "tabla"
var trs=$("#table2 tr").length;
if(trs>0)
{
// Eliminamos la ultima fila
cant--;
$('#contador-filas').val(cant)
$("#table2 tr:last").remove();

}
});
});
</script>

    </div>
  </div>



</form>