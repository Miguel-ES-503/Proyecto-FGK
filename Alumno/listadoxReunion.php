<?php
  require_once 'templates/head.php';
?>
<title>Listado de horario</title>
<?php
  require_once 'templates/header.php';
  //require_once 'templates/MenuVertical.php';
  require_once 'templates/MenuHorizontal.php';
  require '../Conexion/conexion.php';

  setlocale(LC_TIME, 'es_SV.UTF-8');
  $taller=$_GET["id"];

  //Extraemos el carnet del estudiante
  $stmt1 =$dbh->prepare("SELECT `ID_Alumno` FROM `alumnos` WHERE correo='".$_SESSION['Email']."'");
  // Ejecutamos
  $stmt1->execute();

  while($fila = $stmt1->fetch()){
      $alumno=$fila["ID_Alumno"];
  }


  $mesActual=date("m");
?>

<div class="container-fluid text-center">



  <br>
  <h1 class="h1">Listado por el horario </h1>
  <br>
  <br>
  <div>
      <?php
    include "config/Alerta.php";
      ?>
  </div>

  <div class="col">
      <table id="data" class="table table-responsive-lg w-75 mx-auto float-center">
        <thead class="thead-dark">
          <tr>           
            <th scope="col">Posicion</th>
            <th scope="col">Nombre</th>
            <th scope="col">Hora inicio-Hora Final</th>
            <th scope="col">Tiempo por Sesión</th>
          </tr>
        </thead>
        <tbody >
        <?php
            $numero = 0;
            $stmt = $dbh->query("SELECT * FROM inscripcionreunion i INNER JOIN alumnos a ON i.id_alumno = a.ID_Alumno INNER JOIN horariosreunion h ON h.IDHorRunion = i.Horario WHERE h.IDHorRunion = '".$taller."' ");
            while ($row = $stmt->fetch()) {
              //`HorarioInicio`, `HorarioFinalizado`, `Canitdad` FROM `horariosreunion`IDHorRunion`, `HorarioInicio`, `HorarioFinalizado`, `Canitdad`
                 $nombre = $row['Nombre'];
                 $horaInicio=$row['HorarioInicio'];
                 $horaFinal= $row['HorarioFinalizado'];
                 $tiempo = $row['TiempoReunion'];
                 
                 echo "<tr>";
                 echo "<td>".($numero = $numero +1)."</td>";
                 echo "<td>$nombre</td>";
                 echo "<td>$horaInicio - $horaFinal</td>";
                 echo "<td>$tiempo Minutos</td>";
                 echo "</tr>";
            }
            ?>
        </tbody>
        </table>
    </div>
</div>
<!-- /#page-content-wrapper -->
<br><br><br><br><br><br><br><br><br><br>

</div>
<script>
$(document).ready(function() {
  var table = $('#data').DataTable({

        "scrollX": true,
        "scrollY": "50vh",
        //Esto sirve que se auto ajuste la tabla al aplicar un filtro
         "scrollCollapse": true,

        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },

        initComplete: function() {
            //En el columns especificamos las columnas que queremos que tengan filtro
            this.api().columns([1,2,3]).every(function() {
                var column = this;

                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.header()))
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val().trim()
                        );
                            column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });
                    //Este codigo sirve para que no se active el ordenamiento junto con el filtro
                $(select).click(function(e) {
                    e.stopPropagation();
                });
                //===================

                column.data().unique().sort().each(function(d, j) {
                    // select.append('<option value="' + d + '">' + d + '</option>')

                        select.append('<option value="' + d + '">' + d + '</option>')

                });
            });
        },
        "aoColumnDefs": [
         { "bSearchable": false
         //"aTargets": [ 1] sirve para indicar que columna no queremos que funcione el filtro
          }
       ]
    });
    //********Esta bendita linea hace la magia, adjusta el header de la tabla con el body
    table.columns.adjust();
} );
</script>
</div>
<!-- /#wrapper -->


<?php
  require_once 'templates/footer.php';
?>
