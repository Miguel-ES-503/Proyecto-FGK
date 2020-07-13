<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>


<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

<?php 

if (isset($_GET['id'])) {
  
  $id=$_GET['id'];

  $idsoli = $_GET['idNotif'];

  //Para actualizar el estado de la solicitu
  $consultaa=$pdo->prepare("UPDATE notificaciones set Estado = 'Visto' where Id =:NotiId ");
  $consultaa->bindParam(":NotiId",$idsoli);
  $consultaa->execute();
  
    // Consulta para extrear la informacion del alumno
  $consulta=$pdo->prepare("SELECT `ID_HSociales`,ALU.Nombre ,ALU.correo , ALU.ID_Sede, ALU.Class , E.Nombre AS 'UNI', HS.CantidadH , HS.FechaInicio, HS.FechaFinal , HS.Encargado ,HS.Descripcion, HS.Comprobante , HS.ID_Ciclo , HS.`estado` ,HS.comentario FROM hsociales HS INNER JOIN alumnos ALU on HS.`ID_Alumno` = ALU.`ID_Alumno` LEFT JOIN empresas E on ALU.ID_Empresa = E.ID_Empresa WHERE HS.`ID_HSociales` = :ID_HSociales  ");
  $consulta->bindParam(":ID_HSociales",$id);
  $consulta->execute();

  $Alumno;
  $Sede;
  $Class;
  $Universidad;
  $NombreProyecto;
  $Encargado;
  $FechaInico;
  $FechaFianl;
  $Cantidad;
  $ciclo;
  $Estado;
  $Comentario;
  $comprobante;
  $correo;

      
  if ($consulta->rowCount() >=0)
  {
    $fila=$consulta->fetch();
    $Alumno = $fila['Nombre'];
    $Sede = $fila['ID_Sede'];
    $Class = $fila['Class'];
    $Universidad = utf8_encode($fila['UNI']);
    $NombreProyecto = utf8_encode($fila['Descripcion']);
    $Encargado = $fila['Encargado'];
    $FechaInico = $fila['FechaInicio'];
    $FechaFianl = $fila['FechaFinal'];
    $CantidadHoras = $fila['CantidadH'];
    $ciclo = $fila['ID_Ciclo'];
    $Estado = $fila['estado'];
    $comentario = $fila['comentario'];
    $comprobante = $fila['Comprobante'];
    $correo = $fila['correo'];
  
  }

}

 ?>
<title>Lista de reuniones</title>
<link rel="stylesheet" type="text/css" href="css/horas-sociales.css">

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<br>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
<div class="title">
    <img src="../img/back.png" class="icon">
  <h2 class="main-title" >Horas de Vinculación</h2>
</div>
<!--/.Navbar-->
<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>
  <!--<div class="row"  >
    <div class="alert alert-danger" id="mensaje">
      
    </div>
  </div>-->
<div class="text-justify border border-light p-5" id="main">
 

  <div>
    <div class="title-2">
    <h3 class="title-detalles">Detalles del Proyecto</h3>
    </div>
    <div class="card-body" style="background-color: white;">



  <div class="row" >
  <div class="col-sm-6 mb-3 mb-md-0" >
    <div class="Imfo-1">
    <div >
      <div class="card-body" id="Imfo-1">
    
        <p class="mb-4"><span>Alumno: </span><?php echo$Alumno?><br><span>Sede:  </span><?php echo  $Sede ?> -- <span>Class: </span> <?php echo $Class ?> <br> <span>Universidad: </span> <?php echo utf8_decode($Universidad) ?><span><br>Ciclo:</span> <?php echo $ciclo ?><br><span>Cantidad Solicitado: </span> <span><?php echo $CantidadHoras;?></span> horas</p>
        
        <hr id="divisor">

        <div class="form-row ">
          <div class="col-md-3">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
              <label for="materialRegisterFormFirstName" class="subtitle-left">Identificación: </label>
              <input type="text"  value="<?php echo $id ?>" disabled  class="form-control" id="input-info-left" >
              
            </div>
          </div>


          <div class="col-md-9">
            <!-- Last name -->
            <div class="md-form">
<label for="materialRegisterFormLastName" class="subtitle">Cargo</label>
              <input type="text"  value="<?php echo $Encargado ?>" disabled  class="form-control" id="input-info-right" >
            </div>
          </div>
        </div>

  




















        <div class="form-row">
          <div class="col-md-4">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
              <label for="materialRegisterFormFirstName" class="subtitle-left">Fecha de inicio</label>
              <input type="text"  value="<?php echo $FechaInico ?>" disabled  class="form-control" id="input-info-left" >
            </div>
          </div>

           <div class="col-md-8">
            <!-- Last name -->
            <div class="md-form">
              <label for="materialRegisterFormLastName" class="subtitle-problem" style="margin-right: -10%;" >Fecha de Finalización</label>
              <input type="text"  value="<?php echo $FechaFianl ?>" disabled  class="form-control" id="input-info-problem" >
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
              <label for="materialRegisterFormFirstName" class="subtitle">Comentario</label>
              <textarea class="form-control" id="exampleFormControlTextarea3" rows="3" disabled><?php echo utf8_decode($NombreProyecto); ?></textarea>
              
            </div>
          </div>

        </div>

     
     <br>
      <div class="form-row">
          <div class="col">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
             <?php 
                if ($comprobante == null) {
                 echo " <a href='#' class='btn btn-success px-3 far fas fa-times'> </a><br>";
                }else
                {
  echo " <a href='../ComproHoras/$comprobante' class='btn btn-block' id='btn-1'><img src='../img/paper.png' class='picture'>Comprobante</a><br>";
                }
              ?>
             
    
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="col-sm-6" >
    <div>
      <div class="card-body" id="Imfo-2">
        <p class="mb-4">Estado:<span id="texto1"><?php echo $Estado?></span></p>
        <p class="card-text" >Comentario:</p>
        <form action="Modelo/ModeloHorasSociales/VerficarSolicuitud.php" method="POST">
          <input type="hidden" name="id" value="<?php  echo $id ?>" >
          <input type="hidden" name="idsoli" value="<?php echo $idsoli  ?>">
          <input type="hidden" name="correo" value="<?php echo $correo ?>" >
          <input type="hidden" name="nombreEst" value="<?php echo $Alumno ?>"  >

          <div class="form-group">
       <textarea class="form-control" id="exampleFormControlTextarea3" rows="3" minlength="1" maxlength="300" name="comentario" placeholder="comentario maximo 300 palabras..." required><?php echo $comentario;  ?></textarea>
        </div>
        <p class="card-text">Cambiar Estado:</p>
        <select name="estado"  class="form-control" required >
          <option  disabled selected >Seleccione una opci&oacute;n</option>
          <option value="Aprobado">Aprobado</option>
          <option value="Rechazado">Rechazado</option>
        </select><br>
        <p class="card-text">Ingrese cantidad de horas a asignar:</p>
        <input type="number" name="horas" class="form-control" min="0" max="40">
        <?php  if($Estado == "Aprobado" || $Estado == "Rechazado")
        {
          echo '<input type="button" name="EnviarDato" value="Enviar" class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0  disabled">';
        }else
        {
          echo '<input type="submit" name="EnviarDato" value="Enviar" class="btn btn-block" id="btn-2">';
        }
        ?>
      </form>
    </div>
  </div>
</div>
</div>


    </div>
    <!--<div class="card-footer text-muted">
      Solicitud
    </div>-->
  </div>





  
</div>

<br>






<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

