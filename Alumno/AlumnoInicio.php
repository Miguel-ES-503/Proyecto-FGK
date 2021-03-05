<?php
  require_once 'templates/head.php';
?>
<title>Expediente de alumno</title>
<link rel="stylesheet" href="CSS/tour.css">

<?php
//llama las plantillas
  include "CSS/cod.php";
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
    $stmt123456 =$dbh->prepare("SELECT `cum`, `avancePensum` FROM `expedienteu` WHERE ID_Alumno='$Carnet'");
    // Ejecutamos
    $stmt123456->execute();

    while($fila = $stmt123456->fetch()){
         $cum=$fila["cum"];
         $avancePensum=$fila["avancePensum"];
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

<nav class="navbar navbar-expand-lg navbar-light" id="row">
    <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon">
        <path fill-rule="evenodd"
            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5.5a.5.5 0 0 0 0-1H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5z" />
        </svg>
    </a>
    <span id="T1">Expediente de Alumno</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">


            <li class="nav-item" id="bloque">
                <a class="nav-link" href="HistorialNotas.php">Historial notas</a>
            </li>
            <li class="nav-item" id="bloque">
                <a class="nav-link" href="renovacionBeca.php">Renovaciones de Beca</a>
            </li>
        </ul>
    </div>
</nav>

<!-- ejemplo de como crear un guide tour -->

<!-- 
<div class="fb_gd_wrap " style="z-index: 999;">
  <div class="content bg-light" id="guideContent">
    <div class="header">
      <span class="text">Tour de actualización</span>
      <button class="btn" id="closeBtn">&times;</button>
    </div>
    <div  class="body">
   
      <div  class="text">
        <div id="guideBodyText" class="textList">
          <p>El historial de todas las materias que has llevado con su respectiva nota lo prodrás encontrar en <strong> Historial nota</strong> </p>
          <p>step 2: here you can make your own house or do whatever your like when you at house. for example you can clean the house or you can sleep in the house</p>
          <p>step 3: when you would like to earn mony or get what you wart here you can buy or sell products here!</p>
          <p>step 4: if you are tired you can choose here to have fun there are all kinds of entertainments! just enjoy yourself and take a really relax!</p>
          <p>step 5: making friends is so important for everyone! you can find others users here and contract them at any time!</p>
        </div>                            
      </div>
    </div>
    <div class="footer bg-dark">
      <button id="guidePrevBtn" class="btn prev" style="background-color: #be0032;">previous</button>
      <ul class="steps" style='background-color:#333;'>
        <li class="dot line active"></li>
        <li class="dot line "></li>
        <li class="dot line "></li>
        <li class="dot line "></li>
        <li class="dot  "></li>
      </ul>
      <button id="guideNextBtn"  class="btn next btn" style="background-color: #be0032;">next</button>
    </div>
  </div>
</div> 
</div>

</div>

 -->






<!-- Fin primera Fila-->
<br>
<div class="row">
    <!--Comiezo de estructura de trabajo 2fila-->
    <div class="container-fluid text-center" ng-app="app">

        <div class="principal">

            <div class="alerta">
                <?php
    include "config/Alerta.php";
      ?>
            </div>

            <!--Información principal del estudiante-->
            <div class="Info-Alumno1">
                <div class="row">
                    <div class="text-center align-self-center" id="carnet">
                        <br>
                        <img src="../img/imgUser/<?php echo $FotoAlumno?>" alt="img de usuario" class="user">


                        <h4 id="info1"><?php echo $Nombre_Alumno; ?></h4>
                        <h4 id="info1"><?php echo $Carnet; ?></h4>
                        <h6 id="info1" class="little"> <?php echo utf8_encode($univerisdad); ?></h6>

                    </div>

                </div>

                <br class="salto"><br class="salto"><br class="salto"><br class="salto">
                <div class="Info-Alumno1-sec ">

                    <section class="opciones">
                        <p id="mainTitle" class="parrafo">Carrera: </p>
                        <p class="carrera"><?php echo utf8_encode($Carrera )?></p>
                        <br>
                        <p id="mainTitle" class="promo1">Promocion: </p>
                        <p class="promo"><?php echo $promocion ?></p>
                        <br>
                        <p id="mainTitle" class="estado1">Estatus Actual: </p>
                        <p class="estado"><?php echo $Estado; ?></p>
                        <br>
                        <p id="mainTitle" class="estadolab1"> Estado Laboral: </p>
                        <p class="estadolab" style="position: relative; right: 105px;">
                            <?php echo "<b id='estado'>".$estadoLaboral."</b>";  ?></p>
                        <p id="mainTitle" class="talleres1"> Total de Talleres: </p>
                        <p class="talleres"><?php echo "<b id='estado'>".$Historico."</b>";  ?></p>
                        <br>
                        <p id="mainTitle" class="financiamiento1"> Financiamiento: </p>
                        <p class="financiamiento"><?php echo "<b id='estado'>".$Financiamiento."</b>";  ?></p>

                    </section>

                    <?php
                    $stmt123456 = $dbh->query("SELECT * FROM alumnos WHERE ID_Alumno = '$Carnet' ");
                    $stmt123456->execute(); 
                    while ($row = $stmt123456->fetch()) {
                        $modulos = $row['CantidadModulos'];
                    }    
                    
$TotalTalleresAlumno = $modulos; 
$Porcentaje = ($TotalTalleresAlumno /6)*100 ;
$TotalReunionAlumno =4;
$TotalReuniones = 5;
$Porc2 = round((($TotalReunionAlumno * 100)/$TotalReuniones),1);
		?>
                </div>
            </div>
            <div class="Info-Alumno2">
                <h3 class="subtitle-p">Progreso</h3>

                <section class="Info1 float-left h-50 w-75" style="margin-left:10%">
                    <div class="grafico ">
                        <div id="container"></div>
                    </div>

                    <div class="grafico2  float-left h-50 " style="margin-left:-20%">
                        <div id="container2" style="min-width: 310px; max-width: 600px;"></div>
                    </div>

                    <div class="HorasVinculacion float-right" style="margin-top:-110%; ">
                        <p><img src="../img/maletin.jpg" width="120px" height="100px" class="Img1">
                        <section class="horas">

                            <p id="tallerAlumno"><?php echo $HorasSociales; ?> h</p>
                        </section>
                        <span id="totalTa">Horas de <br>vinculación</span>
                    </div>
                    <p><img src="../img/industria.svg" style="margin-left:-2%; margin-top:5%;" width="120px"
                            height="100px" class="Img2">

                    <div class="Empresas" style="margin-left:-15%; margin-top:-20%;">
                        <section class="horas2">
                            <p id="tallerAlumno">
                                <?php echo $TotalExternaTallerAlumno;?>/<?php echo $TotalEmpresasExterna; ?></p>
                        </section>
                        <div class="externa">
                            <span id="totalTa">Empresas<br> Externas</span>
                        </div>
                    </div>
                </section>
            </div>
            <br>

            <div class="Info-Alumno3 ">
                <br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br
                    class="salto">
                <br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br
                    class="salto">
                <br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br
                    class="salto">
                <br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br
                    class="salto">
                <br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br
                    class="salto">
                <br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br
                    class="salto">
                <br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br
                    class="salto">
                <br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br
                    class="salto">
                <br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br
                    class="salto">
                <br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br
                    class="salto">
                <br class="salto"><br class="salto"><br class="salto"><br class="salto"><br class="salto"><br
                    class="salto">
                <div class="status1">
                    <p>CUM Actual</p>
                    <h3 class="subtitle"><?php  echo  round($cum,2) ?> </h3>
                </div>
                <div class="status2">
                    <p>Avance de <br> Carrera</p>
                    <h3 class="subtitle"><?php  echo  round($avancePensum,2) ?> %</h3>
                    <a href="expedienteU.php"><button class="btn btn-info" id="button-info">Ver detalles</button></a>
                </div>
                <div class="status3">
                    <p>Estado de Beca</p>
                    <h3 class="subtitle"><?php  echo  round($Promedio,2) ?> %</h3>
                    <span id="subtitle"><?php echo $EstadoBeca; ?></span>
                </div>
                <div class="status4" style="height:150px ">
                    <p>Horas de <br>vinculación</p>
                    <a href="solicitudHoras.php?id=<?php echo $alumno; ?>&ciclo=<?php echo $cicloActual; ?>"
                        class="btn btn-info" id="button-info">Registrar</a>
                </div>
                <div class="status5">
                    <p>Estado <br>Laboral</p>
                    <a href="SolicitudCambio.php" class="btn btn-info" id="button-info">Cambiar</a>
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


<!-- /#page-content-wrapper -->
<script src="https://code.highcharts.com/highcharts.js"></script>


<script src="JS/tour.js"></script>
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