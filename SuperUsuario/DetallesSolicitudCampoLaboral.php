<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
//include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>


<?php include("../BaseDatos/conexion.php"); //Realizamos la conexi��n con la base de datos?>

<?php 

$idsoli = $_GET['idNotif'];

if (isset($_GET['id'])) {
  //Para actualizar el estado de la solicitu
  $consultaa=$pdo->prepare("UPDATE notificaciones set Estado = 'Visto' where Id =:NotiId ");
  $consultaa->bindParam(":NotiId",$idsoli);
  $consultaa->execute();



  $id=$_GET['id'];
  $idNotificacion = $_GET['idNotif'];

    // Consulta para extrear la informacion del alumno
  $consulta=$pdo->prepare("SELECT `id_solicitud` ,ST.id_status , Alu.ID_Alumno , Alu.Nombre  ,Alu.Class , Alu.ID_Sede , Alu.ID_Empresa , Alu.correo, ST.Nombre AS 'Status' , `Comentario` , `Comprobante`, Comentario2 ,SC.Estado  FROM solicitudcambio SC INNER JOIN status ST ON SC.`id_status` = ST.`id_status` LEFT JOIN alumnos Alu on SC.`id_alumno` = Alu.`id_alumno` WHERE id_solicitud = :id_solicitud");
  $consulta->bindParam(":id_solicitud",$id);
  $consulta->execute();

  $Alumno;
  $Class;
  $Sede;
  $Universidad;
  $StatusAlumno;
  $Comentario;
  
  $Estado;
  $Comprobante;
  $ComentarioDocente;

  $ID_Alumnos;
  $ID_Status;

  $correo;
  
  if ($consulta->rowCount() >=0)
  {
    $fila=$consulta->fetch();

    $ID_Alumnos = $fila['ID_Alumno'];
    $ID_Status = $fila['id_status'];
    $Alumno = $fila['Nombre'];
    $Class = $fila['Class'];
    $Sede = $fila['ID_Sede'];
    $Universidad = $fila['ID_Empresa'];
    $StatusAlumno = $fila['Status'];
    $Comentario = $fila['Comentario'];
    $Estado =$fila['Estado'];
    $Comprobante =$fila['Comprobante'];
    $ComentarioDocente  = $fila['Comentario2'];
    $correo = $fila['correo'];
  }

}

?>
<title>Solicitud</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
<div class="title">
    <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
  <h2 class="main-title" >Campo Laboral</h2>
  <div class="title2" style="background-color: #9d120e">
  <a class="nav-link active" href="CampoLaboral.php">Campo Laboral</a>

</div>
</div>

<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>
<div class="text-justify">
 

  <div class="card text-center">
    <div class="card-header">
      <h5 style="color: black;">Detalles de trabajo</h5>
    </div>
    
    <div class="card-body">
      <div class="row">
        <div class="col-sm-6 mb-3 mb-md-0">
          <div class="card">
            <div class="card-body"  style="background-color:#ADADB2; border-radius: 25px; border: 2px">
              
              <p class="mb-4"><b>Alumno: </b><?php echo$Alumno?><br><b>Sede:  </b><?php echo  $Sede ?> -- <b>Class: </b> <?php echo $Class ?> <br> <b>Universidad: </b> <?php echo $Universidad ?></p>
              <hr>

              <div class="form-row">
                <div class="col">
                  <!-- First name   Tema , fecha , la hora y el tipo de taller -->
                  <div class="md-form">
                    <label for="materialRegisterFormFirstName"><b>Status Alumno</b></label>
                    <input type="text"  value="<?php echo $StatusAlumno ?>" disabled  class="form-control"  >
                    
                  </div>
                </div>
              </div>


              <div class="form-row">
                <div class="col">
                  <!-- First name   Tema , fecha , la hora y el tipo de taller -->
                  <div class="md-form">
                    <label for="materialRegisterFormFirstName"><b>Comentario</b></label>
                    <textarea class="form-control" id="exampleFormControlTextarea3" rows="3" disabled><?php echo$Comentario?></textarea>
                    
                  </div>
                </div>
              </div>  
              <br>

              <div class="form-row">
                <div class="col">
                  <!-- First name   Tema , fecha , la hora y el tipo de taller -->
                  <div class="md-form">
                    
                       <?php 
                if ($Comprobante == null) {
                 echo " <button style='border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;'><img src='img/facultad.png' width='25px' height='25px'><a href='#' >Comprobante </a></button>";
                }else
                {
                  echo " <button style='border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;'><img src='img/facultad.png' width='25px' height='25px' ><a href='../ComproCambio/".$Comprobante."' class='btn btn-success px-3 far fa-file-alt' target = '_blank'>Comprobante </a></button>";
                }
              ?>
                    
                  </div>
                  <br>
                </div>
                
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="card">
            <div class="card-body" style="background-color: white; border-radius: 25px; border: 4px solid #ADADB2">
              <p class="mb-4"><b>Estado: </b> <?php echo $Estado?></p>

              <p class="card-text"><b>Comentario:</b></p>
              <form action="Modelo/ModeloSolicitudCambio/VerificarSolicitudCampoLaboral.php" method="POST">
                <input type="hidden" name="id" value="<?php  echo $id ?>" >
                <input type="hidden" name="idAlumno" value="<?php echo $ID_Alumnos ?>" >
                <input type="hidden" name="idstatus" value="<?php echo $ID_Status ?>"  >
                <input type="hidden" name="idnotificacion" value="<?php echo $idNotificacion ?>" >
                <input type="hidden" name="correo" value="<?php echo $correo ?>" >
                <input type="hidden" name="NombreAlumno" value="<?php echo $Alumno ?>" >

                <div class="form-group">
                 <textarea class="form-control" id="exampleFormControlTextarea3" rows="3" minlength="1" maxlength="300" name="comentario" placeholder="comentario maximo 300 palabras..." required><?php echo$ComentarioDocente?></textarea>
               </div>
              <label for="materialRegisterFormFirstName"><b>Cambiar Estado</b></label>
               <select name="estado"  class="form-control" required >
                <option  disabled selected >Seleccione una opci&oacute;n</option>
                <option value="Aprobado">Aprobado</option>
                <option value="Rechazado">Rechazado</option>
              </select>
              <br>

              <?php if($Estado == "Aprobado"  || $Estado == "Rechazado" )
              {
                echo '<center><button name="EnviarDato" value="Enviar" class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0  disabled" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;" >Enviar<img src="img/click.png" width="25px" height="25px"></button></button></center>';
              }
              else
              {
               echo '<center><button name="EnviarDato" value="Enviar" class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0 " style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;">Enviar<img src="img/click.png" width="25px" height="25px"></button></center>'; 
             } 
             ?>

              
            </form>
            
          </div>
        </div>
      </div>
    </div>


  </div>
 
</div>






</div>

<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>
