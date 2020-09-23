<?php
  require_once 'templates/head.php';
?>
<title>Notas</title>
<?php
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


          //-------------------------------------------------------------------
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
$(document).ready(function() {
    bsCustomFileInput.init()
});
</script>

<!--Fin de funcion-->
<!--///////////////////////////////////////////////-->




<!--Estructura -->
<div class="container-fluid text-center">
    <div class="title" style="margin-left: -14px;">
        <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
        <h2 class="main-title">Actualizar Datos</h2>
    </div>

    <!--Información de solicitud-->
    <center>
        <div class="row">
            <!--tabla con informacion de solicitud-->
            <div class="col text-center">
                <br>

                <!--CSS de las tablas -->
                <style type="text/css">
                table {
                    border-collapse: separate;
                    border-spacing: 6px;
                    background: bottom left repeat-x;
                    color: #fff;
                    float: center;


                }

                tr,
                th {
                    background: white;
                    color: #585858;
                    text-align: center;


                }

                td {
                    width: 150px;
                    background: #D8D8D8;
                    border-radius: 3px;
                    color: #000;
                }

                .oscuro {
                    background: #A4A4A4;

                }



                h3 {
                    color: #DE0B18;
                }

                h4 {
                    color: white;
                }

                div.centerTable {
                    text-align: center;
                }



                div.centerTable table {
                    margin: 0 auto;
                    text-align: left;
                    width: 100%;
                }

                .modal-content {
                    background-color: white;
                    border-color: black;
                    border-radius: 30px;
                    padding: 20px;
                }

                .modal-body {
                    text-align: left;
                }

                .form-control {
                    background-color: #ADADB2;
                    color: black;
                    border-radius: 20px;

                }

                .modal-header {
                    border-color: #ADADB2;
                    border: 3px;
                }
                </style>
                <!--Fin de CSS de las tablas -->

            </div>
        </div>
    </center>
</div>
<?php
 $stmt1 =$dbh->prepare("SELECT `ID_Alumno` , A.Nombre , E.Nombre AS 'Universidad' FROM alumnos A INNER JOIN empresas E ON A.ID_Empresa = E.ID_Empresa WHERE correo='".$_SESSION['Email']."'");
 // Ejecutamos
 $stmt1->execute();
 
 while($fila = $stmt1->fetch()){
     $alumno=$fila["ID_Alumno"];
     $Nombre_Alumno=$fila["Nombre"];
      $univerisdad = $fila["Universidad"];
 }

 $stmt2 =$dbh->prepare("SELECT idExpedienteU , A.Nombre AS 'Alumno', E.Nombre 'Universidad' , C.nombre AS 'CARRERA' , F.Nombre 'Facultad',C.Duracion , cum , proyecEgreso , pensum , avancePensum,carnet, EU.estado FROM expedienteu EU INNER JOIN alumnos A ON EU.ID_Alumno = A.ID_Alumno LEFT JOIN carrera C ON EU.Id_Carrera = C.Id_Carrera LEFT JOIN facultades F ON C.ID_Facultades = F.IDFacultates LEFT JOIN empresas E ON EU.ID_Empresa = E.ID_Empresa WHERE EU.ID_Alumno = ? ");
 // Ejecutamos
 $stmt2->execute(array($id));


  $stmt3 =$dbh->prepare("SELECT idExpedienteU ,EU.avancePensum AS 'avance', A.Nombre AS 'Alumno', E.Nombre 'Universidad' , C.nombre AS 'CARRERA' , F.Nombre 'Facultad',C.Duracion , cum , proyecEgreso , pensum , avancePensum,carnet, EU.estado FROM expedienteu EU INNER JOIN alumnos A ON EU.ID_Alumno = A.ID_Alumno LEFT JOIN carrera C ON EU.Id_Carrera = C.Id_Carrera LEFT JOIN facultades F ON C.ID_Facultades = F.IDFacultates LEFT JOIN empresas E ON EU.ID_Empresa = E.ID_Empresa WHERE EU.idExpedienteU = ? ");
 // Ejecutamos
 $stmt3->execute(array($idExpedienteU));


 if ($stmt3->rowCount() >=0)
 {
   $fila3=$stmt3->fetch();
   $Universi = $fila3['Universidad'];
   $Carrera = $fila3['CARRERA'];
   $cum = $fila3['cum'];
   $Egreso = $fila3['proyecEgreso'];
   $Pensum = $fila3['pensum'];
   $PorcPens = $fila3['avancePensum'];
   $EstadoCarrera = $fila3['estado'];
   $carnet = $fila3['carnet'];
   $avance = $fila3['avance'];
 }
?>
<form class="w-50 mx-auto" method="post" action="actualizarData.php">
  <div class="form-group">
  <label for="">Hola <b><?php echo  $Nombre_Alumno?></b> a continuación escriba los datos que se solicitan:</label><br>
    <label for="exampleInputEmail1">CUM:</label>
    <input type="number" step="0.1" min="0" max="10" name="cum"  value="<?php echo $cum;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su CUM">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Carnet:</label>
    <input type="text" name="carnet" value="<?php echo $carnet;?>" class="form-control" id="exampleInputPassword1" placeholder="Ingrese su carnet">
    <input type="hidden" name="Universidad" value="<?php echo $_GET['Universidad']; ?>" class="form-control" id="exampleInputPassword1" placeholder="Ingrese su carnet">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" class="form-control" id="exampleInputPassword1" placeholder="Ingrese su carnet">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">avance de carrera:</label>
    <input type="number" step="0.01" min="0" max="100" name="avance"  value="<?php echo $avance;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su CUM">
  
  </div>
  <div class="form-check">
  </div>
  <button type="submit"  class="btn btn-success" name="id" value="<?php echo $idU = $_GET['id']; ?>">Actualizar</button>
</form>
</div>
<br><br><br><br><br><br><br>

<?php
  require_once 'templates/footer.php';
?>