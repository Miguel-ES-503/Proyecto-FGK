<?php

require_once "../../../BaseDatos/conexion.php";
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

error_reporting(0);
if ($varsesion == null || $varsesion = "") {
	header("Location: ../login.php");
	die();
}


if ($_POST['CuentaCorreo'] == '' )
{
	$_SESSION['message'] = 'No has ingresado ningun datos';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../SIT-CrearCuenta.php");	
}
else if (isset($_POST['CuentaCorreo'])) 
{
	if(isset($_POST['Guardar_Cuenta']))
	{

    // Declaración de variable
		$Correo= strtolower($_POST['CuentaCorreo']);
		$Sede = $_POST['CuentaSede'];
		$rol= $_POST['cargo'];
		$SedeAsistencia = $_POST['Asistencia'];
		$Nombre = utf8_decode($_POST['nombre']);
		$ImgDefault = "imgDefault.png";

	//Consutla para vericar si una cuneta ya existe
		$consulta2=$pdo->prepare("SELECT * FROM usuarios WHERE correo = :CuentaCorreo");
		$consulta2->bindParam(":CuentaCorreo",$Correo);
		$consulta2->execute();


		if ($consulta2->rowCount() >=0) 
		{
		//Buscamos el correo por medio un recorrido
			$fila=$consulta2->fetch();

		//Verificamos si correo es igual 
			if ($fila['correo'] == $Correo) 
			{
				$_SESSION['message'] = 'Correo Electronico en existente';
				$_SESSION['message2'] = 'danger';
				header("Location: ../../SIT-CrearCuenta.php");
		}// si no existe el correo podra crear la cuenta
		else
		{
			
			$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz1234567890";
			$password = "";
   //Reconstruimos la contraseña segun la longitud que se quiera
			for($i=0;$i <= 10 ;$i++) {
      //obtenemos un caracter aleatorio escogido de la cadena de caracteres
				$password .= substr($str,rand(0,62),1);
			}


			$Clave= password_hash($password, PASSWORD_DEFAULT); // incritamos la contraseña

			$consulta3=$pdo->prepare("INSERT INTO usuarios(nombre,correo,contrasena,imagen,ID_Sede,cargo,SedeAsistencia) VALUES(:nombre,:correo,:contra,:imagen,:sede,:cargo,:asis)");
			$consulta3->bindParam(':nombre',$Nombre);
			$consulta3->bindParam(':correo',$Correo);
			$consulta3->bindParam(':contra',$Clave);
			$consulta3->bindParam(':imagen',$ImgDefault);
			$consulta3->bindParam(':sede',$SedeAsistencia);
			$consulta3->bindParam(':cargo',$rol);
			$consulta3->bindParam(':asis',$SedeAsistencia);


			if (!$consulta3->execute()) 
			{
				$_SESSION['message'] = 'Fallo al Guardar crear cuenta';
				$_SESSION['message2'] = 'danger';
				header("Location: ../../SIT-CrearCuenta.php");
			}
			else
			{	

               //Enviamos el correo para  mandar la contraseña generado
				$PrimerNombre = explode(" ", $Nombre);
				$asunto = "Workeys Oportunidades";
$header = "Este correo electrónico ha sido generado automáticamente, por favor no responda a este correo. Hola ".$PrimerNombre[0]. " queremos darte  la noticia que te han inscrito a una plataforma  llamada  Workeys Oportunidades la cuál podrá acceder en la siguiente  URL  http://portal.workeysoportunidades.org/";
$Mensaje= "La cuál podrás acceder  con tu correo  oficial de  Oportunidades y tu contraseña  es " .$password. " una  vez accediendo a la plataforma podrás cambiarla. Tu cargo asignado es.  ".$rol ." \n Saludos Cordiales.";

				if (mail($Correo,$asunto,$Mensaje,$header)){
					//Si todo fue correcto muestra el resultado con exito;
					$_SESSION['message3'] = 'Correo Enviado';
					$_SESSION['message4'] = 'success';

				} else 
				{
					$_SESSION['message3'] = 'Correos No Enviado';
					$_SESSION['message4'] = 'danger';

				}

				$_SESSION['message'] = 'Cuenta creado con exito';
				$_SESSION['message2'] = 'success';

				header("Location: ../../SIT-CrearCuenta.php");
			 }// else que todo fue lo correcto
		}// fin de else de verificar la consulta del correo
	}//if para evaluzar si hay datos



}
else 
{
	$_SESSION['message'] = 'Datos No ingresados Form GuardarCuenta.php';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../SIT-Cuentas.php");
}	
}



?>