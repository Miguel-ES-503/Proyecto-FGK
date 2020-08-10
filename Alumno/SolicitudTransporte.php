<?php require_once 'templates/head.php'; ?>
<title>Inicio</title>
 <link rel="stylesheet" href="assets1/css1/style.css">
<?php  
	//Manda  allamar plantillas
  require_once '../templates/header.php';

  require_once '../templates/MenuVertical.php';

  require_once '../templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';
?>



<div class="container-fluid text-center">
  <br><br>
  <div>
    <div>
	
	
<!--AqUI VA TODO -->


<!--ESTRUCTURA PAGINA PRINCIPAL-->
<!--***************************-->

<?php require_once 'templates/head.php'; ?>
<title>Inicio</title>
 <link rel="stylesheet" href="assets1/css1/style.css">
<?php  
  //Manda  allamar plantillas
  require_once '../templates/header.php';

  require_once '../templates/MenuVertical.php';

  require_once '../templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';
?>



<div class="container-fluid text-center">
  <br><br>
  <div>
    <div>
  
  
<!--AqUI VA TODO -->


<!--ESTRUCTURA PAGINA PRINCIPAL-->
<!--***************************-->

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
                              <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                           </div>
                            <div class="f1-step active">
                                <div class="f1-step-icon"><i class="fa fa-file-invoice-dollar"></i></div>
                                <p>Costos</p>
                                </div>
                              <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-calendar"></i></div>
                                <p>Horarios</p>
                              </div>
                                <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-file"></i></div>
                                <p>Documentos</p>
                              </div>
                            </div>
                   <!--******************************************************************************************************************-->
      


  

                    <!--COSTOS DE TRANSPORTE--> 
                    <!--*********************-->
                        <fieldset>


                           <br> <h4>Costos de transporte</h4> <br>
                          
                          <h5 class="card-header h5 bg-light" style="color: black;">Transporte Publico

                                    <span class="float-right">  
                                      <button type="button" class="btn btn-dark px-3" data-toggle="modal" data-target="#ModalCosto">
                                        <i class="fas fa-bus-alt" ></i>
                                        Nueva Ruta
                                      </button>
                                    </span>
                                  </h5>
                                  <br>


                  <div class="table-responsive">
                            <table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
                                        <thead class="table-secondary">
                                          <tr>  
                                            <th scope="col">id</th>
                                            <th scope="col">Ruta</th>
                                            <th scope="col">Costo</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Observaciones</th>
                                            <th scope="col">Eliminar</th>
                                          </tr>
                                        </tr>
                                      </thead>
                                    
                                    <tbody>
                                      <?php 
                                      // Consulta De La BASE DE DATOS
                                      $consulta=$pdo->prepare("SELECT * FROM rutasbuses WHERE ID_Alumno = ? AND estado = 'Proceso'");
                                      $iduser = $_GET['id'];

                                      $totolTransporte = 0;

                                      $consulta->execute(array($iduser));

                                      if ($consulta->rowCount()>=1)
                                      {
                                        while ($fila=$consulta->fetch())
                                          {   echo "
                                        <tr class='table-light'>
                                        <th>".$fila['id']."</th>
                                        <th>".$fila['ruta']."</th>
                                        <th>".$fila['costo']."</th>
                                        <th>".$fila['cantidad']."</th>
                                        <th>$ ".$fila['total']."</th>
                                        <th>".$fila['observaciones']."</th>
                                        <td><center><a href='Modelo/ModeloRutas/EliminarRuta.php?id=".$fila['id']."&id2=". $_GET['id']."' class='fas fa-trash  btn btn-danger'></a></center></td>
                                        </tr>";

                                        $total = $costo * $cantidad;

                                      $totolTransporte = $fila['total'] +  $totolTransporte;


                                      }
                                    }

                                      ?>

                                    </tbody>        
                                  </table> 
                                  </div> 

                                  <div class="alert alert-secondary" role="alert">
                                   <h4>Costo total: $ <?php echo  $totolTransporte;?> </h4>
                                  </div>


                                


                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-next btn-secondary">Siguiente</button>
                                </div>

                            </fieldset>

                    <!--FIN COSTOS DE TRANSPORTE--> 
                    <!--****************************************************************************************************************************-->



          
                    <!--HORARIO DE UNIVERSIDAD--> 
                    <!--***********************-->
      
                            <fieldset>
                                <br> <h4>Horario </h4> <br>
                          
                          <h5 class="card-header h5 bg-light" style="color: black;">Ciclo  <?php echo  $obtenerCiclo; ?>

                                    <span class="float-right">  
                                      <button type="button" class="btn btn-dark px-3" data-toggle="modal" data-target="#ModalHorario">
                                        <i class="fas fa-calendar-alt" ></i>
                                        Nuevo horario
                                      </button>
                                    </span>
                                  </h5>
                                  <br>


                            <div class="table-responsive">
                                      <table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
                                                  <thead class="table-secondary">
                                                    <tr>  
                                                      <th scope="col">id</th>
                                                      <th scope="col">Ruta</th>
                                                      <th scope="col">Dia</th>
                                                      <th scope="col">Hora Inicio</th>
                                                      <th scope="col">Hora Finalizacion</th>
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
                              <th>".$fila2['idhorario']."</th>  
                              <th>".$fila2['ruta']."</th>
                              <th>".$fila2['dia']."</th>
                              <th>".$fila2['horaentrada']."</th>
                              <th>".$fila2['horasalida']."</th>
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

                                  <?php 
                                  if($resutComentario == 1)
                                  {
                                   echo "Ya has ingresado un comprobante pero si desea cambiarlo podras subirlo de nuevo";
                                 }else
                                 {
                                  echo "No hay comprobante ingresado";
                                } 


                                ?>


                                <div class="form-group">
                                    
                 <input type="file" name="archivo" class="form-control-file"  id="exampleFormControlFile1" accept="application/pdf,application/vnd.ms-excel" >
                                  </div>

                                    
                                              <?php

                                              
                                              $consulta5=$pdo->prepare("SELECT ID_Slicitud , Comentario1   FROM solitransporte WHERE ID_Alumno = ? AND estado ='Proceso' ");
                                              $consulta5->execute(array($_GET['id']));

                                              $obtenerComentario;
                                              $idSolic;

                                                    if ($consulta5->rowCount()>=0)
                                                      {
                                                        while ($fila5=$consulta5->fetch())
                                                          {   
                                                             $obtenerComentario = $fila5['Comentario1'];
                                                             $idSolic = $fila5['ID_Slicitud'];
                                                          }
                                                    }

                                               ?>


                                  <div class="form-group">
                                     <label class="sr-only" for="observaciones">Comentario</label>
                                     <textarea name="Comentario" placeholder="Comentario" 
                                      class="Comentario form-control" id="Comentario"><?php echo $obtenerComentario ?></textarea>
                                </div>



                                <input type="hidden" name="iduser" value="<?php echo $_GET['id'];  ?>">
                                <input type="hidden" name="ciclo" value="<?php echo  $obtenerCiclo; ?>"> 

                                
                                
                                <?php 
                                if($resutComentario == 1)
                                {
                                  echo "<input type='hidden' name='idsoli' value='".$idSolic."'>";
                                 echo "<input type='submit' name='actualizar' value='Actualizar' class='btn btn-previous btn-secondary'>";
                                }else
                                {
                                  echo "No has ingresado un comentario";
                                } 



                                ?>

                              
                                                               
                                </div>
                                
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous btn-secondary">Anterior</button>

                                    <?php 

                                    if($resutComentario == 0)
                                    {
                                      echo "<input type='submit' name='comprobante' value='Finalizar' class='btn btn-previous btn-secondary'>";
                                   }else
                                   {
                                      echo "<a href='DetallesSolicitud.php?id=".$_GET['id']."' class='btn btn-previous btn-secondary'>Finalizar</a>";  
                                   } 



                                     ?>
                                    
                                    
                                     
                                    
                                  
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








    </div>
  </div>
  <br>
  <br>
</div>

<!-- /#page-content-wrapper -->



</div>

</div>

<!-- /#wrapper -->






<!--Footer-->
<?php
 require_once 'templates/footer.php';
?>







    </div>
  </div>
  <br>
  <br>
</div>

<!-- /#page-content-wrapper -->



</div>

</div>

<!-- /#wrapper -->






<!--Footer-->
<?php
 require_once 'templates/footer.php';
?>