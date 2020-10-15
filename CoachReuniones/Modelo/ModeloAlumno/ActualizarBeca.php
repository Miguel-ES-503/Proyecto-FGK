<?php
require_once "../../../BaseDatos/conexion.php";
require_once "../../../Conexion/conexion.php";

session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

error_reporting(0);
 $comparar = $_POST['idsave']; 
 $dato2 = $_POST['idEstado'];
 $dato3 = $_POST['userpassword'];
 $correo =  $_SESSION['Email'];
 $correoEstudiante = $_POST['correo'];
 


 $stmt = $dbh->query("SELECT * FROM usuarios WHERE correo = '$correo' ");
 while ($row = $stmt->fetch()) {
	  $passuser = $row['contrasena'];
 }
 

 if (isset($comparar)) {
	
		if (password_verify($dato3, $passuser)) {
    	try{
        $sql2 = "UPDATE alumnos SET StatusActual = ? WHERE correo =?";
        if($pdo->prepare($sql2)->execute([$dato2, $correoEstudiante])){ 
        
		$_SESSION['message'] = "Beca modificada Correctamente";
        $_SESSION['message2'] = 'success';

        echo $dato2;
        echo $correoEstudiante;
        echo $correo;
        header("Location:../../LIS-Alumnos.php");
		}
	}catch (PDOException $e) {
        $_SESSION['message'] = 'Fallo al modificar la Beca';
        $_SESSION['message2'] = 'danger';
    		header("Location:../../LIS-Alumnos.php");
	  }
	}else{
		echo "<p class='p-1 mb-1 bg-danger text-white text-center'>Error, la contraseña de usuario en incorrecta.</p>";

	
   }
   
}
?>