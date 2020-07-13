<?php 

		require_once "../../../BaseDatos/conexion.php";
		session_start();  
		$varsesion = $_SESSION['Email'];
		$varLugar = $_SESSION['Lugar'];


		if (isset($_POST['Inscripcion'])) 
		{
			
			$Fecha = $_POST['Fecha'];
			$Hora = $_POST['Hora'];
			$Estado = "Desactivado";


		$InicialDep = $varLugar [0]; // Extraemos la primera letra
		$FinalDep = $varLugar [1]; // Extraemos la segunda letra

		//Concatenamos
		$FullTime = "FT";


		$LugarFT=$InicialDep . $FinalDep . $FullTime; //Ejemplo SSFT


        //vericamos si existe una inscripcion
        $consulta2=$pdo->prepare("SELECT COUNT(`IDinscripcion`) AS 'Verificar' FROM inscripcion WHERE `ID_Sede` = :idsede");
        $consulta2->bindParam(":idsede",$LugarFT);
        $consulta2->execute();
        
        $conteoInsc;
            
         $fila=$consulta2->fetch();
         $conteoInsc = $fila['Verificar'];
            
          
            
            
            if($conteoInsc >=1)
            {
                   $_SESSION['message'] = 'Ya existe una inscripción';
				   $_SESSION['message2'] = 'danger';
				    header("Location: ../../SIT-ProcesoInscripcion.php");
		

            }else
            {
            $consulta=$pdo->prepare("INSERT INTO inscripcion (ID_Sede , Fecha , Hora , estado) VALUES(:ID_Sede , :Fecha , :Hora , :estado)");
			$consulta->bindParam(':ID_Sede',$LugarFT);
			$consulta->bindParam(':Fecha',$Fecha);
			$consulta->bindParam(':Hora',$Hora);
			$consulta->bindParam(':estado',$Estado);

			if (!$consulta->execute()) 
			{
				$_SESSION['message'] = 'Fallo al Guardar Inscripción';
				$_SESSION['message2'] = 'danger';
				header("Location: ../../SIT-ProcesoInscripcion.php");
			}
			else
			{			 	
				$_SESSION['message'] = 'Inscripción Creada con exito';
				$_SESSION['message2'] = 'success';
				header("Location: ../../SIT-ProcesoInscripcion.php");
			}
             
            }




		}
		else
		{
			echo "No esta llegando el dato";
		}


 ?>
 
 
 