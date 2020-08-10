<?php require_once 'templates/head.php'; ?>
<title>Indicaciones transporte</title>
 <link rel="stylesheet" href="assets1/css1/style.css">
<?php  
  
  //Manda  allamar plantillas
  require_once 'templates/header.php';

  require_once 'templates/MenuVertical.php';

  require_once 'templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';

 ?>

<!--div principal-->
<div class="container-fluid text-center"><br>
  <!--Navbar-->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">Creación de empresa</a>

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
        <a class="nav-link active" href="SIT-CrearEmpresas.php">Materias</a>
      </li>
       <li class="nav-item">
        <a class="nav-link " href="SIT-CrearEmpresas.php">Comprobante</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="SIT-CrearCarrera.php">Notas</a>
      </li>
     
    </ul>
    <!-- Links -->   
  </div>
  <!-- Collapsible content -->
</nav>
<!--/.Navbar-->
  
  <div>

    <div>

                             
        <div class="container" style="background: white; "><br>

          <h2 style="color: #BF3E3E;">Inscripción Materias</h2>
          
           <div class="row">
             
              <!--Primera columna-->
                  <div class="col-sm" style="color: #343434;">


                          <span class="float-right">  
                              <button type="button" class="btn btn-danger px-3" data-toggle="modal" data-target="#ModalMateria"><i class="fas fa-book"></i>  Inscribir Materia</button>

                          </span>
                           <br> <br><br>
                        
                     
                      
                      
                       <table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
                           <thead class="table-dark">
                               <tr>  
                                    <th scope="col">Codigo</th>
                                   <th scope="col">Ciclo </th>
                                    <th scope="col">Asignatura</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Opciones</th>
                                   </tr>
                               </tr>
                           </thead>
                                    
                           <tbody>

                          


      
    

                           </tbody>        
                          </table>

                          <br><br><br> 

                            
                          <br> 
                         
                           <!--div class="f1-buttons">
                                    
                                   
                                    <button type="button" class="btn btn-next btn-dark">Enviar</button>
                          </div-->
                          <br>


                   </div>

               <!-- Fin Primera columna-->

       


                 
         

     
                      
                      
          

                       <br>
      


             
    
           </div> <!--Fin de row-->


         </div><!--Fin de container-->

       </div> 

     </div>
  </div> 
  <br>
  <br>
</div><!-- Fin de div principal-->

<!-- /#page-content-wrapper -->


                   <!--MODALS-->
                      <div class="hidden" >




                      <!-- MODAL Materias -->
                      <!--**************-->

                      <div class="modal fade " id="ModalMateria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content" >
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ruta</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <form action="Modelo/ModeloMaterias/GuardarMaterias.php" method="POST" accept-charset="utf-8">
                          <div id="alerta5"></div>
                          <div class="col">


                            <div class="form-group">
                                <label class="sr-only" for="ciclo">Ciclo Pensum</label>
                                <input type="text" name="ciclo" placeholder="Ciclo" class="ciclo form-control" id="ciclo">
                                                    
                              </div>

                            <div class="form-group">
                                <label class="sr-only" for="nombremateria">Nombre de materia</label>
                                <input type="text" name="nombremateria" placeholder="Nombre de materia" class="nombremateria form-control"  id="nombremateria">
                            </div>


                             
                               <div class="form-group">
                                <label class="sr-only" for="matricula">Matricula</label>
                                <input type="text" name="matricula" placeholder="Matricula" class="matricula form-control" id="matricula">
                                                    
                              </div>
                            
                           

                            <input type="hidden" name="expedienteu" value="<?php echo $idExpedienteU;?>"> 
                            

                          </div>

                          <input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0"    type="submit" name="Guardar_Materia" value="Agregar Materia " id="Guardar_Materia">
                        </form>       
                          
                      </div>
                    </div>
                  </div>

                <!-- FIN MODAL COSTOS -->
                 <!--**********************-->   
                        

                </div> 
             <!--fin contenedor modals costo-->







</div>

</div>

<!-- /#wrapper -->





 <?php

  require_once 'templates/footer.php';

?>