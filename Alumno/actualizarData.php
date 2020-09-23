<?php
  require_once 'templates/head.php';
?>
<title>Actualizar</title>
<?php
  require_once 'templates/header.php';
  //require_once 'templates/MenuVertical.php';
  require_once 'templates/MenuHorizontal.php';
 require '../Conexion/conexion.php';
 //Carnet del alumno
 $stmt1 =$dbh->prepare("SELECT `ID_Alumno`  FROM `alumnos` WHERE correo='".$_SESSION['Email']."'");
 $stmt1->execute();
  while($fila = $stmt1->fetch()){
  $alumno=$fila["ID_Alumno"];
  }//Fin de while 


 $cumActualizar = $_POST['cum'];
 $carnetActualizar = $_POST['carnet'];
  $idUni = $_POST['id'];

    // select a particular user by id
$stmt = $dbh->prepare("SELECT * FROM expedienteu WHERE idExpedienteU =:id");
$stmt->execute(['id' => $idUni]); 
   while ($row = $stmt->fetch()) {
         $idDB = $row['idExpedienteU'];
    }
    if (isset($idDB))  {
        if (isset($idUni)) {
             $avance = $_POST['avance'];
            $sql = "UPDATE expedienteu SET cum=?, carnet=?,  avancePensum=? WHERE idExpedienteU=?";
            $stmt111= $dbh->prepare($sql);
            $stmt111->execute([$cumActualizar,  $carnetActualizar, $avance, $idUni]);
            header("Location: expedienteU.php");
    
    }
}else{
      $u = $_POST['Universidad'];
      $idU = $_POST['id'];
      $avance = $_POST['avance'];
      $idUniversidad = rand(15, 9999999999);
      $sql45 = "INSERT INTO `expedienteu`(`idExpedienteU`, `ID_Alumno`, `cum`, `proyecEgreso`, `pensum`, `avancePensum`, 
      `Id_Carrera`, `ID_Empresa`, `estado`, `carnet`)
      VALUES (?,?,?,?,?,?,?,?,?,?)";
       $dbh->prepare($sql45)->execute([$idUniversidad,$alumno, $cumActualizar," "," ",$avance,"$u",$idU,"Activo",$carnetActualizar]);
       header("Location: expedienteU.php"); 
 }    
?>
  <h1 class="text-center text-success" style="font-size:75px"><i class="fas fa-check-circle"></i></h1>
  <h1 class="text-center 7x">Sus datos han sido actualizados</h1>
 <center> <a href="expedienteU.php" class="btn btn-success mx-auto text-center">Regresar al expediente</a><center>
<br><br><br><br><br><br><br><br><br>
<?php
  require_once 'templates/footer.php';
?>