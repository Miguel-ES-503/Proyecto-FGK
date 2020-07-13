<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Activar o Desactivar Módulos</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
require_once '../Conexion/conexion.php';
?>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
<br>
<h1>Activar o Desactivar Módulos</h1>
<br>
<a href="javascript:history.back();" class="btn float-left"  title="Regresar" style="margin-left:5%;"><i class="fas fa-chevron-circle-left display-4"></i></a>

<br><br><br><br>
<p class="text-center text-white">Al momento de activar un módulos los alumnos se prodran inscribir a dicho módulo y al momento de desactivar, los alumnos ya no podrán inscribirse hasta que se vuelva a activar el módulo.</p> 
<table class="table w-50 mx-auto">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Titulo</th>
      <th scope="col">Activar/Desactivar</th>
    </tr>
  </thead>
  <tbody>
<?php 

// seleccionar módulo mientras que este desactivado
$stmt2 = $dbh->query("SELECT * FROM modulos WHERE estado = 1");
	while ($row = $stmt2->fetch()) {
    echo "<tr class='bg-light'>";
    echo "<th scope='row'>".$row['id_modulo']."</th>";
    echo "<td>".utf8_encode($row['titulo'])."</td>";
    echo "<td><form action='actualizarmodulo.php' method='POST'><button type='submit' class='btn btn-danger' value= '".$row['id_modulo']."' name='id'>Desactivar </button> </form> </td>";
    echo "</tr>";
}
// seleccionar módulo mientras que este activo
$stmt = $dbh->query("SELECT * FROM modulos WHERE estado = 0");
while ($row = $stmt->fetch()) {
    echo "<tr class='bg-light'>";
    echo "<th scope='row'>".$row['id_modulo']."</th>";
    echo "<td>".utf8_encode($row['titulo'])."</td>";
    echo "<td><form action='actualizarmodulo2.php' method='POST'><button type='submit' class='btn btn-success' value= '".$row['id_modulo']."' name='id'>Activar </button> </form> </td>";
    echo "</tr>";
}
?>
  </tbody>
</table>
<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

