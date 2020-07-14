<?php
  require_once 'templates/head.php';
?>
<title>Reuniones</title>
<?php
  require_once 'templates/header.php';
  //require_once 'templates/MenuVertical.php';
  require_once 'templates/MenuHorizontal.php';
  require '../Conexion/conexion.php';

  setlocale(LC_TIME, 'es_SV.UTF-8');
?> 
<div class="container-fluid text-center">
  <div class="title">
    <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Inscribir Sesiones One on One</h2>
</div>



</div>
<div class="sesion">

<!-- /#page-content-wrapper -->
<table class="table" style="width:70%; margin:auto">
  <thead  style="background-color: #2D2D2E; color: white; ">
    <tr>
    <th scope="col">Fecha</th>
    <th scope="col">Horario</th>
    <th scope="col">Cupo</th>
    <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody class="bg-light">
  <?php
  //obtener id from alumnos
  $correo = $_SESSION['Email'];
  $stmt =$dbh->prepare("SELECT `ID_Alumno` FROM `alumnos` WHERE correo = '$correo' ");
  $stmt->execute();
  while($row = $stmt->fetch()){
      $IDalumno=$row["ID_Alumno"];
  }
  //seleccionar ID from one_on_one y estado
  $stmt4 =$dbh->prepare("SELECT `ID_Alumno`, `estado`  FROM `one_on_one` WHERE id_alumno = '$IDalumno' ");
  $stmt4->execute();
  while($row = $stmt4->fetch()){
      $IDalumno2=$row["ID_Alumno"];
      $estado=$row["estado"];
  }

  setlocale(LC_TIME, 'spanish');
  // Extraer listado de cupos de disponibles
                        $query = "SELECT * FROM one_on_one WHERE estado = 'Disponible' and cupo = 1";
                        $stat = $dbh->prepare($query);
                        $stat->execute();
                        $result = $stat->fetchAll();
                        ?>
                        <br>
                        
                            <?php
                            foreach($result as $row)
                            {
                              // verificar si el alumno tiene sesiones finalizado
              if($IDalumno != $IDalumno2 and ($estado == 'Disponible' OR $estado == 'Finalizado') ){
                echo " <tr>";
                echo '<th>'.utf8_encode(strftime("%A %d "." de"." %B del %Y ",strtotime($row['fecha']))).'</th>';
                echo '<td>'.date('h:i A', strtotime($row['hora_inicio']))." - ".date('h:i A', strtotime($row['hora_fin'])).'</td>';
                echo '<td>'.$row['cupo'].'</td>';
                echo "<td class='text-danger' title='Ya tiene una sesión pendiente'><i class='fas fa-times-circle' style='font-size:25px'></i></td>";        
                echo " </tr>";
                // verificar si el alumno tiene una session pendiente
            }elseif($estado == 'Pendiente'){
                echo " <tr>";
                echo '<th>'.utf8_encode(strftime("%A %d "." de"." %B del %Y ",strtotime($row['fecha']))).'</th>';
                echo '<td>'.date('h:i A', strtotime($row['hora_inicio']))." - ".date('h:i A', strtotime($row['hora_fin'])).'</td>';
                echo '<td>'.$row['cupo'].'</td>';
                echo "<td class='text-danger'title='Ya tiene una sesión pendiente' ><i class='fas fa-times-circle' style='font-size:25px'></i></td>";        
                echo " </tr>";
            } 
            // si no tiene sesiones pendientes dejarlo inscribir
              else{
                echo " <tr>";
                echo '<th>'.utf8_encode(strftime("%A %d "." de"." %B del %Y ",strtotime($row['fecha']))).'</th>';
                echo '<td>'.date('h:i A', strtotime($row['hora_inicio']))." - ".date('h:i A', strtotime($row['hora_fin'])).'</td>';
                echo '<td>'.$row['cupo'].'</td>';
                echo "<td><form action='guardarsession.php' method='post'><button type='submit' class='btn btn-primary'"." name='inscribir' value='"."$row[id]'".">Inscribirse</button></form>
                </td>";               
                echo " </tr>";
              }
                            }
                            ?>
  </tbody>
  </table>

</div>
</div>
<!-- /#wrapper -->

<?php
  require_once 'templates/footer.php';
?>
<?php
  require_once 'templates/head.php';
?>
<title>Reuniones</title>
<?php
  require_once 'templates/header.php';
  //require_once 'templates/MenuVertical.php';
  require_once 'templates/MenuHorizontal.php';
  require '../Conexion/conexion.php';

  setlocale(LC_TIME, 'es_SV.UTF-8');
?>
<div class="container-fluid text-center">

</div>
<!-- /#page-content-wrapper -->

</div>
</div>

</div>
<!-- /#wrapper -->

<?php
  require_once 'templates/footer.php';
?>
