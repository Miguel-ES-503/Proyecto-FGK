<?php
require_once "../../../BaseDatos/conexion.php";



if(isset($_POST['Guardar_Materia']))
{	
	$iduser = $_POST['iduser'];
	$materia = $_POST['nombremateria'];
	$grupoteo = $_POST['grupoteo'];
	$grupolab = $_POST['grupolab'];
	

	$consulta=$pdo->prepare("INSERT INTO materia(ID_Alumno,materia,grupoT,grupoL) VALUES(:ID_Alumno,:materia,:grupoteo,:grupolab)");
	$consulta->bindParam(':ID_Alumno',$iduser);
	$consulta->bindParam(':materia',$materia);
	$consulta->bindParam(':grupoteo',$grupoteo);
	$consulta->bindParam(':grupolab',$grupolab);
	


	if (!$consulta->execute()) 
	   {
	   		header("Location: ../../InscripcionMateriasCiclo.php?id=".$iduser);
	   		echo "No se puedo guardar el dato";
	    }
		else
		{			 	
			header("Location: ../../InscripcionMateriasCiclo.php?id=".$iduser);
		}




}
else
{
	echo "dATOS NO RECIBIDO";
}

 





?>