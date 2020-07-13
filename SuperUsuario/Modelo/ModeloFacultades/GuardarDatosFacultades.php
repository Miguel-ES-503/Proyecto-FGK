<?php

require_once "../../../BaseDatos/conexion.php";
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];


if (isset($_POST['Guardar_Facultad'])) 
{
	$NombreFaculta = utf8_decode($_POST['NombreFac']);

	$consulta2=$pdo->prepare("SELECT * FROM facultades WHERE Nombre = :Nombre");
	$consulta2->bindParam(":Nombre",$NombreFaculta);
	$consulta2->execute();

	if ($consulta2->rowCount() >=0) 
	{
		//Buscamos la sigla por medio un recorrido
		$fila=$consulta2->fetch();

		//Verificamos si correo es igual 
		if ($fila['Nombre'] == $NombreFaculta) 
		{
			$_SESSION['message'] = 'Ya existe una Faculta llamada ' . $NombreFaculta;
			$_SESSION['message2'] = 'danger';
			header("Location: ../../SIT-Facultades.php");
		}// si no existe el empresa podra creara el dato 
		else
		{
			$consulta3=$pdo->prepare("INSERT INTO facultades(Nombre) VALUES(:Nombre)");
			$consulta3->bindParam(':Nombre',$NombreFaculta);
			if (!$consulta3->execute()) 
			{
				$_SESSION['message'] = 'Fallo al Guardar Faculta';
				$_SESSION['message2'] = 'danger';
				header("Location: ../../SIT-Facultades.php");
			}
			else
			{			 	
				$_SESSION['message'] = 'Facultad Creada con exitos';
				$_SESSION['message2'] = 'success';
				header("Location: ../../SIT-Facultades.php");
			}
		}
	}

}
else
{
	$_SESSION['message'] = 'Datos No ingresados Form GuadarEmpresas.php';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../SIT-Facultades.php");
}

?>