<?php

require_once "../../../BaseDatos/conexion.php";
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

if (isset($_POST['Guardar_Cuenta'])) 
{

	// Declaración de variable
	$NombreUser = utf8_decode($_POST['nombreUser']);
	$Correo= strtolower($_POST['CuentaCorreo']);
	$Sede = utf8_decode($_POST['CuentaSede']);
	$rol= utf8_decode($_POST['cargo']);
	$id = $_POST['id'];


  
	//Consulta para hacer validaciones
	//Consulta para vericar si el alumno ya fue ingresado
	$consulta2=$pdo->prepare("SELECT correo , nombre  FROM usuarios WHERE IDUsuario = :IDUsuario");
	$consulta2->bindParam(":IDUsuario",$id);
	$consulta2->execute();
	
	//Variables para identificar si existe el correo o nombre
	$IdenCorreo;
	$IdenNombre;

	if ($consulta2 ->rowCount()  >= 1) 
	{
		$fila = $consulta2->fetch();
		$IdenCorreo = $fila['correo'];
		$IdenNombre = $fila['nombre'];
	}




	if ($IdenCorreo != $Correo) 
	{   


		$consulta3=$pdo->prepare("SELECT COUNT(correo) AS 'existencia'  FROM usuarios WHERE correo = :correo");
		$consulta3->bindParam(":correo",$Correo);
		$consulta3->execute();

		$resulCoorreo;

		while ($fila3 = $consulta3->fetch()) 
		{
			$resulCoorreo = $fila3['existencia'];
		}


		if($resulCoorreo >= 1)
		{
			$_SESSION['message3'] = 'Correo ya existe';
			$_SESSION['message4'] = 'danger';
			header("Location: ../../LIS-Cuentas.php");		
		}
		else
		{

				// Si los datos se ejecutaron correctamente nos crear el usuario
			$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz1234567890";
			$password = "";
  						 //Reconstruimos la contraseña segun la longitud que se quiera
			for($i=0;$i <= 10 ;$i++) {
     					 //obtenemos un caracter aleatorio escogido de la cadena de caracteres
				$password .= substr($str,rand(0,62),1);
			}

			 $Clave= password_hash($password, PASSWORD_DEFAULT);//Incriptamos la contraseña del usuario generado automaticamente

			
			$consulta4=$pdo->prepare("UPDATE usuarios SET correo=:correo , contrasena = :contrasena  WHERE IDUsuario = :id ");
			$consulta4->bindParam(":correo",$Correo);
			$consulta4->bindParam(":contrasena",$Clave);
			$consulta4->bindParam(":id",$id);
			$consulta4->execute();

			$PrimerNombre = explode(" ", $NombreUser);

			 $asunto = "Workeys Oportunidades";
			 $header = "Este correo electrónico ha sido generado automaticamente, por favor no responda a este correo. Hola ".$PrimerNombre[0]." queremos darte  la noticia que se ha actualizado tu contraseña la cual podrá acceder en la siguiente  URL  http://portal.workeysoportunidades.org/";
			 $Mensaje= "La cual podrás acceder  con tu correo  oficial de  Oportunidades y tu contraseña  es " .$password. " una  vez accediendo a la plataforma podrás cambiarla. \n\n\nSaludos Cordiales.";


			 if ( mail($Correo,$asunto,$Mensaje,$header)) {
					//Si todo fue correcto muestra el resultado con exito;
			 	$_SESSION['message3'] = 'Correo Enviado';
			 	$_SESSION['message4'] = 'success';

			 } else 
			 {
			 	$_SESSION['message3'] = 'Correo No Enviado';
			 	$_SESSION['message4'] = 'danger';

			 }

			 

			 //Consulta de actualización de datos
			$consulta=$pdo->prepare("UPDATE usuarios SET  ID_Sede=:ID_Sede , cargo=:cargo , SedeAsistencia =:asistencia  WHERE IDUsuario=:id");
			$consulta->bindParam(":ID_Sede",$Sede);
			$consulta->bindParam(":cargo",$rol);
			$consulta->bindParam(":asistencia",$Sede);
			$consulta->bindParam(":id",$id);


	//Verifica si ha insertado los datos
			if ($consulta->execute()) 
			{
				//Si todo fue correcto muestra el resultado con exito;
				$_SESSION['message'] = 'Cuenta Actualizado con exito';
				$_SESSION['message2'] = 'success';
				header("Location: ../../LIS-Cuentas.php");
			}
			else
			{
				$_SESSION['message'] = 'Cuenta No Actualizdo';
				$_SESSION['message2'] = 'danger';
				header("Location: ../../LIS-Cuentas.php");
			}






			}


		}


		if ($IdenNombre != $NombreUser) 
		{
			$consulta5=$pdo->prepare("SELECT COUNT(nombre) AS 'existencia2'  FROM usuarios WHERE nombre = :nombre");
			$consulta5->bindParam(":nombre",$NombreUser);
			$consulta5->execute();

			$resulNombre;

			while ($fila5 = $consulta5->fetch()) 
			{
				$resulNombre = $fila5['existencia2'];
			}

			if ($resulNombre >= 1) 
			{
				$_SESSION['message3'] = 'El nombre ya existe';
				$_SESSION['message4'] = 'danger';

			}else
			{
				$consulta6=$pdo->prepare("UPDATE usuarios SET  nombre=:nombre   WHERE IDUsuario=:id");     	
				$consulta6->bindParam(":nombre",$NombreUser);
				$consulta6->bindParam(":id",$id);
				$consulta6->execute();
			}


			//Consulta de actualización de datos
			$consulta=$pdo->prepare("UPDATE usuarios SET  ID_Sede=:ID_Sede , cargo=:cargo , SedeAsistencia =:asistencia  WHERE IDUsuario=:id");
			$consulta->bindParam(":ID_Sede",$Sede);
			$consulta->bindParam(":cargo",$rol);
			$consulta->bindParam(":asistencia",$Sede);
			$consulta->bindParam(":id",$id);


	//Verifica si ha insertado los datos
			if ($consulta->execute()) 
			{
				//Si todo fue correcto muestra el resultado con exito;
				$_SESSION['message'] = 'Cuenta Actualizado con exito';
				$_SESSION['message2'] = 'success';
				header("Location: ../../LIS-Cuentas.php");
			}
			else
			{
				$_SESSION['message'] = 'Cuenta No Actualizdo';
				$_SESSION['message2'] = 'danger';
				header("Location: ../../LIS-Cuentas.php");
			}


		}



		//Consulta de actualización de datos
			$consulta=$pdo->prepare("UPDATE usuarios SET  ID_Sede=:ID_Sede , cargo=:cargo , SedeAsistencia =:asistencia  WHERE IDUsuario=:id");
			$consulta->bindParam(":ID_Sede",$Sede);
			$consulta->bindParam(":cargo",$rol);
			$consulta->bindParam(":asistencia",$Sede);
			$consulta->bindParam(":id",$id);


	//Verifica si ha insertado los datos
			if ($consulta->execute()) 
			{
				//Si todo fue correcto muestra el resultado con exito;
				$_SESSION['message'] = 'Cuenta Actualizado con exito';
				$_SESSION['message2'] = 'success';
				header("Location: ../../LIS-Cuentas.php");
			}
			else
			{
				$_SESSION['message'] = 'Cuenta No Actualizdo';
				$_SESSION['message2'] = 'danger';
				header("Location: ../../LIS-Cuentas.php");
			}




    	

	}
	else
	{
		$_SESSION['message'] = 'Datos No ingresados Form ActualizarCuenta';
		$_SESSION['message2'] = 'danger';
		header("Location: ../../Lis-Cuentas.php");
	}

?>