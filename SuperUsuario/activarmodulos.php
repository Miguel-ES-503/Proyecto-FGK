<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
//include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>Activar o Desactivar Módulos</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.topnav {
  overflow: hidden;
  background-color: #ADADB2;
  max-width: 100%;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  border-width: 3px;
  font-weight: bold;

 
}
.submenu1{
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 18px;
  background-color: #9d120e;
  border-width: 3px;
  font-weight: bold;
  height: 68px;
  letter-spacing: 2px;



}
.icon{
  

}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon1 {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon1 {
    float: right;
    display: inline-block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
    font-size: 15px;
    height: 50px;
  }
  .titulomenu a{
    font-size: 15px;
  }
}
</style>
<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
// include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
require_once '../Conexion/conexion.php';
?>
<link rel="stylesheet" type="text/css" href="css/Activar-Modulo.css">
<div class="topnav" id="myTopnav">
  <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
  <a  class="titulomenu" style="background-color:#ADADB2; color: #2D2D2E; font-size: 25px;">Activar o Desactivar Módulos</a>
 
  
  <a href="javascript:void(0);" class="icon1" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
 
<div class="row">
<div class="col-xs-6 col-sm-7 col-md-7 col-lg-4 h-75" id="nota">
  <strong >NOTA: </strong><p>Al momento de activar un módulo los alumnos se podrán inscribir a dicho módulo y al momento de desactivar, los alumnos ya no podrán inscribirse hasta que se vuelva a activar el módulo.</p>
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
<br>
</div>
<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

