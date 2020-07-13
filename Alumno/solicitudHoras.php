<?php

  require_once 'templates/head.php';
  $direccion = $_SERVER['PHP_SELF'];

?>

<title>Horas de vinculación</title>

<?php

  require_once 'templates/header.php';

 

  require_once 'templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';

  $alumno=$_GET["id"];
  $cicloActual=$_GET["ciclo"];
  foreach ($dbh->query("SELECT Nombre,SedeAsistencia,Class,ID_Empresa FROM alumnos WHERE ID_Alumno = '".$alumno."'") as $Datos) {
    $Nombre = $Datos['Nombre'];
    $Sede = $Datos['SedeAsistencia'];
    $Class = $Datos['Class'];
    $Universidad = $Datos['ID_Empresa'];
  }
?>
<link rel="stylesheet" type="text/css" href="CSS/horas-vinculacion.css">
  <div class="title">
  <a href="../Alumno/AlumnoInicio.php"> <img src="../img/proximo.svg" class="icon"></a>
  <h2 class="main-title" >Horas de Vinculación</h2>
</div>
  <div class="row"  >
    <div class="alert alert-danger" id="mensaje">
      
    </div>
  </div>
  <div class="container-fluid text-center" id="main">
<center>
  <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#mensaje").hide();
      $("#horasSoc").focusout(function() {
        horas=$("#horasSoc").val();
        if (horas>40) {

          $("#horasSoc").focus();
          var html = "<p><span class='alerta'>Alerta: </span>Las horas no deben exceder a 40</p>"
          $('#mensaje').html(html);
          $("#mensaje").show();
          
          setTimeout(function() {
            $("#mensaje").fadeOut(1500);
          },1500);
          
        }
      });
      $(".fechaFinal").focusout(function() {
               var FechaInicial = $(".fechaInicial").val();
        var Final = $(".fechaFinal").val();
        if (Date.parse(FechaInicial) > Date.parse(Final)) 
        {
          $(".fechaInicial").focus();
          var html = "<p><span class='alerta'>Alerta: </span>La Fecha Inicial no puede ser mayor que la fecha Final</p>"
          $('#mensaje').html(html);
          $("#mensaje").show();
          setTimeout(function() {
            $("#mensaje").fadeOut(1500);
          },1500);
;
        }
      });

    });
  </script>

<h3 class="title-main">Detalles del Proyecto</h3>
<!-- Informacion de alumno-->

<form method="POST"  action="SoliHoras.php" enctype="multipart/form-data">
  
  <input type="text" name="alumno" value="<?php echo $alumno; ?>" hidden>
  <input type="text" name="ciclo" value="<?php echo $cicloActual; ?>" hidden>
  
  <div class="Info-Alumno1">
<div class="Div1">
<div id="proyecto_name">
<label >Nombre de Proyecto</label>
<br>
<input type="text" name="dato1" class="proyecto">

</div>
<!--Parte 2 -->
<div id="div2">
<label >Cantidad de Horas</label>
<br>
<input type="text" name="cantidad" class="input-left" id="horasSoc">

</div>
<div id="div3">
<label >Encargado</label>
<br>
<input type="text" name="Encargado" class="input-right">
</div>
<!--Parte 3 -->
<div class="Fechas">
<div id="div2">
<label >Fecha de Inicio</label>
<br>
<input type="date" name="fecInicio" class="input-left">

</div>
<div id="div3">
<label >Fecha de Finalización</label>
<br>
<input type="date" name="fecFin" class="input-right">
</div>
</div>
<div id="div2" >
<label >Comentario</label>
<br>
<textarea name="descrip"></textarea>
</div>
<div id="div2">
<label >Agregar Archivo</label>
<input type="file" class="form-control-file" name="archivo" value="Enviar">
<br>
</div>
<input type="submit" class="btn btn-primary btn-block" name="Enviar" value="Enviar" id="button1">
</div>






<?php
if (isset($_POST['Enviar'])) {
  $IDAlumno=$_POST['alumno'];
$ciclo=$_POST['ciclo'];
$cantidad=$_POST['cantidad'];
$fecInicio=$_POST['fecInicio'];
$fecFin=$_POST['fecFin'];
$encargado=$_POST['Encargado'];
$descripcion=$_POST['descrip'];
$solicitud=$_POST['solicitud'];
}


?>

<!-- div 2 
<div style="float: left;">
<div class="Info-Alumno2" style="text-align: left;margin-left: 70px;margin-top: 40px;border-color: #aaaaaa;border-width: 5px;
   border-style: solid;  width: 400px;border-radius: 25px;margin-bottom: 50px;display: inline-block;margin-left: -30px;">
   <div style="margin-left: 30px;margin-top: 150px;">

     <p style="font-weight: bold;color: black;display: inline;">Estado: </p>
     <p style="display: inline;font-style: italic;font-weight: bold;">En espera</p>
   </div>
   <div style="margin-left: 30px;margin-top: 10px;">
     <p style="font-weight: bold;color: black;font-size: 13px;">Comentario:</p>
     <textarea style="background-color: #ADADB2;width: 340px;border-radius: 8px;border-color: white;height: 80px;margin-bottom: 15px;margin-top: -20px;"></textarea>
   </div>
      <div style="margin-left: 30px;margin-top: -20px;">
     <p style="font-weight: bold;color: black;font-size: 13px;">Cambiar Estado: </p>
     <div style="margin-top: -20px;">
     <select style="border-radius: 10px;width: 340px;">
       <option value="0">Seleccione una opción</option>
       <option>Opción 1</option>
       <option>Opción 2</option>
     </select>
   </div>
   <input type="submit" class="btn btn-primary btn-block" name="desinscribir" value="Enviar" style="background: #BE0032;height: 33px;width: 150px;color: white;border-radius: 30px;font-size: 15px;font-weight: bold;margin-left: 90px;margin-bottom: 180px;margin-top: 20px;">
   </div>



</div>
</div>
-->

</form>

</center>
</div>
<br>





      <!--<div class="row">

        <div class="col">
          <form class="form-group" action="SoliHoras.php" method="post" enctype="multipart/form-data">
            <label for="cantidad" class="text-light">Cantidad de horas:</label>
            <input type="number" name="cantidad" min="0" max="40" id="horasSoc" placeholder="0" class="form-control" required>
            <label for="fecInicio" class="text-light">Fecha de inicio:</label>
            <input type="date" class="form-control" name="fecInicio" required>
            <label for="fecFin" class="text-light">Fecha de finalización:</label>
            <input type="date" class="form-control" name="fecFin" required>
            <label for="Encargado" class="text-light">Encargado:</label>
            <input type="text" name="Encargado" class="form-control" placeholder="Nombre del encargado" required>
            <label for="descrip" class="text-light">Descripción:</label>
            <textarea class="form-control" name="descrip" rows="3" placeholder="Describa sus actividades realizadas" required></textarea>

        </div>

    </div>

    <div class="row">
      <div class="col">
        <div class="custom-file">

          <input type="file" class="custom-file-input" accept=".pdf" id="customFileLang" name="archivo" required>
          <label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar Comprobante</label>
          <small>El tamaño del archivo no debe ser mayor a 5 MB</small>
        </div>

      </div>


    </div>
    <div class="row">
      <div class="col">
        <br>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <input type="text" name="alumno" value="<?php echo $alumno; ?>" hidden>
        <input type="text" name="ciclo" value="<?php echo $cicloActual; ?>" hidden>
        <input type="submit" class="btn btn-primary btn-block" name="desinscribir" value="Enviar">
      </form>
      <br>
      </div>


    </div>

-->



</div>
<!-- /#page-content-wrapper -->





<!-- /#wrapper -->




<?php

  require_once 'templates/footer.php';

?>
