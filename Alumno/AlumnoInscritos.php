<?php
  require_once 'templates/head.php';
?>
<title>Talleres inscritos</title>
<?php
  require_once 'templates/header.php';
  
  require_once 'templates/MenuHorizontal.php';
  require_once '../Conexion/conexion.php';

  setlocale(LC_TIME, 'es_SV.UTF-8');
  //Extraemos el carnet del estudiante
  $stmt1 =$dbh->prepare("SELECT `ID_Alumno`, `SedeAsistencia`, `ID_Sede` FROM `alumnos` WHERE `correo`='".$_SESSION['Email']."'");
  // Ejecutamos
  $stmt1->execute();

  while($fila = $stmt1->fetch()){
      $alumno=$fila["ID_Alumno"];
      $sedeA=$fila["SedeAsistencia"];
      $sedeB=$fila["ID_Sede"];
  }
  $mesActual=date("m");
  $anioActual=date("Y");
  $consulta="SELECT t.ID_Taller as taller, `Titulo`, `Fecha`, `Hora`, `Cupo`, `lugar` FROM talleres t JOIN inscripciontalleres it ON t.ID_Taller=it.ID_Taller WHERE it.ID_Alumno='".$alumno."' AND MONTH(`Fecha`)='".$mesActual."' AND YEAR(`Fecha`)='".$anioActual."'";
  $stmt =$dbh->prepare($consulta);
  // Ejecutamos
  $stmt->execute();

//Consulta para saber todos los talleres disponibles
  $stmt1 =$dbh->prepare("SELECT `ID_Taller`, `Titulo`, `Fecha`, `Hora`, `ID_Sede`, `ID_Empresa`, `Cupo`, `lugar`, `Estado` FROM `talleres` WHERE MONTH(`Fecha`)='".$mesActual."' AND YEAR(`Fecha`)='".$anioActual."' AND `Estado`='Activo' AND (`ID_Sede`='".$sedeA."' OR `ID_Sede`='".$sedeB."')");
  // Ejecutamos
  $stmt1->execute();

?>


<div class="container-fluid text-center">
<div class="title">
    <a href="../Alumno/AlumnoInicio.php"><img src="../img/proximo.svg" class="icon"></a>
	<h1 class="main-title" >Talleres Inscritos</h1>

</div>

  <br>
  <h1 class="h1 text-light">Talleres inscritos</h1>
  <br>
  <br>
  <div>
      <?php
    include "config/Alerta.php";
      ?>
  </div>
  <div class="row">
    <div class="col">
      <table class="table table-responsive-lg float-left">
        <thead style="background-color: #2D2D2E; color: white; ">
          <tr>
            <th scope="col">Tema</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Cupo disponible</th>
            <th scope="col">Lugar</th>
            <th scope="col">Acción</th>
          </tr>
        </thead>
        <tbody class="bg-light">
          <?php
                while($row = $stmt->fetch()){
                  echo "<tr>";
                  ?>


                  <td><?php echo $row["Titulo"]; ?></td>
                  <td><?php echo $row["Fecha"]; ?></td>
                  <td><?php echo $row["Hora"]; ?></td>
                  <td><?php echo $row["Cupo"]; ?></td>
                  <td><?php echo $row["lugar"]; ?></td>
                  <td>
                      <?php
                      //Verificamos si ya calificó el taller
                        $comprobar="SELECT COUNT(`ID_Alumno`) as calificado FROM `evaluaciontalleres` WHERE `ID_Alumno`='".$alumno."' AND `ID_Taller`='".$row["taller"]."'";
                        $sql =$dbh->prepare($comprobar);
                        $sql->execute();
                        //Verificamos si el taller ya esta finalizado para dejarlo calicar el talleres
                        $comprobar2="SELECT COUNT(`ID_Taller`) AS finalizado FROM talleres WHERE `Estado`='Finalizado' AND `ID_Taller`='".$row["taller"]."'";
                        $sql2 =$dbh->prepare($comprobar2);
                        $sql2->execute();

                        //Verificamos si asistió al taller para dejarlo calificarlo
                        $consulta3="SELECT COUNT(`ID_Alumno`) AS asistencia FROM `inscripciontalleres` WHERE `ID_Alumno`='".$alumno."' AND `ID_Taller`='".$row["taller"]."' AND `Asistencia`='Asistio'";
                        $request3=$dbh->prepare($consulta3);
                        $request3->execute();

                        //Verificamos si ya se desinscribió para no dejarlo desisncribirse 2 veces
                        $consulta="SELECT COUNT(`id_solicitud`) AS desinscrito FROM `solicituddesinscribir` WHERE `id_alumno`='".$alumno."' AND `id_taller`='".$row["taller"]."' AND `estado`='En espera'";
                        $request=$dbh->prepare($consulta);
                        $request->execute();


                        while ($row2 = $sql->fetch()) {
                          $calificado=$row2["calificado"];
                        }
                        while ($row3 = $sql2->fetch()) {
                          $finalizado=$row3["finalizado"];
                        }
                        while ($linea = $request->fetch()) {
                          $desinscrito=$linea["desinscrito"];
                        }
                        while ($linea3 = $request3->fetch()) {
                          $asistencia=$linea3["asistencia"];
                        }

                        if ($calificado==0) {
                          if ($finalizado==1) {
                            if ($asistencia==1) {

                      ?>
                      <a href="AlumnoCalificar.php?id=<?php echo $row["taller"]; ?>" class="btn btn-primary"><i class="far fa-star"></i> Calificar</a>
                      <?php
                        }
                      }
                    }
                    if ($desinscrito==0) {
                      if ($finalizado==0) {


                        ?>
                        <a href="AlumnoDesinscribir.php?id=<?php echo $row["taller"]; ?>" class="btn btn-warning"><i class="fas fa-times"></i> Desinscribir</a>
                        <?php

                      }else {
                        ?>
                        Se finalizó el taller.
                        <?php

                      }
                    }else {
                      echo "Su solicitud esta en proceso.";
                    }
                    ?>


                    </td>

           <?php
           echo "</tr>";
                }
            ?>
        </tbody>
      </table>
    </div>
  </div>
  <br>
  <?php
    $query=$dbh->prepare("SELECT COUNT(`IDinscripcion`) AS existe FROM `inscripcion` WHERE MONTH(`Fecha`)='".$mesActual."' AND YEAR(`Fecha`)='".$anioActual."' AND `estado`='Activo' AND `ID_Sede`='".$_SESSION['Lugar']."'");
    $query->execute();
    if ($query->rowCount() >0)
  	{
  		$que=$query->fetch();
  		$ex = $que['existe'];
  	}
    if ($ex==0) {


  ?>

  <h1 class="h1 text-light">Talleres del mes</h1>
<br>
  <div class="row">
    <div class="col">
      <table class="table table-responsive-lg float-left">
        <thead style="background-color: #2D2D2E; color: white; ">
          <tr>
            <th scope="col">Tema</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Cupo disponible</th>
            <th scope="col">Lugar</th>
            <th scope="col">Acción</th>
          </tr>
        </thead>

        <tbody class="bg-light">
          <?php
          while($row1 = $stmt1->fetch()){

            echo "<tr>";
              echo "<td>".$row1["Titulo"]."</td>";
              $fechaTaller=strftime("%A, %d de %B de %Y", strtotime($row1["Fecha"]));
              echo "<td>$fechaTaller</td>";
              echo "<td>".$row1["Hora"]."</td>";
              echo "<td>".$row1["Cupo"]."</td>";
              echo "<td>".$row1["lugar"]."</td>";
              echo "<td>";
              $verificar="SELECT COUNT(`ID_Taller`) as total FROM `inscripciontalleres` WHERE `ID_Alumno`='".$alumno."' AND `ID_Taller`='".$row1["ID_Taller"]."'";
              $stmt2 =$dbh->prepare($verificar);
              $stmt2->execute();

              $verificar2="SELECT `Cupo` FROM `talleres` WHERE `ID_Taller`='".$row1["ID_Taller"]."'";
              $stmt3= $dbh->prepare($verificar2);
              $stmt3->execute();


              while ($fila2 = $stmt2->fetch()) {
                $total=$fila2["total"];
              }
              while ($fila3 = $stmt3->fetch()) {
                $cupo=$fila3["Cupo"];
              }

                  if ($cupo>0) {
                    // code...


                      if ($total==0) {

                        echo "<a href=\"inscribir.php?taller=".$row1["ID_Taller"]."&alumno=".$alumno."&inscribir=1&pagina=AlumnoInscritos\" class=\"btn btn-primary\"><i class=\"fas fa-check\"></i> Inscribir</a>";
                      }elseif ($total>0) {
                        //Verificamos si ya calificó el taller
                          $comprobar3="SELECT COUNT(`ID_Alumno`) as calificado FROM `evaluaciontalleres` WHERE `ID_Alumno`='".$alumno."' AND `ID_Taller`='".$row1["ID_Taller"]."'";
                          $sql3 =$dbh->prepare($comprobar3);
                          $sql3->execute();
                          //Verificamos si el taller ya esta finalizado para dejarlo calicar el talleres
                          $comprobar4="SELECT COUNT(`ID_Taller`) AS finalizado FROM talleres WHERE `Estado`='Finalizado' AND `ID_Taller`='".$row1["ID_Taller"]."'";
                          $sql4 =$dbh->prepare($comprobar4);
                          $sql4->execute();

                          $consulta2="SELECT COUNT(`id_solicitud`) AS desinscrito FROM `solicituddesinscribir` WHERE `id_alumno`='".$alumno."' AND `id_taller`='".$row1["ID_Taller"]."' AND `estado`='En espera'";
                          $request2=$dbh->prepare($consulta2);
                          $request2->execute();


                          while ($row4 = $sql3->fetch()) {
                            $calificado2=$row4["calificado"];
                          }
                          while ($row5 = $sql4->fetch()) {
                            $finalizado2=$row5["finalizado"];
                          }
                          while ($linea2 = $request2->fetch()) {
                            $desinscrito2=$linea2["desinscrito"];
                          }
                          if ($calificado2==0) {
                            // code...
                            if ($finalizado2==1) {
                              // code...
                              echo "<a href=\"AlumnoCalificar.php?id=".$row1["ID_Taller"]."\" class=\"btn btn-primary\"><i class=\"far fa-star\"></i> Calificar</a>";
                            }
                          }
                          if ($desinscrito2==0) {
                            if ($finalizado2==0) {
                              echo "<a href=\"AlumnoDesinscribir.php?id=".$row1["ID_Taller"]."\" class=\"btn btn-warning\"><i class=\"fas fa-times\"></i> Desinscribir</a>";
                            }else {
                              echo "El taller finalizó";
                            }
                          }else {
                            echo "Su solicitud se encuentra en proceso";
                          }

                      }

                  }else {
                    echo "El cupo se encuentra lleno";
                  }


              echo "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <br><br>
<?php } ?>

</div>
<!-- /#page-content-wrapper -->

</div>
</div>
<!-- /#wrapper -->

<?php
  require_once 'templates/footer.php';
?>
