<?php require_once 'templates/head.php'; ?>
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

 ?>

<div class="container-fluid text-center" style="background: gray;">
  <br><br>
  <div>
    <div>
	
	 <!-- Top content -->
        <div class="top-content">
            <div class="container">
                
              
                
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-ms-offset-10 col-md-offset-2  abs-center" style="position:static;">
                    	<form role="form" action="" method="post" class="f1">

                    		<h3>Solicitud de transporte</h3>
                    		<p>Programa Oportunidades</p>

                    <!--Step Progress opciones-->
                    		<div class="f1-steps">
                    			<div class="f1-progress">
                    			    <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                    			 </div>
                    			  <div class="f1-step active">
		                            <div class="f1-step-icon"><i class="fa fa-coins"></i></div>
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

                    <!--COSTOS DE TRANSPORTE-->	
                    		<fieldset>


                    		   <br> <h4>Costos de transporte</h4> <br>
                    			
                    			<h5 class="card-header h5 bg-light" style="color: black;">Transporte Publico

                                    <span class="float-right">  
                                      <button type="button" class="btn btn-danger px-3" data-toggle="modal" data-target="#ModalCosto">
                                        <i class="fas fa-bus" ></i>
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
                                      

                                    </tbody>        
                                  </table> 
                                  </div> 


                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-next">Siguiente</button>
                                </div>

                            </fieldset>

                    <!--FIN COSTOS DE TRANSPORTE-->	



					
                    <!--HORARIO DE UNIVERSIDAD-->	
			
                            <fieldset>
                                <br> <h4>Horario </h4> <br>
                    			
                    			<h5 class="card-header h5 bg-light" style="color: black;">Transporte Publico

                                    <span class="float-right">  
                                      <button type="button" class="btn btn-danger px-3" data-toggle="modal" data-target="#ModalCosto2">
                                        <i class="fas fa-bus" ></i>
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
                                            <th scope="col">Dia</th>
                                            <th scope="col">Hora Inicio</th>
                                            <th scope="col">Hora Finalizacion</th>
                                            <th scope="col">Eliminar</th>
                                          </tr>
                                        </tr>
                                      </thead>
                                    
                                    <tbody>
                                      

                                    </tbody>        
                                  </table> 
                                  </div> 


                                <div class="f1-buttons">
                                    
                                    <button type="button" class="btn btn-previous">Anterior</button>
                                    <button type="button" class="btn btn-next">Siguiente</button>
                                </div>

                            </fieldset>

                     <!--FIN HORARIO DE UNIVERSIDAD-->


                     <!--DOCUMENTO SOCIOECONOMICO-->	

                            <fieldset>
                                <h4>Documento socioeconmico:</h4>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-facebook">Facebook</label>
                                    <input type="text" name="f1-facebook" placeholder="Facebook..." class="f1-facebook form-control" id="f1-facebook">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-twitter">Twitter</label>
                                    <input type="text" name="f1-twitter" placeholder="Twitter..." class="f1-twitter form-control" id="f1-twitter">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-google-plus">Google plus</label>
                                    <input type="text" name="f1-google-plus" placeholder="Google plus..." class="f1-google-plus form-control" id="f1-google-plus">
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" class="btn btn-submit">Submit</button>
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

