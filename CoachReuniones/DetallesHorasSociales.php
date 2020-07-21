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
    <h3 class="mt-0">Detalles del Proyecto</h3>

    

    <div class="row mt-4">
      <div class="col-sm-12  col-md-12  col-lg-6" style="border: solid 1px black;">
        <div id="Info-1" class="m-lg-5">
          
          <p id="Info-1_Texto-1" ><b>Alumno:</b> </p>
          <p id="Info-1_Texto-1">Miguel Angel Barahona Garcia</p><br>
          <p id="Info-1_Texto-1"><b>Sede: </b></p>
          <p id="Info-1_Texto-1">SSFT</p>
          <br>
          <p id="Info-1_Texto-1"> <b>Class: </b>  </p>
          <p id="Info-1_Texto-1">2019 </p>
          <br>
          <p id="Info-1_Texto-1"><b>Universidad:</b> </p>
          <p id="Info-1_Texto-1">UDB</p>
        </div>
        <hr id="linea">


        <div class="container ml-lg-5">
  <form action="/action_page.php">
    <div class="row">  
      <div class="col-75">
        <label id="label">Status del Alumno</label>
        <input type="text" id="input" name="firstname">
      </div>
    </div>
    
    <div class="row">
      <div class="col-75">
        <label id="label">Comentario</label>
        <textarea id="input"  style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit" id="btn">
    </div>
  </form>
</div>


      </div>
      <div class="col-sm-12 mt-sm-4 col-md-12 mt-md-4  col-lg-5 ml-lg-1 mt-lg-0 mt-3" style="border: solid 1px black;">
        <h1>Hola</h1>

      </div>

    </div>
    <!--<div class="card-footer text-muted">
      Solicitud
    </div>-->
  </div>





  
</div>

<br>




<br>
<br>
<br>
<br>
<br>
<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

