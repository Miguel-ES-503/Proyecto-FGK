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
<!--Comiezo de estructura de trabajo -->
<!--<div class="container-fluid text-center">-->



<div class="title">
    <div class="row">
        <div class="col-xs-2 ml-2 ml-lg-5 ml-sm-5 ml-md-5">
            <a href="javascript:history.back();"><img src="../img/back.png" class="icon"></a>

        </div>
        <div class="col-xs-10">
            <h2 class="main-title">Horas de Vinculación</h2>
        </div>
    </div>


</div>
<!--/.Navbar-->
<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>
<!--<div class="row"  >
    <div class="alert alert-danger" id="mensaje">
      
    </div>
  </div>-->

<br>
<div class="text-justify border border-light p-5" id="main">
    <h3 class="mt-0 mb-3" id="titulo">Detalles del Proyecto</h3>



    <div class="row mt-1">
        <div class="col-sm-12  col-md-12  col-lg-6" id="Contenedor1" style="height: 80%;">
            <div id="Info-1" class="m-lg-4 m-md-5 m-sm-4 m-3">

                <p id="Info-1_Texto-1"><b>Alumno:</b> </p>
                <p id="Info-1_Texto-1"><?php echo utf8_decode($Alumno);?></p><br>
                <p id="Info-1_Texto-1"><b>Sede: </b></p>
                <p id="Info-1_Texto-1"><?php echo $Sede;?></p>
                <br>
                <p id="Info-1_Texto-1"> <b>Class: </b> </p>
                <p id="Info-1_Texto-1"><?php echo $Class;?> </p>
                <br>
                <p id="Info-1_Texto-1"><b>Universidad:</b> </p>
                <p id="Info-1_Texto-1"><?php echo utf8_decode($Universidad);?></p>
                <br>
                <p id="Info-1_Texto-1"><b>Cantidad Solicitado:</b> </p>
                <p id="Info-1_Texto-1"><?php echo utf8_decode($CantidadHoras). " horas";?></p>
            </div>
            <hr id="linea">


            <div class="m-lg-4 m-3 m-sm-3">
                    <div class="row " align="center">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="status">
                            <label id="label">Identificación</label>
                            <input type="text" id="input" name="firstname" readonly value="<?php  echo $id ?>">
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"  id="status">
                            <label id="label">Encargado</label>
                            <input type="text" id="input" name="firstname" readonly 
                            value="<?php  echo utf8_decode($Encargado) ?>">
                        </div>
                    </div>
                     <div class="row" align="center">
                        <div class="col-6" id="status">
                            <label id="label">Fecha de Inicio</label>
                            <input type="text" id="input" name="firstname" readonly value="<?php echo $FechaInico ?>">
                        </div>
                        <div class="col-6" id="status">
                            <label id="label" id="problema">Fecha de Finalización</label>
                            <input type="text" id="input" name="firstname"  readonly 
                            value="<?php echo $FechaFianl ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" id="status">
                            <label id="label">Comentario</label>
                            <textarea id="input" style="height:200px" disabled><?php echo utf8_decode($NombreProyecto); ?></textarea>
                        </div>
                    </div>
                    <!--<div id="boton1" align="center">
                      <input type="submit" value="Comprobante"  >

                        <button type="submit" id="btn"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                class="bi bi-journal-medical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1H2a2 2 0 0 1 2-2z" />
                                <path
                                    d="M2 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H2zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H2zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H2z" />
                                <path fill-rule="evenodd"
                                    d="M8 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L9 6l.549.317a.5.5 0 1 1-.5.866L8.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L7 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 8 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />

                            </svg> Comprobante</button>

                    </div>-->
            </div>


        </div>
        <div class="col-sm-12 mt-sm-4 col-md-12 mt-md-4  col-lg-5 ml-lg-5 mt-lg-0 mt-3" id="Contenedor2">
            <div id="Info-2" class="m-lg-3 m-md-4 m-sm-5">
                <div class="container ml-lg-3">
                    <form action="Modelo/ModeloHorasSociales/VerficarSolicuitud.php" method="POST">
                        <div class="row">
                            <div class="col-md-12  mr-lg-5">
                                <p id="Info-1_Texto-1"><b>Estado:</b> </p>
                                <p id="Info-1_Texto-1" style="font-style: italic;"> <?php echo $Estado?></p><br>
                            </div>
                        </div>
                        <!--<div class="row">
                            <div class="col-md-12  mr-lg-5">
                                <label id="label"><b>Comentario</b></label>
                                <textarea id="input" style="height:200px"></textarea>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-75 col-md-12">
                                <label id="label"><b>Cambiar Estado</b></label>
                                <select id="input">
                                    <option value="">Aprobado</option>
                                </select>
                            </div>
                        </div>-->
                                <form action="Modelo/ModeloHorasSociales/VerficarSolicuitud.php" method="POST">
          <input type="hidden" name="id" value="<?php  echo $id ?>" >
          <input type="hidden" name="idsoli" value="<?php echo $idsoli  ?>">
          <input type="hidden" name="correo" value="<?php echo $correo ?>" >
          <input type="hidden" name="nombreEst" value="<?php echo $Alumno ?>"  >
          <div class="row">
                            <div class="col-md-12  mr-lg-5">
                                <label id="label"><b>Comentario</b></label>
                                <textarea id="input" style="height:200px" rows="3" minlength="1" maxlength="300" name="comentario" placeholder="comentario maximo 300 palabras..." required><?php echo $comentario;  ?></textarea>
                            </div>
                        </div>
        <br>
        <div class="row">
                            <div class="col-75 col-md-12">
                                <label id="label"><b>Cambiar Estado</b></label>
                                <select id="input" name="estado" required="" style="height: 50px">
                                    <option value="Aprobado" >Aprobado</option>
                                    <option value="Rechazado">Rechazado</option>
                                </select>
                            </div>
                        </div>
        <br><br>
        <?php  if($Estado == "Aprobado" || $Estado == "Rechazado")
        {
          echo '<br><br><br><br><br>
                        <div id="boton2">
                            <button type="submit" id="btn" disabled name="EnviarDato" ><svg width="1em" height="1em" viewBox="0 0 16 16"
                                    class="bi bi-box-arrow-up-right" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M1.5 13A1.5 1.5 0 0 0 3 14.5h8a1.5 1.5 0 0 0 1.5-1.5V9a.5.5 0 0 0-1 0v4a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 5v8zm7-11a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.5H9a.5.5 0 0 1-.5-.5z" />
                                    <path fill-rule="evenodd"
                                        d="M14.354 1.646a.5.5 0 0 1 0 .708l-8 8a.5.5 0 0 1-.708-.708l8-8a.5.5 0 0 1 .708 0z" />
                                </svg> Enviar</button>';

        }else
        {
          echo '<br><br><br><br><br>
                        <div id="boton2">
                            <button type="submit" id="btn" name="EnviarDato" ><svg width="1em" height="1em" viewBox="0 0 16 16"
                                    class="bi bi-box-arrow-up-right" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M1.5 13A1.5 1.5 0 0 0 3 14.5h8a1.5 1.5 0 0 0 1.5-1.5V9a.5.5 0 0 0-1 0v4a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 5v8zm7-11a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.5H9a.5.5 0 0 1-.5-.5z" />
                                    <path fill-rule="evenodd"
                                        d="M14.354 1.646a.5.5 0 0 1 0 .708l-8 8a.5.5 0 0 1-.708-.708l8-8a.5.5 0 0 1 .708 0z" />
                                </svg> Enviar</button>';
        }
        ?>
      </form>
                        
                            <!--<input type="submit" value="Enviar" id="btn">-->
                        </div>
                    </form>
                </div>
                </form>
            </div>
        </div>
        <br>
        <?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>