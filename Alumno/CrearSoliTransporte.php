
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

?>

<!--ESTRUCTURA PAGINA PRINCIPAL-->
<!--***************************-->



<div class="container-fluid text-center"  style="background: gray;">
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

                    		<h3>Solicitud de transporte ciclo <?php echo  $obtenerCiclo; ?></h3>
                    		<p>Programa Oportunidades FGK</p>

                    <!--Step Progress opciones-->
                    <!--**********************-->
                    		<div class="f1-steps">
                    			<div class="f1-progress">
                    			    <div class="f1-progress-line"  data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                    			 </div>
                    			  <div class="f1-step active">
		                            <div class="f1-step-icon"><i class="fa fa-bus-alt"></i></div>
		                            <p>Rutas</p>
		                          	</div>
                                
		                          <div class="f1-step">
		                            <div class="f1-step-icon"><i class="fa fa-calendar"></i></div>
		                            <p>Horarios</p>
		                          </div>
		                            <div class="f1-step">
		                            <div class="f1-step-icon"><i class="fa fa-file-invoice-dollar"></i></div>
		                            <p>Costos</p>
		                          </div>
		                    		</div>
                   <!--******************************************************************************************************************-->



                     <!--COSTOS DE TRANSPORTE-->  
                    <!--*********************-->
                        <fieldset>


                           <br>  
                          
                        <h5 class="card-header h5 bg-light" style="color: black;">Rutas
                              <br>

                          <span class="float-right">  <br>
                              <button type="button" class="btn btn-dark px-3" data-toggle="modal" data-target="#ModalCosto"><i class="fas fa-bus-alt"></i>  Nueva Ruta</button>
                          </span>
                        </h5>
                        <br><br><br>
   

        <!--Tabla de rutas de  trasnporte-->
                  <div class="table-responsive">
                       <table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
                           <thead class="table-dark">
                               <tr>  
                                   <th scope="col">id</th>
                                   <th scope="col">Ruta</th>
                                   <th scope="col">Costo</th>
                                   <th scope="col">Observaciones</th>
                                   <th scope="col">Eliminar</th>
                                   </tr>
                               </tr>
                           </thead>
                                    
                           <tbody>
                              <?php 
                              //mostrar las rutas dependiendo del usuario que lo haga
                               $consulta=$pdo->prepare("SELECT * FROM rutasbuses WHERE idSoliTrans = ? ");
                               $idTransporte = $_GET['id'];
 
                              
                                    //evalua la consulta
                                   $consulta->execute(array($idTransporte));

                                     if ($consulta->rowCount()>=1)
                                      {
                                        while ($fila=$consulta->fetch())
                                          {   echo "
                                        <tr class='table-light'>
                                        <th>".$fila['idRuta']."</th>
                                        <th>".$fila['nombreruta']."</th>
                                        <th>".$fila['costo']."</th>
                                        <th>".$fila['observacion']."</th>
                                       
                                        
                                        <td><center><a href='Modelo/ModeloRutas/EliminarRuta.php?id=".$fila['idRuta']."&id2=". $_GET['id']."' class='fas fa-trash  btn btn-danger'></a></center></td>
                                        </tr>"; 

                                      }
                                    }

                                   ?>

                               </tbody>        
                             </table> 
                         </div><!--fin de tabla rutas--> 


                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-next btn-secondary">Siguiente</button>
                                </div>

                    </fieldset>

                    <!--FIN RUTAS DE TRANSPORTE--> 
                    <!--****************************************************************************************************************************-->


                     <!--HORARIO DE UNIVERSIDAD-->  
                    <!--***********************-->
      
                            <fieldset>
                                <br>
                          
                         <h5 class="card-header h5 bg-light" style="color: black;">Horario

                                    <span class="float-right">  
                                      <button type="button" class="btn btn-dark px-3" data-toggle="modal" data-target="#ModalHorario">
                                        <i class="fas fa-calendar-alt" ></i>
                                        Nuevo horario
                                      </button>
                                    </span><br>
                                  </h5>
                                  <br>


                            <div class="table-responsive">
                                      <table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
                                                  <thead class="table-dark">
                                                    <tr>  
                                                      <th scope="col">id</th>
                                                    
                                                      <th scope="col">Dia</th>
                                                      <th scope="col">Hora Inicio</th>
                                                      <th scope="col">Hora Finalizacion</th>
                                                      <th scope="col"><input type="text" name=""></th>
                                                      <th scope="col">Eliminar</th>
                                                    </tr>
                                                  </tr>
                                                </thead>
                                              
                                              <tbody>

                                 <?php 
                                      // Consulta De La BASE DE DATOS
                                      $consulta2=$pdo->prepare("SELECT * FROM `horariotransporte` WHERE `idSoliTrans` = ?");
                      
                                        
                                        $idTransporteh = $_GET['id'];


                                        $consulta2->execute(array($idTransporteh));

                                          if ($consulta2->rowCount()>=1)
                                          {
                                           while ($fila2=$consulta2->fetch())
                                             {   echo "
                                               <tr class='table-light'>
                                                <th>".$fila2['idHorarioTrans']."</th>  
                                                <th>".$fila2['dia']."</th>
                                                <th>".$fila2['horaEntrada']."</th>
                                                <th>".$fila2['horaSalida']."</th>
                                                <th>".$fila2['observacionH']."</th>
                                                <td><center><a href='Modelo/ModeloHorario/EliminarHorario.php?id=".$fila2['idhorario']."&id2=". $_GET['id']."' class='fas fa-trash  btn btn-danger'> </a></center></td>
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




                     <!--COSTOS-->  
                     <!--************************-->

                            <fieldset>
                                
                          
                         <h5 class="card-header h5 bg-light" style="color: black;">Costos

                                    <span class="float-right">  
                                      <button type="button" class="btn btn-dark px-3" data-toggle="modal" data-target="#ModalHR">
                                        <i class="fas fa-donate" ></i>
                                        Nuevo Costo
                                      </button>
                                    </span><br>
                                  </h5>
                                  <br>


                            <div class="table-responsive">
                                      <table  id="tableUser1" class="table table-hover table-sm table-bordered table-fixed" >
                                                  <thead class="table-dark">
                                                    <tr>  
                                                      <th scope="col">Ruta</th>
                                                    
                                                      <th scope="col">Costo</th>
                                                      <th scope="col">Dia</th>
                                                      
                                                      <th scope="col">Hora Entrada</th>
                                                      <th scope="col">Hora Salida</th>
                                                      <th scope="col">Cantidad</th>
                                                      <th scope="col">Total</th>
                                                      <th scope="col">Opcion</th>
                                                    </tr>
                                                  </tr>
                                                </thead>
                                              
                                              <tbody>

                                                  <?php 
                                   //mostrar datos de las tablas  rutasbuses, horarios en rutas_horarios
                                      $consulta5=$pdo->prepare("SELECT RH.idHorarioTrans,RH.idRuta, RB.nombreruta , RB.costo ,HT.dia ,HT.horaEntrada , HT.horaSalida ,cantidad FROM ruta_horario RH INNER JOIN horariotransporte HT ON RH.idHorarioTrans = HT.idHorarioTrans LEFT JOIN rutasbuses RB on RH.idRuta = RB.idRuta WHERE HT.idSoliTrans = ?");
                                      $datostrans = $_GET['id'];

                                      

                                      $consulta5->execute(array($datostrans));

                                      if ($consulta5->rowCount()>=1)
                                      {
                                        while ($fila=$consulta5->fetch())
                                          {     
                                        $TotalCosto = ($fila['costo'] * $fila['cantidad']);

                                            echo "
                                        <tr class='table-light'>
                                        <th>".$fila['nombreruta']."</th>
                                        <th>".$fila['costo']."</th>
                                        <th>".$fila['dia']."</th>
                                        <th>".$fila['horaEntrada']."</th>
                                        <th>".$fila['horaSalida']."</th>
                                        <th>".$fila['cantidad']."</th>
                                        <th>".$TotalCosto."</th>
                          <td><center><a href='Modelo/ModeloCostos/EliminarCostos.php?id=".$fila['idHorarioTrans']."&id2=". $fila['idRuta']."&id3=".$_GET['id']."' class='fas fa-trash  btn btn-danger'></a></center></td>
                                        </tr>";



                                      }
                                    }

                                    

                                 ?>
                              </tbody>        
                             </table> 

                              
                             </div> <br><br>
                              <div class="alert alert-secondary" role="alert">
                                   <h4>Costo total: $ <?php echo  $totolTransporte;?> </h4>
                                  </div>
                                  


                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous btn-secondary">Anterior</button>
                                    
                                    <button type="button" class="btn btn-previous btn-secondary" onclick="location.href='DetallesSolicitud.php?id=<?php echo $alumno; ?>'">Terminar</button>
                              </div> 

                            </fieldset>
                            <br>
                	     </form>
                       


                    </div>

                </div>
                    
            </div>
        </div>




    </div>

  </div>
  
</div>





<!-- /#page-content-wrapper -->



</div>

</div>


                  <!--MODALS-->
                      <div class="hidden" >




                      <!-- MODAL RUTAS -->
                      <!--**************-->

                      <div class="modal fade " id="ModalCosto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content" >
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ruta</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <form action="Modelo/ModeloRutas/GuardarRutas.php" method="POST" accept-charset="utf-8">
                          <div id="alerta5"></div>
                          <div class="col">

                            <div class="form-group">
                                <label class="sr-only" for="nombreruta">Nombre de ruta</label>
                                <input type="text" name="nombreruta" placeholder="Nombre de ruta" class="nombreruta form-control"  id="nombreruta">
                            </div>


                             <div class="form-group">
                                <label class="sr-only" for="costo">Costo</label>
                                <input type="text" name="costo" placeholder="Costo" class="costo form-control" id="costo">
                                                    
                              </div>
                            


                              <div class="form-group">
                                   <label class="sr-only" for="observaciones">Observaciones</label>
                                   <textarea name="observaciones" placeholder="Observaciones" 
                                    class="observaciones form-control" id="observaciones"></textarea>
                              </div>

                            <input type="hidden" name="solicitud" value="<?php echo $_GET['id'];?>"> 
                            

                          </div>

                          <input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="Guardar_Ruta" value="Crear Ruta" id="Guardar_Ruta">
                        </form>       
                          
                      </div>
                    </div>
                  </div>

                <!-- FIN MODAL RUTAS -->
                 <!--**********************-->   
                        

                </div> 
             <!--fin contenedor modals rutas-->




            <!--Inicio de contenedor modals horario-->
                <div class="hidden">
                  
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
                                    
                                       


                                   <div class="form-group">
                                        <select id="dia" name="dia" class="form-control" required>
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

                                   

                                  <div class="form-group">
                                     <label class="sr-only" for="observaciones">Comentario</label>
                                     <textarea name="Comentario" placeholder="Comentario" 
                                      class="Comentario form-control" id="Comentario"></textarea>
                                </div>                       


                              <!--idsolicitudTrans-->
                                 <input type="hidden" name="solitrans" value="<?php echo $_GET['id'];?>"> 
     


                                     
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
                </div>
                <!--Fin de contenedor modals horario-->




            <!--Inicio de contenedor modals horario_ruta-->
                <div class="hidden">
                  
                     <!-- MODAL HORARIO _RUTA_HORARIO-->
                          <!--**************-->
                          <div class="modal fade" id="ModalHR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Costo</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="Modelo/ModeloCostos/GuardarCostos.php" method="POST"> 

                              <!--Select horario-->
                                    <?php 
                                          // Consulta De La BASE DE DATOS
                                          $consulta2=$pdo->prepare("SELECT idHorarioTrans , dia , horaEntrada , horaSalida FROM horariotransporte WHERE idSoliTrans = ?");
                                          $iduser2 = $_GET['id'];
                                          $consulta2->execute(array($iduser2));
                                        ?>

                                        <div class="form-group">
                                            <select id="horariot" name="horariot" class="form-control" required>
                                                <option value="" disabled selected > seleccione Horario</option>
                                                <?php 

                                                  if ($consulta2->rowCount()>=1)
                                                    {
                                                      while ($fila2=$consulta2->fetch())
                                                        {   
                                                          echo "<option value=".$fila2['idHorarioTrans'].">".$fila2['dia']."-".$fila2['horaEntrada']."-".$fila2['horaSalida'];"</option>";
                                                    }
                                                  }

                                                  ?>

                                        </select>


                                          <input type="hidden" name="solitrans" value="<?php echo $_GET['id'];?>"> 
     
                                    </div>
                                    




                                    <!--Select rutas-->
                                    <?php 
                                          // Consulta De La BASE DE DATOS
                                          $consulta4=$pdo->prepare("SELECT idRuta , nombreruta FROM rutasbuses WHERE idSoliTrans = ?;");
                                          $rutasid = $_GET['id'];
                                          $consulta4->execute(array($rutasid));
                                        ?>

                                        <div class="form-group">
                                            <select id="rutast" name="rutast" class="form-control" required>
                                                <option value="" disabled selected > seleccione ruta</option>
                                                <?php 

                                                  if ($consulta4->rowCount()>=1)
                                                    {
                                                      while ($fila4=$consulta4->fetch())
                                                        {   
                                                          echo "<option value=".$fila4['idRuta'].">".$fila4['nombreruta']."</option>";
                                                    }
                                                  }

                                                  ?>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                     <label class="sr-only" for="cantidad">Cantidad</label>
                                      <input type="text" name="cantidad" placeholder="cantidad" class="Cantidad form-control"  id="cantidad">
                                     </div>
     
                              

                              <!--idsolicitudTrans-->
                                 <input type="hidden" name="solitrans" value="<?php echo $_GET['id'];?>"> 
     


                                     
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                  <input type="submit" name="Guardar_costo" value="Registrar costo" class="btn btn-primary">
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>

                          <!-- FIN MODAL HORARIO -->
                          <!--******************-->
                </div>
                <!--Fin de contenedor modals horario-->



<!--Archivos js-->
 <script src="assets1/js1/jquery.backstretch.min.js"></script>
 <script src="assets1/js1/retina-1.1.0.min.js"></script>
 <script src="assets1/js1/scripts.js"></script>

 <!-- Fin de Archivos js-->

 <?php

  require_once 'templates/footer.php';

?>