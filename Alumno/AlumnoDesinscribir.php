<?php
  require_once 'templates/head.php';
?>
<title>Desinscribirse de un taller</title>
<?php
  require_once 'templates/header.php';
  require_once 'templates/MenuVertical.php';
  require_once 'templates/MenuHorizontal.php';
  require '../Conexion/conexion.php';
  $stmt =$dbh->prepare("SELECT `ID_Alumno` FROM `alumnos` WHERE correo='".$_SESSION['Email']."'");
  // Ejecutamos
  $stmt->execute();

  while($fila1 = $stmt->fetch()){
      $alumno=$fila1["ID_Alumno"];
  }
  $taller=$_GET["id"];
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

  <br>
  <h1 class="h1 text-light"><?php echo $titulo; ?></h1>
  <br>
  <br>


      <h2 class="h2">¿Por qué desea desincribirse de este taller?</h2>
      <div class="row">
        <div class="col">
          <form class="form-group" action="Desinscribir.php" method="POST" enctype="multipart/form-data">

            <h3>Motivo:</h3>

            <textarea class="form-control" id="motivo" name="motivo" rows="3" required></textarea>

        </div>

    </div>
    <div class="row">
      <div class="col">
        <div class="custom-file">
          <input type="file" class="custom-file-input" accept=".pdf" id="customFileLang" name="archivo" required>
          <label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar Comprobante</label>
          <small>El archivo no debe persar más de 5MB</small>
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
        <input type="text" name="taller" value="<?php echo $taller; ?>" hidden>
        <input type="submit" class="btn btn-warning btn-block" name="desinscribir" value="Enviar">
      </form>
      </div>


    </div>


</div>
<!-- /#page-content-wrapper -->

</div>
</div>
<!-- /#wrapper -->

<?php
  require_once 'templates/footer.php';
?>
