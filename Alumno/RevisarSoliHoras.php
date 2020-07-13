<?php

  require_once 'templates/head.php';

?>

<title>Solicitud estado laboral</title>

<?php

  require_once 'templates/header.php';

  require_once 'templates/MenuVertical.php';

  require_once 'templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';

  $extraeIdAlumno=$dbh->prepare("SELECT `ID_Alumno` FROM `alumnos` WHERE `correo`='".$_SESSION['Email']."'");
  $extraeIdAlumno->execute();
  if ($extraeIdAlumno->rowCount()>0) {
    // code...
    $fila2=$extraeIdAlumno->fetch();
    $alumno=$fila2['ID_Alumno'];
  }

  $noti=$_GET["idNotif"];
  $actualizar=$dbh->prepare("UPDATE `notificaciones` SET `Estado`='Visto' WHERE `Id`=:notificacion");
  $actualizar->bindParam(":notificacion",$noti);
  $actualizar->execute();

  $solicitud=$_GET["idSoli"];
  $consulta=$dbh->prepare("SELECT `ID_HSociales`, `CantidadH`, `FechaInicio`, `FechaFinal`, `Encargado`, `Descripcion`, `Comprobante`, `ID_Ciclo`, `ID_Alumno`, `estado`, `comentario` FROM `hsociales` WHERE `ID_HSociales`='".$solicitud."'");
  $consulta->execute();

  if ($consulta->rowCount()>0) {
    // code...
    $fila=$consulta->fetch();
    $IdSolicitud=$fila["ID_HSociales"];
    $cantidad=$fila["CantidadH"];
    $fecInicio=$fila["FechaInicio"];
    $fecFin=$fila["FechaFinal"];
    $encargado=$fila["Encargado"];
    $descripcion=$fila["Descripcion"];
    $Comprobante=$fila["Comprobante"];
    $cicloActual=$fila["ID_Ciclo"];
    $IdAlumno=$fila["ID_Alumno"];
    $Comentario2=$fila["comentario"];
    $Estado=$fila["estado"];

  }
  $taller=$idTaller;
  $stmt1 =$dbh->prepare("SELECT `Titulo` FROM `talleres` WHERE `ID_Taller`='".$taller."'");
  // Ejecutamos
  $stmt1->execute();

  while($fila = $stmt1->fetch()){
      $titulo=$fila["Titulo"];
  }


?>



<div class="container-fluid text-center">

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
          $("#mensaje").show();
          setTimeout(function() {
            $("#mensaje").fadeOut(1500);
          },3000);
        }
      });
    });
  </script>

  <br>

  <h1 class="h1 text-light">Información sobre sus horas de vinculación</h1>

  <br>

  <br>
  <div class="row">
    <div class="alert alert-danger" id="mensaje">
      <p>Las horas no deben exceder a 40</p>
    </div>
  </div>






      <div class="row">

        <div class="col">
          <form class="form-group" action="SoliHoras.php" method="post" enctype="multipart/form-data">
            <label for="cantidad" class="text-light">Cantidad de horas:</label>
            <input type="number" name="cantidad" min="0" max="40" id="horasSoc" placeholder="0" class="form-control" value="<?php echo $cantidad; ?>" disabled required>
            <label for="fecInicio" class="text-light">Fecha de inicio:</label>
            <input type="date" class="form-control" name="fecInicio" value="<?php echo $fecInicio; ?>" id="fecInicio" disabled required>
            <label for="fecFin" class="text-light">Fecha de finalización:</label>
            <input type="date" class="form-control" name="fecFin" value="<?php echo $fecInicio; ?>" id="fecFin" disabled required>
            <label for="Encargado" class="text-light">Encargado:</label>
            <input type="text" name="Encargado" class="form-control" value="<?php echo $encargado; ?>" id="Encargado" disabled placeholder="Nombre del encargado" required>
            <label for="descrip" class="text-light">Descripción:</label>
            <textarea class="form-control" name="descrip" rows="3" placeholder="Describa sus actividades realizadas" id="motivo" disabled required><?php echo $descripcion; ?></textarea>

            <div id="arch">
              <h4>Comprobante</h4>
              <a class="btn btn-secondary"  href="../ComproHoras/<?php echo $Comprobante; ?>"><i class="fas fa-file-alt" style="font-size:3em;"></i></a>
            </div>

            <div class="custom-file" id="archivo">

              <input type="file" class="custom-file-input" accept=".pdf" id="customFileLang" name="archivo" required>
              <label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar Comprobante</label>
              <small>El tamaño del archivo no debe ser mayor a 5 MB</small>

            </div>
            <br>
            <input type="text" name="alumno" value="<?php echo $alumno; ?>" hidden>
            <input type="text" name="ciclo" value="<?php echo $cicloActual; ?>" hidden>
            <input type="text" name="solicitud" value="<?php echo $IdSolicitud; ?>" hidden>
            <input type="submit" class="btn btn-primary btn-block" id="btnEnviar" name="desinscribir" value="Enviar">
          </form>
        </div>
        <div class="col">
          <h3>Comentario de coach:</h3>
          <textarea rows="8" class="form-control" cols="80" disabled><?php echo $Comentario2; ?></textarea>
          <h4>Estado de la solicitud:</h4>
          <input type="text" class="form-control" value="<?php echo $Estado; ?>" disabled>
        </div>

    </div>
<br>
<?php if ($Estado=='Rechazado'): ?>
  <div class="row">
    <br>
  <br>
  <button type="button" class="btn btn-dark btn-block" id="btnModifica" name="button">Modificar solicitud</button>
  </div>
<?php endif; ?>

<script type="text/javascript">
//Este bloque de codigo esconde y muestras las opciones para enviar la solicitud modificada
  $(document).ready(function() {
    $("#archivo").hide();
    $("#btnEnviar").hide();
    $("#btnModifica").click(function() {
      $("#archivo").show();
      $("#btnEnviar").show();
      $("#arch").hide();
      $("#horasSoc").prop('disabled', false);
      $("#motivo").prop('disabled', false);
      $("#fecInicio").prop('disabled', false);
      $("#fecFin").prop('disabled', false);
      $("#Encargado").prop('disabled', false);


    });
  });
</script>



</div>

<!-- /#page-content-wrapper -->



</div>

</div>

<!-- /#wrapper -->



<?php

  require_once 'templates/footer.php';

?>
