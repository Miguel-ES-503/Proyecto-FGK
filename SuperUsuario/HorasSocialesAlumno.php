<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
//include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>


<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

<?php 

if (isset($_GET['id'])) {
  
  $id=$_GET['id'];

    // Consulta para extrear la informacion del alumno
  $consulta=$pdo->prepare("SELECT `ID_HSociales`, ALU.ID_Alumno ,ALU.Nombre , ALU.ID_Sede, ALU.Class , ALU.ID_Empresa , HS.CantidadH , HS.FechaInicio, HS.FechaFinal , HS.Encargado ,HS.Descripcion, HS.Comprobante , HS.ID_Ciclo , HS.`estado` ,HS.comentario FROM hsociales HS INNER JOIN alumnos ALU on HS.`ID_Alumno` = ALU.`ID_Alumno` WHERE HS.`ID_HSociales` = :ID_HSociales  ");
  $consulta->bindParam(":ID_HSociales",$id);
  $consulta->execute();
  
  $IDAlumno;
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
  $Comprobante;
      
  if ($consulta->rowCount() >=0)
  {
    $fila=$consulta->fetch();
    $IDAlumno = $fila['ID_Alumno'];
    $Alumno = $fila['Nombre'];
    $Sede = $fila['ID_Sede'];
    $Class = $fila['Class'];
    $Universidad = $fila['ID_Empresa'];
    $NombreProyecto = $fila['Descripcion'];
    $Encargado = $fila['Encargado'];
    $FechaInico = $fila['FechaInicio'];
    $FechaFianl = $fila['FechaFinal'];
    $Cantidad = $fila['CantidadH'];
    $ciclo = $fila['ID_Ciclo'];
    $Estado = $fila['estado'];
    $comentario = $fila['comentario'];
    $Comprobante = $fila['Comprobante'];
  
  }

}

 ?>
<title>Lista de reuniones</title>

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
  <h2 class="main-title" >Horas Sociales</h2>
<div class="title2">
  <a class="nav-link active" href="HorasVinculacionPorAlumno.php?id=<?php echo$IDAlumno ?>">Horas por Alumno</a>
</div>
</div>
<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>

<div class="text-justify">
 

  <div class="card text-center">
    <div class="card-header">
    <h5 style="color: black;">Detalles de proyecto</h5>
    </div>
    <center><div class="card-footer text-muted" id="soli" style="background-color: #BE0032; height: 40px; border-radius: 30px; width: 400px;">
    <p style="color: white; text-align: center;">Solicitud de Horas de Vinculación</p>
  </div></center>
    <div class="card-body">



  <div class="row">
  <div class="col-sm-6 mb-3 mb-md-0">
    <div class="card">
      <div class="card-body" style="background-color:#ADADB2; border-radius: 25px; border: 2px">
    
        <p class="mb-4"><b>Alumno: </b><?php echo$Alumno?><br><b>Sede:  </b><?php echo  $Sede ?> -- <b>Class: </b> <?php echo $Class ?> <br> <b>Universidad: </b> <?php echo $Universidad ?> -- <b>Ciclo:</b> <?php echo $ciclo ?></p>
        <hr>

        <div class="form-row">
          <div class="col">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
              <label for="materialRegisterFormFirstName">Identificación</label>
              <input type="text"  value="<?php echo $id ?>" disabled  class="form-control"  >
              
            </div>
          </div>


          <div class="col">
            <!-- Last name -->
            <div class="md-form">
              <label for="materialRegisterFormLastName">Cargo</label>
              <input type="text"  value="<?php echo $Encargado ?>" disabled  class="form-control"  >
              
            </div>
          </div>
        </div>


        <div class="form-row">
          <div class="col">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
              <label for="materialRegisterFormFirstName">Fecha de inicio</label>
              <input type="text"  value="<?php echo $FechaInico ?>" disabled  class="form-control"  >
              
            </div>
          </div>


          <div class="col">
            <!-- Last name -->
            <div class="md-form">
               <label for="materialRegisterFormLastName">Fecha de Finalización</label>
              <input type="text"  value="<?php echo $FechaFianl ?>" disabled  class="form-control"  >
             
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
              <label for="materialRegisterFormFirstName">Comentario</label>
              <textarea class="form-control" id="exampleFormControlTextarea3" rows="3" disabled><?php echo$NombreProyecto?></textarea>
              
            </div>
          </div>

        </div>

     
     <br>
      <div class="form-row">
          <div class="col">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
              <button style='border-radius: 20px;
    border: 2px solid #BE0032;
    width: 200px;height: 38px;
     background-color: #BE0032;
     color:white; text-decoration: none;'>
              <a href="../ComproHoras/<?php echo$Comprobante ?>"  class='px-3 far fa-file-alt'> </a>Comprobante</button>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body" style="background-color: white; border-radius: 25px; border: 4px solid #ADADB2">
        <p class="mb-4"><b>Estado: </b> <?php echo $Estado?></p>

        <br>
        <p class="card-text"><b>Comentario:</b></p>
        <form action="Modelo/ModeloHorasSociales/VerficarSolicuitud.php" method="POST">
          <input type="hidden" name="id" value="<?php  echo $id ?>" >
          <div class="form-group">
       <textarea class="form-control" id="exampleFormControlTextarea3" rows="3" minlength="1" maxlength="300" name="comentario" placeholder="comentario maximo 300 palabras..." required><?php echo$comentario?></textarea>
        </div>
        <label for="materialRegisterFormFirstName"><b>Cambiar Estado</b></label>
        <select name="estado"  class="form-control" required >
          <option value="" disabled="" selected >Seleccione una opción</option>
          <option value="Aprobado">Aprobado</option>
          <option value="Rechazado">Rechazado</option>
        </select>
        <br>
        <center><button name="EnviarDato" value="Enviar" class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0 " style="border-radius: 20px;
    border: 2px solid #BE0032;
    width: 200px;height: 38px;
     background-color: #BE0032;
     color:white;">Enviar<img src="img/click.png" width="25px" height="25px"></button></center>
      </form>
      <br>
    </div>
  </div>
</div>
</div>


    </div>
  </div>





  
</div>

<br>






<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

