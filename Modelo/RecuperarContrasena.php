<?php 

  require_once "../BaseDatos/conexion.php";
  session_start();  

  if(isset($_POST['Restablecer']))
  {

  	$CorreoElectronico = strtolower($_POST['correo']);

  	//Veridcar si el correo exite.

  	$consulta2=$pdo->prepare("SELECT * FROM usuarios WHERE correo = :CuentaCorreo");
		$consulta2->bindParam(":CuentaCorreo",$CorreoElectronico);
		$consulta2->execute();

		if ($consulta2->rowCount() >=0) 
		{

			//Buscamos el correo por medio un recorrido
			$fila=$consulta2->fetch();

			//Verificamos si correo es igual 
			if ($fila['correo'] == $CorreoElectronico) 
			{
			    $NombreUser = $fila['nombre'];
                $PrimerNombre = explode(" ",  $NombreUser);

				$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz1234567890";
				$password = "";
              //Reconstruimos la contraseña segun la longitud que se quiera
				for($i=0;$i <= 10 ;$i++) {
                 //obtenemos un caracter aleatorio escogido de la cadena de caracteres
					$password .= substr($str,rand(0,62),1);
				}

				$Clave= password_hash($password, PASSWORD_DEFAULT);//Incriptamos la contraseña del usuario generado automaticamente

				$consulta=$pdo->prepare("UPDATE usuarios SET   contrasena=:contrasena   WHERE correo=:id");
				$consulta->bindParam(":contrasena",$Clave);
				$consulta->bindParam(":id",$CorreoElectronico);

                //Verifica si ha insertado los datos
				if ($consulta->execute()) 
				{
				//Si todo fue correcto muestra el resultado con exito;

				$asunto = "Restablecer contraseña en Workeys Oportunidades";
				$header2 = "Este correo electrónico ha sido generado automaticamente, por favor no responda a este correo. Hola ".$PrimerNombre[0]." Queremos informarle que su contraseña de Workeys Oportunidades se restableció.La cual es: " .$password. "";
				$Mensaje= "Una vez dentro de la plataforma en configuración podras cambiar la contraseña.No responda a este correo electrónico con su contraseña. Nunca le pediremos su contraseña, y le recomendamos que no la comparta con nadie." ;


				if (mail($CorreoElectronico,$asunto,$Mensaje,$header2)) {
					//Si todo fue correcto muestra el resultado con exito;
					$_SESSION['message'] = 'Correo Enviado';
					$_SESSION['message2'] = 'success';
					echo'<script type="text/javascript">
					window.location.href="../index.php";
					</script>';
				}else
				{
					$_SESSION['message'] = 'Correo No Enviado';
					$_SESSION['message2'] = 'danger';
					echo'<script type="text/javascript">
					window.location.href="../index.php";
					</script>';
				}
			
				}
				else
				{
					$_SESSION['message'] = 'No se pudo Restablcer contraseña';
					$_SESSION['message2'] = 'danger';
					echo'<script type="text/javascript">
					window.location.href="../index.php";
					</script>';
				}

			}
			else
			{

				$_SESSION['message'] = 'Correo no encontrado';
				$_SESSION['message2'] = 'danger';
				echo'<script type="text/javascript">
					window.location.href="RecuperarContrasena.php";
					</script>';
			}
	}


  }
  else 
  {
  	$_SESSION['message'] = 'Correo no encontrado';
	  $_SESSION['message2'] = 'danger';
	  echo'<script type="text/javascript">
					window.location.href="../CambiarContrasena/RecuperarCuenta.php";
					</script>';
  }

 ?>