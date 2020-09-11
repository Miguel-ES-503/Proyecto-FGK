<?php
  require_once 'templates/head.php';
?>
<title>Inscribir Sesiones One on One</title>
<?php
  require_once 'templates/header.php';
  //require_once 'templates/MenuVertical.php';
  require_once 'templates/MenuHorizontal.php';
  require '../Conexion/conexion.php';
  setlocale(LC_TIME, 'es_SV.UTF-8');
?> 
<div class="container-fluid text-center h-25">
  <div class="title">
    <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Inscribir módulos</h2>
  <br>
</div>
</div>
<br><br>
<div class="sesion mx-5 h-25">
<table class="table" style="width:70%; margin:auto">
  <thead style="background-color: #2D2D2E;; color: white;">
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
        echo " <tr class='table-dark' style='color: black;'>";
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

  <br>
  <br>
<!-- /#page-content-wrapper -->

<table class="table" style="width:70%; margin:auto">
  <thead style="background-color: #2D2D2E; color: white;">
    <tr>
    <th scope="col">Módulos Inscrito</th>
    <th scope="col">Contraseña</th>
    </tr>
  </thead>
  <tbody class="bg-light">
  <?php
  setlocale(LC_TIME, 'spanish');

  $correo2 = $_SESSION['Email'];
  $stmt11 =$dbh->prepare("SELECT `ID_Alumno` FROM `alumnos` WHERE correo = '$correo2' ");
  $stmt11->execute();
  while($row = $stmt11->fetch()){
      $IDalumno2=$row["ID_Alumno"];
  }

  $stmt7=$dbh->prepare("SELECT modulos.titulo, modulos.password FROM datos_modulos LEFT JOIN modulos ON datos_modulos.id_modulo = modulos.id_modulo WHERE datos_modulos.id_alumno ='$IDalumno2'");
  $stmt7->execute();

  
  
      ?>                 
      <?php
      foreach($stmt7 as $row)
       {
         
        echo " <tr class='table-dark' style='color: black; font-weight: bold;'>";
        echo '<td>'.utf8_encode($row['titulo']).'</td>';
        echo '<td>'.$row['password'].'</td>';  
        }           
           echo " </tr>";

           
      
                            ?>
  </tbody>
  </table>

</div>
</div>


<br>
<br>
<!-- /#wrapper -->
<?php
  require_once 'templates/footer.php';
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
