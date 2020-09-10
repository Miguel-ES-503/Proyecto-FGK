<?php
  require_once 'templates/head.php';
?>
<title>Expediente de alumno</title>
<style>
@media only screen and (min-width: 320px) and (max-width: 767px ) {

.main-title{
font-size: 10px;
margin-top: 8px;


}
 .icon{
height: 18px;
width: 18px;
margin-top: 0px;
position: relative;
right: 20px;
 }

.title{
width: 100%;
position: relative;
	left: 70px;

}

 .row, #carnet{
	width: 305px;
	height: 250px;
	
	

}
#carnet h4, h6{
	font-size: 20px;

}
.Info-Alumno1-sec, .opciones{
	width: 10px;
	height: 250px;


}

.status1{
	position: relative;
	right: 285px;
	bottom: 350px;
}
.status2{
position: relative;
bottom: 445px;
right: 90px;

}
.status3{
	position: relative;
	right: 285px;
	bottom: 460px;

}
.status4{
position: relative;
bottom: 620px;
right: 90px;

}
.status5{
position: relative;
bottom: 635px;
right: 190px;
width: 400px;
}

.grafico{
position: relative;
right: 60px;

}
.grafico2{
	position: relative;
	right: 20px;
}
.HorasVinculacion{
	position: relative;
	left: 35px;
	bottom: 60px;
}
.Img2{
position: relative;
bottom: 180px;
left: 115px;
}
.externa, .horas2{
position: relative;
right: 50px;
bottom: 115px;
}
.opciones p{
font-size: 15px;

}
.parrafo{
	position: relative;
	bottom: 20px;
	left: 25px;
}
.carrera{
	position: relative;
	left: 90px;
	bottom: 70px;
}
.promo1{

	position: relative;
	bottom: 80px;
	left: 25px;
	
}
.promo{
	position: relative;
	left: 115px;
	bottom: 120px;

}
.estado1{
	position: relative;
	left: 25px;
	bottom: 130px;

}
.estado{
	position: relative;
	left: 80px;
	bottom: 170px;

}
.estadolab1{
	position: relative;
	left: 25px;
	bottom: 170px;

}
.estadolab{
	position: relative;
	left: 90px;
	bottom: 210px;

}
.talleres1{
	position: relative;
	left: 25px;
	bottom: 210px;

}
.talleres{
	position: relative;
	left: 90px;
	bottom: 250px;

}
.financiamiento1{
	position: relative;
	left: 25px;
	bottom: 255px;

}
.financiamiento{
	position: relative;
	left: 145px;
	bottom: 295px;

}
#carnet{
position: relative;
left: 40px;

}
.button1{
width: 400px;

}
.title{
position: relative;
right: 30em;
}

.Info1{

	position: relative;
	right: 50px;
}

}
.grafico{
	position: relative;
	right: 65px;
	width: 300px;
}
</style>

<?php
//llama las plantillas
  require_once 'templates/header.php';

  require_once 'templates/MenuHorizontal.php';
  require_once '../Conexion/conexion.php';
?>

<?php
$stmt1 =$dbh->prepare("SELECT `ID_Alumno` FROM `alumnos` WHERE correo='".$_SESSION['Email']."'");
// Ejecutamos
$stmt1->execute();

while($fila = $stmt1->fetch()){
    $alumno=$fila["ID_Alumno"];
}

$fechaActual=date("Y-m-d");

$stmt2 =$dbh->prepare("SELECT `ID_Ciclo` FROM `ciclos` WHERE `Fechanicio`<='".$fechaActual."' AND `FechaFinal`>='".$fechaActual."'");
// Ejecutamos
$stmt2->execute();

while($fila2 = $stmt2->fetch()){
    $cicloActual=$fila2["ID_Ciclo"];
}

	$id=$alumno;

  	// Consulta para extrear la informacion del alumno
	$consulta=$dbh->prepare("SELECT ID_Alumno, Class , FuenteFinacimiento,correo , car.nombre as'carrera', uni.Nombre as 'universidad' , Sexo , StatusActual , ID_Sede ,TotalTalleres, alu.Nombre , alu.ID_Empresa FROM alumnos alu INNER JOIN carrera car on alu.ID_Carrera = car.Id_Carrera LEFT JOIN empresas uni on alu.ID_Empresa = uni.ID_Empresa WHERE ID_Alumno = :ID_Alumno");
	$consulta->bindParam(":ID_Alumno",$id);
	$consulta->execute();


	// extraemos el datos correspodiente del alumno
	$Nombre_Alumno = '' ;
	$Carnet = '';
	$Carrera = '';
	$Estado = ''; //Pediente
	$promocion = '';
	$ciclo = '';
	$univerisdad = '';

	$idUniversidad = '';

	$Correo = '';
	$Financiamiento = '';


	if ($consulta->rowCount() >=0)
	{
		$fila=$consulta->fetch();

		$Nombre_Alumno = $fila['Nombre'];
		$Carnet = $fila['ID_Alumno'];
		$Carrera = $fila['carrera'];
		$Estado =   $fila['StatusActual'];
		$promocion = $fila['Class'];
		$univerisdad = $fila['universidad'];
		$Correo = $fila['correo'];
		$idUniversidad = $fila['ID_Empresa'];
    $Historico=$fila['TotalTalleres'];
    	$Financiamiento = $fila['FuenteFinacimiento'];

	}


	//Extraemos la foto del alumno

	$FotoAlumno = '';

	$consulta2=$dbh->prepare("SELECT * FROM usuarios where correo = :IdAlumno");
	$consulta2->bindParam(":IdAlumno", $Correo);
	$consulta2->execute();

	if ($consulta2->rowCount() >=0)
	{
		$fila2=$consulta2->fetch();
		$FotoAlumno = $fila2['imagen'];
	}

	//Total de larreles oportunidades
	$consulta3=$dbh->prepare("SELECT COUNT(ID_Taller) AS Total FROM talleres WHERE ID_Empresa = 'FGK' AND `ID_Ciclo`='".$cicloActual."'");
	$consulta3->execute(array($id));
	$TotalTalleres ='';

	if ($consulta3->rowCount() >=0)
	{
		$fila3=$consulta3->fetch();
		$TotalTalleres = $fila3['Total'];
	}


    //Total de reuniones en la universidad correspodiente.
	$consulta4=$dbh->prepare("SELECT COUNT(`ID_Reunion`) AS TotalReunion FROM reuniones WHERE  ID_Empresa = ? AND `ID_Ciclo`='".$cicloActual."'");
	$consulta4->execute(array($idUniversidad));
	$TotalReuniones =0;

	if ($consulta4->rowCount() >=0)
	{
		$fila4=$consulta4->fetch();
		$TotalReuniones = $fila4['TotalReunion'];
	}

	//Total de talleres externaos
	$consulta5=$dbh->prepare("SELECT COUNT(ID_Taller) AS TotalExterna FROM talleres tal inner join empresas emp on tal.ID_Empresa = emp.ID_Empresa WHERE emp.Tipo = 'Empresa Externa' AND `ID_Ciclo`='".$cicloActual."'");
	$consulta5->execute();
	$TotalEmpresasExterna ='';

	if ($consulta5->rowCount() >=0)
	{
		$fila5=$consulta5->fetch();
		$TotalEmpresasExterna = $fila5['TotalExterna'];
	}

	foreach ($dbh->query("SELECT CantidadH FROM hsociales where ID_Alumno = '".$Carnet."' ") as $Datos) {
		if ($Datos['CantidadH'] != 0) {
			$HorasSociales = $Datos['CantidadH'];
		}
		else
		{
			$HorasSociales = 0;
		}
	}

	// FIN DEL LAS CONSULTAS DE DATOS

	//Inicio de consulta de  consulta para obtener la asistencia del alumno

	//Talleres internos asistitdos
	$consulta7=$dbh->prepare("SELECT COUNT(ID_Alumno) as 'TotalTallerAlumno' FROM inscripciontalleres INSCT INNER JOIN talleres TAL ON INSCT.ID_Taller = TAL.ID_Taller WHERE TAL.ID_Empresa = 'FGK' AND ID_Alumno = ? AND `Asistencia` = 'Asistio' AND TAL.ID_Ciclo='".$cicloActual."'");
	$consulta7->execute(array($id));
	$TotalTalleresAlumno ='';

	if ($consulta7->rowCount() >=0)
	{
		$fila7=$consulta7->fetch();
		$TotalTalleresAlumno = $fila7['TotalTallerAlumno'];
	}


	//Reuniones universidad asistidos
	$consulta8=$dbh->prepare("SELECT COUNT(ID_Alumno) AS TotalReunionAlumno FROM inscripcionreunion inre JOIN reuniones re ON re.ID_Reunion=inre.id_reunion where ID_Alumno = ?  AND  Asistencia = 'Asistio' AND re.ID_Ciclo='".$cicloActual."'");
	$consulta8->execute(array($id));
	$TotalReunionAlumno =0;

	if ($consulta8->rowCount() >=0)
	{
		$fila8=$consulta8->fetch();
		$TotalReunionAlumno = $fila8['TotalReunionAlumno'];
	}

	//talleres externos asistidos
	$consulta9=$dbh->prepare("SELECT COUNT(ID_Alumno) as 'TotalReuniAlu' FROM inscripciontalleres INCT inner JOIN talleres TAL on INCT.ID_Taller = TAL.ID_Taller LEFT JOIN empresas EMP ON TAL.ID_Empresa = EMP.ID_Empresa WHERE ID_Alumno = ? AND EMP.Tipo = 'Empresa Externa' AND Asistencia = 'Asistio' AND TAL.ID_Ciclo='".$cicloActual."'");
	$consulta9->execute(array($id));
	$TotalExternaTallerAlumno ='';

	if ($consulta9->rowCount() >=0)
	{
		$fila9=$consulta9->fetch();
		$TotalExternaTallerAlumno = $fila9['TotalReuniAlu'];
	}
  //Extraemos si su estado es graduado o activo y así lo le quitamos los talleres.
  $consulta16=$dbh->prepare("SELECT `Estado` FROM `alumnos` WHERE `ID_Alumno`='".$alumno."'");
  $consulta16->execute();
  $estadoTalleres='';
  if ($consulta16->rowCount() >=0)
	{
		$linea3=$consulta16->fetch();
		$estadoTalleres = $linea3['Estado'];
	}
  if ($estadoTalleres=='Graduado') {
    $TotalTalleresAlumno=15;
  }
  
  


	//Sacar el promedio de beca del alumno
	$PorcentajeTallerAlumno = ( ($TotalTalleresAlumno * 40) / 15 );
	$PorecentajeReunionAlumno = (($TotalReunionAlumno * 20) / $TotalReuniones );
	$PorcetnajeTalleresExterna = (($TotalExternaTallerAlumno * 20) /  $TotalEmpresasExterna);
	$porcentajeHoras=(($HorasSociales*20)/40);
	//Antes de sacar promedio verificamos que ninguno sea de nulo o NaN para que no de problemas el promedio final.
	if(is_nan($PorcentajeTallerAlumno)){
      $PorcentajeTallerAlumno=0;
      }
      if($TotalReuniones==0){
          $PorecentajeReunionAlumno=20;
      }else if(is_nan($PorecentajeReunionAlumno)){
          $PorecentajeReunionAlumno=0;
      }
      if($TotalEmpresasExterna==0){
          $PorcetnajeTalleresExterna=20;
      }else if(is_nan($PorcetnajeTalleresExterna)){
          $PorcetnajeTalleresExterna=0;
      }
      if(is_nan($porcentajeHoras)){
          $porcentajeHoras=0;
      }
	$Promedio = ($PorcentajeTallerAlumno +  $PorecentajeReunionAlumno + $PorcetnajeTalleresExterna + $porcentajeHoras);

	$EstadoBeca='';

	if ($Promedio >= 75 ){

		$EstadoBeca = 'Aprobado';
	}
	else if ($Promedio < 75)
	{
		$EstadoBeca = 'Reprobado';
	}else if (is_nan($Promedio)) {
    $Promedio=0;
    $EstadoBeca='Reprobado';
  }


	//Lista de asistencia del alumno.

	$consulta10=$dbh->prepare("SELECT ID_Alumno, Asistencia , tal.Titulo , tal.Fecha FROM inscripciontalleres inct INNER JOIN talleres tal on inct.ID_Taller = tal.ID_Taller WHERE ID_Alumno = ? AND tal.ID_Empresa ='FGK' AND tal.ID_Ciclo='".$cicloActual."' ORDER BY inct.Asistencia ASC ");
	$consulta10->execute(array($id));


	$consulta11=$dbh->prepare("SELECT id_alumno , reu.Titulo , reu.Fecha , incr.asistencia FROM inscripcionreunion incr INNER JOIN reuniones reu on incr.id_reunion = reu.ID_Reunion WHERE id_alumno = ? AND reu.ID_Ciclo='".$cicloActual."' ORDER BY  incr.asistencia ASC");
	$consulta11->execute(array($id));


	$consulta12=$dbh->prepare("SELECT  tal.Titulo , tal.Fecha ,  Asistencia FROM inscripciontalleres inct INNER JOIN talleres tal on inct.ID_Taller = tal.ID_Taller LEFT JOIN empresas emp on tal.ID_Empresa = emp.ID_Empresa WHERE  emp.Tipo = 'Empresa Externa' AND `ID_Alumno` = ? AND tal.ID_Ciclo='".$cicloActual."' ORDER BY  Asistencia ASC");
	$consulta12->execute(array($id));


	$consulta13=$dbh->prepare("SELECT * FROM hsociales WHERE ID_Alumno = ? AND `ID_Ciclo`='".$cicloActual."' AND `estado`='Aprobado'");
	$consulta13->execute(array($id));

  //Extraemos el total de talleres asistidos por el alumnos
  $consulta14=$dbh->prepare("SELECT COUNT(`ID_Alumno`) as completo FROM `inscripciontalleres` WHERE `ID_Alumno`='".$alumno."' AND `Asistencia`='Asistio'");
  $consulta14->execute();
  $CompletoTalleres=0;
  if ($consulta14->rowCount() >=0)
	{
		$linea=$consulta14->fetch();
		$CompletoTalleres = $linea['completo'];
	}
  //Extraemos el estado laboral
  $consulta15=$dbh->prepare("SELECT s.Nombre AS nombreEstado FROM alumnos a JOIN status s ON a.ID_Status=s.ID_Status WHERE `ID_Alumno`='".$alumno."'");
  $consulta15->execute();
  $estadoLaboral='';
  if ($consulta15->rowCount() >=0)
	{
		$linea2=$consulta15->fetch();
		$estadoLaboral = $linea2['nombreEstado'];
	}


?>

<link rel="stylesheet" type="text/css" href="CSS/Alumno-Inicio.css">
<script src="JS/jquery.js"></script>
<script src="JS/jquery.knob.js"></script>
<script src="JS/graficos.js"></script>
<meta charset="utf-8">
<div class="row">
<div class="title linea-color">

			<a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
			<h2 class="main-title" >Expediente del Alumno</h2>
			<div class="title2" id="button1">
				<br>
			<div class="title2-text" >
			<a href="SIT-CrearReunion.php" style="text-decoration: none;"><p>Historial Notas</p></a>
			
		</div>
		</div>
		<div class="title2" id="button2">
				<br>
			<div class="title2-text">
			<a href="renovacionBeca.php" style="text-decoration: none;"><p>Cartas Becario</p></a>
			
		</div>


		</div>
		<div class="title2" id="button3">
				<br>
			<div class="title2-text">
			<a href="SIT-CrearReunion.php" style="text-decoration: none;"><p>Historial cartas</p></a>
			
		</div>

	</div>
	</div>
	</div>

</div>
	
		
	<!-- Fin primera Fila-->
<br>
<div class="row" >
<!--Comiezo de estructura de trabajo 2fila-->
<div class="container-fluid text-center"  ng-app="app">
	
	<div class="principal">

  <div class="alerta" >
      <?php
    include "config/Alerta.php";
      ?>
  </div>

	<!--Información principal del estudiante-->
	<div class="Info-Alumno1" >
	<div class="row">
		<div class="text-center align-self-center" id="carnet">
      <br>
		<img src="../img/imgUser/<?php echo $FotoAlumno?>" alt="img de usuario" class="user" >
		

			<h4 id="info1"><?php echo $Nombre_Alumno; ?></h4>
			<h4  id="info1"><?php echo $Carnet; ?></h4>
<h6  id="info1" class="little"> <?php echo utf8_encode($univerisdad); ?></h6>

		</div>

	</div>

	<br class="salto"><br class="salto"><br class="salto"><br class="salto">
<div class="Info-Alumno1-sec ">

<section class="opciones">
			<p id="mainTitle" class="parrafo">Carrera: </p>
			<p class="carrera" ><?php echo utf8_encode($Carrera )?></p>
			<br>
			<p id="mainTitle" class="promo1" >Promocion: </p>
			<p class="promo"><?php echo $promocion ?></p>
			<br>
		    <p id="mainTitle" class="estado1" >Estatus Actual: </p>
			<p class="estado"><?php echo $Estado; ?></p>
			<br>
			<p id="mainTitle" class="estadolab1"> Estado Laboral: </p>
			<p class="estadolab" style="position: relative; right: 105px;"><?php echo "<b id='estado'>".$estadoLaboral."</b>";  ?></p>
			<p id="mainTitle" class="talleres1"> Total de Talleres: </p>
			<p class="talleres"><?php echo "<b id='estado'>".$Historico."</b>";  ?></p>
			<br>
		    <p id="mainTitle" class="financiamiento1" > Financiamiento: </p>
			<p class="financiamiento"><?php echo "<b id='estado'>".$Financiamiento."</b>";  ?></p>

</section>

<?php
$TotalTalleresAlumno = 5; 
$Porcentaje = ($TotalTalleresAlumno /6)*100 ;
$TotalReunionAlumno =4;
$TotalReuniones = 5;
$Porc2 = round((($TotalReunionAlumno * 100)/$TotalReuniones),1);
		?>
</div>
</div>
<div class="Info-Alumno2">
			<h3 class="subtitle-p">Progreso</h3>
	<section class="Info1 float-left h-50 w-75"style="margin-left:10%">
	<div class="grafico ">
		<div id="container" ></div>
	</div>

	<div class="grafico2  float-left h-50 " style="margin-left:-20%">
		<div id="container2"  style="min-width: 310px; max-width: 600px;" ></div>
	</div>

	<div class="HorasVinculacion float-right" style="margin-top:-110%; ">
		<p><img src="../img/maletin.jpg" width="120px" height="100px"  class="Img1">
		<section class="horas">
		
		<p id="tallerAlumno"><?php echo $HorasSociales; ?> h</p>
		</section>
		<span id="totalTa">Horas de <br>vinculación</span> 
	</div>
<p><img src="../img/industria.svg" style="margin-left:-2%; margin-top:5%;" width="120px" height="100px" class="Img2">

	<div class="Empresas" style="margin-left:-15%; margin-top:-20%;"  >
		<section class="horas2">
		<p id="tallerAlumno"><?php echo $TotalExternaTallerAlumno;?>/<?php echo $TotalEmpresasExterna; ?></p>
		</section>
		<div class="externa">
		<span id="totalTa" >Empresas<br> Externas</span> 
		</div>	
	</div>
	</section>
</div>
<br>

<div class="Info-Alumno3 " >
<br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto">
<br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto">
<br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto">
<br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto">
<br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto">
<br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto">
<br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto">
<br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto">
<br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto">
<br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto">
<br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto">
	<div class="status1"  >
		<p >CUM Actual</p>
		<h3 class="subtitle"><?php  echo  round($Promedio,2) ?> %</h3>
	</div>
	<div class="status2">
		<p >Avance de <br> Carrera</p>
		<h3 class="subtitle"><?php  echo  round($Promedio,2) ?> %</h3>
		<button class="btn btn-info" id="button-info">Ver detalles</button>
	</div>
	<div class="status3" >
		<p >Estado de Beca</p>
		<h3 class="subtitle"><?php  echo  round($Promedio,2) ?> %</h3>
		<span id="subtitle"><?php echo $EstadoBeca; ?></span>
	</div>
	<div class="status4"  style=";height:150px ">
		<p >Horas de <br>vinculación</p>
<a href="solicitudHoras.php?id=<?php echo $alumno; ?>&ciclo=<?php echo $cicloActual; ?>" class="btn btn-info" id="button-info">Registrar</a>
	</div>
	<div class="status5">
		<p >Estado <br>Laboral</p>
<a href="solicitudCambio.php" class="btn btn-info" id="button-info">Cambiar</a>
	</div>
</div>
						<?php
						if ($consulta11->rowCount()>=1)
						{
							while ($fila11=$consulta11->fetch())
								{		echo "
							<tr class='bg-light'>
							<td>".$fila11['Titulo']."</td>
							<td>".$fila11['Fecha']."</td>
							<td>".$fila11['asistencia']."</td>

							</tr>";

						}
					}

					?>

				</tbody>
			</table>
		</div>

	</div>
						<?php
						if ($consulta12->rowCount()>=1)
						{
							while ($fila12=$consulta12->fetch())
								{		echo "
							<tr class='table-light'>
							<td>".$fila12['Titulo']."</td>
							<td>".$fila12['Fecha']."</td>
							<td>".$fila12['Asistencia']."</td>

							</tr>";

						}
					}

					?>

				</tbody>
			</table>
		</div>

	</div>
						<?php
						if ($consulta13->rowCount()>=1)
						{
							while ($fila13=$consulta13->fetch())
								{		echo "
							<tr class='table-light'>
							<td>".$fila13['ID_HSociales']."</td>
							<td>".$fila13['FechaInicio']."</td>
							<td>".$fila13['FechaFinal']."</td>
							<td>".$fila13['Encargado']."</td>
							<td>".$fila13['Descripcion']."</td>
							<td>".$fila13['ID_Ciclo']."</td>
							<td>".$fila13['CantidadH']."</td>
							</tr>";

						}
					}

					?>

				</tbody>
			</table>
		</div>

	</div>
	
<!-- /#page-content-wrapper -->
<script src="https://code.highcharts.com/highcharts.js"></script>



<script src="main.js"></script>
<?php include "GRAFICA.php"?>
<?php include "GRAFICA2.php"?>
</div>
</div>
<!-- /#wrapper -->
</div>
<?php include "templates/saltos.php" ?>
<?php

  require_once 'templates/footer.php';
?>
