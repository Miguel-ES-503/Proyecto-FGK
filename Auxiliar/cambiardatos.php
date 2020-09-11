<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Actualizar talleres/módulos</title>
<?php

//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
require_once "../BaseDatos/conexion.php";
?>

<style type="text/css">
#regiration_form fieldset:not(:first-of-type) {
    display: none;
}
</style>
<link rel="stylesheet" type="text/css" href="css/modulos-moodle.css">

<?php
$id = $_POST['id'];
$stmt2 = $pdo->query("SELECT * FROM alumnos WHERE ID_Alumno = '$id' ");
?>
<div class="title">
    <a href="javascript:history.back();" title=""><img src="../img/back.png" class="icon"></a>
    <h2 class="main-title">Actualizar talleres/módulos</h2>
    <div class="title2">
    </div>
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
    $pdo->prepare($sql)->execute([$modulos, $talleres,$estado, $IdAlumno]);
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