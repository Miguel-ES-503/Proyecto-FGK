<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

<?php 

if ($_GET['id']) {
  
  $id=$_GET['id'];

$consulta=$pdo->prepare("SELECT `ID_HSociales`,ALU.ID_Alumno ,ALU.Nombre , ALU.Class , ALU.ID_Sede ,ALU.ID_Empresa , HS.`estado` , HS.ID_Ciclo FROM hsociales HS INNER JOIN alumnos ALU on HS.`ID_Alumno` = ALU.`ID_Alumno` WHERE HS.`estado` = 'En espera' or HS.`estado` = 'Aprobado'  or  HS.`estado` = 'Rechazado' AND ALU.ID_Alumno = ? ");
$consulta->execute(array($id));


$consulta2=$pdo->prepare("SELECT  correo FROM `alumnos` where  ID_Alumno = ? ");
$consulta2->execute(array($id));

$idcorreo;
  while ($fila2=$consulta2->fetch()) 
  {
    $idcorreo = $fila2['correo'];
  }


}
else
{
  echo "Datos no llegando";
}



 ?>

<title>Lista de reuniones</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.topnav {
  overflow: hidden;
  background-color: #ADADB2;
  max-width: 100%;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  border-width: 3px;
  font-weight: bold;

 
}
.submenu1{
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 18px;
  background-color: #9d120e;
  border-width: 3px;
  font-weight: bold;
  height: 68px;
  letter-spacing: 2px;



}
.icon{
  

}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon1 {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon1 {
    float: right;
    display: inline-block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
    font-size: 15px;
    height: 50px;
  }
  .titulomenu a{
    font-size: 15px;
  }
}
</style>
<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
  <div class="topnav" id="myTopnav">
  <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
  <a  class="titulomenu" style="background-color:#ADADB2; color: #2D2D2E; font-size: 25px;">Horas Sociales</a>
  <a href="AlumnoInicio.php?id=<?php echo$idcorreo ?>" class="submenu1">Expediente Alumno</a>
  
  <a href="javascript:void(0);" class="icon1" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div class="card">
  <div class="card-header">
    <h5>Solicitudes</5>
   
  </div>
  <div class="card-body">
  	<div class="table-responsive">
  		<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed " >
  			<thead class="thead-dark">
  				<tr>  
  					<th scope="col">ID Solicitud</th>
            <th scope="col">Ciclo</th>
  					<th scope="col">Alumno</th>
  					<th scope="col">Class</th>
  					<th scope="col">Sede</th>
  					<th scope="col">Universidad</th>
  					<th scope="col">Estado</th>
  					<th scope="col">Ver</th>
  				</tr>
  			</thead>
  			<tfoot class="thead-dark">
  				<tr>
  				<th scope="col">ID Solicitud</th>
            <th scope="col">Ciclo</th>
  					<th scope="col">Alumno</th>
  					<th scope="col">Class</th>
  					<th scope="col">Sede</th>
  					<th scope="col">Universidad</th>
  					<th scope="col">Estado</th>
  					<th scope="col">Ver</th>
  				</tr>
  			</tfoot>

  			<tbody>
       
       <?php  

       if ($consulta->rowCount()>=1)
       {
        while ($fila=$consulta->fetch()) {

          echo "
          <tr class='table-light'>
          <th>".$fila['ID_HSociales']."</th>
          <th>".$fila['ID_Ciclo']."</th>
          <th>".$fila['Nombre']."</th>
          <th>".$fila['Class']."</th>
          <th>".$fila['ID_Sede']."</th>
          <th>".$fila['ID_Empresa']."</th>
          <th>".$fila['estado']."</th>
          <td><a href='HorasSocialesAlumno.php?id=".$fila['ID_HSociales']."' class='btn btn-success'>Ver Detalles </a> </td>

          </tr>";
  }//fin de while
}// i

       ?>


			</tbody>        
		</table>  

	</div> <!--Fin de la caja responsivo de la tabla-->
  </div>
</div>









<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

