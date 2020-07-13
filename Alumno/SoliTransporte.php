

<?php 

require_once 'templates/head.php';
require '../Conexion/conexion.php';
    
    $idsoli = $_GET['id'];

 
       //Consulta en la base si exite pdf
  $Consulta12 = $pdo->prepare("SELECT `comprobante` , observacion1 FROM solitransporte WHERE idSoliTrans = ?");
  $Consulta12->execute(array($idsoli));
  $fila=$Consulta12->fetch();
  $ArchivoPDF;
  $ArchivoPDF = $fila['comprobante'];
  $Comentario = $fila['observacion1'];
 

//----------------------------------------------------------------------
//IDA
//----------------------------------------------------------------------    
    // consulta para el calculo de total IDA
       /* $ConsultaTotalI=$pdo->prepare("SELECT SUM(`costo`) as total 
                               FROM rutasbuses 
                               WHERE `idSoliTrans`='?' AND `tipo`='IDA'");

        $ConsultaTotalI->execute(array( $idsoli));

        //variable para calcular costo de ida
        $TotalIda;

        if ($ConsultaTotalI->rowCount() >0)
        {

          while ( $fila6=$ConsultaTotalI->fetch()) {
            # code..
              $TotalIda = $fila6['total'];
 
           }


          

          

        }//fin if ida*/

//-------------------------------------------------------------------------
//REGRESO
//-------------------------------------------------------------------------


     //consulta par el calculo de total REGRESO
       /* $ConsultaTotalR=$pdo->prepare("SELECT SUM(`costo`) as totalR 
                               FROM rutasbuses 
                               WHERE `idSoliTrans`='?' AND `tipo`='REGRESO'");



        $ConsultaTotalR->execute();

        //variable para calcular costo de regreso
        $TotalRegreso = 0;

        if ($ConsultaTotalR->rowCount() >0)
        {
          $fila1=$ConsultaTotalR->fetch();

            if ($fila1['totalR'] != null) {
              $TotalRegreso = $fila1['totalR'];
            }else
            {
              $TotalRegreso = 0;
            }


        }//fin if regreso*/
//-------------------------------------------------------------------






         


?>

<title>Inicio</title>

<?php
  

  require_once 'templates/header.php';

  require_once 'templates/MenuVertical.php';

  require_once 'templates/MenuHorizontal.php';

  


?>


<div class="container-fluid text-center">
  <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>
  <br><br>
  <div class="text-center">

      <h1>Solicitud de transporte</h1>

     
 <!--Inicio del formulario -->       
<fieldset >
  

 <form action="Modelo/ModeloTransporte/insertarDatosT.php" method="post">
<div class="form-row">



    <div class="form-group col-md-4">
      <label for="inputCity">Dia</label>
      <select id="dia" name="dia" class="form-control" required>
        <option selected>Seleccione una opción...</option>
        <option value="Lunes">Lunes</option>
        <option value="Martes">Martes</option>
        <option value="Miercoles">Miercoles</option>
        <option value="Jueves">Jueves</option>
        <option value="Viernes">Viernes</option>
        <option value="Sabado">Sabado</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Horario de Salida</label>
      <input type="time" id="appt" name="horainicio" class="form-control" min="06:00" max="20:00" required  placeholder="Ingrese su horario">
    </div>

    <div class="form-group col-md-4">
      <label for="inputState">Horario de llegada</label>
      <input type="time" id="appt" name="horafinal" class="form-control" min="06:00" max="20:00" required  placeholder="Ingrese su horario">
    </div>
  </div>


  <div class="form-row">
    
     <div class="form-group col-md-4">
      <label for="inputCity">Seleccione ida o regreso</label>
      <select id="tipo" name="tipo" class="form-control" required>
        <option selected>Seleccione una opción...</option>
        <option>IDA</option>
        <option>REGRESO</option>
      </select>
    </div>

    <div class="form-group col-md-4">
      <label for="inputZip">Ruta</label>
      <input type="text" name="nombreruta" class="form-control" id="inputZip" placeholder="Ingrese la ruta" required>
    </div>

    <div class="form-group col-md-4">
      <label for="inputZip">Costo</label>
      <input type="text" name="costo" class="form-control" id="inputZip" placeholder="Ingrese el costo $" required>
    </div>

    <!--idsolicitudTrans-->
    <input type="hidden" name="idSoliT" value="<?php echo $_GET['id'];?>"> 



  </div>

  <br>

  <input type="submit" id="Ingresar_DatosT" name="Ingresar_DatosT" value="Agregar Costo" class="btn btn-secondary">
  
      

</form>
</fieldset>





 <!--Inicio del formulario -->       
<fieldset>
  <br><br>

 <form action="Modelo/ModeloCostos/GuardarCostos.php" method="post">

<div class="form-row">
    <?php

     //Consulta para extraer datos de horario
    $ConsulHorario= $pdo->prepare("SELECT idHorarioTrans, dia, horaEntrada, horaSalida 
                            FROM horariotransporte 
                            WHERE idSoliTrans=?");

    $iduser2 = $_GET['id'];
    $ConsulHorario->execute(array($iduser2));

   
    ?>




    <div class="form-group col-md-4">
      <label for="inputCity">Horario</label>  

      <select id="horario" name="horario" class="form-control" required>
        <option value="" disabled selected>Seleccione Horario..</option>

        <?php

            if ($ConsulHorario->rowCount()>=1) {
              # code...

              while ($filaH=$ConsulHorario->fetch()) {
                # code...

                echo "<option value=".$filaH['idHorarioTrans'].">".$filaH['dia']."-----".$filaH['horaEntrada']."-".$filaH['horaSalida'];"</option>";            }
            }

        ?>
        
      </select>  
      
    </div>

   

    
    <?php

    //Consulta para extraer los datos ingresados a la 
    //tabla rutas buses de solicitud transporte

    $ConsulRutasB= $pdo->prepare("SELECT idRuta, nombreruta, tipo 
                            FROM rutasbuses 
                            WHERE idSoliTrans=?");

    $idSoli2 = $_GET['id'];
    $ConsulRutasB->execute(array($idSoli2));


    ?>

    <!--Select que muestra las rutas ingresadas-->
    <div class="form-group col-md-4">
      <label for="inputCity">Rutas</label>
      <select name="ruta" id="ruta" class="form-control" required>
        <option value="" disabled selected>Seleccione las rutas buses..</option>

        <?php

            if ($ConsulRutasB->rowCount()>=1) {
              # code...

              while ($filaRB=$ConsulRutasB->fetch()) {
                # code...

                echo "<option value=".$filaRB['idRuta'].">".$filaRB['nombreruta']."-----".$filaRB['tipo'];"</option>";            }
            }

        ?>
        
      </select>  
      
    </div>

    <div class="form-group col-md-4">

<br>    
     <input type="submit" id="Guardar_costo" name="Guardar_costo" value="Agregar Horario" class="btn btn-secondary">
    </div>
  </div>





  <!--idsolicitudTrans-->
  <input type="hidden" name="solitrans" value="<?php echo $_GET['id'];?>"> 
     


 
  <br>

  
  
      

</form>
</fieldset>




  <h4 class="float-left">IDA</h4>   
<br><br>  
 <div class="row">
    <div class="col">
      <table class="table table-responsive-lg float-left">
        <thead class="thead-dark">
          <tr>
            
            <th scope="col">Dia</th>
            <th scope="col">Hora Salida</th>
            <th scope="col">Hora de llegada</th>
            <th scope="col">Ruta</th>
            <th scope="col">Costo</th>
            <th scope="col">Tipo</th>


            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody class="bg-light">

          <?php
           $MuestraHorarioR=$pdo->prepare("SELECT DISTINCT RH.idHorarioTrans ,HT.dia ,HT.horaEntrada                           , HT.horaSalida ,RH.idRuta, RB.nombreruta , RB.costo, RB.tipo                             FROM ruta_horario RH 
                                          INNER JOIN horariotransporte HT
                                          ON RH.idHorarioTrans = HT.idHorarioTrans 
                                          INNER JOIN rutasbuses RB 
                                          ON RH.idRuta = RB.idRuta 
                                          WHERE HT.idSoliTrans = ? AND RB.tipo='IDA'");

           $datostrans = $_GET['id'];

                                      
             $MuestraHorarioR->execute(array($datostrans));

               if ($MuestraHorarioR->rowCount()>=1)
               {
                 while ($fila=$MuestraHorarioR->fetch())
                  {   

                  //calculo de total ida  
                    $TotalIda = ($fila['costo'] + $TotalIda);

                     echo "
                         <tr class='table-light'>
                            <th>".$fila['dia']."</th>
                            <th>".$fila['horaEntrada']."</th>
                            <th>".$fila['horaSalida']."</th>
                            <th>".$fila['nombreruta']."</th>
                            <th>".number_format($fila['costo'], 2, '.', '')."</th>
                            <th>".$fila['tipo']."</th>
                            
                            <td><center><a href='Modelo/ModeloCostos/EliminarCostos.php?id=".$fila['idHorarioTrans']."&id2=". $fila['idRuta']."&id3=".$_GET['id']."' class='fas fa-trash  btn btn-danger'></a></center></td>
                         </tr>";



                   }
              }

                                    



          ?>



         



        </tbody>
         <tfoot>
          <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">Total  $<?php echo number_format($TotalIda, 2, '.', '');?></th>
            <th scope="col"></th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>


<h4 class="float-left">REGRESO</h4>   
<br><br>  
 <div class="row">
    <div class="col">
      <table class="table table-responsive-lg float-left">
        <thead class="thead-dark">
          <tr>
            
            <th scope="col">Dia</th>
            <th scope="col">Hora Salida</th>
            <th scope="col">Hora de llegada</th>
            <th scope="col">Ruta</th>
            <th scope="col">Costo</th>
            <th scope="col">Tipo</th>


            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody class="bg-light">

          <?php
          //Consulta para mostrar en tabla todos los datos
           $MuestraHorarioR=$pdo->prepare("SELECT DISTINCT RH.idHorarioTrans ,HT.dia ,HT.horaEntrada                           , HT.horaSalida ,RH.idRuta, RB.nombreruta , RB.costo, RB.tipo                             FROM ruta_horario RH 
                                          INNER JOIN horariotransporte HT
                                          ON RH.idHorarioTrans = HT.idHorarioTrans 
                                          INNER JOIN rutasbuses RB 
                                          ON RH.idRuta = RB.idRuta 
                                          WHERE HT.idSoliTrans = ? AND RB.tipo='REGRESO'");
           //variable para traer el id de la solicitud Transporte
           $datostrans = $_GET['id'];

                                      
             $MuestraHorarioR->execute(array($datostrans));

               if ($MuestraHorarioR->rowCount()>=1)
               {  
                 while ($fila=$MuestraHorarioR->fetch())
                  {     
                    //calculo de total regreso
                    $TotalRegreso = ($fila['costo'] + $TotalRegreso);

                     echo "
                         <tr class='table-light'>
                            <th>".$fila['dia']."</th>
                            <th>".$fila['horaEntrada']."</th>
                            <th>".$fila['horaSalida']."</th>
                            <th>".$fila['nombreruta']."</th>
                            <th>".number_format($fila['costo'], 2, '.', '')."</th>
                            <th>".$fila['tipo']."</th>
                            
                            <td><center><a href='Modelo/ModeloCostos/EliminarCostos.php?id=".$fila['idHorarioTrans']."&id2=". $fila['idRuta']."&id3=".$_GET['id']."' class='fas fa-trash  btn btn-danger'></a></center></td>
                         </tr>";



                   }
              }


          ?>


        </tbody>
         <tfoot>

           <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">Total  $<?php echo number_format($TotalRegreso, 2, '.', ''); ?></th>
            <th scope="col"></th>
          </tr>

          
        </tfoot>
      </table>
    </div>
  </div>



  <br><br>  
 <div class="row">
    <div class="col">
      <table class="table table-responsive-lg float-left">
        <thead class="thead-dark">
          <tr>
            <th scope="col">$Costo ida</th>
            <th scope="col">$Costo Regreso</th>
            <th scope="col">$Total de la semana</th>
            <th scope="col">$Total del mes</th>
            <th scope="col">Comprobante</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody class="bg-light">
          <tr>
            <?php

            //CALCULOS DE TRANSPORTE
            //--------------------------------------

            //calculo de total a la semana $
            $TotalSemanal=$TotalIda+$TotalRegreso;

            //calculo de total mensual
            $TotalMensual=($TotalSemanal*4);


            ?>


            <th scope="col">$<?php echo number_format($TotalIda, 2, '.', '');?></th>
            <th scope="col">$<?php echo number_format($TotalRegreso, 2, '.', ''); ?></th>
            <th scope="col">$<?php echo number_format($TotalSemanal, 2, '.', '');?></th>
            <th scope="col">$<?php echo number_format($TotalMensual, 2, '.', '');?></th>
            <?php 

            if ($ArchivoPDF !=null) {
          echo "<th scope='col'><a href='../pdfTransporte/$ArchivoPDF' class='btn btn-danger' target='_blank'><i class='fas fa-file-pdf' ></i></a></th>";
            }else
            {
          echo "<th scope='col'><button type='button' class='btn btn-danger' disabled><i class='fas fa-file-pdf' ></i></button></th>";
            } 


              if ($ArchivoPDF !=null) {
          echo "<th scope='col'><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Actualizar</button></th>";
            }else
            {
          echo "<th scope='col'><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Subir Comprobante</button></th>";
            } 
             
             ?>
             

            
          </tr>


        </tbody>
        
      </table>
    </div>
  </div>

 
<?php 

    if ($ArchivoPDF ==null && $TotalMensual == null ) {
          echo " <center><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal2' disabled>Finalizar Solicitud</button></center>";
            }else
            {
          echo " <center><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal2' >Finalizar Solicitud</button></center>";
            }

 ?>
 
   


    </div>
  </div>
  <br>
  <br>
</div>

<!-- /#page-content-wrapper -->



</div>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comprobante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <br><br>
        <form action="Modelo/ModeloTransporte/comprobanteSoliT.php" method="post" enctype="multipart/form-data">
          <div class="custom-file">
          <input type="file" class="custom-file-input" accept=".pdf" id="customFileLang" name="archivo" required>
          <label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar Comprobante</label>
          <center><small>El archivo no debe pesar más de 5MB</small></center>
        </div>
        <br><br>
        <div>
        <textarea name="Comentario" placeholder="Comentario"  class="form-control" ><?php echo $Comentario;  ?></textarea>
        <center><small>Comentario</small></center>

        <!--idsolicitudTrans-->
        <input type="hidden" name="soli" value="<?php echo $_GET['id'];?>"> 

      

        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" id="subirComprobante" name="subirComprobante" value="Guardar Cambios" class="btn btn-secondary">
      </div>

      </form>
    </div>
  </div>
</div>

<!-- /#wrapper -->




<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seguro desea Finalizar la solicitud</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php $resultCosto  =  number_format($TotalMensual, 2, '.', ''); ?> 
        <p style="text-align: justify;">Nota: Recueda el monto solicitado es <b>$<?php echo $resultCosto; ?></b> debera ser aprobado por tu coach de lo contrario ellos te asignara la cantidad o  de ser rechazada</p>
        <form method="POST" action="Modelo/ModeloTransporte/enviarSolicitudTrans.php">
            
          <input type="hidden" name="costototal" value="<?php echo $resultCosto; ?>">
          <input type="hidden" name="idsol" value="<?php echo $_GET['id']; ?>">

  
        
        
      </div>
      <div class="modal-footer">
        <input type="submit" name="Crarsoli" value="Enviar" class="btn btn-secondary">
        <button type="button"  data-dismiss="modal">Close</button>
        
      </div></form>
    </div>
  </div>
</div>



<?php

  require_once 'templates/footer.php';

?>
