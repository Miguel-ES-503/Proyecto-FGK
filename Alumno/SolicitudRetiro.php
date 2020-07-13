<?php 

  require_once "../BaseDatos/conexion.php";



?>

<?php 
require_once 'templates/head.php'; ?>
<title>Inicio</title>
 <link rel="stylesheet" href="assets1/css1/style.css">
 <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
 <link rel="stylesheet" href="assets1/css1/style.css">
 <style type="text/css">
 	
 	
 </style>
<?php  
	
	//Manda  allamar plantillas
  require_once 'templates/header.php';

  require_once 'templates/MenuVertical.php';

  require_once 'templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';


  //Consulta para la esxtraccion de datos ALUMNO 

  setlocale(LC_TIME, 'es_SV.UTF-8');

  //Extraemos el carnet del estudiante
  $stmt1 =$dbh->prepare("SELECT `ID_Alumno`, `ID_Empresa` FROM `alumnos` WHERE correo='".$_SESSION['Email']."'");
  // Ejecutamos
  $stmt1->execute();

  while($fila = $stmt1->fetch()){
      $alumno=$fila["ID_Alumno"];
      $universidad=$fila["ID_Empresa"];
  }

 //FIN CONSULTA *****************************

 ?>



                    <!-- MODAL HORARIO -->
                          <!--**************-->
                          <div class="modal fade" id="ModalHorario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Horario</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="Modelo/ModeloHorario/GuardarHorario.php" method="POST"> 
                                        <?php 
                                          // Consulta De La BASE DE DATOS
                                          $consulta2=$pdo->prepare("SELECT * FROM rutasbuses WHERE ID_Alumno = ? AND estadox = 'Proceso'");
                                          $iduser2 = $_GET['id'];
                                          $consulta2->execute(array($iduser2));
                                        ?>

                                        <div class="form-group">
                                            <select id="duracion" name="rutas" class="form-control" required>
                                                <option value="" disabled selected >Seleccione una ruta</option>
                                                <?php 

                                                  if ($consulta2->rowCount()>=1)
                                                    {
                                                      while ($fila2=$consulta2->fetch())
                                                        {   
                                                          echo "<option value=".$fila2['id'].">".$fila2['ruta']."</option>";
                                                    }
                                                  }

                                                  ?>

                                        </select>
                                    </div>


                                   <div class="form-group">
                                        <select id="duracion" name="duracion" class="form-control" required>
                                          <option value="" disabled selected >Seleccione un dia</option>
                                          <option value="Lunes">Lunes</option>
                                          <option value="Martes">Martes</option>
                                          <option value="Miercoles">Miercoles</option>
                                          <option value="Jueves">Jueves</option>
                                          <option value="Viernes">Viernes</option>
                                          <option value="Sabado">Sabado</option>
                                          
                                        </select>
                                    </div>


                                     <div class="form-group">
                                           <input type="time" id="appt" name="horainicio" class="form-control" min="06:00" max="20:00" required >

                                      <small>Ingrese la hora de entrada</small>

                          
                                    </div>


                                     <div class="form-group">
                                    <input type="time" id="appt" name="horafinal" min="06:00" max="20:00" required class="form-control">

                                     <small>Ingrese la hora de salida</small>
                                    </div>

                                     <input type="hidden" name="iduser" value="<?php echo $_GET['id'];  ?>">
                                     <?php echo $obtenerCiclo; ?>

                                              <?php

                                              $fechaActual=date("Y-m-d");
                                              $consulta3=$pdo->prepare("SELECT ID_Ciclo FROM ciclos WHERE Fechanicio<= ? AND FechaFinal>= ? ");
                                              $consulta3->execute(array($fechaActual , $fechaActual));

                                              $obtenerCiclo;

                                                    if ($consulta3->rowCount()>=0)
                                                      {
                                                        while ($fila3=$consulta3->fetch())
                                                          {   
                                                             $obtenerCiclo = $fila3['ID_Ciclo'];
                                                          }
                                                    }

                                               ?>

                                     <input type="hidden" name="ciclo" value="<?php echo  $obtenerCiclo;  ?>">

                                     
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                  <input type="submit" name="crear_Horario" value="Registrar horario" class="btn btn-primary">
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>

                          <!-- FIN MODAL HORARIO -->
                          <!--******************-->





<!--ESTRUCTURA PAGINA PRINCIPAL-->
<!--***************************-->



<div class="container-fluid text-center" style="background: gray;">
  <br><br>
  <div>
    <div>
	
	 <!-- Top content -->
        <div class="top-content">
            <div class="container">
                
              
                
    <div class="row justify-content-center">
        <div class="col-md-10 col-ms-offset-10 col-md-offset-2  abs-center" style="position:static;">

          <!--********INICIO FORM PRINCIPAL***************-->
    	<form role="form"  class="f1" action="Modelo/ModeloTransporte/subirComprobante.php"  method="POST" accept-charset="utf-8" enctype="multipart/form-data">

                    		<h3>Solicitud de Retiro asignaturas ciclo <?php echo  $obtenerCiclo; ?></h3>
                    		<p>Programa Oportunidades FGK</p>

                    <!--Step Progress opciones-->
                    <!--**********************-->
                    		<div class="f1-steps">
                    			<div class="f1-progress">
                              <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                           </div>
                            <div class="f1-step active">
                                <div class="f1-step-icon"><i class="fa fa-ban "></i></div>
                                <p>Retiros</p>
                                </div>
                              <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-lightbulb"></i></div>
                                <p>Plan</p>
                              </div>
                                <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-file"></i></div>
                                <p>Carta</p>
                              </div>
                            </div>
                   <!--******************************************************************************************************************-->
      


  

                    <!--COSTOS DE TRANSPORTE-->	
                    <!--*********************-->
                    		<fieldset>


                    		   <br> <h4>Costos de transporte</h4> <br>
                    			
                    			<h5 class="card-header h5 bg-light" style="color: black;">Transporte Publico

                                     <span class="float-right">  
                                      <button type="button" class="btn btn-dark px-3" data-toggle="modal" data-target="#ModalRetiro">
                                        <i class="fas fa-ban" ></i>
                                        Hacer retiro
                                      </button>
                                    </span>
                                  </h5>
                                  <br>


                  <div class="table-responsive">
                            <table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
                                        <thead class="table-secondary">
                                          <tr>  
                                            <th scope="col">#</th>
                                            <th scope="col">Asignatura</th>
                                            <th scope="col">Nota</th>
                                            <th scope="col">Motivo</th>
                                          
                                            <th scope="col">Eliminar</th>
                                          </tr>
                                        </tr>
                                      </thead>
                                    
                                    <tbody>


                                      <?php 
                                      // Consulta De La BASE DE DATOS
                                     /* $consulta=$pdo->prepare("SELECT * FROM materia WHERE ID_Alumno = ? AND estado = 'Proceso'");
                                      $iduser = $_GET['id'];

                                     

                                      $consulta->execute(array($iduser));

                                      if ($consulta->rowCount()>=1)
                                      {
                                        while ($fila=$consulta->fetch())
                                          {   echo "
                                        <tr class='table-light'>
                                        <th>".$fila['ID_Materia']."</th>
                                        <th>".$fila['materia']."</th>
                                        <th>".$fila['grupoT']."</th>
                                        <th>".$fila['grupoL']."</th>
                                        <th>".$fila['']."</th>
                                        
                                        <td><center><a href='Modelo/ModeloMaterias/EliminarMaterias.php?id=".$fila['ID_Materia']."&id2=". $_GET['id']."' class='fas fa-trash  btn btn-danger'></a></center></td>
                                        </tr>";

                                        $total = $costo * $cantidad;

                                      $totolTransporte = $fila['total'] +  $totolTransporte;


                                      }
                                    }*/

                                      ?>

                                      



                                    </tbody>        
                                  </table> 
                                  </div> 

                                  <!--div class="alert alert-secondary" role="alert">
                                   <h4>Costo total: $ <?php echo  $totolTransporte;?> </h4>
                                  </div-->


                                


                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-next btn-secondary">Siguiente</button>
                                </div>

                            </fieldset>
                    <!--FIN COSTOS DE TRANSPORTE-->	
                    <!--****************************************************************************************************************************-->



					  <!--PLAN ESTRATEGICO--> 
                    <!--***********************-->
      
                            <fieldset>
                                <br> <h4>Plan estrategico </h4> <br>
                          
                          <h5 class="card-header h5 bg-light" style="color: black;">Ciclo  <?php echo  $obtenerCiclo; ?>

                                    <span class="float-right">  
                                      <button type="button" class="btn btn-dark px-3" data-toggle="modal" data-target="#ModalHorario">
                                        <i class="fas fa-lightbulb" ></i>
                                        Nuevo Plan
                                      </button>
                                    </span>
                                  </h5>
                                  <br>


                            <div class="table-responsive">
                                      <table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
                                                  <thead class="table-secondary">
                                                    <tr>  
                                                      
                                                      <th scope="col">Plan</th>
                                                      <th scope="col">Eliminar</th>
                                                    </tr>
                                                  </tr>
                                                </thead>
                                              
                                              <tbody>

          <?php 
                                      // Consulta De La BASE DE DATOS
                     $consulta2=$pdo->prepare("SELECT idhorario ,  B.ruta , dia , horaentrada , horasalida FROM horario H INNER JOIN alumnos A on H.ID_Alumno = A.ID_Alumno LEFT JOIN rutasbuses B on H.id = B.id WHERE A.ID_Alumno = ? AND H.estado='Proceso'");
                      $iduser2 = $_GET['id'];


                            $consulta2->execute(array($iduser2));

                            if ($consulta2->rowCount()>=1)
                            {
                              while ($fila2=$consulta2->fetch())
                                {   echo "
                              <tr class='table-light'>
                           
                              <th>".$fila2['ruta']."</th>
                              
        <td><center><a href='Modelo/ModeloHorario/EliminarHorario.php?id=".$fila2['idhorario']."&id2=". $_GET['id']."' class='fas fa-trash  btn btn-danger'></a></center></td>
                              </tr>";

                               


                               }
                              }


                             ?>

                                      

                                    </tbody>        
                                  </table> 
                                  </div> 
                                  <br><br>


                                <div class="f1-buttons">
                                    
                                    <button type="button" class="btn btn-previous btn-secondary">Anterior</button>
                                    <button type="button" class="btn btn-next btn-secondary">Siguiente</button>
                                </div>

                            </fieldset>

                     <!--FIN HORARIO DE UNIVERSIDAD-->
                     <!--*******************************************************************************************************************************-->




                     <!--DOCUMENTO SOCIOECONOMICO-->	
                     <!--************************-->

                            <fieldset>
                                <h4>Documento socioeconomico:</h4>
                                <div class="form-group">
                                  <br><br>


                       

                                  <div class="form-group">
                                    
                 <input type="file" name="archivo" class="form-control-file"  id="exampleFormControlFile1" accept="application/pdf,application/vnd.ms-excel" >
                                  </div>

                                  <div class="form-group">
                                     <label class="sr-only" for="observaciones">Comentario</label>
                                     <textarea name="Comentario" placeholder="Comentario" 
                                      class="Comentario form-control" id="Comentario"></textarea>
                                </div>

                                 <input type="hidden" name="iduser" value="<?php echo $_GET['id'];  ?>">
                                <input type="hidden" name="ciclo" value="<?php echo  $obtenerCiclo; ?>"> 

                                 <input type="submit" name="comprobante" value="Subir">


                              
                                                                  
                                </div>
                                
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous btn-secondary">Anterior</button>
                                    
                                     <button type="button" class="btn btn-previous btn-secondary" onclick="location.href='DetallesSolicitud.php?id=<?php echo $alumno; ?>'">Terminar</button>
                                    
                                  
                                </div> 
 
                            </fieldset>

                <!-- FIN DOCUMENTO SOCIOECONOMICO-->	

                    	
                    	</form>
                    </div>
                </div>
                    
            </div>
        </div>




    </div>
  </div>
  <br>
  <br>
</div>

<!-- /#page-content-wrapper -->



</div>

</div>



                    <!-- **************MODALS FORM *********************-->
                    <!--************************************************-->


                	    <!-- MODAL RETIROS -->
                	    <!--**************-->

                			<div class="modal fade" id="ModalRetiro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                			  <div class="modal-dialog" role="document">
                			    <div class="modal-content">
                			      <div class="modal-header">
                			        <h5 class="modal-title" id="exampleModalLabel">Retiros</h5>
                			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                			          <span aria-hidden="true">&times;</span>
                			        </button>
                			      </div>
                			      <div class="modal-body">
                              <form action="Modelo/ModeloRetiro/GuardarRetiro.php" method="POST"> 
                                        <?php 
                                          // Consulta De La BASE DE DATOS
                                          $consulta2=$pdo->prepare("SELECT * FROM materia WHERE ID_Alumno = ? AND estado = 'Proceso'");
                                          $iduser2 = $_GET['id'];
                                          $consulta2->execute(array($iduser2));
                                        ?>

                                        <div class="form-group">
                                            <select id="materiaretiro" name="materiaretiro" class="form-control" required>
                                                <option value="" disabled selected >Seleccione materia a retirar</option>
                                                <?php 

                                                  if ($consulta2->rowCount()>=1)
                                                    {
                                                      while ($fila2=$consulta2->fetch())
                                                        {   
                                                          echo "<option value=".$fila2['ID_Materia'].">".$fila2['materia']."</option>";
                                                    }
                                                  }

                                                  ?>

                                        </select>
                                    </div>


                              


                                     <div class="form-group">
                                      <label class="sr-only" for="acumulado">Acumulado</label>
                                           <input type="text" id="appt" name="acumulado" id="acumulado" class="form-control" placeholder="Nota acumulado"  required >

                                     

                          
                                    </div>


                                    <div class="form-group">
                                     <label class="sr-only" for="motivor">Motivo</label>
                                     <textarea name="motivor" placeholder="Motivo de Retiro" 
                                      class="Comentario form-control" id="motivor"></textarea>
                                </div>

                                     

                                    
                      <input type="hidden" name="iduser" value="<?php echo $_GET['id']; ?>"> 
                      <input type="hidden" name="ciclo" value="<?php echo  $obtenerCiclo; ?>"> 


                                     
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                  <input type="submit" name="crear_Retiro" value="Registrar Retiro" class="btn btn-primary">
                                </div>
                                </form>      
                					
                			</div>
                		</div>
                	</div>

                <!-- FIN MODAL RETIRO -->
                 <!--**********************-->






<br>



 <script src="assets1/js1/jquery.backstretch.min.js"></script>
 <script src="assets1/js1/retina-1.1.0.min.js"></script>
 <script src="assets1/js1/scripts.js"></script>

 <?php

  require_once 'templates/footer.php';

?>