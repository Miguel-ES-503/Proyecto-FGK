<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Listados-Renovacion</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
require_once '../Conexion/conexion.php';
?>

        
        <!-- Required meta tags -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



        <!-- Datatables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css">
        <script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
        <!--<script src="JS/jquery-3.5.1.js"></script>-->
        <script src="js/script.js"></script>
    <style>
#mydatatable tfoot input{
    width: 100% !important;
}
#mydatatable tfoot {
    display: table-header-group !important;
}
</style>

<script type="text/javascript">

$(document).ready(function() {
       $('#FormularioModalEditar').modal('show');
    $('#mydatatable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Filtrar.." />' );
    } );

    var table = $('#mydatatable').DataTable({
        "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
        "responsive": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
        "order": [[ 0, "desc" ]],
        "initComplete": function () {
            this.api().columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                        }
                });
            })
        }
    });
});
</script>
<?php

if (isset($_SESSION['noti'])) {
	echo $_SESSION['noti'];
	unset($_SESSION['noti']);
	unset($_SESSION['idRenovacion']);
}
?>
    <body class="container-fluid p-5">
        <div class="table-responsive" id="mydatatable-container">
    <table class="records_list table table-striped table-bordered table-hover" id="mydatatable" style="text-align: center;">
        <thead>
            <tr>
                <th>ID Renovacion</th>
                <th>ID Alumno</th>
                <th>Alumno</th>
                <th>Carrera</th>
                <th>Universidad</th>
                <th>Ciclo</th>
                <th>Año</th>
                <th>Estado</th>
                <th>PDF</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Filtrar..</th>
                <th>Filtrar..</th>
                <th>Filtrar..</th>
                <th>Filtrar..</th>
                <th>Filtrar..</th>
                <th>Filtrar..</th>
                <th>Filtrar..</th>
                <th>Filtrar..</th>
            </tr>
        </tfoot>
        <tbody>
          <?php 
          $sql = "SELECT idRenovacion,renovacion.Estado,renovacion.ID_Alumno,alumnos.Nombre as 'alumno',carrera.nombre as 'carrera',empresas.Nombre as 'uni',ciclo,año,direccion FROM renovacion JOIN alumnos
ON alumnos.ID_Alumno = renovacion.ID_Alumno
JOIN carrera
ON carrera.Id_Carrera = alumnos.ID_Carrera
JOIN empresas
ON empresas.ID_Empresa = alumnos.ID_Empresa";
foreach ($dbh->query($sql) as $datos) {

            ?>
            <tr>
                <td><?php echo $datos['idRenovacion'] ?></td>
                <td><?php echo $datos['ID_Alumno'] ?></td>
                <td><?php echo utf8_decode($datos['alumno'] )?></td>
                <td><?php echo $datos['carrera'] ?></td>
                <td><?php echo $datos['uni'] ?></td>
                <td><?php echo $datos['ciclo'] ?></td>
                <td><?php echo $datos['año'] ?></td>
                <td><?php echo $datos['Estado'] ?></td>
<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#mostrarPDF" 
    ></button></td>
    <input type="hidden" name="id" id="id" value="<?php echo $datos['idRenovacion']?>">
    <input type="hidden" name="direccion" id="direccion" value="<?php echo $datos['direccion']?>">

            </tr>
            <?php 
        }
            ?>
        </tbody>
    </table>
<div class="modal fade" id="mostrarPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="Modelo/ModeloRenovacion/procesoRenovacion.php" method="POST">
  <div class="modal-dialog modal-lg" role="document" style="width: 750px;margin: auto;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn btn-success" style="margin:auto;">Mostrar</button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="idRenovacion" id="idRenovacion">
        <div id="pdf2" style="margin: 0 auto;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="aceptar" class="btn btn-success" value="Aceptar">
        <input type="submit" name="rechazar" class="btn btn-danger" value="Rechazar">
      </div>
    </div>
  </div>
</form>
</div>
</div>


</body>