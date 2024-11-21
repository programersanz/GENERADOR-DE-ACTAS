<div id="content">
<br>
    <h2>Citas</h2>

<div class= "container-fluid">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Inicio / Citas </li>
    </ol>
</nav>
    </div>

<div class="container"> 

</div> 

<div class="contact-box">  
<br>
<table class="table table-hover table-striped" id="cancelar" class="display"> 
    <thead class="table">
        <tr>
        <td>Fecha 
                <div class="float-right"> <i class="fas fa-arrow-up"></i> 
            <i class="fas fa-arrow-down"></i>
</div>
                    </td>
            <td>Hora</td>
            <td>Estado</td>
            <td>Examen</td>
            <td>Usuario</td>
            <td> </td>
            <td>Documento</td>
            <td>Sucursal</td>
            <td>Editar</td>

</tr>    
</thead>  
<tbody>
    <?php foreach($actal as $acta): ?>
        <tr>
        <td> <?= $acta->getN_acta() ?> </td>
        <td> <?= $acta->getNom_rev() ?></td>
        <td> <?= $acta->getFecha() ?></td>

        <td> <a  href="?c=citas&a=changeState&Id_Cita=<?= $cita->getId_Cita() ?>&Fecha_Cita=<?= $cita->getFecha_Cita() ?>&Hora_Cita=<?= $cita->getHora_Cita() ?>"   type="submit" class= "btn btn-danger">Cancelar</a > </td>        

        
    </td>
    </tr>
    <?php endforeach; ?>
    </td>

</table>


    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src='Views/js/dataTable.js'></script>
    </body>
    </html>