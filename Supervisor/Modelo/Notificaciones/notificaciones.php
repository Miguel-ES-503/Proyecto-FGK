<?php
include '../../../BaseDatos/conexion.php';

if (isset($_POST["noti"])) {
  $idUser=$_POST["user"];
  $extraeNotificaciones=$pdo->prepare("SELECT `Id`,`EstadoSolicitud`,`Tipo`,`idSolicitud`,`Estado`, substring_index(u.nombre,' ',1) AS nombreUsuario, u.imagen AS imgUsuario FROM notificaciones n JOIN usuarios u ON n.Id_Remitente=u.IDUsuario WHERE `Id_Receptor`='".$idUser."' ORDER BY FechaHora ASC");
  $extraeNotificaciones->execute();

  $results = $extraeNotificaciones->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results);
}

if (isset($_POST["cuantas"])) {
  // code...
  $idUser=$_POST["user"];
  $cuentaNoti=$pdo->prepare("SELECT COUNT(`Id`) AS TotalNoti FROM `notificaciones` WHERE `Id_Receptor`='".$idUser."' AND `Estado`='Sin revisar'");
  $cuentaNoti->execute();
  if ($cuentaNoti->rowCount()>0) {
    // code...
    $hilera1=$cuentaNoti->fetch();
    $totalNotificaciones=$hilera1["TotalNoti"];
  }
  echo $totalNotificaciones;
}

if (isset($_POST["cambio"])) {
  // code...
  $data = json_decode($_POST['array']);

}


?>
