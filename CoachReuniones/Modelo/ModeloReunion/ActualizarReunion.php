<?php 

require_once "../../../BaseDatos/conexion.php"; 

session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

 	if (isset($_POST['ActualizarReunion'])) 
 	{
 	   	
 	   	$NombreReunion = $_POST['NombreReunion'];
		$FechaReunion = $_POST['fecha'];
		$LugarReunion = $_POST['idempresa'];
		$Ciclo = $_POST['idCICLO'];
		$Estado = $_POST['estado'];
		$Tipo = $_POST['tipo'];
		$IDReunion = $_POST['idReunion'];
		$Place = $_POST['Lugar'];

		$consulta=$pdo->prepare("UPDATE reuniones SET Titulo=:Titulo , Fecha = :Fecha , ID_Empresa = :ID_Empresa ,  ID_Ciclo = :ID_Ciclo , Estado = :Estado , Tipo = :Tipo , Lugar = :place  WHERE ID_Reunion =:id");
		$consulta->bindParam(":Titulo",$NombreReunion);
		$consulta->bindParam(":Fecha",$FechaReunion);
		$consulta->bindParam(":ID_Empresa",$LugarReunion);
		$consulta->bindParam(":ID_Ciclo",$Ciclo);
		$consulta->bindParam(":Estado",$Estado);
		$consulta->bindParam(":Tipo",$Tipo);
		$consulta->bindParam(":id",$IDReunion);
		$consulta->bindParam(":place",$Place);
		


	//Verifica si ha insertado los datos
		if ($consulta->execute()) 
		{
				//Si todo fue correcto muestra el resultado con exito;
			$_SESSION['message'] = 'Reunión Actualizado con exito';
			$_SESSION['message2'] = 'success';
			header("Location: ../../LIS-Reunion.php");
		}
		else
		{
			$_SESSION['message'] = 'Reunión No Actualizdo';
			$_SESSION['message2'] = 'danger';
			header("Location: ../../LIS-Reunion.php");
		}



	}else
	{
		echo "Datos no entrando";
	}


	?>