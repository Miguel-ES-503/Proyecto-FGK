<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Aprobar módulos</title>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera2.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<link rel='stylesheet' type="text/css" href="css/menumodulos.css">
<link rel="stylesheet" type="text/css" href="css/Aprobar-Modulos.css">  
<link rel='stylesheet' type="text/css" href="css/main.css">
<div class="title">
<a href="modulosMoodle.php" ><img src="../img/back.png" class="icon"></a>
    <h2 class="main-title" >Listado General Módulo 1</h2>
</div>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center" id="main">
<nav class="nav justify-content-center nav-pills nav-fill "  ><ul>
<h2 >Seleccionar Módulo</h2>
<br>
<br>
<b>
        <li><a id="menuu" class="nav-link active pg-0 "  href="AprobarModulos.php" style="background-color:#BE0032; color:white;">C1</a></li>
        <li><a id="menuu" class="nav-link  pg-0" href="modulo2.php" >C2</a></li>
        <li><a id="menuu" class="nav-link pg-0"  href="modulo3.php" >B1</a></li>
        <li><a id="menuu" class="nav-link pg-0"  href="modulo4.php">B2</a></li>
        <li><a id="menuu" class="nav-link pg-0"  href="modulo5.php">A1</a></li>
        <li><a id="menuu" class="nav-link pg-0"  href="modulo6.php">A2</a></li>
</b>
    </ul></nav>
<br>
<!-- <div class="btn" >

  <a href="Reportes/ReporteModulo1.php" target="_blank" ><button class="btn btn-danger" id="button"><img src="../img/PDF.png" style='width: 30px;margin-right: 5px;'>Descargar</button></a>

  <a href="ReportesExcel/ReporteModulo1.php" class="float-left"  ><button class="btn btn-success" id="button"><img src="../img/excell.png" style='width: 30px;margin-right: 5px;'>Descargar</button></a>
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
			
      
			<a href="Reportes/ReporteModulo1.php">
				<button type="button" class="btn btn-danger px-3" class="botonresponsivo" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;">
					<img src="../img/PDF.png" width="25px" height="25px">
					Descargar
				</button>
			</a>
      <br class="salto">
<br class="salto">
	     		<a href="ReportesExcel/ReporteModulo1.php">
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
    require_once 'Modelo/ModeloModulos/ListadoGeneral/listageneral1.php';

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
