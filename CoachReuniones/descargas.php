<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
?>

<title>Descargas-Renovacion</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--****************************************Comiezo de estructura de trabajo *************************-->
<link rel="stylesheet" type="text/css" href="css/Renovacion.css">
<style type="text/css">
    #form
    {
        background-color: #ADADB2;
        border-radius: 20px;
        border-color: white;
    }
    #btn
    {
        background-color: #BE0032;
        width:100px;
        font-size: 15px;
        margin: 0 auto;
    }
    form
    {
        text-align: center;
    }
</style>
<div class="title mb-5">
  <a href="javascript:history.back();"><img src="../img/back.png" class="icon"></a>
    <h2 class="main-title" >Descargas-Renovacion</h2>
</div>
<body>

<link rel="stylesheet" type="text/css" href="Modelo/ModeloRenovacion/Descargar/estilos.css">
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script type="text/javascript" src="Modelo/ModeloRenovacion/Descargar/select2.min.js"></script>
<form action="Modelo/ModeloRenovacion/Descargar/archiver.php" method="POST" style="width: 30%;margin: 0 auto;">
    <div class="form-group">
    <label style="color: black;" >Alumno</label>
    <select name="alumnos" id="alumnos" class="form-control" id="form">
<option value="0">Seleccione un alumno</option>
<?php 
$sql = "SELECT DISTINCT(alumnos.Nombre), alumnos.ID_Alumno FROM alumnos";
foreach ($pdo->query($sql) as $alumnos) {
?>
<option value="<?php  echo $alumnos['ID_Alumno'] ?>"><?php  echo utf8_decode($alumnos['Nombre']) ?></option>
<?php 
}
?>
</select>
</div>
    <div class="form-group">
        <label style="color: black;">Año</label>
	<select name="year" class="form-control" id="form">
    
    <option value="0">Seleccione un año</option>
    <?php  
    $año = date("Y");
    for($i=2014;$i<=$año;$i++) {

    ?>
    <option value="<?php  echo $i ?>"><?php  echo $i; ?></option>
    <?php 
    }
    ?>
</select>
</div>
<div class="form-group">
    <label style="color: black;">Promoción</label>
    <select name="class" class="form-control" id="form">
    <option value="0">Seleccione una promocion</option>
    <?php  
    $año = date("Y");
    foreach ($pdo->query("SELECT DISTINCT(Class) FROM alumnos
ORDER BY Class DESC") as $Class) {
?>
    <option value="<?php  echo $Class['Class'] ?>"><?php  echo "Class-".$Class['Class'] ?></option>
    <?php 
    }
    ?>
</select>
</div>
<div class="form-group">
    <label style="color: black;">Ciclo</label>
<select name="ciclo" class="form-control" id="form">
	<option value="0">Seleccione un ciclo</option>
	<option value="1">Ciclo 01</option>
	<option value="2">Ciclo 02</option>
</select>
</div>

<div class="form-group">
    <label style="color: black;">Estado</label>
<select name="estado" class="form-control" id="form">
    <option value="0">Seleccione un estado</option>
    <option value="rechazada">Rechazadas</option>
    <option value="aceptada">Aceptadas</option>
    <option value="enviado">Enviadas</option>
</select>
</div>
<center><input id="cbx1" type="checkbox" name="todo" value="todo" id="form"> Todo<br></center><br>
<center><input type="submit" name="descargar" value="Descargar" class="btn btn-success" id="btn"></center>
</form>
<script type="text/javascript">
$(document).ready(function()
{
    $('#alumnos').select2();
}

);
</script>
</body>
