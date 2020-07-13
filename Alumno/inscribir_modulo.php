<?php
  require_once 'templates/head.php';
?>
<title>Reuniones</title>
<?php
  require_once 'templates/header.php';
  require_once 'templates/MenuVertical.php';
  require_once 'templates/MenuHorizontal.php';
  require '../Conexion/conexion.php';

  setlocale(LC_TIME, 'es_SV.UTF-8');
?> <br>
<a href="javascript:history.back();" class="btn float-left"  title="Regresar" style="margin-left:5%;"><i class="fas fa-chevron-circle-left display-4"></i></a>
<div class="container-fluid text-center">
  <h1>Inscripción a Módulo</h1>

</div>
<!-- /#page-content-wrapper -->
<table class="table" style="width:70%; margin:auto">
  <thead class="thead-dark">
    <tr>
    <th scope="col">Módulos Activos</th>
    <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody class="bg-light">
  <?php
  setlocale(LC_TIME, 'spanish');

  $correo = $_SESSION['Email'];
  $stmt =$dbh->prepare("SELECT `ID_Alumno` FROM `alumnos` WHERE correo = '$correo' ");
  $stmt->execute();
  while($row = $stmt->fetch()){
      $IDalumno=$row["ID_Alumno"];
  }

  $stmt2 =$dbh->prepare("SELECT `id_alumno` , estado FROM `datos_modulos` WHERE id_alumno = '$IDalumno' ");
  $stmt2->execute();
  while($row = $stmt2->fetch()){
      $IDalumno2 = $row["id_alumno"];
      $estado = $row["estado"];
  }

  // Obtener lista de módulos disponibles
       $query = "SELECT * FROM modulos WHERE estado = 1";
       $stat = $dbh->prepare($query);
       $stat->execute();
       $result = $stat->fetchAll();
      
  //Obtener lista de módulos inscritos
  $stmt5 =$dbh->prepare("SELECT `inscripcion` FROM `datos_modulos` WHERE id_alumno = '$IDalumno' ");
  $stmt2->execute();
  while($row = $stmt5->fetch()){
      $inscripcionmod = $row["inscripcion"];
  } 
      ?>
      <br>                 
      <?php
      foreach($result as $row)
       {
        echo " <tr>";
        echo '<th>'.utf8_encode($row['titulo']).'</th>';
        if ($IDalumno == $IDalumno2 && ($estado == 'Pendiente'  || $estado == 'Reprobado' )   ) {  
        echo "<td class='text-danger' ><i class='fas fa-times-circle' style='font-size:25px'></i></td>";        
        }
            else{
                echo "<td><form action='guardarmodulo.php' method='post'><button type='submit' class='btn btn-primary'"." name='inscribir2' value='"."$row[id_modulo]'".">Inscribirse</button></form>
                </td>";   
          }           
           echo " </tr>";
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
  require_once 'templates/MenuVertical.php';
  require_once 'templates/MenuHorizontal.php';
  require '../Conexion/conexion.php';

  setlocale(LC_TIME, 'es_SV.UTF-8');
?>
<div class="container-fluid text-center">

</div>
<!-- /#page-content-wrapper -->

</div>
</div>
<!-- /#wrapper -->

<?php
  require_once 'templates/footer.php';
?>
