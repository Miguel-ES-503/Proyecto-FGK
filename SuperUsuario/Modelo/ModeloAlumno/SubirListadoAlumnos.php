<?php 
		require_once "../../../BaseDatos/conexion.php";
		require_once "../../PHPExcel-1.8/Classes/PHPExcel/IOFactory.php";
			session_start();  
			$varsesion = $_SESSION['Email'];
			$varLugar = $_SESSION['Lugar'];

			$archivo = $_FILES["archivo"]["name"];

			if(isset($_POST["crear"])){

				

				//Variable con el nombre del archivo
	$nombreArchivo = $archivo;
	// Cargo la hoja de cálculo
	$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
	
	//Asigno la hoja de calculo activa
	$objPHPExcel->setActiveSheetIndex(0);
	//Obtengo el numero de filas del archivo
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
	
	
	
	for ($i = 1; $i <= $numRows; $i++) {
		
		$nombre = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		$precio = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		$existencia = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
			
		$consulta3=$pdo->prepare("INSERT INTO usuarios(correo,ID_Sede,SedeAsistencia) VALUES(:correo,:sede,:asis)");
			$consulta3->bindParam(':correo',$nombre);
			$consulta3->bindParam(':sede',$precio);
			$consulta3->bindParam(':asis',$existencia);

			$consulta3->execute();
			echo "Consulta realizado";
		
	}



			}else
			{
				echo "Datos no llegando";
			}




 ?>