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



<!--Estructura -->
<div class="container-fluid text-center">
  <br>
  <h1> Transporte</h1>
  <br>

  

  <!--Información de solicitud-->
  <div class="row">

<!--tabla con informacion de solicitud-->
    <div class="col text-center">
      <br><br><br>
      <table class="table table-responsive-lg">

        <thead  style="background-color: #2D2D2E; color: white;">
          <tr>
            <th colspan="2" align="justify">Solicitud de Transporte</th>
            <th> <a href="IndicacionesTrans.php?id=<?php echo $alumno; ?>" class="btn btn-info"><img src="../img/add.png" width="25px" height="30px"></a><br>Crear Solicitud</th>
          </tr>
          <tr>
            <th scope="col">Ciclo</th>
            <th scope="col">Estado</th>
            
            <th scope="col">Opcion</th>
            
          </tr>
        </thead>
        <tbody>
            <?php

//------------------OBTENER CICLO ------------------------
//consulta para obtener el ciclo de la fundacion

  $fechaActual=date("Y-m-d");
  $consulta3=$pdo->prepare("SELECT ID_Ciclo FROM ciclos WHERE Fechanicio<= FechaFinal AND FechaFinal>= Fechanicio ");
  $consulta3->execute(array($fechaActual , $fechaActual));

   $obtenerCiclo;

   if ($consulta3->rowCount()>=0)
   {
     while ($fila3=$consulta3->fetch())
     {   
        $obtenerCiclo = $fila3['ID_Ciclo'];
     }
   }

//----------------------------------------------------------

//------------EXTRAER ID DEL ALUMNO--------------------------
$extraeIdAlumno=$dbh->prepare("SELECT `ID_Alumno` FROM `alumnos` WHERE `correo`='".$_SESSION['Email']."'");
  $extraeIdAlumno->execute();
  if ($extraeIdAlumno->rowCount()>0) {
    // code...
    $fila2=$extraeIdAlumno->fetch();
    $alumno=$fila2['ID_Alumno'];
  }
  //---------------------------------------------------------



           $MuestraSoli=$pdo->prepare("SELECT `idSoliTrans`,`ID_Ciclo`, `estado` FROM `solitransporte` WHERE `ID_Alumno`=? AND `ID_Ciclo`=?");

           $MuestraSoli->execute(array($alumno , $obtenerCiclo));

               if ($MuestraSoli->rowCount()>=1)
               {  

                 while ($fila=$MuestraSoli->fetch())

                  {

                  echo "
                         <tr class='table-light'>
                            <th>".$obtenerCiclo."</th>
                            <th>".$fila['estado']."</th>
                            
                            
                            
                            <td><center><a href='DetallesSolicitud.php?id=<?php echo $alumno; ?>'class='btn btn-info'><i class='fas fa-binoculars' > </i> Ver</a></center></td>
                         </tr>";
  

                  }
                }


            ?>
          
            
        </tbody>
      </table>


    </div>
  </div>
</div>


  <br><br><br><br> <br>

<?php
  require_once 'templates/footer.php';
?>