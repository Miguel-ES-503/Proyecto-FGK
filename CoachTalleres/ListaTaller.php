<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>

<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

<?php


if (isset($_GET['id'])) {
	
	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT * FROM talleres WHERE ID_Taller = :ID_Taller");
	$consulta->bindParam(":ID_Taller",$id);
	$consulta->execute();

	$consulta2=$pdo->prepare("SELECT a.ID_Alumno, a.Nombre , a.Class , a.ID_Sede , T.Titulo , Asistencia ,IT.ID_Taller , a.Estado FROM inscripciontalleres IT INNER JOIN alumnos a on IT.ID_Alumno = a.ID_Alumno LEFT JOIN talleres T on IT.ID_Taller = T.ID_Taller  WHERE  IT.ID_Taller = ?");
	$consulta2->execute(array($id));	
}


?>


<title>Listas De Taller</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
		 <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>
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
				<a class="nav-link active" href="LIS-Talleres.php">Regresar</a>
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
		
		<blockquote class="blockquote text-center">
			<p class="mb-0"  style="text-align: center;"><?php echo$fila['Titulo'];?></p>
			<footer class="blockquote-footer mb-3" style="color: white;">Lugar: <cite title="Source Title"><?php echo $fila['lugar']; ?></cite></footer>
		</blockquote>
		<hr>
		<br>

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5  style="color: black" class="modal-title" id="exampleModalLabel">Subir Comprobante</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST" action="Modelo/ModeloTaller/SubirListaPDF.php" enctype="multipart/form-data">
							<input type="hidden" name="idpdf" value="<?php echo $id ?>" >
							<div id="usuario">
								<?php 
								if ($fila['ComprobanteLista'] == null) {
									echo "<b>No hay ningun archivo subido al servidor</b>";	
								}
								else 
								{
									echo "<b>Ya existe un archivo en el servidor llamado: </b><br>";
									echo "<p style='color: black; text-align: center;' ><b>" .$fila['ComprobanteLista'] . "</b></p>";		
								}
								?>
								<br><br>
								<label id="lblimg" style="color: black;">Seleccione un PDF del taller asignado.</label>
								<br>
								<div class="custom-file">
									<div class="custom-file">
										<input type="file" name="archivo" id="archivo"  accept="application/pdf,application/vnd.ms-excel" class="custom-file-input" required />
										<label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar Archivo</label>
									</div>
								</div>
								<p style="color: black; text-align: center;">El archivo no debe pesar más de 5MB</p>
								<input type="hidden" name="idtaller" id="idtaller" value="<?php echo $fila['ID_Taller']; ?>" />        
								
								<div id="alerta2"></div>
								<input type="submit" name="crear" id="comprobatePDF"  class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" value="Subir Documento " />
								
							</div>
						</form>      
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5  style="color: black" class="modal-title" id="exampleModalLabel">Finalizar Taller</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						


						<form method="POST" action="Modelo/ModeloTaller/CambiarEstado.php" class="form-inline">
							<input type="hidden" name="IDEstado" id="IDEstado" value="Finalizado">
							<input type="hidden" name="idtaller2" id="idtaller2" value="<?php echo $fila['ID_Taller']; ?>" />        
							<div class="form-group mb-2">
								<label style="color: black">¿Seguro qué desea finalizar el taller?</label>

							</div>
							<input type="submit" name="CambiarEstado" id="CambiarEstado" value="Confirmar" class="btn btn-primary mb-2" style="padding: 5px; margin-left:25px; ">
						</form>



					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-dark" data-dismiss="modal" >Cerrar</button>
					</div>
				</div>
			</div>
		</div>


			<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5  style="color: black" class="modal-title" id="exampleModalLabel">Iniciar proceso</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						
					

						<form method="POST" action="Modelo/ModeloTaller/IniciarProceso.php" class="form-inline">
							<input type="hidden" name="IDEstado" id="IDEstado" value="En proceso">
							<input type="hidden" name="idtaller2" id="idtaller2" value="<?php echo $fila['ID_Taller']; ?>" />        
							<div class="form-group mb-2">
								<label style="color: black">¿Seguro qué desea iniciar el taller?</label>

							</div>
							<input type="submit" name="CambiarEstado" id="CambiarEstado" value="Confirmar" class="btn btn-primary mb-2" style="padding: 5px; margin-left:25px; ">
						</form>



					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-dark" data-dismiss="modal" >Cerrar</button>
					</div>
				</div>
			</div>
		</div>


		<!--Ejemplo tabla con DataTables-->
		<div class="table-responsive">
			<div class="container">
				<form>
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Identificación</th>
								<th scope="col">Estado</th>
								<th scope="col" >Acción</th>
								<th scope="col" >Lista</th>
								<th scope="col" >Comprobante</th>
								<th scope="col" >Plantilla</th>
								<th scope="col" >Objetivos</th>
								<th scope="col" >Eliminar</th>
							</tr>
						</thead>
						<tbody>

							<tr class="table-light">
								<th scope="row"><?php echo "<b>".$fila['ID_Taller']."</b>"; ?></th>
								
								<td><?php echo $fila['Estado']; ?></td>
								<td> 
									<?php  


									$consulta11=$pdo->prepare("SELECT COUNT(`ID_Alumno`) AS 'Total3' FROM inscripciontalleres WHERE ID_Taller = ? ");
									$consulta11->execute(array($id));
									$Verificar;

									if ($consulta11->rowCount() >=0) 
									{
										$fila11=$consulta11->fetch();
										$Verificar = $fila11['Total3'];
									}	


													//Total de larreles oportunidades
									$consulta10=$pdo->prepare("SELECT COUNT(ID_Taller) AS TotalObj FROM objetivostaller WHERE ID_Taller = ?");
									$consulta10->execute(array($id));
									$resultOBjetivo ='';

									if ($consulta10->rowCount() >=1) 
									{
										$fila10=$consulta10->fetch();
										$resultOBjetivo = $fila10['TotalObj'];
									}

									$consulta12=$pdo->prepare("SELECT COUNT(ID_Taller) AS TotalCom FROM tallercompetencia WHERE ID_Taller = ?");
									$consulta12->execute(array($id));
									$resulCompetencia ='';


									if ($consulta12->rowCount() >=1) 
									{
										$fila12=$consulta12->fetch();
										$resulCompetencia = $fila12['TotalCom'];
									}

									if ($fila['Estado'] == "Activo") {
										
										echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal3' >
										En proceso
										</button>";
										
									}

									else if  ($fila['Estado'] == "Finalizado") {
										echo "<button type='button' class='btn btn-dark' data-toggle='modal' data-target='#exampleModal2'  disabled>
										Finalizar
										</button>";
										
									}else if($Verificar == 0)
									{
										echo "<button type='button' class='btn btn-dark' data-toggle='modal' data-target='#exampleModal2'  disabled>
										Finalizar
										</button>";

									}
									else if($resultOBjetivo == 0)
									{
										echo "<button type='button' class='btn btn-dark' data-toggle='modal' data-target='#exampleModal2'  disabled>
										Finalizar
										</button>";
									}
									else if($resulCompetencia == 0)
									{
										echo "<button type='button' class='btn btn-dark' data-toggle='modal' data-target='#exampleModal2'  disabled>
										Finalizar
										</button>";

									}

									else
									{
										echo "<button type='button' class='btn btn-dark' data-toggle='modal' data-target='#exampleModal2' style='background:black;' >
										Finalizar
										</button>";

									}

									?>

									
								</td>

								<?php 

								$consulta8=$pdo->prepare("SELECT COUNT(`ID_Alumno`) AS 'Total2' FROM inscripciontalleres WHERE ID_Taller = ? ");
								$consulta8->execute(array($id));
								$TotalAlumnosLista;

								if ($consulta8->rowCount() >=0) 
								{
									$fila8=$consulta8->fetch();
									$TotalAlumnosLista = $fila8['Total2'];
								}	



								if ($TotalAlumnosLista == 0) 
								{
									echo "<td><a href='#'>
									<button type='button' class='btn btn-danger px-3' disabled>
									<i class='fas fa-file-pdf'></i></button>
									</a></td>";

								}
								else
								{
									echo "<td><a href='Reportes/ListaAsistenciaTaller.php?id=".$fila['ID_Taller']."'>
									<button type='button' class='btn btn-danger px-3'>
									<i class='fas fa-file-pdf'></i></button>
									</a></td>";

								}


								?>

								<?php     

								if ($fila['ComprobanteLista'] == null) {

									echo "<td><a href='#'>
									<button type='button' class='btn btn-danger px-3' disabled >
									<i class='fas fa-times'></i></button>
									</a></td>";
								}
								else
								{
									echo "<td><a href='../pdfListaTaller/".$fila['ComprobanteLista']."'>
									<button type='button' class='btn btn-success px-3'>
									<i class='fas fa-check'></i></button>
									</a></td>";

								}


								?>

								<?php  

													//Total de larreles oportunidades
								$consulta7=$pdo->prepare("SELECT COUNT(ID_Alumno) AS 'Total' FROM inscripciontalleres WHERE ID_Taller = ?");
								$consulta7->execute(array($id));
								$TotalAlumnos;
								if ($consulta7->rowCount() >=0) 
								{
									$fila7=$consulta7->fetch();
									$TotalAlumnos = $fila7['Total'];
								}	

								if ($TotalAlumnos ==0) {
									echo "<td><button type='button' class='btn btn-info px-3' disabled >
									<i class='fas fa-times'></i></button>
									</td>";
								}else
								{
									echo "<td><a href='ReportesExcel/ReportesExcelTaller.php?id=".$fila['ID_Taller']."''>
									<button type='button' class='btn btn-info px-3' >									
									<i class='fas fa-arrow-alt-circle-down'></i></button></a>
									</td>";
								}   

								?>




								<?php

												//Total de larreles oportunidades
								$consulta3=$pdo->prepare("SELECT COUNT(ID_Taller) AS Total FROM objetivostaller WHERE ID_Taller = ?");
								$consulta3->execute(array($id));
								$TotalObjetivo ='';

								if ($consulta3->rowCount() >=0) 
								{
									$fila3=$consulta3->fetch();
									$TotalObjetivo = $fila3['Total'];
								}

								if ($TotalObjetivo == 0) {

									echo "<td><a href='Competencia_Objetivo_Taller.php?id=".$fila['ID_Taller']."'>
									<button type='button' class='btn btn-danger px-3'>
									<i class='fas fa-times'></i></button>
									</a></td>";
								}
								else if($resulCompetencia == 0)
								{
									echo "<td><a href='Competencia_Objetivo_Taller.php?id=".$fila['ID_Taller']."'>
									<button type='button' class='btn btn-danger px-3'>
									<i class='fas fa-times'></i></button>
									</a></td>";
								}
								else
								{
									echo "<td><a href='Competencia_Objetivo_Taller.php?id=".$fila['ID_Taller']."'>
									<button type='button' class='btn btn-success px-3'>
									<i class='fas fa-check'></i></button>
									</a></td>";

								}	



								?>

								<?php  

									echo "<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal4'>
									<i class='fas fa-trash-alt'></i>
									</button></td>";

								?>


								
							</tr>

						</tbody>
					</table>
				</form>          
			</div>
		</div>
		<br>
	</div>



	<!-- Modal -->
	<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel" style="color: black;">Elininar Taller</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form method="POST" action="Modelo/ModeloTaller/EliminarTaller.php" class="form-inline">

						<input type="hidden" name="idtaller3" id="idtaller3" value="<?php echo $fila['ID_Taller']; ?>" />        
						<div class="form-group mb-2">
							<label style="color: black">¿Seguro qué desea eliminar el taller?</label>

						</div>
						<input type="submit" name="EliminarTaller" id="EliminarTaller" value="Confirmar" class="btn btn-primary mb-2" style="padding: 5px; margin-left:25px; ">

					</form>      


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>



	<div class="card">
		<h5 class="card-header" style="color: black;">Lista De Asistencia



			<span class="float-right">	

				<?php 

				$consulta9=$pdo->prepare("SELECT COUNT(`ID_Alumno`) AS 'Total3' FROM inscripciontalleres WHERE ID_Taller = ? ");
				$consulta9->execute(array($id));
				$TotalAlum;

				if ($consulta9->rowCount() >=0) 
				{
					$fila9=$consulta9->fetch();
					$TotalAlum = $fila9['Total3'];
				}	




				if ($TotalAlum == 0) 
				{
					echo "<button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#exampleModal' disabled>
					<i class='fas fa-file-upload'></i> Comprobante
					</button>  ";


					echo "<button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#exampleModal5' disabled >
					<i class='fas fa-file-upload'></i> Importar
					</button>";

				}
				else
				{
					echo "<button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#exampleModal'>
					<i class='fas fa-file-upload'></i> Comprobante
					</button>  ";

					echo "<button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#exampleModal5'>
					<i class='fas fa-file-upload'></i> Importar
					</button>";

				}



				?>




			</span>
		</h5>	
		<form action="todosasistir.php" method="POST">

		<div class="card-body">
			<span class="float-left">	
				<input type="submit" name="todoasis" value="asistió" class="btn btn-primary btn-sm">  
				<input type="submit" name="todoinasis" value="Inasistencia" class="btn btn-primary btn-sm">
				<input type="hidden" name="idtaller" value="<?php echo $id; ?>" >
			</span>
			<div class="table-responsive">
				<br>
			
					<table  id="tableUser2" class="table table-hover table-sm table-bordered table-fixed" >
						<thead class="table-secondary">
							<tr>  
								<th scope="col"><input type='checkbox' name='' class='case' value="" id="todos">Todos</th>
								<th scope="col">Alumno</th>
								<th scope="col">Class</th>
								<th scope="col">Sede</th>
								<th scope="col">Asistencia</th>
								<th scope="col">Asistió</th>
								<th scope="col"> Inasistencia</th>
							</tr>
						</thead>
						<tfoot class="table-secondary">
							<tr>
								<th scope="col">Todos</th>
								<th scope="col">Alumno</th>
								<th scope="col">Class</th>
								<th scope="col">Sede</th>
								<th scope="col">Asistencia</th>
								<th scope="col">Asistencia</th>
								<th scope="col">Inasistencia</th>
							</tr>
						</tfoot>
						<tbody>
							<?php


						if ($consulta2->rowCount()>=1)
						{	
							while ($fila2=$consulta2->fetch())
								{	

								$asiste;
								if($fila2['Asistencia'] == "Asistio")
								{
									$asiste = "Asistió";
								}else
								{
									$asiste = $fila2['Asistencia'];
								}	


									echo "
							<tr class='table-light'>
							<td><input type='checkbox' name='ActuaAlumno[]' class='case' value=".$fila2['ID_Alumno']."></td>
							<th>".$fila2['Nombre']."</th>
							<th>".$fila2['Class']."</th>
							<th>".$fila2['ID_Sede']."</th>
							<th>".$asiste."</th>
							
							<td><a href='Modelo/ModeloTaller/AsistenciaTaller.php?id=".$fila2['ID_Taller']."&id2=".$fila2['ID_Alumno']."' class='fas fa-check  btn btn-warning'></a> </td>
							<td><a href='Modelo/ModeloTaller/NoAsistenciaTaller.php?id=".$fila2['ID_Taller']."&id2=".$fila2['ID_Alumno']."' class='fas fa-times  btn btn-danger'></a> </td>

							</tr>";

						}
					}
					#
					#

					?>

				</tbody>        
			</table>
			</form>  

		</div> <!--Fin de la caja responsivo de la tabla-->

	</div>
</div>

<br>

<!-- Modal -->
<div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="color:black;">Importar Asistencia</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">



				<form method="post" id="addproduct" action="ImportarArchivo/importTaller.php" enctype="multipart/form-data" role="form">

					<br>
					<label id="lblimg" style="color: black;">Seleccione un Archivo Excel en Formato (.xlsx)</label>
					<br><br>
					<div class="custom-file">
						<div class="custom-file">
							<input type="file" name="name"  id="nameExcel"  accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"   class="custom-file-input" required />
							<label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar Archivo</label>
						</div>
					</div>
					<input type="hidden" name="MantenerID" value="<?php echo $fila['ID_Taller'];}?>">
					<br><br>
					<div id="alerta3"></div>
					<input type="submit" class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" id="SubidaExcel"  value="Importar Datos">

				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<br>

<script type="text/javascript">

	$("#todos").on("click", function() {
		$(".case").prop("checked", this.checked);
	});

            // if all checkbox are selected, check the selectall checkbox and viceversa  
            $(".case").on("click", function() {
            	if ($(".case").length == $(".case:checked").length) {
            		$("#todos").prop("checked", true);
            	} else {
            		$("#todos").prop("checked", false);
            	}
            });
        </script>



<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>