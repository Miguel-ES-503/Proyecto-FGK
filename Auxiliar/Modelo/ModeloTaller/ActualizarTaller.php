<?php 

	require_once "../../../BaseDatos/conexion.php";
	session_start(); 

	$varsesion = $_SESSION['Email'];
	$varLugar = $_SESSION['Lugar'];



 if (isset($_POST['Actualizar_Taller'])) {
 	
 	//Declaración de variables
		$NombreTaller = $_POST['TitutloTaller'];
		$Fecha = $_POST['Fecha'];
		$Horario = $_POST['Horario'];
		$TipoTaller = $_POST['TipoTaller'];
		$ciclo =$_POST['ciclo'];
		$Empresa = $_POST['empresa'];
		$Cupo = $_POST['Cantidad'];
		$Estado = $_POST['estado'];
		$IDTaller = $_POST['IDTaller'];

		$lugar = $_POST['lugar'];

		$InicialDep = $varLugar [0]; // Extraemos la primera letra
		$FinalDep = $varLugar [1]; // Extraemos la segunda letra

		//Concatenamos
		$FullTime = "FT";


		$LugarFT=$InicialDep . $FinalDep . $FullTime; //Ejemplo SSFT


		$consulta=$pdo->prepare("UPDATE talleres SET Titulo=:Titulo , Fecha =:Fecha , Hora =:Hora , ID_Formato = :ID_Formato , ID_Sede = :ID_Sede , ID_Ciclo = :ID_Ciclo , ID_Empresa = :ID_Empresa , Estado = :Estado , Cupo = :Cupo  , lugar = :lugar WHERE  ID_Taller = :ID_Taller");

		$consulta->bindParam(":Titulo",$NombreTaller);
		$consulta->bindParam(":Fecha",$Fecha);
		$consulta->bindParam(":Hora",$Horario);
		$consulta->bindParam(":ID_Formato",$TipoTaller);
		$consulta->bindParam(":ID_Sede",$LugarFT);
		$consulta->bindParam(":ID_Ciclo",$ciclo);
		$consulta->bindParam(":ID_Empresa",$Empresa);
		$consulta->bindParam(":Estado",$Estado);
		$consulta->bindParam(":Cupo",$Cupo);
		$consulta->bindParam(":lugar",$lugar);
		$consulta->bindParam(":ID_Taller",$IDTaller);

		//Verifica si ha insertado los datos
		if ($consulta->execute()) 
		{
				//Si todo fue correcto muestra el resultado con exito;
			$_SESSION['message'] = 'Taller Actualizado con exito';
			$_SESSION['message2'] = 'success';
			header("Location: ../../LIS-Talleres.php");
		}
		else
		{
			$_SESSION['message'] = 'Taller No Actualizdo';
			$_SESSION['message2'] = 'danger';
			header("Location: ../../LIS-Talleres.php");
		}




 }
 else
 {
 	echo "Datos no entrando";
 }




 ?>