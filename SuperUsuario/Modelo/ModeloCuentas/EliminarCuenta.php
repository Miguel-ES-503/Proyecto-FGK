<?php

require_once "../../../BaseDatos/conexion.php";
session_start();  



$idcuenta = $_POST['IDCuentaUsuario'];

$consulta2=$pdo->prepare("DELETE FROM usuarios WHERE  IDUsuario=:IDcuenta");
$consulta2->bindParam(":IDcuenta", $idcuenta );


$consulta=$pdo->prepare("SELECT * FROM usuarios WHERE IDUsuario = :IDUsuario");
$consulta->bindParam(':IDUsuario',$idcuenta);
$consulta->execute();

$Foto;
if ($consulta->rowCount() >=0)
{
	$fila=$consulta->fetch();
	$Foto = $fila['imagen'];
}

//Verifica si ha insertado los datos
			if ($consulta2->execute()) 
			{

				 if($Foto != "imgDefault.png")
				{
					$destino = "../../../img/imgUser/".$Foto;
					unlink($destino);
				}

				//Si todo fue correcto muestra el resultado con exito;
				$_SESSION['message'] = 'Cuenta Eliminado con exito';
				$_SESSION['message2'] = 'success';
				header("Location: ../../LIS-Cuentas.php");
			}
			else
			{
				$_SESSION['message'] = 'Fallo al Eliminar Cuenta';
				$_SESSION['message2'] = 'danger';
				header("Location: ../../LIS-Cuentas.php");
			}




?>