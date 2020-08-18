<?php
  require_once 'templates/head.php';
?>
<title>Transporte</title>
<?php
  require_once 'templates/header.php';
  //require_once 'templates/MenuVertical.php';
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

<!--///////////////////////////////////////////////-->
<!--Para ver el nombre del archivo que sube-->
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>
  
  <!--Fin de funcion-->
  <!--///////////////////////////////////////////////-->




<!--Estructura -->
<div class="container-fluid text-center">
<div class="title" style="margin-left: -14px;">
<a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Solicitud Transporte</h2>
	
</div>
  <br>


  

  

  <!--Información de solicitud-->
  <div class="row">

  
     <!--Primera columna-->
     <div class="col-sm" style="color: #343434; width: 100%;">
        <br>

        <div class="btn-group-toggle" data-toggle="buttons">
          <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Nueva Ruta bus">
          <button type="button" class="btn btn-dark px-3" data-toggle="modal" data-target="#ModalCosto" style="border-radius: 20px;
    border: 2px solid;
    width: 200px;height: 38px" ><i class="fa fa-bus-alt"></i> Agregar ruta bus</button>
          </span>
  

          <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Socioeconomico">
          <button type="button" class="btn btn-dark px-3" data-toggle="modal" data-target="#ModalPdf" style="border-radius: 20px;
    border: 2px solid ;
    width: 205px;height: 38px"> <i class="fa fa-file-pdf"></i> Subir Socioeconómico</button>
          </span>

      
        </div>
        

    
  

    <!--tabla con informacion de solicitud-->
    <div class="col text-center">
      <br><br><br>

      <!--CSS de las tablas -->
      <style type="text/css">
          table {
            border-collapse: separate;
            border-spacing: 6px;
            background:  bottom left repeat-x;
            color: #fff;


          }

          tr, th{
            background: white;
            color: #585858;
            text-align: center;


          }
          td  {
            width: 150px;
            background: #D8D8D8;
            border-radius: 3px;
            color: #000;
          }

           .oscuro{
            background: #A4A4A4;

          }



          h3 {
            color: #DE0B18;
          }

          h4{
            color: white;
          }
          div.centerTable.table-responsive{
        text-align: center;
        float: center;
         }
         .table-responsive{
float: center;
         }

    

        div.centerTable table {
         margin: 0 auto;
         text-align: left;
         width: 100%;
        }
        .modal-content{
    background-color: white;
    border-color: black;
    border-radius: 30px;
    padding: 20px;
}
.modal-body{
    text-align: left;
}

.form-control{
    background-color: #ADADB2;
    color: black;
    border-radius: 20px;

}
.modal-header{
    border-color: #ADADB2;
    border:3px;
}
        </style>  <!--Fin de CSS de las tablas -->

        
      <!--Tabla de buses de Ida -->
        <h3 class="card-header h3s bg-light w-75 mx-auto">Ida a la Universidad</h3>
        <center><div class='centerTable'>
          <center><table  class="table-responsive mx-auto w-75" > 
          <thead class="table table-bordered mx-auto"> 
            <tr>
              <th>nº</th>
              <th>Ruta de bus</th>
              <th>Lunes</th>
              <th>Martes</th>
              <th>Miercoles</th>
              <th>Jueves</th>
              <th>Viernes</th>
              <th>Sabado</th>
              <th>Eliminar</th>
            </tr>
          </thead>

          <tbody>
            <?php
            //Muestra solo las rutas de ida

             $RutasIda= $pdo->prepare("SELECT idRuta, nombreruta, tipo , costo 
                                       FROM rutasbuses 
                                       WHERE idSoliTrans=? AND tipo='Ida'");

             $idSoliTrans = $_GET['id'];
             $RutasIda->execute(array($idSoliTrans));
             ?>
              
             <?php
             if ($RutasIda->rowCount()>=1) {
               $n=1;
               while ($filaRB=$RutasIda->fetch()) {
                  echo "<tr>
                        <td>".$n."</td>
                        <td class='oscuro'>".$filaRB['nombreruta']."</td>

                        <td><input type='checkbox' name='dias[]' tu-attr-precio=".$filaRB['costo']." class='CheckedAK' id='ida1'></td>
                        <td><input type='checkbox' name='dias[]' tu-attr-precio=".$filaRB['costo']." class='CheckedAK' ></td>
                        <td><input type='checkbox' name='dias[]' tu-attr-precio=".$filaRB['costo']." class='CheckedAK' ></td>
                        <td><input type='checkbox' name='dias[]' tu-attr-precio=".$filaRB['costo']." class='CheckedAK' ></td>
                        <td><input type='checkbox' name='dias[]' tu-attr-precio=".$filaRB['costo']." class='CheckedAK' ></td>
                        <td><input type='checkbox' name='dias[]' tu-attr-precio=".$filaRB['costo']." class='CheckedAK' ></td>
                        <td><center><a href='Modelo/ModeloRutas/EliminarRuta.php?id=".$filaRB['idRuta']."&id2=". $_GET['id']."' class='fas fa-trash  btn btn-danger'> </a></center></td>
                        </tr>";     
                     $n++;       
                   }
               }else{
                   echo "<tr><td colspan='9'>No ha agregado rutas de Ida</td></tr>";
                 }

             ?>
          </tbody>

          <tfoot>
            <th colspan="7"></th> 
            <th> &nbsp;&nbsp;Total de ida:  </th>
            <th colspan="1" > 
            <input style="background: #DE0B18; border-radius: 25px ; color: white; width:150px; height: 25px; text-align: center;" id="total" type="text" placeholder=" 0.00" class="form-control" disabled value=" $ 0.00"  /></th>
          </tfoot>
        </table></center>
      </div></center>
      <br> <!--Fin Tabla de buses de Ida -->

      <!--Tabla de buses de Regreso -->
       <div class='centerTable mx-auto w-75'>
         <table  id="tablaR2" class="table-responsive">
          
         <h3 class="card-header h3s bg-light w-100 mx-auto" >Regreso a casa</h3>
         <thead class="table table-bordered">
         <tr>
            <th>nº</th>
            <th>Ruta de bus</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miercoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sabado</th>
            <th>Eliminar</th>
          </tr>
         </thead>

         <tbody>
           
            <?php
            //Muestra solo las rutas de ida

            $RutasRegreso= $pdo->prepare("SELECT idRuta, nombreruta, tipo , costo FROM rutasbuses WHERE idSoliTrans=? AND tipo='regreso'");

            $idSoliTrans2 = $_GET['id'];
            $RutasRegreso->execute(array($idSoliTrans2));
           
            if ($RutasRegreso->rowCount()>=1) {
               $m=1;
               while ($filaRBR=$RutasRegreso->fetch()) {
               echo "<tr>
                     <td>".$m."</td>
                     <td class='oscuro'>".$filaRBR['nombreruta']."</td>
                     <td><input type='checkbox' tu-attr-precio=".$filaRBR['costo']." class='CheckedAKR' ></td>
                     <td><input type='checkbox'  tu-attr-precio=".$filaRBR['costo']." class='CheckedAKR' ></td>
                     <td><input type='checkbox'  tu-attr-precio=".$filaRBR['costo']." class='CheckedAKR' ></td>
                     <td><input type='checkbox'  tu-attr-precio=".$filaRBR['costo']." class='CheckedAKR' ></td>
                     <td><input type='checkbox'  tu-attr-precio=".$filaRBR['costo']." class='CheckedAKR' ></td>
                     <td><input type='checkbox'  tu-attr-precio=".$filaRBR['costo']." class='CheckedAKR' ></td>
                     <td><center><a href='Modelo/ModeloRutas/EliminarRuta.php?id=".$filaRBR['idRuta']."&id2=". $_GET['id']."' class='fas fa-trash  btn btn-danger'> </a></center></td>
                     </tr>";     
                     $m++;       
                   }
                }else{
                   echo "<tr><td colspan='9'>No ha agregado rutas de Regreso</td></tr>";
                }
             ?>
          </tbody>

          <tfoot>
            <th colspan="7"></th> 
            <th> Total de regreso:  </th>
            <th colspan="1" > 
            <input style="background: #DE0B18; border-radius: 25px; color: white; width:150px; height: 25px; text-align: center;" id="total2" type="text" placeholder="0.00" class="form-control" disabled value="$ 0.00"  /></th>
          </tfoot>
         </table>
       </div><!--Fin Tabla de buses de Regreso -->


      <!--Tabla de gastos --> 
      <div class="container" style="width: 85%;" >
      
       <div class="row" >
         <div class="col" >
          <h3  class="card-header h3s bg-light">Gastos de transporte <i class="fa fa-dollar-sign"></i> <i class="fa fa-bus-alt"></i></h3>
         </div>
        
         <div class="col" style="border-radius:25px; background: gray; color: white; margin-right: 7px; margin-left: 10px;">
         <label ><h4>Total Semanal: </h4> <div id="resultSemanal" style="color: white;">$ 0.00</div> </label>
      
       </div>

       <div class="col" style="border-radius:25px; background: gray; color: white;">
         <label ><h4>Total Mensual:</h4><div id="ResultMes" style="color: white;">$ 0.00</div></label><br>
         <input type="hidden" name="" id="Resultinput">
       </div>
     </div>
    </div><br><!--  Fin Tabla de buses Costos -->

    <!-- Horario de Universidad -->

       <div>
        <br>  

         <h3 class="card-header h3s bg-light w-100 mx-auto ">Horario Universidad</h3>
        <br>
        <span class="float-center">  <br>
        <button type="button" class="btn btn-dark px-3" data-toggle="modal" data-target="#ModalHorario" style="border-radius: 20px;
    border: 2px solid ;
    width: 200px;height: 38px"><i class="fas fa-calendar"></i>  Crear Horario</button>
        </span>
       </div><br>

     <div class='centerTable w-100  '>
         <center><table  id="makeEditable2" class=" table-responsive"> 
         <thead class="table table-bordered ">
           <tr>
             <th>nº</th>
             <th >Dia</th>
             <th>Hora entrada</th>
             <th>Hora Salida</th>
             <th>Eliminar</th>
            </tr>
          </thead>

          <tbody>
           
            <?php
            //Muestra solo las rutas de ida
            // Consulta De La BASE DE DATOS
             $HorarioU=$pdo->prepare("SELECT * FROM `horariotransporte` WHERE `idSoliTrans` = ?");
             $idSoli = $_GET['id'];
             $HorarioU->execute(array($idSoli));
            
                if ($HorarioU->rowCount()>=1) {
                   $l=1;
                  while ($filaH=$HorarioU->fetch()) {
                     echo "<tr>
                      <td>".$l."</td>
                      <td class='oscuro'>".$filaH['dia']."</td>
                      <td>".$filaH['horaEntrada']."</td>
                      <td>".$filaH['horaSalida']."</td>
                      <td><center><a href='Modelo/ModeloHorario/EliminarHorario.php?id=".$fila2['idhorario']."&id2=". $_GET['id']."' class='fas fa-trash  btn btn-danger'> </a></center></td>
                       </tr>";     
                     $l++;       
                   }
                }else{
                   echo "<tr><td colspan='5'>No ha agregado horario</td></tr>";
                }


             ?>
        
           </tbody>

           </table></center>
         </div>

        <?php  
          // Validacion de PDF-Socioeconomico
          //------------------------------------
          //consulta para seleccionar el comprobante
          $PDF=$pdo->prepare("SELECT comprobante 
                              FROM `solitransporte` 
                              WHERE `idSoliTrans` = ?");

          $idSoliiT = $_GET['id'];//extrae id de la solicitud Transporte
          $PDF->execute(array($idSoliiT));//ejecute consulta


          if ($PDF->rowCount()>=1) {
          //recorre las filas
              while ($filapdf=$PDF->fetch()) {
              //Validacion de boton finalizar
              //------------------------------

              //si comprobante es diferente a vacio
                if ($filapdf['comprobante'] !=null) {

                 //boton finalizar Acivo
                  echo "<br><br>
                  <div class='f1-buttons'>
                  <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalFinal'>  Finalizar</button>
                  </div>
                  <br><br>";
                }else
                  {

                  //boton finalizar Bloqueado
                  echo "<br><br>
                  <div class='f1-buttons'>
                  <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalFinal'  disabled>  Finalizar</button>
                  </div>
                  <br><br>";
                  } 
                 
              }//fin while
            }//fin de if
            ?>
           </div>





      


    </div>
  </div>
</div>

<!--MODALS-->
<div class="hidden" >

<!-- MODAL RUTAS -->
<!--**************-->

<div class="modal fade " id="ModalCosto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content" >
       <div class="modal-header" >
         <h5 class="modal-title" id="exampleModalLabel">Ruta</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
           </button>
       </div>
   <div class="modal-body" >

     <form  method="POST" accept-charset="utf-8" id="rutaform">
       <div id="alerta5"></div>
         <div class="col">

           <!--idsolicitudTrans-->
           <div class="form-group">
             <label class="sr-only" for="idSoliT">Id de Solicitud</label>
                <input type="hidden" name="idSoliT"  id="idSolic" value="<?php echo $_GET['id'];?>">
           </div>


           <div class="form-group">
             <label class="sr-only" for="nombreruta">Nombre de ruta</label>
               <input type="text" name="nombreruta" id="nombreRuta" placeholder="Nombre de ruta" class="nombreruta form-control"  id="nombreruta">
             </div>


            <div class="form-group">
               <label class="sr-only" for="costo">Costo</label>
               <select  name="costo" placeholder="Costo de ruta" id="CostoRuta" class="costo form-control" >
                 <option selected >Seleccione el costo del bus $</option>
                 <option>0.20</option>
                 <option>0.25</option>
                 <option>0.35</option>
                 <option>0.50</option>
                 <option>0.75</option>
                 <option>1.00</option>
                 <option>1.25</option>
                 <option>1.50</option>
                 <option>1.75</option>
                 <option>2.00</option>
               </select>
                                                   
            </div>

            <div class="form-group">
               <label class="sr-only" for="tipo">Tipo</label>
                <select  name="tipo" id="tipoRuta" placeholder="Costo de ruta" class="tipo form-control"  id="tipo">
                 <option>Seleccione el tipo..</option>
                 <option>Ida</option>
                 <option>Regreso</option>
               </select>
                                                   
            </div>
                           
          </div>

         
          <center><input style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;" type="button" name="Guardar_Ruta" value="Crear Ruta" id="Guardar_Ruta"  ></center>
      </form>       
                         
    </div>
  </div>
 </div>

<!-- FIN MODAL RUTAS -->
<!--**********************-->   
</div> <!--fin contenedor modals rutas-->


                       

</div>



<!-- Modal  Socioeconomico-->
<!-- Modal -->
<div class="modal fade" id="ModalPdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 100px;height: 38px;
     background-color: #9d120e;
     color:white;">Close</button>
          <input style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;" type="submit" id="subirComprobante" name="subirComprobante" value="Guardar Cambios" class="btn btn-secondary">
      </div>

      </form>
    </div>
  </div>
</div>



 <!--MODALS-->
 <div class="hidden" >

 <!-- MODAL HORARIO -->
 <!--**************-->

 <div class="modal fade " id="ModalHorario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" >
        <div class="modal-header" >
          <h5 class="modal-title" id="exampleModalLabel">Horario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <div class="modal-body" >

      <form action="Modelo/ModeloTransporte/GuardarHorario.php" method="POST" accept-charset="utf-8">
        <div id="alerta5"></div>
          <div class="col">

            <!--idsolicitudTrans-->
            <div class="form-group">
              <label class="sr-only" for="idSoliT">Id de Solicitud</label>
                 <input type="hidden" name="idSoliT" value="<?php echo $_GET['id'];?>">
            </div>


           


             <div class="form-group">
                <label  for="costo">Dias</label>
                 <select  name="dia" placeholder="Horario" class="costo form-control"  id="dia">
                  <option>Seleccione una opcion...</option>
                  <option>Lunes</option>
                  <option>Martes</option>
                  <option>Miercoles</option>
                  <option>Jueves</option>
                  <option>Viernes</option>
                  <option>Sabado</option>
                
                </select>
                                                    
             </div>

              <div class="form-group">
              <label  for="horaentrada">Hora Entrada</label>
                <input type="time" class="form-control" id="inputZip" name="horaentrada" class="form-control" min="06:00" max="20:00" placeholder="Ingrese su horario de entrada">
              </div>

            <div class="form-group">
              <label  for="horasalida">Hora Salida</label>
                <input type="time" class="form-control" id="inputZip" name="horasalida" class="form-control" min="06:00" max="20:00" placeholder="Ingrese su horario de salida">
              </div>
                            
           </div>


           <center>
            <input style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;" type="submit" name="crear_Horario" value="Crear Horario" id="crear_Horario"  ></center>
       </form>       
                          
     </div>
   </div>
  </div>

 <!-- FIN MODAL HORARIO -->
 <!--**********************-->   
</div> <!--fin contenedor modals horario-->

</div>                   




  <br><br>

<?php
  require_once 'templates/footer.php';
?>