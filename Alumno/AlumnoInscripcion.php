<?php
  require_once 'templates/head.php';
?>
<title>Talleres Disponibles</title>
<?php
  require_once 'templates/header.php';
  require_once 'templates/MenuVertical.php';
  require_once 'templates/MenuHorizontal.php';
  require '../Conexion/conexion.php';

  setlocale(LC_TIME, 'es_SV.UTF-8');
  $error=$_GET["err"];

  //Extraemos el carnet del estudiante
  $stmt1 =$dbh->prepare("SELECT `ID_Alumno`, `SedeAsistencia`, `ID_Sede` FROM `alumnos` WHERE correo='".$_SESSION['Email']."'");
  // Ejecutamos
  $stmt1->execute();

  while($fila = $stmt1->fetch()){
      $alumno=$fila["ID_Alumno"];
      $sedeA=$fila["SedeAsistencia"];
      $sedeB=$fila["ID_Sede"];
  }


  $mesActual=date("m");
  $anioActual=date("Y");
  $stmt =$dbh->prepare("SELECT `ID_Taller`, `Titulo`, `Fecha`, `Hora`, `ID_Sede`, `ID_Empresa`, `Cupo` FROM `talleres` WHERE MONTH(`Fecha`)='".$mesActual."' AND YEAR(`Fecha`)='".$anioActual."' AND `Estado`='Activo' AND (`ID_Sede`='".$sedeA."' OR `ID_Sede`='".$sedeB."')");
  // Ejecutamos
  $stmt->execute();


?>

<div class="container-fluid text-center">

  <style media="screen">
  #WindowLoad{
    position:fixed;
    top:0px;
    left:0px;
    z-index:3200;
    filter:alpha(opacity=65);
   -moz-opacity:65;
    opacity:0.65;
    background:#999;
  }
  </style>

  <script type="text/javascript">
  $(document).ready(function () {
    jsRemoveWindowLoad();
      $(".load").click(function() {
        jsShowWindowLoad("Se está procesando la petición");
      });
    });
  </script>

  <br>
  <h1 class="h1 text-light">Inscripción</h1>
  <br>
  <br>
  <div>
      <?php
    include "config/Alerta.php";
      ?>
  </div>
  <div>
    <?php
      if ($error==1) {
        // code...
        echo "<div class=\"alert alert-danger\">";
        echo "El cupo de este taller esta completo";
        echo "</div>";
      }
    ?>
  </div>


  <div class="row">
    <div class="col">
      <table class="table table-responsive-lg float-left">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Tema</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Cupo disponible</th>
            <th scope="col">Acción</th>
          </tr>
        </thead>

        <tbody class="bg-light">
          <?php
          while($row = $stmt->fetch()){

            echo "<tr>";
              echo "<td>".$row["Titulo"]."</td>";
              $fechaTaller=strftime("%A, %d de %B de %Y", strtotime($row["Fecha"]));
              echo "<td>$fechaTaller</td>";
              echo "<td>".$row["Hora"]."</td>";
              echo "<td>".$row["Cupo"]."</td>";
              echo "<td>";
              $verificar="SELECT COUNT(`ID_Taller`) as total FROM `inscripciontalleres` WHERE `ID_Alumno`='".$alumno."' AND `ID_Taller`='".$row["ID_Taller"]."'";
              $stmt2 =$dbh->prepare($verificar);
              $stmt2->execute();

              $verificar2="SELECT `Cupo` FROM `talleres` WHERE `ID_Taller`='".$row["ID_Taller"]."'";
              $stmt3= $dbh->prepare($verificar2);
              $stmt3->execute();

              $verificar3="SELECT COUNT(i.ID_Alumno) as cantidad FROM inscripciontalleres i JOIN talleres t ON t.ID_Taller=i.ID_Taller WHERE MONTH(t.Fecha)='".$mesActual."' AND i.ID_Alumno='".$alumno."'";
              $stmt4= $dbh->prepare($verificar3);
              $stmt4->execute();

              while ($fila2 = $stmt2->fetch()) {
                $total=$fila2["total"];
              }
              while ($fila3 = $stmt3->fetch()) {
                $cupo=$fila3["Cupo"];
              }
              while ($fila4 = $stmt4->fetch()) {
                $cantidad=$fila4["cantidad"];
              }


                  if ($cupo>0) {
                    // code...

                    if ($cantidad>=3) {
                      // code...
                      if ($total>0) {
                        // code...
                          echo "<a href=\"inscribir.php?taller=".$row["ID_Taller"]."&alumno=".$alumno."&inscribir=0&pagina=AlumnoInscripcion\" class=\"btn btn-warning load\"><i class=\"fas fa-times\"></i> Desinscribir</a>";
                      }else {
                        echo "<i class=\"fas fa-times-circle\" style=\"font-size:2em; color:red;\"></i>";
                      }
                    }else {
                      if ($total==0) {

                        echo "<a href=\"inscribir.php?taller=".$row["ID_Taller"]."&alumno=".$alumno."&inscribir=1&pagina=AlumnoInscripcion\" class=\"btn btn-primary load\"><i class=\"fas fa-check\"></i> Inscribir</a>";
                      }elseif ($total>0) {
                        echo "<a href=\"inscribir.php?taller=".$row["ID_Taller"]."&alumno=".$alumno."&inscribir=0&pagina=AlumnoInscripcion\" class=\"btn btn-warning load\"><i class=\"fas fa-times\"></i> Desinscribir</a>";
                      }
                    }

                  }else {
                    if ($total==0) {
                      echo "El cupo se encuentra lleno";
                    }elseif ($total>0) {
                      echo "<a href=\"inscribir.php?taller=".$row["ID_Taller"]."&alumno=".$alumno."&inscribir=0&pagina=AlumnoInscripcion\" class=\"btn btn-warning load\"><i class=\"fas fa-times\"></i> Desinscribir</a>";

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

</div>
</div>
<!-- /#wrapper -->

<?php
  require_once 'templates/footer.php';
?>
