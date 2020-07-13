<?php
  require_once 'templates/head.php';
?>
<title>Califique el taller</title>
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
  <style>
    .seleccionado{
      font-size: 1.5em;
    }
  </style>

  <script type="text/javascript">
  //Al precionar cada uno de los botones se asigna un valor a al campo rate para enviar la calificación
    $(document).ready(function() {

      $("#muytriste").click(function() {
        $("#rate").val(0);
        $("#muytriste").addClass("seleccionado");
        $("#triste").removeClass("seleccionado");
        $("#meh").removeClass("seleccionado");
        $("#feliz").removeClass("seleccionado");
        $("#muyfeliz").removeClass("seleccionado");
      });

      $("#triste").click(function() {
        $("#rate").val(25);
        $("#muytriste").removeClass("seleccionado");
        $("#triste").addClass("seleccionado");
        $("#meh").removeClass("seleccionado");
        $("#feliz").removeClass("seleccionado");
        $("#muyfeliz").removeClass("seleccionado");
      });

      $("#meh").click(function() {
        $("#rate").val(50);
        $("#muytriste").removeClass("seleccionado");
        $("#triste").removeClass("seleccionado");
        $("#meh").addClass("seleccionado");
        $("#feliz").removeClass("seleccionado");
        $("#muyfeliz").removeClass("seleccionado");
      });

      $("#feliz").click(function() {
        $("#rate").val(75);
        $("#muytriste").removeClass("seleccionado");
        $("#triste").removeClass("seleccionado");
        $("#meh").removeClass("seleccionado");
        $("#feliz").addClass("seleccionado");
        $("#muyfeliz").removeClass("seleccionado");
      });

      $("#muyfeliz").click(function() {
        $("#rate").val(100);
        $("#muytriste").removeClass("seleccionado");
        $("#triste").removeClass("seleccionado");
        $("#meh").removeClass("seleccionado");
        $("#feliz").removeClass("seleccionado");
        $("#muyfeliz").addClass("seleccionado");
      });


    });
  </script>
  <br>
  <h1 class="h1 text-light"><?php echo $titulo; ?></h1>
  <br>
  <br>
  <h2 class="h2">Califique este taller</h2>

    <div class="row">

      <form class="form-group" action="calificar.php" method="POST" id="formulario">

    </div>
    <h3 class="h3">Calificación:</h3>
    <br>
    <div class="row bg-dark">
      <div class="col">
        <button type="button" name="button" class="btn btn-link" id="muytriste">
          <i class="fas fa-sad-tear" style="color: #D10000; font-size:3em;"></i>
        </button>
      </div>

      <div class="col">
        <button type="button" class="btn btn-link" id="triste">
          <i class="fas fa-frown" style="color: #F92504; font-size:3em;"></i>
        </button>
      </div>
      <div class="col">
        <button type="button" class="btn btn-link" id="meh">
          <i class="fas fa-meh" style="color: #C8DC02; font-size:3em;"></i>
        </button>

      </div>
      <div class="col">
        <button type="button" class="btn btn-link" id="feliz">
          <i class="fas fa-smile" style="color: #2AAC05; font-size:3em;"></i>
        </button>
      </div>
      <div class="col">
        <button type="button" name="button" class="btn btn-link" id="muyfeliz">
          <i class="fas fa-grin-beam" style="color: #2CBA04; font-size:3em;"></i>
        </button>
      </div>
    </div>
      <br>
      <input type="number" form="formulario" name="rate" id="rate" hidden>
      <input type="text" form="formulario" name="alumno" value="<?php echo $alumno; ?>" hidden>
      <input type="text" form="formulario" name="taller" value="<?php echo $taller; ?>" hidden>
      <h3>Motivo:</h3>
      <textarea class="form-control" id="motivo" rows="3" name="comentario" required></textarea>
      <small class="text-ligth">Cuéntanos porque le das esa calificación a este taller.</small>
      <br>
      <br>
      <input type="submit" form="formulario" class="btn btn-info btn-block" value="Enviar">
    </form>






</div>
<!-- /#page-content-wrapper -->

</div>
</div>
<!-- /#wrapper -->

<?php
  require_once 'templates/footer.php';
?>
