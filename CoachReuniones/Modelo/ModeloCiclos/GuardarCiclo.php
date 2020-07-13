<?php

//Conexión con la base de datos
require_once "../../../BaseDatos/conexion.php";
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

error_reporting(0);
if ($varsesion == null || $varsesion = "") {
	header("Location: ../login.php");
	die();
}


if ($_POST['idciclo'] == '' ) {
	

	$_SESSION['message'] = 'No has ingresado ningun datos';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../SIT-Ciclos.php"); 
}
else if (isset($_POST['idciclo']))
{
	if (isset($_POST['Guardar_ciclos'])) 
	{
		
		//Declaración de variables 
		$IDCiclo = $_POST['idciclo'];
		$CicloInicio = $_POST['fechaInicio'];
		$CicloFinal = $_POST['fechaFinal'];

		//Consulta para vericar si el ciclo ya fue ingresado
		$consulta1=$pdo->prepare("SELECT * FROM ciclos WHERE ID_Ciclo = :ID_Ciclo");
		$consulta1->bindParam(":ID_Ciclo",$IDCiclo);
		$consulta1->execute();


		if ($consulta1->rowCount() >=0)
		{
			$fila=$consulta1->fetch();

			if ($fila['ID_Ciclo'] == $IDCiclo ) 
			{
				$_SESSION['message'] = 'Ciclo '.$IDCiclo.'  ya fue registrado';
				$_SESSION['message2'] = 'danger';
				header("Location: ../../SIT-Ciclos.php"); 
			}else
			{
				//Prepara la  consulta para insertar un dato
				$consulta=$pdo->prepare("INSERT INTO ciclos(ID_Ciclo,Fechanicio,FechaFinal) VALUES(:id,:inicio,:final)");
			// Pasamos los parametros para la inserción de datos
				$consulta->bindParam(':id',$IDCiclo);
				$consulta->bindParam(':inicio',$CicloInicio);
				$consulta->bindParam(':final',$CicloFinal);

				if (!$consulta->execute()) // Si los datos no fueron correcto Nos dira en una alerta
				{
					$_SESSION['message'] = 'Fallo al Guardar los Datos';
					$_SESSION['message2'] = 'danger';
					header("Location: ../../SIT-Ciclos.php"); 
				} else
				{	
				    //Si todo fue correcto muestra el resultado con exito;
					$_SESSION['message'] = 'Ciclo Guardado con exito';
					$_SESSION['message2'] = 'success';
					header("Location: ../../SIT-Ciclos.php"); 
				}


			}

		}
	}else
	{
		echo "Datos no entrando";
	}
}


?>