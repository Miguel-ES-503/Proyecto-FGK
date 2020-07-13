<?php
include 'Modularidad/CabeceraInicio.php';
?>
<title>Expdiente de alumno</title>
<?php
include 'Modularidad/EnlacesCabecera.php';
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
require_once '../Conexion/conexion.php';
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

	    <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
		<br>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
		<!-- Navbar brand -->
		<a class="navbar-brand" href="#">Expdiente del Alumno</a>

		<!-- Collapse button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
		aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<!-- Collapsible content -->
	<div class="collapse navbar-collapse" id="basicExampleNav">

		<!-- Links -->
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link active" href="LIS-Alumnos.php">Regresar</a>
			</li>
			<li class="nav-item">
			    <a href='NotasPorAlumno.php?id=<?php echo$Carnet?>' class="nav-link">Notas</a>
			</li>
			
			<li class="nav-item">
			    <a href="HorasVinculacionPorAlumno.php?id=<?php echo$id ?>" class="nav-link"  >Horas de vinculación</a>
			    
			</li>
			
		</li>
	</ul>
	<!-- Links -->   
</div>
<!-- Collapsible content -->
</nav>
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
	   
		<div class="text-center align-self-center" id="carnet">
		    <br>
			<img src="../img/imgUser/<?php echo $FotoAlumno?>" alt="img de usuario" style="height: 150px;
			width: 150px; background-repeat: no-repeat;
			background-position: 50%;
			border-radius: 50%;
			background-size: 100% auto;" >
			<h6 style="color: white;"> <?php echo utf8_encode($univerisdad);  ?></h6>
			<h4 style="text-align: center; color: white"><?php echo $Nombre_Alumno;?></h4>
			<h4 style="color: white;"><?php echo $Carnet; ?></h4>

		</div>

		<div class="col text-center">
			<br><br><br>
			<table class="table table-responsive-lg float-left " >
				<thead class="thead-dark">
					<tr>
						<th scope="col">Carrera</th>
						<th scope="col">Promoción</th>
						<th scope="col">Status Actual</th>
						<th scope="col">Fuente de Finacimiento</th>
						<th scope="col">Total de talleres</th>
						<th scope="col">Estado de certificación</th>
						<th scope="col">Estado laboral</th>
						
						<th>Cambiar de imagen</th>
						

					</tr>
				</thead>
				<tbody>
					<tr class="table-light">
						<td><?php echo utf8_encode($Carrera);?></td>
						<td><?php echo $promocion ?></td>
				        <td><b><?php echo $StatusActualAlu ?></b></td>
				        <td><b><?php echo $finaciamiento ?></b></td>
						<td><b><?php echo $HistoricoTaller ?></b></td>
						<td><?php echo $estadoTalleres; ?></td>
						<td><?php echo "<b id='estado'>".$estadoLaboral."</b>";


						if ($estadoLaboral == 'Estudiando-Pasantias' || $estadoLaboral == 'Estudiando y Trabajando' || $estadoLaboral == 'Pasantias' || $estadoLaboral == 'Trabajando' ) 
						{
							if( $conteoSolic == 0)
							{
								echo "<br>No hay comprobante";
							}
							else
							{
								echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal6">
							Detalles
							</button>';
							}
							
						}

						?></td>
          
        <td>
        	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        		 <i class="far fa-image"></i>
        	</button>
        </td>
        
    </tr>
				</tbody>
			</table>


		</div>
	</div>





<!-- Modal -->
<div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:black;">Solicutud <?php echo $IdSolicEstado ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    


         <!-- Default form contact -->
         <form class="text-center border border-light p-5" action="#!">

         	<p class="h4 mb-4" style="color: black;">Datos general</p>

         	<!-- Name -->
         	<div>
         		<p style="color: black;">Estado Laboral</p>
         		<input type="text" id="defaultContactFormName" class="form-control mb-4"  value="<?php echo $estadoLaboral ?>" disabled >
         	</div>
     
         	

         	<!-- Email -->
         	<div>
         		<p style="color: black;">Fecha y hora</p>
         		<input type="email" id="defaultContactFormEmail" class="form-control mb-4" value="<?php echo$Fecha?>" disabled>	
         	</div>
         	

     		


         	<!-- Message -->
         	<div class="form-group">
         		<p style="color: black;">Comentario del estudiante</p>
         		<textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Message" disabled ><?php echo $CometarioSoliEstado ?></textarea>
         	</div>

         	<div class="form-group">
         		<p style="color: black;">Comentario del coach</p>
         		<textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Message" disabled><?php echo $ComentarioCoach ?></textarea>
         	</div>

         	<!-- Copy -->
         	<div class="custom-control custom-checkbox mb-4">
         		<input type="checkbox" class="custom-control-input" id="defaultContactFormCopy" checked>
         		<label class="custom-control-label" for="defaultContactFormCopy" style="color: black;">Aprobado</label>
         	</div>

         	<!-- Send button -->
         	<a href="../ComproCambio/<?php echo $ComprobanteSolEstado ?>" class="btn btn-info btn-block">
         	Comprobante
         	</a>
         </form>
         <!-- Default form contact -->





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>




		<!-- Modal -->
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






	<!--Información sobre proceso de becas-->
	<br>
	<div class="classic-tabs mx-2">
		<h1 class="text-light">Progreso</h1>
		<br>
		<div class="row">
			<div class="col" id="taller">
				<br>
        <?php

          if ($estadoLaboral=='Estudiando-Pasantias' || $estadoLaboral=='Estudiando y Trabajando' || $estadoLaboral=='Pasantias' || $estadoLaboral=='Trabajando' || $estadoLaboral=='Pausa de estudio' || $estadoTalleres=='Graduado') {
            echo "<h2><span id='comple1'>Completo</span></h2>";
          }else {
        ?>
				<h2> <span id="tallerAlumno"><?php echo $TotalTalleresAlumno; ?></span>/<span id="totalTa">15</span> </h2>
      <?php } ?>
				<hr>
        <?php
          if ($estadoLaboral=='Estudiando-Pasantias' || $estadoLaboral=='Estudiando y Trabajando' || $estadoLaboral=='Pasantias' || $estadoLaboral=='Trabajando' || $estadoLaboral=='Pausa de estudio') {
            ?>
            <button class="tablinks btn btn-outline-light btn-lg btn-block" data-toggle="modal" data-target="#modalCart" disabled>Talleres</button>
            <?php
          }else {
        ?>
				<button class="tablinks btn btn-outline-light btn-lg btn-block" data-toggle="modal" data-target="#modalCart" >Talleres</button>
      <?php } ?>

			</div>
			<div class="col" id="reuniones">
				<br>
        <?php
          if ($estadoLaboral=='Estudiando-Pasantias' || $estadoLaboral=='Estudiando y Trabajando' || $estadoLaboral=='Pasantias' || $estadoLaboral=='Trabajando' || $estadoLaboral=='Pausa de estudio') {
            echo "<h2><span id='comple'>Completo</span></h2>";
          }else {
        ?>
				<h2> <span id="reunionAlumno"><?php echo $TotalReunionAlumno; ?></span>/<span id="totalRe"><?php echo $TotalReuniones; ?></span> </h2>
      <?php } ?>
				<hr>

        <?php
          if ($estadoLaboral=='Estudiando-Pasantias' || $estadoLaboral=='Estudiando y Trabajando' || $estadoLaboral=='Pasantias' || $estadoLaboral=='Trabajando' || $estadoLaboral=='Pausa de estudio') {
            ?>
            <button class="tablinks btn btn-outline-light btn-lg btn-block" data-toggle="modal" data-target="#modalCart2" disabled>Reuniones</button>
            <?php
          }else {
        ?>
				<button class="tablinks btn btn-outline-light btn-lg btn-block" data-toggle="modal" data-target="#modalCart2">Reuniones</button>
      <?php } ?>

			</div>
			<div class="col" id="externo">
				<br>
        <?php
          if ($estadoLaboral=='Estudiando-Pasantias' || $estadoLaboral=='Estudiando y Trabajando' || $estadoLaboral=='Pasantias' || $estadoLaboral=='Trabajando' || $estadoLaboral=='Pausa de estudio' || $estadoTalleres=='Graduado') {
            echo "<h2><span id='comple1'>Completo</span></h2>";
          }else {
        ?>
				<h2> <span id="externoAlumno"><?php echo $TotalExternaTallerAlumno;?></span>/<span id="totalExt"><?php echo $TotalEmpresasExterna; ?></span> </h2>
      <?php } ?>
				<hr>
        <?php
          if ($estadoLaboral=='Estudiando-Pasantias' || $estadoLaboral=='Estudiando y Trabajando' || $estadoLaboral=='Pasantias' || $estadoLaboral=='Trabajando' || $estadoLaboral=='Pausa de estudio') {
            ?>
            <button class="tablinks btn btn-outline-light btn-lg btn-block" data-toggle="modal" data-target="#modalCart3" disabled>Empresas Externa</button>
            <?php
          }else {
        ?>
				<button class="tablinks btn btn-outline-light btn-lg btn-block" data-toggle="modal" data-target="#modalCart3">Empresas Externa</button>
      <?php } ?>
			</div>
			<div class="col" id="hora">
				<br>
        <?php
          if ($estadoLaboral=='Estudiando-Pasantias' || $estadoLaboral=='Estudiando y Trabajando' || $estadoLaboral=='Pasantias' || $estadoLaboral=='Trabajando' || $estadoLaboral=='Pausa de estudio') {
            echo "<h2><span id='comple'>Completo</span></h2>";
          }else {
        ?>
				<h2> <span id="AlumnoHoras"><?php echo $HorasSociales; ?></span> Horas</h2>
      <?php } ?>
				<hr>
        <?php
          if ($estadoLaboral=='Estudiando-Pasantias' || $estadoLaboral=='Estudiando y Trabajando' || $estadoLaboral=='Pasantias' || $estadoLaboral=='Trabajando' || $estadoLaboral=='Pausa de estudio') {
            ?>
            <button class="tablinks btn btn-outline-light btn-lg btn-block"  data-toggle="modal" data-target="#modalCart4" disabled>Horas de vinculación</button>
            <?php
          }else {
        ?>
				<button class="tablinks btn btn-outline-light btn-lg btn-block"  data-toggle="modal" data-target="#modalCart4" >Horas de vinculación</button>
      <?php } ?>
			</div>
			<div class="col" id="total">
				<h3 style="color: black;">Estado de beca</h3>
				<br>
        <?php
          if ($estadoLaboral=='Estudiando-Pasantias' || $estadoLaboral=='Estudiando y Trabajando' || $estadoLaboral=='Pasantias' || $estadoLaboral=='Trabajando' || $estadoLaboral=='Pausa de estudio') {
            echo "<h2> 100%</h2>
    				<hr>
    				<h4 class=\"text-success\">Aprobado</h4>";
          }else {
        ?>
				<h2><?php  echo  round($Promedio,2) ?> %</h2>
				<hr>
				<h4 id="beca"><?php echo $EstadoBeca; ?></h4>

      <?php } ?>
      <br>
      <br>
			</div>
		</div>



		<!-- Classic tabs -->
		<!-- Modal: modalCart -->
		<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<!--Header-->
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Lista de asistencia Talleres</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<!--Body-->
				<div class="modal-body">
					<div class="table-responsive">
						<table class="table table-hover thead-dark">
							<thead>
								<tr>
									<th>Taller</th>
									<th>Fecha</th>
									<th>Estado</th>
								</tr>
							</thead>
							<tfoot >
								<tr>
									<th>Taller</th>
									<th>Fecha</th>
									<th>Estado</th>
								</tr>
							</tfoot>
							<tbody>
								<?php


								if ($consulta10->rowCount()>=1)
								{
									while ($fila10=$consulta10->fetch())
										{		echo "
									<tr class='table-light'>
									<td>".$fila10['Titulo']."</td>
									<td>".$fila10['Fecha']."</td>
									<td>".$fila10['Asistencia']."</td>

									</tr>";

								}
							}

							?>
						</tbody>
					</table>
				</div>

			</div>
			<!--Footer-->
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
</div>



<!-- Classic tabs -->
<!-- Modal: modalCart -->
<div class="modal fade" id="modalCart2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<!--Header-->
		<div class="modal-header">
			<h4 class="modal-title" id="myModalLabel">Lista de asistencia Reuniones</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>
		<!--Body-->
		<div class="modal-body">
			<div class="table-responsive">
				<table class="table table-hover thead-dark">
					<thead>
						<tr>
							<th>Reunión</th>
							<th>Fecha</th>
							<th>Estado</th>
						</tr>
					</thead>
					<tfoot >
						<tr>
							<th>Reunión</th>
							<th>Fecha</th>
							<th>Estado</th>
						</tr>
					</tfoot>
					<tbody>

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
	<!--Footer-->
	<div class="modal-footer">
		<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
	</div>
</div>
</div>
</div>
</div>


<!-- Classic tabs -->
<!-- Modal: modalCart -->
<div class="modal fade" id="modalCart3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<!--Header-->
		<div class="modal-header">
			<h4 class="modal-title" id="myModalLabel">Lista de asistencia Talleres Externa</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>
		<!--Body-->
		<div class="modal-body">
			<div class="table-responsive">
				<table class="table table-hover thead-dark">
					<thead>
						<tr>
							<th>Taller</th>
							<th>Fecha</th>
							<th>Estado</th>
						</tr>
					</thead>
					<tfoot >
						<tr>
							<th>Taller</th>
							<th>Fecha</th>
							<th>Estado</th>
						</tr>
					</tfoot>
					<tbody>

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
	<!--Footer-->
	<div class="modal-footer">
		<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
	</div>
</div>
</div>
</div>
</div>


<!-- Classic tabs -->
<!-- Modal: modalCart -->
<div class="modal fade bd-example-modal-lg" id="modalCart4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<!--Header-->
		<div class="modal-header">
			<h4 class="modal-title" id="myModalLabel">Horas Sociales</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>
		<!--Body-->
		<div class="modal-body">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Inicio</th>
							<th>Finalización</th>
							<th>Encargado</th>
							<th>Descripción</th>
							<th>Ciclo</th>
							<th>Cantidad</th>
						</tr>
					</thead>
					<tfoot >
						<tr>
							<th>ID</th>
							<th>Inicio</th>
							<th>Finalización</th>
							<th>Encargado</th>
							<th>Descripción</th>
							<th>Ciclo</th>
							<th>Cantidad</th>
						</tr>
					</tfoot>
					<tbody>


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
	<!--Footer-->
	<div class="modal-footer">
		<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
	</div>
</div>
</div>
</div>
</div>


</div>
<!-- /#page-content-wrapper -->

</div>
</div>
<!-- /#wrapper -->


<?php

include 'Modularidad/PiePagina.php';
?>
