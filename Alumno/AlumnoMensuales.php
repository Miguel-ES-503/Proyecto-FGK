<?php
  require_once 'templates/head.php';
?>
<title>Talleres del mes</title>
<?php
  require_once 'templates/header.php';
  require_once 'templates/MenuHorizontal.php';
  require_once '../Conexion/conexion.php';
  //Extraemos el carnet del estudiante
  $stmt =$dbh->prepare("SELECT `ID_Alumno`, `SedeAsistencia`, `ID_Sede` FROM `alumnos` WHERE `correo`='".$_SESSION['Email']."'");
  // Ejecutamos
  $stmt->execute();

  while($fila = $stmt->fetch()){

      $sedeA=$fila["SedeAsistencia"];
      $sedeB=$fila["ID_Sede"];
  }

   $stmt1 =$dbh->prepare("SELECT `ID_Taller`, `Titulo`, `Fecha`, `Hora`, `ID_Sede`, `Estado` FROM `talleres` WHERE `Estado`='Activo' AND (`ID_Sede`='".$sedeA."' OR `ID_Sede`='".$sedeB."')");
  // Ejecutamos
  $stmt1->execute();

  $stmt2 =$dbh->prepare("SELECT `ID_Taller`, `Titulo`, `Fecha`, `Hora`, `ID_Sede`, `Estado` FROM `talleres` WHERE `Estado`='Finalizado' AND (`ID_Sede`='".$sedeA."' OR `ID_Sede`='".$sedeB."')");
 // Ejecutamos
 $stmt2->execute();


$eventsAct = $stmt1->fetchAll();

$eventsFin = $stmt2->fetchAll();


?>

<div class="container-fluid text-center">
  
    <div class="row">
      <div class="col">

      </div>
      <div class="col">
        <h1 class="text-light">Eventos mensuales</h1>
      </div>

      <div class="col">
    
      </div>
    </div>

  <div class="row">

    <div class="col">
      <div id="calendar" class="col-centered bg-ligth">
      </div>
    </div>

  </div>



  <script>

  	$(document).ready(function() {

  		var date = new Date();
         var yyyy = date.getFullYear().toString();
         var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
         var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

  		$('#calendar').fullCalendar({
  			header: {
  				 language: 'es',
  				left: 'prev,next today',
  				center: 'title',

  			},
  			defaultDate: yyyy+"-"+mm+"-"+dd,
  			editable: true,
  			eventLimit: true, // allow "more" link when too many events
  			selectable: true,
  			selectHelper: true,

  			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

  				edit(event);

  			},


        //Mostramos los talleres activos en verde
  			events: [
          <?php foreach($eventsAct as $event):?>
  				{
  					id: '<?php echo $event['ID_Taller']; ?>',
  					title: '<?php echo $event['Titulo']; ?>',
  					start: '<?php echo $event['Fecha']." ".$event['Hora']; ?>',
  					end: '<?php echo $event['Fecha']." ".$event['Hora']; ?>',
  					color: '#009B00',
  				},
  			<?php endforeach; ?>

        //Mostramos los talleres finalizados en rojo
        <?php foreach($eventsFin as $event1):?>
        {
          id: '<?php echo $event1['ID_Taller']; ?>',
          title: '<?php echo $event1['Titulo']; ?>',
          start: '<?php echo $event1['Fecha']." ".$event1['Hora']; ?>',
          end: '<?php echo $event1['Fecha']." ".$event1['Hora']; ?>',
          color: '#D20000',
        },
        <?php endforeach; ?>
  			]
  		});



  	});

  </script>

      <br>
    </div>


</div>
<!-- /#page-content-wrapper -->

</div>
</div>
<!-- /#wrapper -->

<?php

  require_once 'templates/footer.php';
?>
