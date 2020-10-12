<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>

<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

<?php


if (isset($_GET['id'])) {
	
	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT * FROM reuniones WHERE ID_Reunion = :ID_Reunion");
	$consulta->bindParam(":ID_Reunion",$id);
	$consulta->execute();

	$consulta2=$pdo->prepare("SELECT reu.ID_Reunion, alu.ID_Alumno , alu.Nombre , reu.Titulo , asistencia , HR.HorarioInicio , IR.telefono FROM inscripcionreunion IR INNER JOIN alumnos alu on IR.id_alumno = alu.ID_Alumno LEFT JOIN reuniones reu on IR.id_reunion = reu.ID_Reunion LEFT JOIN horariosreunion HR ON IR.Horario = HR.IDHorRunion WHERE IR.id_reunion = ? ORDER BY `HR`.`HorarioInicio` DESC ");
	$consulta2->execute(array($id));

	$consulta3=$pdo->prepare("SELECT * FROM horariosreunion WHERE ID_Reunion = ? ");
    $consulta3->execute(array($id));
    
    $consulta77=$pdo->prepare("SELECT * FROM universidadreunion u INNER JOIN empresas e ON e.ID_Empresa = u.ID_Empresa WHERE u.ID_Reunion = ? ");
	$consulta77->execute(array($id));


	$consulta4=$pdo->prepare("SELECT alu.Nombre ,hora.HorarioInicio , `telefono` FROM inscripcionreunion inr inner join alumnos alu on inr.`id_alumno`= alu.`id_alumno` left join horariosreunion hora on inr.`Horario` = hora.`IDHorRunion` WHERE inr.`id_reunion` = :id_reunion ORDER BY `hora`.`HorarioInicio` ASC ");
	$consulta4->bindParam(":id_reunion",$id);
	$consulta4->execute();



}

?>


<title>Detalles de la reunión</title>
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
    $(document).ready(function() {
        bsCustomFileInput.init()
    });
    </script>
    <!--Navbar-->
    <br>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">Detalles de la Reunión</a>

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
                    <a class="nav-link active" href="LIS-Reunion.php">Regresar</a>
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
        <?php  if ($consulta->rowCount() >=0) {$fila=$consulta->fetch() ?>
        <blockquote class="blockquote text-center">
            <p class="mb-0" style="text-align: center; font-size: 25px;"><?php echo$fila['Titulo'];?></p>
            <footer class="blockquote-footer mb-3" style="color: white; font-size: 20px;">Tipo de reunión: <cite
                    title="Source Title"><?php echo $fila['Tipo']; ?></cite></footer>
        </blockquote>
        <hr>
        <br>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="color: black" class="modal-title" id="exampleModalLabel">Subir Lista</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="Modelo/ModeloReunion/SubirListaPDF.php"
                            enctype="multipart/form-data">
                            <input type="hidden" name="idpdf" value="<?php echo $id ?>">
                            <div id="usuario">
                                <?php 
								if ($fila['ComprobanteLista'] == null) {
									echo "<b>No hay ningun archivo subido el servidor</b>";	
								}
								else 
								{
									echo "<b>Ya se ha subido un archivo llamado</b><br>";
									echo "<p style='color: black; text-align: center;' ><b>" .$fila['ComprobanteLista'] . "</b></p>";		
								}
								?>
                                <label id="lblimg">Seleccione un pdf de lista de reunión</label>
                                <div class="custom-file">
                                    <div class="custom-file">
                                        <input type="file" name="archivo" id="archivo2"
                                            accept="application/pdf,application/vnd.ms-excel" class="custom-file-input"
                                            required />
                                        <label class="custom-file-label" for="customFileLang"
                                            data-browse="Buscar">Seleccionar Archivo</label>
                                    </div>
                                </div>

                                <input type="hidden" name="idtaller" id="idtaller"
                                    value="<?php echo $fila['ID_Reunion']; ?>" />
                                <br><br>
                                <div id="alerta4"></div>
                                <input type="submit" name="crear" id="crear"
                                    class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0"
                                    value="Subir Documento" />

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="color: black" class="modal-title" id="exampleModalLabel">Finalizar reunión</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="Modelo/ModeloReunion/CambiarEstadoReunion.php" class="form-inline">

                            <input type="hidden" name="idreu" id="idreu" value="<?php echo $fila['ID_Reunion']; ?>" />
                            <div class="form-group mb-2">
                                <label style="color: black">¿Seguro qué desea finalizar la reunión?</label>

                            </div>
                            <input type="submit" name="CambiarEstado" id="CambiarEstado" value="Confirmar"
                                class="btn btn-primary mb-2" style="padding: 5px; margin-left:25px; ">

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="color: black" class="modal-title" id="exampleModalLabel">Crear Horarios</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="Modelo/ModeloReunion/CrearHorario.php">
                            <input type="hidden" name="idreunion" id="idreunion"
                                value="<?php echo $fila['ID_Reunion']; ?>" />

                            <div class="col">
                                <div class="md-form">
                                    <input type="time" id="horaInicio" name="horaInicio" class="form-control" required>
                                    <label for="materialRegisterFormFirstName" style="color: black">Hora Inicio</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="md-form">
                                    <input type="time" id="horafinalizar" name="horafinalizar" class="form-control"
                                        required>
                                    <label for="materialRegisterFormFirstName" style="color: black">Hora
                                        Finalizar</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="md-form">
                                    <select name="cantidad" id="cantidad" class="form-control" require>
                                        <option value="10">10 Minutos</option>
                                        <option value="15">15 Minutos</option>
                                        <option value="30">30 Minutos</option>
                                    </select>
                                    <label for="materialRegisterFormFirstName" style="color: black">Duración por sesión</label>
                                </div>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary btn-rounded" type="submit" name="Guardar_Datos"
                            value="Crear Horario" id="Guardar_Datos">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                    </div>
                    </form>
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
                                <th scope="col">Acción</th>
                                <th scope="col">Horarios</th>
                                <th scope="col">Lista</th>
                                <th scope="col">Comprobante</th>
                                <th scope="col">Universidad</th>
                                <th scope="col">Plantilla</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="table-light">
                                <th scope="row"><?php echo $fila['ID_Reunion']; ?></th>
                                <td><?php echo $fila['Estado']; ?></td>
                                <td>
                                    <?php 

								 $consulta8=$pdo->prepare("SELECT COUNT(`id_alumno`) AS 'Total2' FROM inscripcionreunion WHERE id_reunion = ? ");
								$consulta8->execute(array($id));
								$TotalAlumnosLista;

								if ($consulta8->rowCount() >=0) 
								{
									$fila8=$consulta8->fetch();
									$TotalAlumnosLista = $fila8['Total2'];
								}	


								  if ($fila['Estado'] == "Finalizado") 
								  {
								  	echo "<button type='button' class='btn btn-dark' data-toggle='modal' data-target='#exampleModal2' disabled>
								  	Finalizar
								  	</button>";

								  }else if ($TotalAlumnosLista == 0) 
								  {

								  echo "<button type='button' class='btn btn-dark' data-toggle='modal' data-target='#exampleModal2' disabled>
								  	Finalizar
								  	</button>";
								  }
								  else
								  {
								  	echo "<button type='button' class='btn btn-dark' data-toggle='modal' data-target='#exampleModal2' style='background: black'>
								  	Finalizar
								  	</button>";

								  }

								  ?>


                                </td>
                                <td>

                                    <button type="button" class="btn btn-dark" data-toggle="modal"
                                        data-target="#exampleModal3" style="background: black">
                                        <i class="fas fa-clock"></i>
                                    </button>
                                </td>

                                <?php  


								


								if ($TotalAlumnosLista == 0) 
								{
									echo "<td><a href='#'>
									<button type='button' class='btn btn-danger px-3' disabled>
									<i class='fas fa-file-pdf'></i></button>
									</a></td>";
									
								}
								else
								{
									echo "<td><a href='Reportes/ListaAsistenciaReunion.php?id=".$fila['ID_Reunion']."'>
									<button type='button' class='btn btn-danger px-3'>
									<i class='fas fa-file-pdf'></i></button>
									</a></td>";

								}
								?>


                                <?php

								if ($fila['ComprobanteLista'] == null) {

									echo "<td><a href='#'>
									<button type='button' class='btn btn-danger px-3' disabled>
									<i class='fas fa-times'></i></button>
									</a></td>";
								}
								else
								{
									echo "<td><a href='../pdfListaReunion/".$fila['ComprobanteLista']."'>
									<button type='button' class='btn btn-success px-3'>
									<i class='fas fa-check'></i></button>
									</a></td>";
									
								}

								?>
                                <?php 


						echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalLong'>
						<i class='fas fa-university'></i>
					  </button>
					  </td>";
								?>
                                <?php
								$consulta7=$pdo->prepare("SELECT COUNT(`id_alumno`) AS 'Total' FROM inscripcionreunion WHERE id_reunion = ? ");
								$consulta7->execute(array($id));
								$TotalAlumnos;

								if ($consulta7->rowCount() >=0) 
								{
									$fila7=$consulta7->fetch();
									$TotalAlumnos = $fila7['Total'];
								}	


								if($TotalAlumnos == 0)
								{
									echo "<td><button type='button' class='btn btn-info px-3' disabled >
									<i class='fas fa-arrow-alt-circle-down'></i></button>
									</td>";
								}
								else
								{
									echo "<td><a href='ReportesExcel/ReportesExcelReunion.php?id=".$fila['ID_Reunion']."''><button type='button' class='btn btn-info px-3' >
									<i class='fas fa-arrow-alt-circle-down'></i></button></a>
									</td>";

								}





								?>

                                <?php 
									if ($TotalAlumnos != 0  ) {

										echo "<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal4' disabled>
										<i class='fas fa-trash-alt'></i>
										</button></td>";
									}
									else
									{
										echo "<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal4'>
										<i class='fas fa-trash-alt'></i>
										</button></td>";

									}	



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
    <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Elininar Reunión</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="Modelo/ModeloReunion/EliminarReunion.php" class="form-inline">

                        <input type="hidden" name="idreunion3" id="idreunion3"
                            value="<?php echo $fila['ID_Reunion']; ?>" />
                        <div class="form-group mb-2">
                            <label style="color: black">¿Seguro qué desea eliminar la reunión?</label>

                        </div>
                        <input type="submit" name="EliminarTaller" id="EliminarTaller" value="Confirmar"
                            class="btn btn-primary mb-2" style="padding: 5px; margin-left:25px; ">

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

				$consulta9=$pdo->prepare("SELECT COUNT(`id_alumno`) AS 'Total2' FROM inscripcionreunion WHERE id_reunion = ? ");
				$consulta9->execute(array($id));
				$TotalAlum;

				if ($consulta9->rowCount() >=0) 
				{
					$fila9=$consulta9->fetch();
					$TotalAlum = $fila9['Total2'];
				}

				if ($TotalAlum == 0) 
				{
					echo "<button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#exampleModal' disabled>
					<i class='fas fa-file-upload'></i>
					Comprobante
					</button>";

					echo "  <button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#exampleModal5' disabled>
					<i class='fas fa-file-upload'></i> Importar
					</button> ";

					echo "<button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#modalCart' >
					<i class='far fa-clock'></i>Horarios</button>";

				}
				else
				{
					echo "<button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#exampleModal'>
					<i class='fas fa-file-upload'></i>
					Comprobante
					</button>";

					echo "  <button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#exampleModal5'>
					<i class='fas fa-file-upload'></i> Importar
					</button> ";

					echo "<button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#modalCart'>
					<i class='far fa-clock'></i>Horarios</button>";

				}
            
				?>
                <td>
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                        data-target="#universidades"> <i class='fas fa-university'></i>Universidades</button>

                </td>
            </span>
        </h5>
        <div class="card-body">
            <div class="table-responsive">
                <form action="TodosasignarAsis.php" method="POST">
                    <span class="float-left">
                        <input type="submit" name="todoasis" value="asistió" class="btn btn-primary btn-sm">
                        <input type="submit" name="todoinasis" value="Inasistencia" class="btn btn-primary btn-sm">
                        <input type="hidden" name="idtaller" value="<?php echo $id; ?>">
                    </span>
                    <table id="tableUser2" class="table table-hover table-sm table-bordered table-fixed">
                        <thead class="table-secondary">
                            <tr>
                                <th scope="col"><input type='checkbox' name='' class='case' value="" id="todos">Todos
                                </th>
                                <th scope="col">Alumno</th>
                                <th scope="col">teléfono</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Asistencia</th>
                                <th scope="col">Asistencia</th>
                                <th scope="col"> No Asistencia</th>
                            </tr>
                        </thead>
                        <tfoot class="table-secondary">
                            <tr>
                                <th scope="col">Todos</th>
                                <th scope="col">Alumno</th>
                                <th scope="col">teléfono</th>
                                <th scope="col">Hora</th>
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
								{		

									$asiste;
								if($fila2['asistencia'] == "Asistio")
								{
									$asiste = "Asistió";
								}else
								{
									$asiste = $fila2['asistencia'];
								}	

									echo "
							<tr class='table-light'>
							<td><input type='checkbox' name='ActuaAlumno[]' class='case' value=".$fila2['ID_Alumno']."></td>
							<th>".$fila2['Nombre']."</th>
							<th>".$fila2['telefono']."</th>
							<th>".$fila2['HorarioInicio']."</th>
							<th>".$asiste."</th>

							<td><a href='Modelo/ModeloReunion/AsistenciaReunion.php?id=".$fila2['ID_Reunion']."&id2=".$fila2['ID_Alumno']."' class='fas fa-check  btn btn-warning'></a> </td>
							<td><a href='Modelo/ModeloReunion/NoAsistioReunion.php?id=".$fila2['ID_Reunion']."&id2=".$fila2['ID_Alumno']."' class='fas fa-times  btn btn-danger'></a> </td>

							</tr>";

						}
					}


					?>

                        </tbody>
                    </table>

            </div>
            <!--Fin de la caja responsivo de la tabla-->
            </form>
        </div>
    </div>

    <br>



    <!-- Button trigger modal-->


    <!-- Modal: modalCart -->
    <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Panel De Horarios </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Horarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Inscritos</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                            <div class="card">
                                <h5 class="card-header" style="color: black;">Horarios Asignados</h5>
                                <div class="card-body">


                                    <div class="table-responsive">
                                        <br>

                                        <table id="tableUser" class="table table-bordered">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th scope="col">Hora Inicio</th>
                                                    <th scope="col">Hora Finalización</th>
                                                    <th scope="col">Cantidad</th>
                                                    <th scope="col">Actualizar</th>
                                                    <th scope="col">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tfoot class="table-secondary">
                                                <tr>
                                                    <th scope="col">Hora Inicio</th>
                                                    <th scope="col">Hora Finalización</th>
                                                    <th scope="col">Cantidad</th>
                                                    <th scope="col">Actualizar</th>
                                                    <th scope="col">Eliminar</th>
                                                </tr>
                                            </tfoot>
                                            <tbody class="table-hover">
                                                <?php

										if ($consulta3->rowCount()>=1)
										{
											while ($fila3=$consulta3->fetch())
												{		echo "
											<tr class='table-light'>
											<th>".$fila3['HorarioInicio']."</th>
											<th>".$fila3['HorarioFinalizado']."</th>
											<th>".$fila3['Canitdad']."</th>

											<td><a href='Vistas/VistaReunion/ActualizarHorario.php?id=".$fila3['IDHorRunion']."&id2=".$id."'  class='fas fa-pencil-alt  btn btn-success'></a> </td>
											<td><a href='Modelo/ModeloReunion/EliminarHorarioReunion.php?id=".$fila3['IDHorRunion']."&id2=".$id."' class='fas fa-trash  btn btn-danger'></a> </td>

											</tr>";

										}
									}


									?>

                                            </tbody>
                                        </table>

                                    </div>
                                    <!--Fin de la caja responsivo de la tabla-->
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br>
                            <div class="card">
                                <h5 class="card-header" style="color: black;">Horarios Alumnos</h5>
                                <div class="card-body">


                                    <div class="table-responsive">
                                        <br>
                                        <table id="tableUser3" class="table table-bordered">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th scope="col">Alumno</th>
                                                    <th scope="col">Horario</th>
                                                    <th scope="col">Contacto</th>

                                                </tr>
                                            </thead>
                                            <tfoot class="table-secondary">
                                                <tr>
                                                    <th scope="col">Alumno</th>
                                                    <th scope="col">Horario</th>
                                                    <th scope="col">Contacto</th>
                                                </tr>
                                            </tfoot>
                                            <tbody class="table-hover">
                                                <?php

									if ($consulta4->rowCount()>=1)
									{
										while ($fila4=$consulta4->fetch())
											{		echo "
										<tr class='table-light'>
										<th>".$fila4['Nombre']."</th>
										<th>".$fila4['HorarioInicio']."</th>
										<th>".$fila4['telefono']."</th>
										</tr>";

									}
								}


								?>

                                            </tbody>
                                        </table>

                                    </div>
                                    <!--Fin de la caja responsivo de la tabla-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">salir</button>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal: modalCart -->
    <br>

    <!-- Modal de universidades   -->
    <!-- Modal -->
    <div class="modal fade" id="universidades" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Lista de Universidades</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <br>

                        <table id="tableUser" class="table table-bordered">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col">Nombre de Universidad</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tfoot class="table-secondary">
                                <tr>
                                    <th scope="col">Nombre de Universidad</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </tfoot>
                            <tbody class="table-hover">
                                <?php

										if ($consulta77->rowCount()>=1)
										{
											while ($fila3=$consulta77->fetch())
												{		echo "
											<tr class='table-light'>
											<th>".utf8_encode($fila3['Nombre'])."</th>
    <td><a  href='Modelo/ModeloReunion/eliminarUniversidad.php?id=".$fila3['idreunion']."&id2=".$_GET['id']."' class=' btn btn-danger'><i class='fas fa-trash-alt'></i></a> </td>

											</tr>";

										}
									}


									?>

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color:black;">Importar Asistencia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">



                        <form method="post" id="addproduct" action="ImportarArchivo/importReunion.php"
                            enctype="multipart/form-data" role="form">

                            <label id="lblimg" style="color: black;">Seleccione un Archivo Excel en Formato
                                (.xlsx)</label>
                            <br><br>
                            <div class="custom-file">
                                <div class="custom-file">
                                    <input type="file" name="name" id="name2"
                                        accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                                        class="custom-file-input" required />
                                    <label class="custom-file-label" for="customFileLang"
                                        data-browse="Buscar">Seleccionar
                                        Archivo</label>
                                </div>
                            </div>

                            <input type="hidden" name="MantenerID" value="<?php echo $fila['ID_Reunion'];}?>">
                            <br><br>
                            <div id="alerta5"></div>
                            <button type="submit"
                                class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0"
                                id="importarExcel">Importar Datos</button>

                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Universidad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="Modelo/ModeloReunion/agregarUniversidad.php">
                        <div class="Imfo">
                            <label for="materialRegisterFormFirstName" class="text-dark">Agregar universidad</label>
                            <select id="idempresa" name="idempresa" class="form-control" required>
                                <?php
                                  echo '<option value="0" disabled selected >Seleccione la opción</option>';
                                  foreach($pdo->query("SELECT * FROM  empresas  WHERE  Tipo =  'Universidad' ORDER by nombre asc") as $row)
                                  {
                                    echo '<option value="'.$row['ID_Empresa'].'">'.utf8_encode($row['Nombre']).'</option>';
                                  }
								  echo '</select>';
								  echo "<input type='hidden' name='idReunion' value='".$_GET['id']."'>";
								  
								  ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <?php
                                                echo "<button type='submit' class='btn btn-primary'>Agregar</button>";
												?>
                    </form>

                </div>
            </div>
        </div>
    </div>


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