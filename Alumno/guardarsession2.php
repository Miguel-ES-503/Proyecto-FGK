<?php
  require_once 'templates/head.php';
?>
<title>Reuniones</title>
<?php
  require_once 'templates/header.php';
  //require_once 'templates/MenuVertical.php';
  require_once 'templates/MenuHorizontal.php';
  require '../Conexion/conexion.php';
  setlocale(LC_TIME, 'es_SV.UTF-8');
?>
<?php 
  //Extraemos el carnet del estudiante
  $stmt1 =$dbh->prepare("SELECT `ID_Alumno`, `SedeAsistencia`, `ID_Sede` FROM `alumnos` WHERE correo='".$_SESSION['Email']."'");
  // Ejecutamos
  $stmt1->execute();
  //id de la session
  $id = $_POST['inscribir'];
  //recorrer datos 
  while($fila = $stmt1->fetch()){
      $alumno=$fila["ID_Alumno"];
      $sedeA=$fila["SedeAsistencia"];
      $sedeB=$fila["ID_Sede"];
  }
      $date = date('n');
if($date == 1 or $date == 2  or $date == 3 or $date == 4 or $date == 5 or $date == 6){
	 $ciclo = "Ciclo 1";
}elseif($date == 7 or $date == 8 or $date == 9 or $date == 10 or $date == 11 or $date == 12){
	 $ciclo = "Ciclo 2";
}

if(isset($id)){
   $sql = "UPDATE  `one_on_one` SET estado = 'Pendiente', cupo = 0, estado_alumno = 'Pendiente', id_alumno = :alumno, ciclo = :ciclo, ID_Sede = :ID_Sede WHERE id = :id and estado = 'Disponible' ";
    $query = $dbh->prepare($sql);
    $query->execute(array(":alumno"=>$alumno,":ciclo"=>$ciclo,":ID_Sede"=>$sedeB, ":id"=>$id));
    echo "<script>window.location.replace('inscribir_session.php');</script>";
    echo "<p class='text-white bg-success p-3 mb-2' text-center> inscripción guardada </p>";
    echo "<script>alert('inscripción guardada');</script>";

}else{
		header("Location: inscribir_session.php");
        echo "<script>window.location.replace('inscribir_session.php');</script>";
    }
?>