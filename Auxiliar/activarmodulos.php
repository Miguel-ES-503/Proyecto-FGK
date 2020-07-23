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
//include 'Modularidad/MenuVertical.php';
require_once '../Conexion/conexion.php';
?>
<link rel="stylesheet" type="text/css" href="css/Activar-Modulo.css">
<div class="title">
     <a href="javascript:history.back();" title=""><img src="../img/back.png" class="icon"></a>
    <h2 class="main-title" >Activar o Desactivar Módulos</h2>
</div>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
  <br>
<div class="row">
<div class="col-xs-6 col-sm-7 col-md-7 col-lg-4 h-75" id="nota">
  <strong >NOTA: </strong><p>Al momento de activar un módulos los alumnos se prodran inscribir a dicho módulo y al momento de desactivar, los alumnos ya no podrán inscribirse hasta que se vuelva a activar el módulo.</p>
</div>
<div class="col-xs-5 col-sm-5 col-md-6 col-lg-7 ">
  <table class="table table-hover col-xs-5 table-responsive-sm" id="table" >
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">Titulo</th>
      <th scope="col">Activar/Desactivar</th>
      <th scope="col">Cambiar contraseña</th>
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
    echo "<td><form action='actualizarmodulo.php' method='POST'><button type='submit' class='btn btn-warning' value= '".$row['id_modulo']."' name='id'><img src='../img/desactivar.png' class='icon-img'>Desactivar </button> </form> </td>";
    echo "<td><form action='cambiarpasswd.php' method='POST'><button type='submit' class='btn btn-success' value= '".$row['id_modulo']."' name='id' ><i class='fas fa-key'></i>Cambiar</button></form> </td>";
    echo "</tr>";
}

// seleccionar módulo mientras que este activo
$stmt = $dbh->query("SELECT * FROM modulos WHERE estado = 0");
while ($row = $stmt->fetch()) {
    echo "<tr class='bg-light'>";
    echo "<th scope='row'>".$row['id_modulo']."</th>";
    echo "<td>".utf8_encode($row['titulo'])."</td>";
    echo "<td><form action='actualizarmodulo2.php' method='POST'><button type='submit' class='btn btn-block' value= '".$row['id_modulo']."' name='id' id='btn'><img src='../img/activar.png' class='icon-img-2'>Activar </button> </form> </td>";
    echo "<td><form action='cambiarpasswd.php' method='POST'><button type='submit' class='btn btn-success' value= '".$row['id_modulo']."' name='id' ><i class='fas fa-key'></i> Cambiar</button> </form> </td>";
    echo "</tr>";
}
?>
  </tbody>
</table>
</div>
</div>

<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

