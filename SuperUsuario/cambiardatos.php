<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Actualizar talleres/módulos</title>
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
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
require_once "../BaseDatos/conexion.php";
?>

<style type="text/css">
#regiration_form fieldset:not(:first-of-type) {
    display: none;
}
</style>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

<link rel="stylesheet" type="text/css" href="css/modulos-moodle.css">

<?php
$id = $_POST['id'];
$stmt2 = $pdo->query("SELECT * FROM alumnos WHERE ID_Alumno = '$id' ");
?>

<div class="topnav" id="myTopnav">
  <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
  <a  class="titulomenu" style="background-color:#ADADB2; color: #2D2D2E; font-size: 25px;">Actualizar talleres/módulos</a>
 
  
  <a href="javascript:void(0);" class="icon1" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>


<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center" id="main-inicio">

    
    <div class="container w-50">
        <h1>Registrar cambios</h1>
        <div class="progress">
            <div class="progress-bar progress-bar-striped active progress-bar-animated" role="progressbar"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <form id="regiration_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset>
                <h2>Paso 1: Datos a actualizar</h2> <br> <br>
                <p class='text-dark'>Alumno seleccionado: <?php
 while ($row = $stmt2->fetch()) {
    echo $row['Nombre'];
 ?></p>
                <div class="form-group">
                    <label for="email " class="text-dark float-left">Módulos</label>
                    <input type="number" class="form-control" name="data1"
                        value='<?php echo $row['CantidadModulos']; ?>' max='6' placeholder="Módulos">
                </div>
                <div class="form-group" class="text-dark">
                    <label for="exampleInputPassword1" class="text-dark float-left">Talleres</label>
                    <input type="number" class="form-control" id="password" min="0" name='data2'
                        value='<?php echo $row['TotalTalleres']; ?>' placeholder="Talleres">
                </div>
                <div class="form-group text-dark">
                    <label for="exampleInputPassword1" class="text-dark float-left">Estado</label>
                    <select name="estado" id="estado" class="form-control">
                        <option name="estado" value="En proceso">En proceso</option>
                        <option name="estado" value="Graduado">Graduado</option>
                    </select>
                </div>
                <input type="button" name="data[password]" class="next btn btn-info" value="Siguiente" />
            </fieldset>
            <fieldset>
                <h2> Paso 2: Confirmacón de usuario</h2>
                <div class="form-group"><br><br>
                    <label for="fName" class="text-dark float-left">Para finalizar el proceso, ingrese la contraseña de
                        su usuario.</label>
                    <input type="password" class="form-control" name="data3" id="fName" placeholder="password">
                </div>
                <input type="button" name="previous" class="previous btn btn-primary" value="Previo" />
                <button type="submit" name="data4" class="btn btn-success"
                    value='<?php echo $row['ID_Alumno']; ?>' />Actualizar</button>
            </fieldset>
        </form>
    </div>
    <?php }?>
    <?php 
$modulos = $_POST['data1'];
$talleres = $_POST['data2'];
$passuser2 = $_POST['data3'];
$IdAlumno = $_POST['data4'];
$correo =  $_SESSION['Email'];
$estado = $_POST['estado'];
 $stmt = $pdo->query("SELECT * FROM usuarios WHERE correo = '$correo' ");
 while ($row = $stmt->fetch()) {
	  $passuser = $row['contrasena'];
 }

if (isset($IdAlumno)) {
    if (password_verify($passuser2, $passuser)) {
      $sql = "UPDATE alumnos SET CantidadModulos=?, TotalTalleres=?, EstadoCerti = ? WHERE ID_Alumno=?";
      $pdo->prepare($sql)->execute([$modulos, $talleres, $estado, $IdAlumno]);
      echo "<p class='p-1 mb-1 bg-success text-white text-center'>Datos actualizados.</p>";

}
else{
    echo "<p class='p-1 mb-1 bg-danger text-white text-center'>Error, la contraseña de usuario en incorrecta.</p>";
}
}

?>
    <br><br><br>
</div>
<br><br><br><br>
<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>