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
<div class="title" style="margin-left: -14px; width: 109%;">
<a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Transporte</h2>
	
</div>
  <br>

  

  <!--Información de solicitud-->
  <div class="row w-75 mx-auto">

<!--tabla con informacion de solicitud-->
    <div class="col text-center col-xs-10 col-sm-10 col-md-10 col-lg-10 conten w-25" style=" margin-bottom: 258px;" id="content">
      <br><br>
    
      
      <table class="table table-responsive-lg" style="position: relative; left: 75px;">      
      <a href="IndicacionesTrans.php?id=<?php echo $alumno; ?>" id="crearsoli" style="float: right; border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white; text-decoration: none;" ><img src="../img/add.png" width="30px" height="25px"><b>Crear Solicitud</b></a>
      
      <h3 id="h3" class="texto" style="text-align: center;"><b>Solicitud de Transporte</b></h3>
      <br>
       <br class="salto">
      <thead  style="background-color: #2D2D2E; color: white;">
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
                            
                            
                            
                            <td><center><a href='DetallesSolicitud.php?id=<?php echo $alumno; ?>'class='btn'><i class='fas fa-eye'> </i></a></center></td>
                         </tr>";
  

                  }
                }


            ?>
          
            
        </tbody>
      </table>


    </div>
  </div>
</div>



<?php
  require_once 'templates/footer.php';
?>