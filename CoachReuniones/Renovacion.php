<?php
include 'Modularidad/CabeceraInicio.php';
?>
<title>Renovaciones de Beca</title>
<?php
include 'Modularidad/EnlacesCabecera.php';
include 'Modularidad/MenuHorizontal.php';
require_once '../Conexion/conexion.php';

$ID = trim($_GET['id']);
foreach ($dbh->query("SELECT ID_Empresa FROM alumnos WHERE ID_Alumno = '".$ID."'") as $Uni) {
	$U = $Uni["ID_Empresa"];
}
foreach ($dbh->query("SELECT Nombre FROM alumnos WHERE ID_Alumno = '".$ID."'") as $ES) {
	$Alumno = $ES["Nombre"];
}
foreach ($dbh->query("SELECT imagen FROM usuarios WHERE nombre = '".$Alumno."'") as $PIC) {
	$FotoAlumno = $PIC["imagen"];
}
foreach ($dbh->query("SELECT COUNT(*) AS 'Condicion' FROM renovacion 
	WHERE ID_Alumno = '".$ID."'")  as $CON) {
	$condicion = $CON["Condicion"];
}
?>

<link rel="stylesheet" type="text/css" href="css/Renovacion.css">
<div class="title">
  <a href="javascript:history.back();"><img src="../img/back.png" class="icon"></a>
    <h2 style="font-size: 25px;
    align-items: center;
    font-weight: bold;
    letter-spacing: 2px;margin-top: 10px;margin-left: 5px;">Renovaciones de Beca</h2>
</div>
    <div id="body">
    	
    <table  id="table" class="table table-striped" >
      <br>
<?php 

	if ($condicion < 1) {
			echo "<thead><td colspan='4'><img src='../img/imgUser/$FotoAlumno?>' alt='img de usuario' id='perfil'></td></thead>";
			echo " <thead><td colspan='4'>".utf8_decode($Alumno)."</td></thead>";
 			echo "<td colspan='4' class='alert alert-danger'>Sin renovaciones de Beca</td>";
 		}else
 		{
 		?>
      <thead>
      	<td colspan="4"><img src="../img/imgUser/<?php echo $FotoAlumno?>" alt="img de usuario" id="perfil"></td>
      </thead>
      <thead>
      	<td colspan="4"><?php echo $Alumno ?></td>
      </thead>
      
          <thead class="table-secondary">
            <tr>
              <th>Ciclo</th>
              <th>Año</th>
              <th>Archivo</th>
          </thead>
<tbody>
	<?php 

 		foreach ($dbh->query("SELECT ciclo,año,archivo FROM renovacion 
	WHERE ID_Alumno = '".$ID."' ORDER BY AÑO DESC,ciclo DESC") as $datos) {	


		
		 ?>
		 <tr>
		<td><?php  echo $datos["ciclo"] ?></td>
		<td><?php  echo $datos["año"] ?></td>
		<td><a id="btn" href="Renovaciones/<?php  echo $U."/".$ID."/".$datos["archivo"] ?>" class="btn btn-warning"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg>Ver</a></td>
	</tr>
 		<?php
 		}}
          ?>
        </tbody>
      </table>
    </div>
</body>
</html>
   