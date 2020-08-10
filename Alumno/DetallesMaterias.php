	

<?php 

  require_once "../BaseDatos/conexion.php";



?>

	<?php require_once 'templates/head.php'; ?>
<title>Inicio</title>
 <link rel="stylesheet" href="assets1/css1/style.css">
<?php  
	
	//Manda  allamar plantillas
  require_once 'templates/header.php';

  require_once 'templates/MenuVertical.php';

  require_once 'templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';



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

<div class="container-fluid text-center">
  <br><br>
  <div>
    <div>
	
	
<!--AqUI VA TODO -->

 <div class="row justify-content-center">

        <div class="col-md-12 col-ms-offset-10 col-md-offset-2  abs-center" style="position:static;">

<form style="background: white;">
	<h2 style="color: red;">Detalles de solicitud Materia</h2>


	<center><fieldset style="width: 95%;   "  >
		<br><br>
		<div class="table-responsive" style="background: #383131; ">
							<caption><h5 style="color: white;">Materias Inscritas </h5></caption>
                    			  <table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" name="idA" style="margin-left: 5px;margin-right: 5px; width: 95%;">
                                        <thead class="table-secondary">
                                          <tr>  
                                          
                                            <th scope="col">Asignatura</th>
                                            <th scope="col">Teorico</th>
                                            <th scope="col">Laboratorio</th>
                                            
                                          </tr>
                                        </tr>
                                      </thead>
                                    
                                    <tbody>


                                      <?php 
                                      // Consulta De La BASE DE DATOS
                                      $consulta=$pdo->prepare("SELECT * FROM materia WHERE ID_Alumno = ? AND estado = 'Proceso'");
                                      $iduser = $_GET['id'];

                                     

                                      $consulta->execute(array($iduser));

                                      if ($consulta->rowCount()>=1)
                                      {
                                        while ($fila=$consulta->fetch())
                                          {   echo "
                                        <tr class='table-light'>
                                      
                                        <th>".$fila['materia']."</th>
                                        <th>".$fila['grupoT']."</th>
                                        <th>".$fila['grupoL']."</th>
                                        
                                        
                                        </tr>";

                                       



                                      }
                                    }

                                      ?>

                                      



                                    </tbody>        
                                  </table>
                                  </div> 



		

	</fieldset>
</center>
<br><br>

	<fieldset style="width: 60%; margin-left: 10px; ">

      <div class="table-responsive" style="background: #383131;">
      		<caption><h5 style="color: white;">Horario</h5></caption>
                 <table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" style="margin-left: 10px;margin-right: 5px; width: 95%;">
                      <thead class="table-secondary">
                         <tr>  
                             
                              <th scope="col">Ruta</th>
                              <th scope="col">Dia</th>
                              <th scope="col">Hora Inicio</th>
                              <th scope="col">Hora Finalizacion</th>
                                                     
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
	                              <th>".$fila2['dia']."</th>
	                              <th>".$fila2['horaentrada']."</th>
	                              <th>".$fila2['horasalida']."</th>
	       
	                              </tr>";

	                               


	                               }
                             }

                        ?>
                         
                     </tbody>
                 </table> 
          </div> 



		<br>

        <div class="f1-buttons">
                                    
            <button type="button" class="btn btn-previous btn-dark" onclick="location.href='CrearSoliTransporte.php?id=<?php echo $alumno; ?>'">Regresar</button>
                                    

         
           <!-- Button trigger modal -->
		<button type="button" class="btn btn-danger px-4" data-toggle="modal" data-target="#exampleModalCenter" >  Enviar </button>
		
		

       </div>

		
	</fieldset>
	
<br>



</form>

</div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLongTitle">¿Esta seguro que quiere enviar la solicitud?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="justify">
       Una vez pase a la siguiente fase todas sus acciones seran definitivas y no podra modificar los datos ingresados.

       <h6></h6>
       <br>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark " data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger">Guardar Cambios</button>
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

<!-- /#wrapper -->





 <?php

  require_once 'templates/footer.php';

?>