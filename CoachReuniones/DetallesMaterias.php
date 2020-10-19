<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>



<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

<?php 

if (isset($_GET['id'])) {
  
  //******************** VARIABLES  ************************

  //declaracion de variables para url 
  $id=$_GET['id'];             //trae el id de la solicitud
  $idsoli = $_GET['idNotif'];  //trae el id de la notificacion

  //variables para extraer informacion de la solicitud

 
  $Consulta1=$pdo->prepare("SELECT eu.carnet, a.Nombre, a.SedeAsistencia, a.Class, eu.ID_Empresa, a.correo, ic.Id_InscripcionC,im.idMateria,m.nombreMateria, ic.comprobante,ic.cicloU
                            FROM expedienteu eu
                            INNER JOIN alumnos a
                            on eu.ID_Alumno= a.ID_Alumno
                            INNER JOIN inscripcionciclos ic
                            on ic.idExpedienteU=eu.idExpedienteU
                            INNER JOIN inscripcionmateria im 
                            on im.Id_InscripcionC=ic.Id_InscripcionC
                            INNER JOIN materias m 
                            on im.idMateria=m.idMateria
                            WHERE ic.Id_InscripcionC=:Id_InscripcionC");
  $Consulta1->bindParam(":Id_InscripcionC",$id);
  $Consulta1->execute();

   if ($Consulta1->rowCount() >=0)
  {
    $fila=$Consulta1->fetch();
    $Alumno = $fila['Nombre'];
    $Sede = $fila['SedeAsistencia'];
    $Class = $fila['Class'];
    $Universidad = $fila['ID_Empresa'];
    $ciclo = $fila['cicloU'];
    $idInscripcionCiclo = $fila['Id_InscripcionC'];
    $carnet = $fila['carnet'];
    $comprobante = $fila['comprobante'];
    $correo = $fila['correo'];

    //$EstadoSoli = $fila['estado'];
    
  
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
            <h2 class="main-title">Materias</h2>
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
    <h3 class="mt-0 mb-3" id="titulo">Detalles de inscripción ciclo</h3>



    <div class="row mt-1">
        <div class="col-sm-12  col-md-12  col-lg-6" id="Contenedor1" style="height: 80%;">
            <div id="Info-1" class="m-lg-4 m-md-5 m-sm-4 m-3">
                <p id="Info-1_Texto-1"><b>Carnet:</b></p>
                <p id="Info-1_Texto-1"><?php echo utf8_decode($carnet);?></p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <p id="Info-1_Texto-1"><b>Alumno:</b> </p>
                <p id="Info-1_Texto-1"><?php echo utf8_decode($Alumno); ?></p><br>
                <p id="Info-1_Texto-1"><b>Sede: </b></p>
                <p id="Info-1_Texto-1"><?php echo $Sede;?></p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                
                <p id="Info-1_Texto-1"> <b>Class: </b> </p>
                <p id="Info-1_Texto-1"><?php echo $Class;?> </p>
                <br>
                <p id="Info-1_Texto-1"><b>Universidad:</b> </p>
                <p id="Info-1_Texto-1"><?php echo utf8_decode($Universidad);?></p>
                <br>
                
            </div>
            <hr id="linea">


            <div class="m-lg-4 m-3 m-sm-3">
                <div class="row " align="center">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="status">
                    <br>
                    <h4>Materias inscritas</h4>
                    <br>
                    </div>

                    <table class="table table-hover">
                         <thead>
                             <tr>
                                <th scope="col">#</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Materia</th>
                        
                            </tr>
                         </thead>
                         <tbody>
                            <?php

                            $num=1;
                                
                             while ($fila2=$Consulta1->fetch())
                             { 
                                echo "<tr>
                                <td >".$num."</td>
                                <td>".$fila2['idMateria']."</td>
                                <td>".$fila2['nombreMateria']."</td>
                                
                                </tr>";   


                             }
                            
                            ?>
                           
                        
                    </tbody>
                    </table>
                       
                    </div>
                    
                   
            </div>


        </div>
        <div class="col-sm-12 mt-sm-4 col-md-12 mt-md-4  col-lg-5 ml-lg-5 mt-lg-0 mt-3" id="Contenedor2">
            <div id="Info-2" class="m-lg-3 m-md-4 m-sm-5">
                <div class="container ml-lg-3">
                    <form action="Modelo/ModeloMaterias/VerificarSolicitudCiclo.php" method="POST">
                        <div class="row">
                            <div class="col-md-12  mr-lg-5">
                                <p id="Info-1_Texto-1"><b>Comprobante inscripción materias</b> </p><br>
                               <center> <a href='../pdfCicloInscripcion/$pdfCiclo' target='_blank' class='btn btn-danger '><img src='../img/PDF.png' width="35px" height="30px">PDF Inscripción</a> </center>
                            </div>
                        </div>
                        <br><br>
                       
                        <form action="Modelo/ModeloHorasSociales/VerificarCiclo.php" method="POST">
                            <input type="text" name="id" value="<?php  echo $id ?>" >
                            <input type="text" name="idsoli" value="<?php echo $idsoli  ?>">
                            <input type="text" name="correo" value="<?php echo $correo ?>" >
                            <input type="text" name="nombreEst" value="<?php echo $Alumno ?>"  >
        
        <div class="row">
                            <div class="col-75 col-md-12">
                                <label id="label"><b>Seleccione un estado para la solicitud</b></label>
                                <select id="input" name="estado" required="" style="height: 50px">
                                    <option value="Aprobado" >Aprobado</option>
                                    <option value="Rechazado">Rechazado</option>
                                </select>
                            </div>
                        </div>
        <br><br>
        <?php  if($Estado == "Aprobado" || $Estado == "Rechazado")
        {
          echo '<br><br>
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
          echo '<br><br>
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