<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Aprobar módulos</title>
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

<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<link rel='stylesheet' type="text/css" href="css/menumodulos.css">
<link rel="stylesheet" type="text/css" href="css/Aprobar-Modulos.css">  
<link rel='stylesheet' type="text/css" href="css/main.css">
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
<div class="topnav" id="myTopnav">
  <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
  <a  class="titulomenu" style="background-color:#ADADB2; color: #2D2D2E; font-size: 25px;">Listado General Módulo 2</a>
  <a href="javascript:void(0);" class="icon1" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>


<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center" id="main">
<nav class="nav justify-content-center nav-pills nav-fill "  ><ul>
<h2 >Seleccionar Módulo</h2>
<br>
<br>
<b>
        <li><a id="menuu" class="nav-link pg-0 "  href="AprobarModulos.php" >C1</a></li>
        <li><a id="menuu" class="nav-link active pg-0" href="modulo2.php" style="background-color:#BE0032; color:white;" >C2</a></li>
        <li><a id="menuu" class="nav-link pg-0"  href="modulo3.php" >B1</a></li>
        <li><a id="menuu" class="nav-link pg-0"  href="modulo4.php">B2</a></li>
        <li><a id="menuu" class="nav-link pg-0"  href="modulo5.php">A1</a></li>
        <li><a id="menuu" class="nav-link pg-0"  href="modulo6.php">A2</a></li>
</b>
    </ul></nav>
<br>
<!-- <div class="btn" >

  <a href="Reportes/ReporteModulo2.php" target="_blank" ><button class="btn btn-danger" id="button"><img src="../img/PDF.png">Descargar</button></a>

  <a href="ReportesExcel/ReporteModulo2.php" class="float-left"  ><button class="btn btn-success" id="button"><img src="../img/excell.png">Descargar</button></a>
</div> -->

<!-- Inicio de tabla de asistencia  -->
<div class="card-body mx-auto  h-100 bg-light " style="color:black; width:80% ">
      <div class="table-responsive w-100" style="color:black;">
        <form action="Aprobartodos.php" method="POST">
     <!--  <span class="float-left">
   <input type="submit" name="Aprobado" value="Aprobado" class="btn btn-primary btn-sm">  -->
        <!-- <input type="submit" name="Reprobado" value="Reprobado" class="btn btn-primary btn-sm">
      </span> -->
      <h5 class="card-header" style="color: black;"><b>Listado de Alumnos</b>
        <br class="salto">
<br class="salto">
		<span class="float-right">	
	
      
			<a href="Reportes/ReporteModulo2.php">
				<button type="button" class="btn btn-danger px-3" class="botonresponsivo" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;">
					<img src="../img/PDF.png" width="25px" height="25px">
					Descargar
				</button>
			</a><br class="salto">
<br class="salto">
      
	     		<a href="ReportesExcel/ReporteModulo2.php">
	     			<button type="button" class="btn btn-success px-3" style="border-radius: 20px;
    border: 2px;
    width: 200px;height: 38px;
     color:white; background-color: green">
	     				<img src="img/excell.png" width="25px" height="25px"> Descargar
	     			</button>
	     		</a>
		</span>
  </h5>	<br class="salto">
<br class="salto">
        <!-- <input type="submit" name="Aprobado" value="Aprobado" class="btn btn-primary btn-sm">
        <input type="submit" name="Reprobado" value="Reprobado" class="btn btn-primary btn-sm"> -->
    <br>
      <table  id="example" class="table table-sm table-bordered  h-100 w-100  "  >
      <br>
          <thead class="table-dark h-100 w-100">
            <tr class="thead-dark">
            
              <th scope="col">ID Alumno</th>
              <th scope="col">Alumno</th>
              <th scope="col">Sexo</th>
              <th scope="col">Class</th>
              <th scope="col">Universidad</th>
              <th scope="col">Estado Modulo Actual</th>
              <th scope="col">Estado Certificación</th>
            </tr>
          </thead>
<tbody>
<?php
    require_once 'Modelo/ModeloModulos/ListadoGeneral/listageneral2.php';

?>
        </tbody>
      </table>
</form>
    </div>
  </div>

</div>
<br>
<?php include_once "js/lista.php"; ?>
</script>

        <div class="footer-copyright text-center py-3" style="background: black;margin-top:10%;">
                  <img class="img-fluid" src="../img/funda.png" width="60px">
                  </img>
                  <img class="img-fluid" src="../img/logoblanco2.png" style="margin-left:30px;"></img>
                  <span style="margin-right:50px; margin-left:50px; color:white; font-size: 18px;">© 2020 Copyright: Pograma Oportunidades</span>
                  <span style="color: white; font-weight: bold; font-size: 18px;">Contáctanos:</span><a href="https://www.facebook.com/exalumnos.ccgk"><img class="img-fluid" src="../img/facebook.png" style="margin-left:30px; width:60px;"></img></a>
                  <a href="https://instagram.com/bk2oportunidades?igshid=4rmcd55eld5h"><img class="img-fluid" src="../img/instagram.png" style="margin-left:30px; width:60px;"></a></img>

          </div>
