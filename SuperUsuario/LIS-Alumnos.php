<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>
<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>Listas De Alumnos</title>
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
    .botonresponsivo {
    max-width: 150px;
    
    margin-bottom: 1px;
    display: block;
    text-decoration: none;
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

<!--Comiezo de estructura de trabajo -->
<link rel="stylesheet" href="css/Competencia.css">

<div class="container-fluid text-center">
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
  <a  class="titulomenu" style="background-color:#ADADB2; color: #2D2D2E; font-size: 25px;">Lista de alumnos</a>
  <a href="LIS-Alumnos.php" class="submenu1">Alumnos</a>
  <a href="LIS-Cuentas.php" class="submenu1">Cuentas</a>
  <a href="javascript:void(0);" class="icon1" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
	
<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>
<div class="float-right"> <?php include 'Modularidad/AlertaCorreo.php'?></div>

<!--/.Navbar-->
<br><br><br><br>
<form action="select.php" method="POST">
<div class="card formu">
	<h5 class="card-header" style="color: black;">Alumnos de  <?php if($ubicacion == "SS"){ echo "San Salvador";}else{ echo "Santa Ana";}?>
		
		<span class="float-right">	
			<button type="button" class="btn btn-primary" class="botonresponsivo" data-toggle="modal" data-target="#exampleModal" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;"><img src="img/contact.png" width="25px" height="25px">
				Realizar Cambios
			</button>

			<a href="SIT-CrearAlumno.php">
				<button type="button" class="btn btn-danger px-3" class="botonresponsivo" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;">
					<img src="img/team.png" width="25px" height="25px">
					Crear alumnos
				</button>
			</a>

	     		<a href="ReportesExcel/ReportesAlumnos.php">
	     			<button type="button" class="btn btn-success px-3" class="botonresponsivo" style="border-radius: 20px;
    border: 2px;
    width: 200px;height: 38px;
     color:white; background-color: green">
	     				<img src="img/excell.png" width="25px" height="25px"> Descargar
	     			</button>
	     		</a>
		</span>
	</h5>	
	<div class="card-body" style="background-color: white;">
		<div class="table-responsive">
			<br>
			<table  id="example" class="table table-hover table-sm table-bordered table-fixed" >
				<thead class="thead-dark">
					<tr> 
						<th scope="col"><input type='checkbox' name='' class='case' value="" id="todos">Todos</th>
						<th scope="col">Carnet</th>
						<th scope="col">Alumno</th>
						<th scope="col">Class</th>
						<th scope="col">Sede</th>
						<th scope="col">Lugar de asistencia</th>
						<th scope="col">STATUS ACTUAL</th>
						<th scope="col">Estado de certificación</th>
						<th scope="col">Actualizar</th>
						<th scope="col">Ver expediente</th>
					</tr>
				</thead>
				<tfoot class="thead-dark">
					<tr>
						<th scope="col">Todos</th>
						<th scope="col">Carnet</th>
						<th scope="col">Alumno</th>
						<th scope="col">Class</th>
						<th scope="col">Sede</th>
						<th scope="col">Lugar de asistencia</th>
						<th scope="col">STATUS ACTUAL</th>
						<th scope="col">Estado de certificación</th>
						<th scope="col">Actualizar</th>
						<th scope="col">Ver expediente</th>						
					</tr>
				</tfoot>
				<tbody>
					<?php
					require_once 'Modelo/ModeloAlumno/MostrarDatosAlumnos.php';
					?>

				</tbody>        
			</table>  

		</div> <!--Fin de la caja responsivo de la tabla-->

	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Realizar cambios al estudiante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <label for="materialRegisterFormFirstName" style="color: black;">Status actual (A LA FECHA)</label>
      	<select type="text" id="estadoAlumno" name="statusActual" class="form-control">
      		<option value="" disabled selected >Seleccione la opción</option>
      		<option value="Becado" >Becado</option>
      		<option value="Declinado" >Declinado</option>
      		<option value="Declinado-apoyo extraordinario">Declinado-apoyo extraordinario</option>
      		<option value="Beca Denegada" >Beca Denegada</option>
      		<option value="Crédito Educativo" >Crédito Educativo</option>
      		<option value="Cambio Tipo Carrera Graduado">Cambio Tipo Carrera Graduado</option>
      		<option value="Cambio Tipo Carrera No Graduado">Cambio Tipo Carrera No Graduado</option>
      		<option value="Beca a la Perseverancia">Beca a la Perseverancia</option>
      		<option value="Beca Cancelada">Beca Cancelada</option>
      		<option value="Egresado">Egresado</option>
      		<option value="Graduado" >Graduado</option>
      		<option value="Pausa" >Pausa</option>
      		<option value="Fallecido">Fallecido</option>
      	</select>	
      	

      	<br>
<label for="materialRegisterFormFirstName" style="color: black;">Fuente de financiamiento</label>
      	<select type="text" id="financiamiento" name="financiamiento" class="form-control" >
      		<option value="" disabled selected >Seleccione la opción</option>
      		<option value="Beca Externa con Apoyo Adicional" >Beca Externa con Apoyo Adicional</option>
      		<option value="Borja" >Borja</option>
      		<option value="FGK" >FGK</option>
      		<option value="FOM" >FOM</option>
      		<option value="Financiamiento Propio" >Financiamiento Propio</option>
      	</select>	
      	

      	<br>
<label for="materialRegisterFormLastName" style="color: black;">Proceso</label>
      	<select id="IDStatus" name="IDStatus" class="form-control" >
      		<?php 
      		echo '<option value="" disabled selected >Seleccione la opción</option>';
      		foreach($pdo->query('SELECT ID_Status,Nombre FROM status') as $row) 
      		{
      			echo '<option value="'.$row['ID_Status'].'">'.$row['Nombre'].'</option>';
      		}
      		echo '</select>';
      		?>
      		
      		<br>
<label for="materialRegisterFormFirstName" style="color: black;">Lugar de asistencia</label>

      		<select type="text" id="Asistencia" name="Asistencia" class="form-control">
      			<option value="" disabled selected >Seleccione la opción</option>
      			<option value="SSFT" >San Salvador</option>
      			<option value="SAFT" >Santa Ana</option>
      		</select>
      		
      </div>
      <div class="modal-footer">

     <button style="color: white;
    background-color: #9d120e;
    border-radius: 20px;
    border: 2px solid #9d120e;
    width: 150px;
    height: 30px; " name="cambiar" value="Actualizar" class="Actualizar">Actualizar</button>

     <!--<input type="submit" name="cambiar" value="Actualizar" class="Actualizar">-->
      </div>
    </div>
  </div>
</div>

</form>
<br><br>

<script type="text/javascript">

	$("#todos").on("click", function() {
		$(".case").prop("checked", this.checked);
	});

            // if all checkbox are selected, check the selectall checkbox and viceversa  
            $(".case").on("click", function() {
            	if ($(".case").length == $(".case:checked").length) {
            		$("#todos").prop("checked", true);
            	} else {
            		$("#todos").prop("checked", false);
            	}
            });
        </script>

<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

