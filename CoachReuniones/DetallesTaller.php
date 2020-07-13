<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>

<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

<?php


if (isset($_GET['id'])) {
	
	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT  ID_Taller ,Titulo , Fecha , Hora, F.Nombre AS 'Tipo' ,ID_Sede , ID_Ciclo, E.Nombre AS Empresa ,Estado , ComprobanteLista FROM talleres T INNER JOIN formatotalleres F on T.ID_Formato = F.ID_Formato LEFT JOIN empresas E on T.ID_Empresa = E.ID_Empresa WHERE ID_Taller = :ID_Taller");
	$consulta->bindParam(":ID_Taller",$id);
	$consulta->execute();

	$consulta2=$pdo->prepare("SELECT a.ID_Alumno, a.Nombre , T.Titulo , Asistencia ,IT.ID_Taller FROM inscripciontalleres IT INNER JOIN alumnos a on IT.ID_Alumno = a.ID_Alumno LEFT JOIN talleres T on IT.ID_Taller = T.ID_Taller  WHERE  IT.ID_Taller = ?");
	$consulta2->execute(array($id));


	
}


?>


<title>Listas De Taller</title>
<style type="text/css" media="screen">
	
	.file-upload input[type='file'] {
		display: none;
	}

</style>
<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
	<br>
	<!--Navbar-->
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

		<!-- Navbar brand -->
		<a class="navbar-brand" href="#">Detalles del Taller</a>

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
				<a class="nav-link active" href="ListadoTalleresFinalizado.php">Regresar</a>
			</li>
			
		</ul>
		<!-- Links -->   
	</div>
	<!-- Collapsible content -->
</nav>
<!--/.Navbar-->

<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>

<br>



<div class="container-fluid">
	<?php if ($consulta->rowCount() >=0) {$fila=$consulta->fetch()?>
	
		


<br>

<div class="text-justify border border-light p-5">


	<div class="card text-center">
		<div class="card-header">
			<h5 style="color: black;">Detalles del taller</h5>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-sm-6 mb-3 mb-md-0">
					<div class="card">
						<div class="card-body">

							<p class="mb-4"><b>Identificación: </b> <?php echo $fila['ID_Taller']; ?><br><b>Tema: </b><?php echo$fila['Titulo'];?><br><b>Fecha: </b> <?php echo$fila['Fecha'];?> -- <b>Hora:</b> <?php echo$fila['Hora'];?><br> <b>Cargo: </b> <?php echo$fila['Empresa'];?><br><b>Tipo: </b><?php echo$fila['Tipo'];?> -- <b>Sede: </b><?php echo$fila['ID_Sede'];?> -- <b>Ciclo: </b><?php echo$fila['ID_Ciclo'];?> </p>
							<hr>

							<br>
							<div class="form-row">
								<div class="col">
									<!-- First name   Tema , fecha , la hora y el tipo de taller -->
									<div class="md-form">

										<a href="pdfListaTaller/<?php echo$fila['ComprobanteLista'];?>"  class='btn btn-success px-3 far fa-file-alt'> </a><br>
										<label for="materialRegisterFormFirstName">comprobante</label>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<p class="mb-4"><b>Estado: </b> <?php echo$fila['Estado'];}?></p>


							<p class="card-text"><b>Objetivo:</b></p>
							<?php

							$consulta3=$pdo->prepare("SELECT * FROM objetivostaller WHERE ID_Taller = ?");
							$consulta3->execute(array($id));
							$DetalleObjetivo ='';

							if ($consulta3->rowCount() >=0) 
							{
								$fila3=$consulta3->fetch();
								$DetalleObjetivo = $fila3['Objetivo'];
							} 
							?>

							<div class="form-group">
								<textarea class="form-control" id="exampleFormControlTextarea3" rows="3" disabled><?php echo$DetalleObjetivo ?></textarea>
							</div>
							<p class="card-text"><b>Competencia:</b></p>
							<?php 

							$consulta4=$pdo->prepare("SELECT IDTaller_Competencia , ID_Taller , COM.Nombre FROM tallercompetencia TC INNER JOIN competencias COM ON TC.IDComptenecia = COM.IDComptenecia WHERE ID_Taller = :ID_Taller ");
							$consulta4->bindParam(":ID_Taller",$id);
							$consulta4->execute();

							?>
							<ul class="float-left" style="text-align: left;">
								<?php 

								if ($consulta4->rowCount()>=1)
								{
									while ($fila4=$consulta4->fetch())
									{		
										echo "<li style='color: white;'>".$fila4['Nombre']."</li>";
									}
								}
								?>
							</ul>


							<br><br>
						</div>
					</div>
				</div>
			</div>
    </div>
    <div class="card-footer text-muted">
      Taller Finalizado 
    </div>
  </div>
 
</div>
</div>

<br><br>




					<div class="card">
						<h5 class="card-header" style="color: black;">Lista De Asistencia
						</h5>	
						<div class="card-body">
							<div class="table-responsive">
								<br>
								<table  id="tableUser2" class="table table-hover table-sm table-bordered table-fixed" >
									<thead class="table-secondary">
										<tr>  
											<th scope="col">Alumno</th>
											<th scope="col">Taller</th>
											<th scope="col">Asistencia</th>
											<th scope="col">Asistencia</th>
											<th scope="col"> No Asistencia</th>
										</tr>
									</thead>
									<tfoot class="table-secondary">
										<tr>
											<th scope="col">Alumno</th>
											<th scope="col">Taller</th>
											<th scope="col">Asistencia</th>
											<th scope="col">Asistencia</th>
											<th scope="col"> No Asistencia</th>
										</tr>
									</tfoot>
									<tbody>
										<?php


										if ($consulta2->rowCount()>=1)
										{
											while ($fila2=$consulta2->fetch())
												{		echo "
											<tr class='table-light'>
											<th>".$fila2['Nombre']."</th>
											<th>".$fila2['Titulo']."</th>
											<th>".$fila2['Asistencia']."</th>

				<td><a href='Modelo/ModeloTaller/AsistenciaAlumFin.php?id=".$fila2['ID_Taller']."&id2=".$fila2['ID_Alumno']."' class='fas fa-check  btn btn-warning'></a> </td>
			<td><a href='Modelo/ModeloTaller/InasistenciaAlumFin.php?id=".$fila2['ID_Taller']."&id2=".$fila2['ID_Alumno']."' class='fas fa-times  btn btn-danger'></a> </td>

											</tr>";

										}
									}


									?>

								</tbody>        
							</table>  

						</div> <!--Fin de la caja responsivo de la tabla-->

					</div>
				</div>

				<br><br>

				<?php
//Incluir el footer
				include 'Modularidad/PiePagina.php';
				?>