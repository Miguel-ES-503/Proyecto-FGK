<?php require_once 'templates/head.php'; ?>
<title>Indicaciones Renovacion</title>
 <link rel="stylesheet" href="assets1/css1/style.css">
 
<?php  
  
  //Manda  allamar plantillas
  require_once 'templates/header.php';

  //require_once 'templates/MenuVertical.php';

  require_once 'templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';


    //Carnet del alumno
    $stmt1 =$dbh->prepare("SELECT `ID_Alumno`  FROM `alumnos` WHERE correo='".$_SESSION['Email']."'");
    $stmt1->execute();
     while($fila = $stmt1->fetch()){
       $alumno=$fila["ID_Alumno"];
     }//Fin de while 



     // Expediente U
    $consulta=$pdo->prepare("SELECT idExpedienteU  FROM expedienteu WHERE ID_Alumno = ? AND estado = 'Activo'");
 
    $consulta->execute(array($alumno));
    $idExpedienteU;
     if ($consulta->rowCount()>=1)
     {
       while ($fila=$consulta->fetch())
       {   
         $idExpedienteU = $fila['idExpedienteU'];
       }
     }//fin de condicion

//Extraer ID Inscripcion ciclo 
       // Consulta que muestra el idciclo del expediente correspondiente
       //dependiendo del expediente asi se l mostrara los datos
       $consultaIC=$pdo->prepare("SELECT Id_InscripcionC FROM inscripcionciclos WHERE idExpedienteU = ? ");
       $consultaIC->execute(array($idExpedienteU));
       $Id_InscripcionC;
         if ($consultaIC->rowCount()>=1)
         {
            while ($fila=$consultaIC->fetch())
            {   
             $Id_InscripcionC = $fila['Id_InscripcionC'];
            }
         }

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
    $('#noti').fadeOut(4000);
  });

  </script>
  
  <!--Fin de funcion-->
  <!--///////////////////////////////////////////////-->

<!--div principal-->
<div class="container-fluid text-center">
  <style type="text/css">
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
.modal-footer{
  border-color: #ADADB2;
  border:3px;
}
 </style>
<div class="title">
    <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Renovacion de beca</h2>
  <br>
</div> 
  <div>
    <div>
                             
    <div class="container" style="">
      <?php
      $noti = $_GET['ntf'];
      if ($noti != null) {
      if ($noti == "Exito") {
        echo "<div class='alert alert-success ' id='noti'>Renovacion de Beca ingresada correctamente</div>";
      }else
      {
        echo "<div class='alert alert-danger' id='noti'>No se ha podido ingresar carta de Renovacion</div>";
      }
      }
      ?>

          <h2 style="">Indicaciones Generales</h2>
          <br>
          <br>
          <br>
           <div class="row">
             
              <!--Primera columna-->
                  <div class="col-sm" style="">
                    <div class="col-sm-12 col-xs-12 col-md-12" id="requisitos">

                    <ul style="text-align: justify; color: black;" >
                           <h3 style="color: #BF3E3E;">Requisitos</h3>
                           <br>
                            <li>Ser becario activo del Programa Oportunidades.</li>
                            <li>Haber cumplido con todos los requisitos que usted ya conoce como parte de su responsabilidad como alumno becado del Programa Oportunidades.</li>
                            <li>Mandar el documento dentro de la fecha estipulada.</li>

                               
                         </ul>
                        <br>
                    </div>
                   
                        
                      
                        <br>
                        <div class="col-sm-12 col-xs-12 col-md-12" id="archivos">

                        <ul style="text-align: justify; color: black; ">
                          <h4 style="color: #BF3E3E;">Archivos</h4>
                          <br>
                          
                           <li>Tendrá que adjuntar la carta de renovación de beca debidamente firmada y con la información necesaria en formato PDF.</li>
                           
                               
                        </ul>
                   
                        </div>
                        

                   </div>

               <!-- Fin Primera columna-->

                 <div class="col-sm" id="pasos" style="background-color: #c7c7c7">

                         <ol style="text-align: justify; color: black;" >
                            <h3 style="color: #BF3E3E;">Pasos:</h3>
                            <br>
                            <li>Leer la información completa del PDF que se les proporciona.</li>
                            <li>Completar y llenar el PDF con sus datos personales,el archivo que manden en PDF tienen que tener 5 cosas, nombre completo, universidad ( siglas por ejemplo ESEN, UDB UJMD, UCA etc…) sede, modalidad y promoción, si no trae esta información quedara como invalida su carta de renovación.</li>
                           
     
                         </ol>
                         <div class="alert" style="width: 80%; height:105px; text-align: justify; color: #BF3E3E; ">
                         <img src="../img/alert.svg" class="img-fluid">
                           <p>  <b>Nota:</b><i> No se recibirán cartas de renovación con documentación incompleta.</i></p>
                           
                           
                         </div>
                      
                       <ol>
                         <form style="text-align: justify;color: white;" name="form" action="Modelo/ModeloRenovacion/carta.php" method="post">

                           <label for="checkbox" class="agree" style="color:black;"><input type="checkbox"  class="checkbox" name="checkbox" id="checkbox" onclick= "enableSending();"/> <i>Acepto que he leido completamente la información y los requerimientos para la renovacion de becas.</i></label>

                       
                        <!--ID Expediente U
                           <input type="hidden" name="expediente" value="<?php echo  $idExpedienteU;  ?>"> 
                        
                        
                        <input type="hidden" name="inscriCiclo" value="<?php echo  $inscriC;  ?>"> -->
                        


                         
                          <center>
                          	<button type="button" class="btn btn-dark px-3" data-toggle="modal" data-target="#ModalPdf" style="border-radius: 20px;border: 2px solid ;width: 205px;height: 38px" id="GuardarRenovacion"  name = "GuardarRenovacion" disabled="disabled" > <i class="fa fa-file-pdf"></i> Subir Carta</button>
                                                    </center>
                         </form>
          

                       </ol>
                       <br>
      

  
              <!--Funcion que habilita y desabilita el boton de aceptacion terminos-->
                <script>
                   function enableSending() {
                   document.form.GuardarRenovacion.disabled = !document.form.checkbox.checked;
                   }

                </script>

             </div> <!--Fin segunda columna-->

    
           </div> <!--Fin de row-->


         </div><!--Fin de container-->

       </div> 

     </div>
  </div> 
  <br>
  <br>
</div><!-- Fin de div principal-->

<!-- /#page-content-wrapper -->
<div class="modal fade" id="ModalPdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="Modelo/ModeloRenovacion/carta.php" method="post" enctype="multipart/form-data">
          <label >Universidad</label>
        <input name="uni" placeholder="año" readonly class="form-control" value="<?php echo $universidad;  ?>" ></input>
        <br>
        <br>
        <label >Ciclo</label>
        <select name="ciclo" class="form-control">
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        <br>
        <label >Año</label>
        <input name="anio" placeholder="año" readonly class="form-control" value="<?php echo date("Y");  ?>" ></input>
        <br>
          <div class="custom-file">
          <input type="file" class="custom-file-input" accept=".pdf" id="customFileLang" name="archivo" required>
          <label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar Carta</label>
          <center><small>El archivo no debe pesar más de 5MB</small></center>
        </div>
        <br><br>

<div>

          <?php 
            $stmt1 =$dbh->prepare("SELECT `ID_Alumno`  FROM `alumnos` WHERE correo='".$_SESSION['Email']."'");
                      
            $stmt1->execute();

            while($fila = $stmt1->fetch()){
              $alumno=$fila["ID_Alumno"];
                                
            }
            ?>

        
        <!--idalumnos-->
        <input type="hidden" name="alumno" value="<?php echo $alumno;?>"> 

        <!--id expedente-->
        <input type="hidden" name="expediente" value="<?php echo $idExpedienteU;?>"> 

        <input type="hidden" name="idInscripcionCiclo" value="<?php echo $Id_InscripcionC;?>">  
      </div>

      </div>

      <div class="modal-footer">
        
          <center><input style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;" type="submit" id="subirCarta" name="subirCarta" value="Guardar Cambios"></center>
      </div>

      </form>
    </div>
  </div>
</div>


</div>

</div>

<!-- /#wrapper -->





 <?php

  require_once 'templates/footer.php';

?>