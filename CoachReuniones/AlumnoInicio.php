<?php
include 'Modularidad/CabeceraInicio.php';
?>
<title>Expdiente de alumno</title>
<?php
include 'Modularidad/EnlacesCabecera.php';
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
require_once '../Conexion/conexion.php';
include "../Alumno/CSS/cod.php";
  require_once '../Alumno/templates/header.php';
?>

<?php
$IDCooreoAlumno = $_GET['id'];
$stmt1 =$dbh->prepare("SELECT `ID_Alumno` FROM `alumnos` WHERE correo='".$IDCooreoAlumno."'");
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
	$consulta=$dbh->prepare("SELECT ID_Alumno, Class , correo , car.nombre as'carrera', uni.Nombre as 'universidad' , Sexo , Estado , ID_Sede , alu.Nombre , alu.ID_Empresa , StatusActual , FuenteFinacimiento , TotalTalleres FROM alumnos alu INNER JOIN carrera car on alu.ID_Carrera = car.Id_Carrera LEFT JOIN empresas uni on alu.ID_Empresa = uni.ID_Empresa WHERE ID_Alumno = :ID_Alumno");
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

	$StatusActualAlu = '';
	$finaciamiento = '';

	$HistoricoTaller;


	if ($consulta->rowCount() >=0)
	{
		$fila=$consulta->fetch();

		$Nombre_Alumno = $fila['Nombre'];
		$Carnet = $fila['ID_Alumno'];
		$Carrera = $fila['carrera'];
		$Estado =   $fila['Estado'];
		$promocion = $fila['Class'];
		$univerisdad = $fila['universidad'];
		$Correo = $fila['correo'];
		$idUniversidad = $fila['ID_Empresa'];
		$StatusActualAlu = $fila['StatusActual'];
		$finaciamiento = $fila['FuenteFinacimiento'];
		$HistoricoTaller =$fila['TotalTalleres'];
	}


	//Extraemos la foto del alumno

	$FotoAlumno = '';
	$IDusuario ='';

	$consulta2=$dbh->prepare("SELECT * FROM usuarios where correo = :IdAlumno");
	$consulta2->bindParam(":IdAlumno", $Correo);
	$consulta2->execute();

	if ($consulta2->rowCount() >=0)
	{
		$fila2=$consulta2->fetch();
		$FotoAlumno = $fila2['imagen'];
		$IDusuario = $fila2['IDUsuario'];
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


	//Horas sociales
	$consulta6=$dbh->prepare("SELECT * FROM hsociales where ID_Alumno = :IdAlumno AND `ID_Ciclo`='".$cicloActual."' AND `estado`='Aprobado'");
	$consulta6->bindParam(":IdAlumno", $id);
	$consulta6->execute();

	$HorasSociales = 0;

	if ($consulta6->rowCount() >0)
	{
		$fila6=$consulta6->fetch();

		if ($fila6['CantidadH'] != null) {
			$HorasSociales = $fila6['CantidadH'];
		}else
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



   
        $stmt5 =$dbh->prepare("SELECT `id_solicitud`,`Comentario`,`Comprobante`,`Comentario2`,`Fecha`,`Estado`, `Fecha` FROM solicitudcambio WHERE `id_alumno` = '".$Carnet."' AND`Estado`='Aprobado' AND `Fecha` = ( SELECT MAX(`Fecha`) FROM solicitudcambio)");
        $stmt5->execute();

        $IdSolicEstado;
        $CometarioSoliEstado;
        $ComentarioCoach;
        $ComprobanteSolEstado;
        $Fecha;
        $Hora;
        $EstadoSolLab;

        while($fila14 = $stmt5->fetch()){
        	$IdSolicEstado=$fila14["id_solicitud"];
        	$CometarioSoliEstado = $fila14['Comentario'];
        	$ComentarioCoach = $fila14['Comentario2'];
        	$ComprobanteSolEstado = $fila14['Comprobante'];
        	$Fecha = $fila14['Fecha'];
        	$EstadoSolLab = $fila14['Estado'];


        }


    $stmt6 =$dbh->prepare("SELECT COUNT(`id_solicitud`) as 'conteo'FROM `solicitudcambio` WHERE `id_alumno` = '".$Carnet."' AND `Estado` = 'Aprobado' AND `Fecha` = ( SELECT MAX(`Fecha`) FROM solicitudcambio )");
        $stmt6->execute();

        $conteoSolic;
        while ($fila15 = $stmt6->fetch()) {

        	$conteoSolic = $fila15['conteo'];
        	
        }


       


?>
<link rel="stylesheet" type="text/css" href="../Alumno/CSS/Alumno-Inicio.css">

	    <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>
<!--Comiezo de estructura de trabajo -->
<style type="text/css">
	@media screen and (max-width: 992px) {
	#main
	{
		margin-top: 100px;
	}
	}
</style>
<link rel="stylesheet" type="text/css" href="css/Menu.css">
<nav class="navbar navbar-expand-lg navbar-light" id="row">
<a href="javascript:history.back();"><img src="../img/back.png" class="icon"></a>
  <a class="navbar-brand" href="#" id="T1">Expediente de Alumno</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">

      <li class="nav-item" id="bloque">
        <a class="nav-link" href="NotasPorAlumno.php?id=<?php echo$Carnet?>">Notas<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item" id="bloque">
        <a class="nav-link" href="HorasVinculacionPorAlumno.php?id=<?php echo$id ?>">Horas de Vinculación</a>
      </li>
      <li class="nav-item" id="bloque">
        <a class="nav-link" href="Renovacion.php?id=<?php echo$Carnet?>">Renovaciones de Beca</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container-fluid text-center" id="main">
<!--/.Navbar-->

<!--/.Navbar-->
<br>

  <div>
      <?php
    include "config/Alerta.php";
      ?>
  </div>

	<!--Información principal del estudiante-->
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
                <div class="Info-Alumno1-sec" style="height: 330px;">

                    <section class="opciones">
                        <p id="mainTitle" class="parrafo">Carrera: </p>
                        <p class="carrera"><?php echo utf8_encode($Carrera )?></p>
                        <br>
                        <p id="mainTitle" class="promo1">Promocion: </p>
                        <p class="promo"><?php echo $promocion ?></p>
                        <br>
                        <p id="mainTitle" class="estado1">Estatus Actual: </p>
                        <p class="estado"><?php echo $StatusActualAlu; ?></p>
                        <br>
                        <p id="mainTitle" class="estadolab1"> Estado Laboral: </p>
                        <p class="estadolab" style="position: relative;">
                            <?php echo "<b id='estado'>".$estadoLaboral."</b>";  ?></p>
                            <br>
                        <p id="mainTitle" class="talleres1"> Total de Talleres: </p>
                        <p class="talleres"><?php echo "<b id='estado'>".$HistoricoTaller."</b>";  ?></p>
                        <br>
                        <p id="mainTitle" class="financiamiento1"> Financiamiento: </p>
                        <p class="financiamiento"><?php echo "<b id='estado'>".$finaciamiento ."</b>";  ?></p>
                        <br>
                        <p id="mainTitle" class="financiamiento1" > Estado de certificación  : </p>
                        <p class="financiamiento"><?php echo "<b id='estado'>".$estadoTalleres."</b>";  ?></p>
                        <br>
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
            <div class="Info-Alumno2" >
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

            <div class="Info-Alumno3 " >
                <div class="status1">
                    <p style="text-align: center;">CUM Actual</p>
                    <h3 class="subtitle" ><?php  echo  round($cum,2) ?> </h3>
                </div>
                <div class="status2">
                    <p style="text-align: center;">Avance de <br> Carrera</p>
                    <h3 class="subtitle"><?php  echo  round($avancePensum,2) ?> %</h3>
                    <a href="expedienteU.php"><button class="btn btn-info" id="button-info">Ver detalles</button></a>
                </div>
                <div class="status3">
                    <p style="text-align: center;">Estado de Beca</p>
                    <h3 class="subtitle"><?php  echo  round($Promedio,2) ?> %</h3>
                    <span id="subtitle"><?php echo $EstadoBeca; ?></span>
                </div>
                <div class="status5">
                    <p style="text-align: center;">Cambiar Imagen de <br>perfil</p>
                    
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" id="button-info">
             <i class="far fa-image"></i>
          </button>
                </div>
            </div>
            <?php
            if ($consulta11->rowCount()>=1)
            {
              while ($fila11=$consulta11->fetch())
                {   echo "
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
                {   echo "
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
                {   echo "
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Cambiar Imagen del alumno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form method="POST" action="Modelo/ModeloPassword/CambiarImgAlumno.php" enctype="multipart/form-data">
          <!--IMG A Subir -->
          <div class="custom-file">
            <div class="custom-file">
          
              <input type="hidden" name="iduser" value="<?php echo $IDusuario ?>">
              <input type="hidden" name="idalumno" value="<?php echo $IDCooreoAlumno ?>">
              <input type="file" name="imgusu" id="imgusu" class="custom-file-input" accept="image/*" required />
              <label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar Archivo</label>
            </div>
            
            <br><br>
            <input type="submit" name="SubirImg" id="SubirImg" class="btn btn-dark btn-block" value="Cambiar Foto" />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
      </div>
    </div>
  </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- /#wrapper -->
<script src="main.js"></script>
<?php include "../Alumno/GRAFICA.php"?>
<?php include "../Alumno/GRAFICA2.php"?>

<?php

include 'Modularidad/PiePagina.php';
?>
