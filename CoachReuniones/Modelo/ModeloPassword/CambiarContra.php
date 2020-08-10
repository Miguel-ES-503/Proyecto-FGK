<?php 

require_once "../../../BaseDatos/conexion.php";
session_start();  
$varsesion = $_SESSION['Email'];

if (isset($_POST['cambiarContra']))
{
	$PasswordVericado = $_POST['ContraVerificado'];

		$Clave= password_hash($PasswordVericado, PASSWORD_DEFAULT);//Incriptamos la contraseña del usuario generado automaticamente

                //Consulta de actualización de datos
		$consulta=$pdo->prepare("UPDATE usuarios SET   contrasena=:contrasena   WHERE correo=:id");
		$consulta->bindParam(":contrasena",$Clave);
		$consulta->bindParam(":id",$varsesion);

        //Verifica si ha insertado los datos
		if ($consulta->execute()) 
		{	

			$_SESSION['message'] = 'Contraseña Cambiada';
			$_SESSION['message2'] = 'success';
			header("Location: ../../../login.php");
		}
		else
		{
			$_SESSION['message'] = 'No se pudo Cambiar Contraseña';
			$_SESSION['message2'] = 'danger';
			header("Location: ../../../Configuracion.php");
		}

	}else 
	{
		echo "No esta llegando el dato de entradad";
	}

	?>