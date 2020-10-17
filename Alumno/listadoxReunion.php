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
        <table id="data" class="table table-hover table-striped table-bordered table-responsive-lg w-75 mx-auto float-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Orden a seguir</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Hora inicio</th>
                    <th scope="col">Hora Final</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $numero = 0;
             $date = date("Y-m-d");
             $stmt2 = $dbh->query("SELECT * FROM horariosreunion WHERE IDHorRunion = '".$taller."' ");
            
            
            $stmt = $dbh->query("SELECT * FROM inscripcionreunion i INNER JOIN alumnos a ON i.id_alumno = a.ID_Alumno INNER JOIN horariosreunion h ON h.IDHorRunion = i.Horario WHERE h.IDHorRunion = '".$taller."' ");
            while ($row = $stmt->fetch()) {
              //`HorarioInicio`, `HorarioFinalizado`, `Canitdad` FROM `horariosreunion`IDHorRunion`, `HorarioInicio`, `HorarioFinalizado`, `Canitdad`
                 $nombre = $row['Nombre'];
                 $horaInicio=$row['HorarioInicio'];
                 $horaInicio2=$row['HorarioInicio'];
                 $horaFinal= $row['HorarioFinalizado'];
                 $tiempo = $row['TiempoReunion'];
                 $tiempo2 = $row['TiempoReunion'];
                 $numero ++;
                 $numero2 ++;
                 echo "<tr>";
                 echo "<td>".($numero = $numero)."</td>";                 
                 $mifecha = new DateTime($date." ".$horaInicio);
                 $mifecha2 = new DateTime($date2." ".$horaInicio2);
                 for ($i=0; $i <$numero ; $i++) { 
                  $mifecha =  $mifecha->modify('+'.$tiempo.' minute');
                 }  
                 for ($i=1; $i <$numero2 ; $i++) { 
                  $mifecha2 =  $mifecha2->modify('+'.$tiempo2.' minute');
                 }  
                 $horaFin =  $mifecha->format('H:i:s'); 
                 $hora =  $mifecha2->format('H:i:s'); 
                 
                 echo "<td>$nombre</td>";
                 echo "<td>".$hora."</td>";
                 echo "<td>".$horaFin." </td>";
                 echo "</tr>";
            }
            $indice = ($numero+1);
          
            while ($row = $stmt2->fetch()) {
              $new =new DateTime($date." ".$hora);
              $new2 =new DateTime($date." ".$horaFin);            
              $cantidad1 = $row['Canitdad'];
              for ($i=0; $i < $cantidad1 ; $i++) { 
              $hour = ($new->modify('+'.$tiempo2.' minute'));
              $hour2 = $hour->format('H:i:s');

              $hour1 = ($new2->modify('+'.$tiempo2.' minute'));
              $hour3 = $hour1->format('H:i:s');
  
                echo "<tr>";
                echo "<td>".$indice++."</td>";
                   echo "<td><b>Cupo Disponible</b></td>";
                   echo "<td>".$hour2."</td>";
                   echo "<td>".$hour3." </td>";
                     echo "</tr>";
              }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /#page-content-wrapper -->
<br><br><br><br><br><br><br><br><br><br>

</div>
</div>
<!-- /#wrapper -->


<?php
  require_once 'templates/footer.php';
?>