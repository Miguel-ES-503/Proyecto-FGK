<?php
  require_once 'templates/head.php';
?>
<title>Reuniones</title>
<?php
  require_once 'templates/header.php';
 
  require_once 'templates/MenuHorizontal.php';
  require '../Conexion/conexion.php';

  setlocale(LC_TIME, 'es_SV.UTF-8');

  //Extraemos el carnet del estudiante
  $stmt1 =$dbh->prepare("SELECT `ID_Alumno`, `ID_Empresa` FROM `alumnos` WHERE correo='".$_SESSION['Email']."'");
  // Ejecutamos
  $stmt1->execute();

  while($fila = $stmt1->fetch()){
      $alumno=$fila["ID_Alumno"];
      $universidad=$fila["ID_Empresa"];
  }




?>


<div class="container-fluid text-center" style="margin-bottom: 40%;">

<div class="title">
	<a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Reuniones mensuales</h2>
</div>
<br>

  <?php
  $stmt2 =$dbh->prepare("SELECT r.ID_Reunion AS 'id', r.Titulo, r.Fecha, r.encargado, r.Tipo FROM reuniones r INNER JOIN universidadreunion u ON r.ID_Reunion = u.ID_Reunion WHERE u.ID_Empresa= '".$universidad."' and r.Estado='Activo'");
  // Ejecutamos
  $stmt2->execute();
  ?>
  <table class="table table-responsive-lg float-left" >
  <thead style="background-color: #2D2D2E; color: white; ">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Titulo</th>
      <th scope="col">Fecha</th>
      <th scope="col">Encargado</th>
      <th scope="col">Tipo de reunión</th>
      <th scope="col">Opciones</th>

    </tr>
  </thead>
  <tbody class="bg-light">
    <?php
    while($fila2 = $stmt2->fetch()){
      echo "<tr>";
        echo "<td scope=\"row\">".$fila2["id"]."</td>";
        echo "<td>".$fila2["Titulo"]."</td>";
        $fechaReunion=strftime("%A, %d de %B de %Y", strtotime($fila2["Fecha"]));
        echo "<td>".$fechaReunion."</td>";
        echo "<td>".utf8_decode(utf8_encode($fila2["encargado"]))."</td>";
        echo "<td>".utf8_decode(utf8_encode($fila2["Tipo"]))."</td>";
        echo "<td><a class=\"btn btn-info\" href=\"HorariosReunion.php?id=".$fila2["id"]."\"><i class=\"fas fa-calendar-week\"></i> Ver horarios</a></td>";
      echo "</tr>";
    }
    ?>

  </tbody>
</table>

</div>
<!-- /#page-content-wrapper -->
</div>
<?php
  require_once 'templates/footer.php';
?>

<!-- /#wrapper -->

