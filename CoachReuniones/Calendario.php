<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>calendario</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
?>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
<!--<br>
<h1>Calendario</h1>
<br>-->

<?php
 require_once '../Conexion/conexion.php';
  
 $sede=$_SESSION['Lugar'];

 $mesActual=date("m");
 $stmt1 =$dbh->prepare("SELECT `ID_Reunion`, `Titulo`, `Fecha` FROM `reuniones` WHERE `Estado`='Activo' AND `ID_Sede` = ?");
  // Ejecutamos
 $stmt1->execute(array($sede));

 $stmt2 =$dbh->prepare("SELECT `ID_Reunion`, `Titulo`, `Fecha` FROM `reuniones` WHERE `Estado`='Finalizado' AND `ID_Sede` = ?");
 // Ejecutamos
 $stmt2->execute(array($sede));


$eventsAct = $stmt1->fetchAll();

$eventsFin = $stmt2->fetchAll();


?>
<br>
<link rel="stylesheet" type="text/css" href="css/Calendario.css">
<h1 class="justify-content-lg-end mb-3">Calendario</h1>
<div class="row">
	<div class="col-xs-4 col-sm-7 col-md-7 col-lg-4 col-xl-4" id="Info-1">
		<div class="row" >
			<h5 class="float-left ml-4">Proximos Eventos</h5>
		</div>
        <div class="w-100">
<?php
foreach ($dbh->query("SELECT Titulo,Fecha,ID_Empresa,Lugar FROM REUNIONES WHERE  MONTH(Fecha) IN (MONTH(CURDATE()))") as $reuniones) {
  # code...
?>
		<div class="row ml-3" id="actividad">
			<br>
			<?php echo $reuniones['Titulo'] ?>
			</div>
		<div class="row ml-3" id="fecha" ><span style="font-weight: bold;margin-right: 8px;">Fecha: </span><?php echo $reuniones['Fecha'] ?></div>
    <div class="row ml-3" id="fecha" ><span style="font-weight: bold;margin-right: 8px;">Universidad: </span><?php echo $reuniones['ID_Empresa'] ?></div>
    <div class="row ml-3" id="fecha" ><span style="font-weight: bold;margin-right: 8px;">Lugar: </span><?php echo $reuniones['Lugar'] ?></div>
    <br>
    <?php
  }
    ?>
	</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8  col-xl-8 h-25 col-centered bg-ligth" id="calendar" >
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
  					id: '<?php echo $event['ID_Reunion']; ?>',
  					title: '<?php echo $event['Titulo']; ?>',
  					start: '<?php echo $event['Fecha']; ?>',
  					end: '<?php echo $event['Fecha'];?>',
  					color: '#BE0032',
  				},
  			<?php endforeach; ?>

        //Mostramos los talleres finalizados en rojo
        <?php foreach($eventsFin as $event):?>
        {
          id: '<?php echo $event['ID_Reunion']; ?>',
          title: '<?php echo $event['Titulo']; ?>',
          start: '<?php echo $event['Fecha'];?>',
          end: '<?php echo $event['Fecha']; ?>',
          color: '#BE0032',
        },
        <?php endforeach; ?>
  			]
  		});



  	});

  </script>

</div>


<!--
<head>
  <link rel="stylesheet" type="text/css" href="css/Encabezado.css">
    <link rel="stylesheet" type="text/css" href="css/Calendario.css">
</head>

<div class="title">

<a href="index.php" ><img src="../img/back.png" class="icon"></a>
  <h2 class="main-title" >Calendario</h2>
</div>
<button class="btn btn-danger" id="btn-event"><p>Crear evento</p></button>
<div class="Imfo-Left">
<p class="Imfo-Left-title">Proximos Eventos</p>
<div class="Imfo-Left-1">
  <br>
  <p class="Imfo-Left-1-title" id="first">Taller  "Desarrolla tu creatividad"</p>
  <p class="Imfo-Left-1-text">Junio 11 , 3:00 pm</p>
  <p class="Imfo-Left-1-title">Taller "Finanzas en tiempos de Crisis"</p>
  <p class="Imfo-Left-1-text">Junio 11 , 3:00 pm</p>
  <p class="Imfo-Left-1-title">Taller "Reputación Online"</p>
  <p class="Imfo-Left-1-text">Junio 11 , 3:00 pm</p>
</div>
  
</div>
</div>
    <div class="row">
      <div class="col">

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


-->

<!-- /#page-content-wrapper -->








<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

