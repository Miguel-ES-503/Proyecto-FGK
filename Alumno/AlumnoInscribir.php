<?php
  require_once 'templates/head.php';
?>
<title>Inscripción</title>
<?php
  require_once 'templates/header.php';
  require_once 'templates/MenuVertical.php';
  require_once 'templates/MenuHorizontal.php';
  require_once '../Conexion/conexion.php';

?>

<div class="container-fluid text-center">
  <style>
    #demo{
      font-size: 4em;
      color: white;
    }
  </style>
    <?php
        $fechaActual=date("Y-m-d");
        $fechaServer=date("F d, Y H:i:s:u");
      $sedeActual=$_SESSION['Lugar'];

      $stmt =$dbh->prepare("SELECT `Fecha`, `Hora` FROM `inscripcion` WHERE `ID_Sede`='".$sedeActual."' AND `Estado`='Activo'");
      // Ejecutamos
      $stmt->execute();
      // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
      while($row = $stmt->fetch()){
        $fechaObtenida=$row["Fecha"];
        $horaObtenida=$row["Hora"];
  }
    ?>

    <script type="text/javascript">
      $(document).ready(function() {
        $("#bot").hide();
      });
    </script>

    <script>
    // Set the date we're counting down to
    // 1. JavaScript
    // var countDownDate = new Date("Sep 5, 2018 15:37:25").getTime();
    // 2. PHP
    var countDownDate = <?php echo strtotime("$fechaObtenida "." $horaObtenida") ?> * 1000;
    var now = <?php echo time() ?> * 1000;

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        // 1. JavaScript
        // var now = new Date().getTime();
        // 2. PHP
        now = now + 1000;

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
            minutes + "m " + seconds + "s ";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            var x = document.getElementById("bot").innerHTML;
            document.getElementById("demo").innerHTML = x;
        }else if (distance > 0){
          document.getElementById("demo").style.display='block';
          document.getElementById("bot").style.display='none';
        }
    }, 1000);
    </script>



  <br>
  <h1 class="h1 text-light">Inscripción</h1>
  <br>

  <br>
  <div class="">
    <p id="demo"></p>

  </div>
  <div id="bot">
    <a href="AlumnoInscripcion.php" class="btn btn-lg btn-dark">Inscribir</a>
  </div>

</div>
<!-- /#page-content-wrapper -->

</div>
</div>
<!-- /#wrapper -->

<?php
  require_once 'templates/footer.php';
?>
