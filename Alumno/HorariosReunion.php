<?php
  require_once 'templates/head.php';
?>
<title>Horarios Disponibles</title>
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
  $stmt =$dbh->prepare("SELECT `IDHorRunion`, `HorarioInicio`, `HorarioFinalizado`, `Canitdad`, `TiempoReunion` FROM `horariosreunion` WHERE `ID_Reunion`='".$taller."'");
  // Ejecutamos
  $stmt->execute();

?>

<div class="container-fluid text-center">



  <br>
  <h1 class="h1">Inscripción reuniones</h1>
  <br>
  <br>
  <div>
      <?php
    include "config/Alerta.php";
      ?>
  </div>



  <div class="row">
    <div class="col">
      <table class="table table-responsive-lg w-75 mx-auto float-center">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Hora inicio</th>
            <th>Hora final</th>
            <th>Cupo</th>
            <th>Duración por sesión</th>
            <th>Telefono</th>
            <th>Listado por Horario</th>
            <th>Acción</th>
          </tr>
        </thead>


        <tbody class="bg-light">
          <?php
          $vuelta=0;
          while($row = $stmt->fetch()){
            $vuelta++;
            echo "<tr>";
              echo "<td>".$row["HorarioInicio"]."</td>";
              echo "<td>".$row["HorarioFinalizado"]."</td>";
              echo "<td>".$row["Canitdad"]."</td>";
              echo "<td>".$row["TiempoReunion"]." Minutos"."</td>";
              echo "<td><input type=\"text\" class=\"form-control-sm\" form=\"formulario".$vuelta."\" name=\"telefono\" placeholder=\"0000-0000\" pattern=\"[0-9]{4}-[0-9]{4}\" title=\"El teleono debe ser en el formato '0000-0000'\" required></td>";
              echo "<td><a href='listadoxReunion.php?id=".$row['IDHorRunion']."' class='fas fa-user  btn btn-warning'></a></td>";
              echo "<td>";
              $verificar="SELECT COUNT(`id_reunion`) as total FROM `inscripcionreunion` WHERE `id_alumno`='".$alumno."' AND `id_reunion`='".$taller."' AND `Horario`=".$row["IDHorRunion"]."";
              $stmt2 =$dbh->prepare($verificar);
              $stmt2->execute();

              $verificar2="SELECT `Canitdad` FROM `horariosreunion` WHERE `IDHorRunion`='".$row["IDHorRunion"]."'";
              $stmt3= $dbh->prepare($verificar2);
              $stmt3->execute();

              $verificar3="SELECT COUNT(`id_reunion`) as total2 FROM `inscripcionreunion` WHERE `id_alumno`='".$alumno."' AND `id_reunion`='".$taller."'";
              $stmt4 =$dbh->prepare($verificar3);
              $stmt4->execute();

              while ($fila4 = $stmt4->fetch()) {
                $total2=$fila4["total2"];
              }

              while ($fila2 = $stmt2->fetch()) {
                $total=$fila2["total"];
              }
              while ($fila3 = $stmt3->fetch()) {
                $cantidad=$fila3["Canitdad"];
              }
              


                if ($cantidad>0) {


                  if ($total2==1) {
                    if ($total>0) {
                      echo "<form action=\"inscribirReunion.php\" method=\"POST\" id=\"formulario2".$vuelta."\">";
                        echo "<input type=\"text\" name=\"reunion\" value='".$taller."' hidden>
                        <input type=\"text\"  name=\"horario\" value='".$row["IDHorRunion"]."' hidden>
                        <input type=\"text\" name=\"alumno\" value='".$alumno."' hidden>
                        <input type=\"number\" name=\"inscribir\" value=\"0\" hidden>";

                        echo "<button type=\"submit\" form=\"formulario2".$vuelta."\" class=\"btn btn-warning\"><i class=\"fas fa-times\"></i> Desinscribir</button>";
                      echo "</form>";
                    }
                  }else {
                    if ($total==0) {
                      echo "<form action=\"inscribirReunion.php\" method=\"POST\" id=\"formulario".$vuelta."\">";
                        echo "<input type=\"text\" name=\"reunion\" value='".$taller."' hidden>
                        <input type=\"text\" name=\"horario\" value='".$row["IDHorRunion"]."' hidden>
                        <input type=\"text\" name=\"alumno\" value='".$alumno."' hidden>
                        <input type=\"number\" name=\"inscribir\" value=\"1\" hidden>";

                        echo "<button type=\"submit\" form=\"formulario".$vuelta."\" class=\"btn btn-primary\"><i class=\"fas fa-check\"></i> Inscribir</button>";
                      echo "</form>";
                    }elseif ($total>0) {
                      echo "<form action=\"inscribirReunion.php\" method=\"POST\" id=\"formulario2".$vuelta."\">";
                        echo "<input type=\"text\" name=\"reunion\" value='".$taller."' hidden>
                        <input type=\"text\" name=\"alumno\" value='".$alumno."' hidden>
                        <input type=\"number\" name=\"inscribir\" value=\"0\" hidden>";

                        echo "<button type=\"submit\" form=\"formulario2".$vuelta."\" class=\"btn btn-warning\"><i class=\"fas fa-times\"></i> Desinscribir</button>";
                      echo "</form>";
                    }
                  }

                }else {
                  if ($total>0) {
                    echo "<form action=\"inscribirReunion.php\" method=\"POST\" id=\"formulario2".$vuelta."\">";
                      echo "<input type=\"text\" name=\"reunion\" value='".$taller."' hidden>
                      <input type=\"text\"  name=\"horario\" value='".$row["IDHorRunion"]."' hidden>
                      <input type=\"text\" name=\"alumno\" value='".$alumno."' hidden>
                      <input type=\"number\" name=\"inscribir\" value=\"0\" hidden>";

                      echo "<button type=\"submit\" form=\"formulario2".$vuelta."\" class=\"btn btn-warning\"><i class=\"fas fa-times\"></i> Desinscribir</button>";
                    echo "</form>";
                  }else {
                    echo "El cupo se encuentra lleno";
                  }

                }



              echo "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
      
    </div>
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
