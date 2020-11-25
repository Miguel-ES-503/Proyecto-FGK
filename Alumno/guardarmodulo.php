<?php
  require_once 'templates/head.php';
	require '../Conexion/conexion.php';
  //Extraemos el carnet del estudiante
  $correo = $_SESSION['Email'];
  $id = $_POST['inscribir2'];
  $stmt =$dbh->prepare("SELECT `ID_Alumno` FROM `alumnos` WHERE correo = '$correo' ");
  $stmt->execute();
  while($row = $stmt->fetch()){
      $IDalumno=$row["ID_Alumno"];
  }
  date_default_timezone_set('America/El_Salvador');
  $date = date('Y-m-d');

if(isset($IDalumno)){
  $sql = "INSERT INTO datos_modulos (id_alumno, estado, fechain,inscripcion,id_modulo) VALUES (?,?,?,?,?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([$IDalumno,'Pendiente', $date,'Si', $id]);
echo'<script type="text/javascript">
			window.location.href="inscribir_modulo.php";
			</script>';
			
		$_SESSION['message'] = "Inscrición Guardada Correctamente";
        $_SESSION['message2'] = 'success';
  }
  else{
    echo'<script type="text/javascript">
    window.location.href="inscribir_modulo.php";
    </script>';
    
  $_SESSION['message'] = "Error";
      $_SESSION['message2'] = 'danger';
  }
?>