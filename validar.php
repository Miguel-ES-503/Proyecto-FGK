<?php

  //Conexión con la base de datos;
include_once 'BaseDatos/conexion.php';


if (isset($_POST['iniciar'])) 
{

 
  	// Veriricas los campos
    if(isset($_POST['correo']) && isset($_POST['contrasena']))
    {
  //Asignar Variables 
  $Correo =strtolower( $_POST['correo']);
  $Clave = $_POST['contrasena'];

  		//Consulta en la base
  $consulta=$pdo->prepare("SELECT * FROM usuarios WHERE correo = :correo");
  $consulta->bindParam(":correo",$Correo);
  $consulta->execute();
  if(isset($_SESSION))
  {
    session_destroy();
  }
  else{
    header('Content-Type: text/html; charset=utf-8');
    session_start();
  }

  if ($consulta->rowCount() >=0) 
  {
   $fila=$consulta->fetch();
   if ($fila['correo'] ==  $Correo && password_verify($Clave, $fila['contrasena'])){
    if($fila['conteo_entradas'] == 0){
      header('Content-Type: text/html; charset=utf-8');
     session_start();
     $_SESSION['Email'] = $fila['correo'];

     header("Location: CambiarContrasena/CambioContra.php");
   }else
   {
     $Cargo = $fila['cargo'];
     switch ($Cargo) {
      case 'SuperUsuario':
        header('Content-Type: text/html; charset=utf-8');
      session_start();
      $_SESSION['Email'] = $fila['correo'];
      $_SESSION['Lugar'] = $fila['SedeAsistencia'];
      $_SESSION['Foto'] = $fila['imagen'];
      $_SESSION['Nombre'] = $fila['nombre'];
      $_SESSION['iduser'] = $fila['IDUsuario'];
      $_SESSION['Cargo']='SuperUsuario';
      header("Location: SuperUsuario/index.php");
      break;

      case 'Coach Fase 3':
        header('Content-Type: text/html; charset=utf-8');
      session_start();
      $_SESSION['Email'] = $fila['correo'];
      $_SESSION['Lugar'] = $fila['SedeAsistencia'];
      $_SESSION['Foto'] = $fila['imagen'];
      $_SESSION['Nombre'] = $fila['nombre'];
      $_SESSION['iduser'] = $fila['IDUsuario'];
      $_SESSION['Cargo']='Coach Fase 3';
      header("Location: CoachTalleres/index.php");
      break;



       case 'Coach Fase 2':
        header('Content-Type: text/html; charset=utf-8');
      session_start();
      $_SESSION['Email'] = $fila['correo'];
      $_SESSION['Lugar'] = $fila['SedeAsistencia'];
      $_SESSION['Foto'] = $fila['imagen'];
      $_SESSION['Nombre'] = $fila['nombre'];
      $_SESSION['iduser'] = $fila['IDUsuario'];
      $_SESSION['Cargo']='Coach Fase 2';
      header("Location: CoachReuniones/index.php");
      break;


      case 'SuperVisor':
        header('Content-Type: text/html; charset=utf-8');
      session_start();
      $_SESSION['Email'] = $fila['correo'];
      $_SESSION['Lugar'] = $fila['SedeAsistencia'];
      $_SESSION['Foto'] = $fila['imagen'];
      $_SESSION['Nombre'] = $fila['nombre'];
      $_SESSION['Cargo']='SuperVisor';
      header("Location: Supervisor/IndexSupervisor.php");
      break;
      
      case 'Estudiante':
        header('Content-Type: text/html; charset=utf-8');
      session_start();
      $_SESSION['Email'] = $fila['correo'];
      $_SESSION['Lugar'] = $fila['SedeAsistencia'];
      $_SESSION['Foto'] = $fila['imagen'];
      $_SESSION['Cargo']='Estudiante';
      header("Location: Alumno/index.php");
      break;


      case 'Auxiliar':
        header('Content-Type: text/html; charset=utf-8');
      session_start();
      $_SESSION['Email'] = $fila['correo'];
      $_SESSION['Lugar'] = $fila['SedeAsistencia'];
      $_SESSION['Foto'] = $fila['imagen'];
      $_SESSION['Nombre'] = $fila['nombre'];
      $_SESSION['iduser'] = $fila['IDUsuario'];
      $_SESSION['Cargo']='Auxiliar';
      header("Location: Auxiliar/index.php");
      break;

      default:
					echo "No encuentra los cargo";
      break;
    }

  }

}else
{
  //Para validar si ya fallo la contrasena o email y asi mantener el correo en el input
  $_SESSION['Iniciado'] = $_POST['correo'];
 $_SESSION['ValidaEntrada'] = 'fallo';
    header('Location: index.php');

  exit;
  //include 'login.php';
  

}
}


}
else
{
  echo "Datos de entras no fueron encontradas";
}

}
else
{

 include 'index.php';
 //echo "<script>swal({title:'Error',text:'No se pude ejecutar la acción',type:'error'});</script>";

}






?>