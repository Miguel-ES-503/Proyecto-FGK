	

<?php 

  require_once "../BaseDatos/conexion.php";



?>

	<?php require_once 'templates/head.php'; ?>
<title>Inicio</title>
 <link rel="stylesheet" href="assets1/css1/style.css">
 <style>
@media only screen and (min-width: 320px) and (max-width: 767px ) {
 
  .tabla3{

position: relative;
right: 2.7em;
  }

}
   </style>
<?php  
	
	//Manda  allamar plantillas
  require_once 'templates/header.php';


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

  <div>
    <div>
	
	
<!--AqUI VA TODO -->

 <div class="row justify-content-center">
 <div class="title" style="margin-left: -14px; width: 109%;">
<a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Transporte</h2>
	
</div>
        <div class="col-md-12 col-ms-10 col-md-2 col-xs-2  abs-center" style="position:static;">

<form style="background: white; ">
	<h2 style="color: black; ">Detalles de solicitud Transporte</h2>


	<center><fieldset style="width: 95%;"  >
		<br><br>
		<div class="table-responsive" >
							<caption><h5 style="color: white;"></h5></caption>
                    			  <table  id="tableUser" class="table table-sm table-fixed" name="idA" style="margin-left: 5px;margin-right: 5px; width: 95%;">
                                        <thead style="background-color: #2D2D2E; color: white;">
                                          <tr>  
                                            
                                            <th scope="col">Ruta</th>
                                            <th scope="col">Costo</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Total</th>
                                    
                                           
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
                                        <tr style='background-color: #c7c7c7;'>
                                       
                                        <th>".$fila['ruta']."</th>
                                        <th>".$fila['costo']."</th>
                                        <th>".$fila['cantidad']."</th>
                                        <th>$ ".$fila['total']."</th>
                      

                                        
                                        </tr>";



             
                    

              $totolTransporte = $fila['total'] +  $totolTransporte;


                                      }
                                    }

                                      ?>

                                      <tr style="background-color: grey;">
                                      	
                                     <th colspan="6" ><center><b><h5 style="color: black;">Total: $ <?php echo  $totolTransporte;?> </h5></b></center> </th>
                                      
                                      </tr>

                                      

                                    </tbody> 
                                    
                                    	
                                      	
                                     
                                   


                                  </table> 
                                  </div> 



		

	</fieldset>
  <br><br>
  <fieldset style="width: 95%;   "  >
		<br><br>
		<div class="table-responsive" >
							<caption><h5 style="color: white;"></h5></caption>
                    			  <table  id="tableUser" class="table table-sm table-fixed" name="idA" style="margin-left: 5px;margin-right: 5px; width: 95%;">
                                        <thead style="background-color: #2D2D2E; color: white;">
                                          <tr>  
                                            
                                            <th scope="col">Ruta</th>
                                            <th scope="col">Costo</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Total</th>
                                    
                                           
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
                                        <tr style='background-color: #c7c7c7;'>
                                       
                                        <th>".$fila['ruta']."</th>
                                        <th>".$fila['costo']."</th>
                                        <th>".$fila['cantidad']."</th>
                                        <th>$ ".$fila['total']."</th>
                      

                                        
                                        </tr>";



             
                    

              $totolTransporte = $fila['total'] +  $totolTransporte;


                                      }
                                    }

                                      ?>

                                      <tr style="background-color: grey;">
                                      	
                                     <th colspan="6" ><center><b><h5 style="color: black;">Total: $ <?php echo  $totolTransporte;?> </h5></b></center> </th>
                                      
                                      </tr>

                                      

                                    </tbody> 
                                    
                                    	
                                      	
                                     
                                   


                                  </table> 
                                  </div> 



		

	</fieldset>
</center>
<br><br>

	<fieldset style="width: 95%; margin-left: 3.3em ; " class="tabla3">

      <div class="table-responsive" style="">
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



                 <?php


                 $consulta5=$pdo->prepare("SELECT comprobante, ID_Slicitud , Comentario1   FROM solitransporte WHERE ID_Alumno = ? AND estado ='Proceso' ");
                 $consulta5->execute(array($_GET['id']));

                 $obtenerComentario;
                 $idSolic;
                 $comprobante;

                 if ($consulta5->rowCount()>=0)
                 {
                  while ($fila5=$consulta5->fetch())
                  {   
                   $obtenerComentario = $fila5['Comentario1'];
                   $idSolic = $fila5['ID_Slicitud'];
                   $comprobante = $fila5['comprobante'];
                 }
               }

               ?>



          </div> 



		<br>



                                    
            <button type="button" class="btn btn-previous btn-dark" onclick="location.href='CrearSoliTransporte.php?id=<?php echo $alumno; ?>'">Regresar</button>
                                    
<a href="../pdfTransporte/<?php echo $comprobante ; ?>" target="_blank" class="btn " style=" border-radius: 50px; background-color: #9c9c9c; color: white; height: 40px;" > <img src="../SuperUsuario/img/facultad.png" class="img-fluid" style="margin-right: 3px;" width="30px" height="23px"><b>Ver Comprobante</b></a>


           <!-- Button trigger modal -->
		<button type="button" class="btn btn-danger px-4" style=" border-radius: 50px;" data-toggle="modal" data-target="#exampleModalCenter" >  Enviar </button>
		
		

      

		
  </fieldset>
             
	
<br>
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