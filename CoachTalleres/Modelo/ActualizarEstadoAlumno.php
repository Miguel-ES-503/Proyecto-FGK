<?php
 include("../../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos

 	$IdAlumno=$_POST["IdAlumno"];//Recogemos el arreglo
	// Consulta De La BASE DE DATOS
 	$t = 'Graduado';
	for ($i=0;$i<count($IdAlumno);$i++)    
			{   

				$consulta=$pdo->prepare("UPDATE alumnos SET Estado = :estado where ID_Alumno = :id" );
				$consulta->bindParam(':estado',$t);
				$consulta->bindParam(':id',$IdAlumno[$i]);		  
				
				$consulta->execute();

			}

//echo 'Hola';
header("Location: ../ReporteAlumno.php");
setlocale(LC_TIME, 'es_SV.UTF-8');
//$consulta->execute();


?>