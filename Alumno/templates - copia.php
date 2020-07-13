
<?php 

  require_once "../BaseDatos/conexion.php";



?>

<?php 
require_once 'templates/head.php'; ?>
<title>Inicio</title>
 <link rel="stylesheet" href="assets1/css1/style.css">
 <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
 <link rel="stylesheet" href="assets1/css1/style.css">
 <style type="text/css">
  
  
 </style>
<?php  
  
  //Manda  allamar plantillas
  require_once 'templates/header.php';

  require_once 'templates/MenuVertical.php';

  require_once 'templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';


  //Consulta para la esxtraccion de datos ALUMNO 

  setlocale(LC_TIME, 'es_SV.UTF-8');

  //Extraemos el carnet del estudiante
  $stmt1 =$dbh->prepare("SELECT `ID_Alumno`, `ID_Empresa` FROM `alumnos` WHERE correo='".$_SESSION['Email']."'");
  // Ejecutamos
  $stmt1->execute();

  while($fila = $stmt1->fetch()){
      $alumno=$fila["ID_Alumno"];
      $universidad=$fila["ID_Empresa"];
  }

 //FIN CONSULTA *****************************

 ?>



<div class="container-fluid text-center">
  <br><br>
  <div>
    <div>
	
	
<!--AqUI VA TODO -->


    </div>
  </div>
  <br>
  <br>
</div>

<!-- /#page-content-wrapper -->



</div>

</div>

<!-- /#wrapper -->





 <?php

  require_once 'templates/footer.php';

?>