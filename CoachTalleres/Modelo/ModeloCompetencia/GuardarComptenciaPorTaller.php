<?php 
	
require_once "../../../BaseDatos/conexion.php";
session_start();
$IDTaller = $_POST['idTaller2'];

	if (isset($_POST['EnviarDatos'])) {
		

		if (isset($_POST['Competencia']) == null) {
			$_SESSION['message'] = 'No has selecciona ninguna competencia';
			$_SESSION['message2'] = 'danger';
			header("Location: ../../Competencia_Objetivo_Taller.php?id=".urlencode($IDTaller));
		}
		else
		{
			$Competencia=$_POST["Competencia"];
			

			for ($i=0;$i<count($Competencia);$i++)    
			{   

				$consulta=$pdo->prepare("INSERT INTO tallercompetencia (ID_Taller , IDComptenecia) VALUES(:ID_Taller , :IDComptenecia)");
				$consulta->bindParam(':ID_Taller',$IDTaller);
				$consulta->bindParam(':IDComptenecia',$Competencia[$i]);			  
				
				if(!$consulta->execute())
				{
					$_SESSION['message'] = 'Fallo al Guardar competencia';
					$_SESSION['message2'] = 'danger';
					header("Location: ../../Competencia_Objetivo_Taller.php?id=".urlencode($IDTaller));
				}else
				{
					$_SESSION['message'] = 'Competencia Creada con exito';
					$_SESSION['message2'] = 'success';
					header("Location: ../../Competencia_Objetivo_Taller.php?id=".urlencode($IDTaller));
				}


			}


		}

		
	}// Fin del isset de enviar Datos
	else
	{
		echo "Datos no llegando";
	}


 ?>