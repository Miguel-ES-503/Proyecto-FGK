<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
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

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.topnav {
  overflow: hidden;
  background-color: #ADADB2;
  max-width: 100%;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  border-width: 3px;
  font-weight: bold;

 
}
.submenu1{
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 18px;
  background-color: #9d120e;
  border-width: 3px;
  font-weight: bold;
  height: 65px;



}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon1 {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon1 {
    float: right;
    display: inline-block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
    font-size: 15px;
    height: 50px;
  }
  .titulomenu a{
    font-size: 15px;
  }
}
</style>
</head>
<body>



<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>


<!--NOTA: IMPORTANTE
CAMBIAR MENU, CONSULTAR-->
<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>

<div class="text-justify">
 
<div class="topnav" id="myTopnav">
  <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
  <a href="#home" class="titulomenu" style="background-color:#ADADB2; color: #2D2D2E; font-size: 25px;">Horas Sociales</a>
  <a href="javascript:void(0);" class="icon1" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
  <div class="card text-center">
    <div class="card-header">
    <h5 style="color: black;">Detalles de proyecto</h5>
    </div>
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
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white; text-decoration: none;'>
              <a href="../ComproHoras/<?php echo$Comprobante ?>"><img src="img/facultad.png" width="25px" height="25px"> </a>Comprobante</button>
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
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
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

