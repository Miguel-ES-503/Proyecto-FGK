<?php

//consulta para extraer los datos del alumno
if (isset($_GET['id'])) {

	$id=$_GET['id'];


	$consulta=$pdo->prepare("SELECT alu.Nombre, alu.correo , `CicloU` , `Year` , `ComprobanteNotas` FROM notas nota INNER JOIN alumnos alu on nota.`ID_Alumno` = alu.`ID_Alumno` WHERE alu.`ID_Alumno` = :ID_Alumno");
	$consulta->bindParam(":ID_Alumno",$id);
	$consulta->execute();


	$consulta2=$pdo->prepare("SELECT * FROM alumnos WHERE ID_Alumno = :ID_Alumno");
	$consulta2->bindParam(":ID_Alumno",$id);
	$consulta2->execute();


	$NombreAlumno = '';
	$Correo;
	if ($consulta2->rowCount()>=1)
	{
		while ($fila3=$consulta2->fetch())
		{		
			$NombreAlumno = $fila3['Nombre'];
			$Correo = $fila3['correo'];

		}
	}


}


?>