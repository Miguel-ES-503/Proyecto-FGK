<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos

if (isset($_POST['btnconsultar'])) {
	# code...
	$sede = $_POST['Sedes'];
	$mes = $_POST['mes'];
	$yaer = $_POST['year'];

	  $consulta=$pdo->prepare("SELECT ID_Taller , Fecha , Titulo , `ID_Empresa` ,ID_Sede , FT.Nombre AS 'Tipo' ,t.ID_Formato FROM talleres t INNER JOIN formatotalleres FT ON t.ID_Formato = FT.ID_Formato WHERE YEAR(Fecha) = ? AND MONTH(`Fecha`) = ? AND `ID_Sede` = ? AND `ID_Empresa` = 'FGK' ORDER BY `t`.`Fecha` ASC ");
$consulta->execute(array($yaer,$mes,$sede));

 $consulta4=$pdo->prepare("SELECT COUNT(DISTINCT(I.ID_Alumno)) as 'Total' from inscripciontalleres I INNER JOIN talleres T ON I.ID_Taller = T.ID_Taller WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND YEAR(Fecha) = ? AND MONTH(`Fecha`) = ? ");
            $consulta4->execute(array($sede,$yaer,$mes));//Asistencia real
             
while ($fila2=$consulta4->fetch()){	
			 	$Totalreal = $fila2['Total'];
 }


    $consulta5 = $pdo->prepare("SELECT  COUNT(I.ID_Alumno) as 'Total'
            from inscripciontalleres I
            INNER JOIN talleres T
            ON I.ID_Taller = T.ID_Taller
            WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND T.Fecha AND  YEAR(Fecha) = ? AND MONTH(`Fecha`) = ? ");
    $consulta5->execute(array($sede,$yaer,$mes));//Asistencia impacto

    while ($fila3=$consulta5->fetch()){	
			 	$TotalImpactos = $fila3['Total'];
 }



    $consulta7=$pdo->prepare("SELECT COUNT(DISTINCT(I.ID_Alumno)) as 'TotalHOM' from inscripciontalleres I INNER JOIN talleres T ON I.ID_Taller = T.ID_Taller INNER JOIN alumnos A ON I.ID_Alumno = A.ID_Alumno WHERE T.ID_Sede =  ? AND I.Asistencia = 'Asistio' AND A.Sexo = 'M' AND YEAR(Fecha) = ? AND MONTH(`Fecha`) = ? ");
    $consulta7->execute(array($sede,$yaer,$mes));//Asistencia Real hombres

       while ($fila4=$consulta7->fetch()){	
			 	$TotalHombres = $fila4['TotalHOM'];
 }



 $consulta8 = $pdo->prepare("SELECT  COUNT(DISTINCT(I.ID_Alumno)) as 'TotalMUJ' 
                from inscripciontalleres I
                INNER JOIN talleres T
                ON I.ID_Taller = T.ID_Taller
                INNER JOIN alumnos A
                ON I.ID_Alumno = A.ID_Alumno
                WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND A.Sexo = 'F' AND YEAR(Fecha) = ? AND MONTH(`Fecha`) = ?  ");
 $consulta8->execute(array($sede,$yaer,$mes));//Asistencia real Mujeres

     while ($fila5=$consulta8->fetch()){	
			 	$TotalMujer = $fila5['TotalMUJ'];
 }


  $consulta9 = $pdo->prepare("SELECT COUNT(ID_Taller) AS 'Charla' FROM `talleres` WHERE ID_Formato = 'SITC' AND `ID_Sede` = ? AND YEAR(Fecha) = ? AND MONTH(`Fecha`) = ? ");
 $consulta9->execute(array($sede,$yaer,$mes));//total charla

     while ($fila6=$consulta9->fetch()){	
			 	$TotalCharla = $fila6['Charla'];
 }
 
 $consulta12 = $pdo->prepare("SELECT COUNT(ID_Taller) AS 'Taller' FROM `talleres` WHERE ID_Formato = 'SITT' AND `ID_Sede` = ? AND YEAR(Fecha) = ? AND MONTH(`Fecha`) = ? ");
 $consulta12->execute(array($sede,$yaer,$mes));//total charla

     while ($fila7=$consulta12->fetch()){	
			 	$TotalTaller = $fila7['Taller'];
 }


  $consulta13 = $pdo->prepare("SELECT COUNT(ID_Taller) AS 'Foros' FROM `talleres` WHERE ID_Formato = 'SITF' AND `ID_Sede` = ? AND YEAR(Fecha) = ? AND MONTH(`Fecha`) = ? ");
 $consulta13->execute(array($sede,$yaer,$mes));//total charla

     while ($fila8=$consulta13->fetch()){	
			 	$TotalForos = $fila8['Foros'];
 }


  $consulta14 = $pdo->prepare("SELECT COUNT(ID_Taller) AS 'Laboratorio' FROM `talleres` WHERE ID_Formato = 'SITL' AND `ID_Sede` = ? AND YEAR(Fecha) = ? AND MONTH(`Fecha`) = ? ");
 $consulta14->execute(array($sede,$yaer,$mes));//total charla

     while ($fila9=$consulta14->fetch()){	
			 	$TotalLab = $fila9['Laboratorio'];
 }



    $consulta15=$pdo->prepare("SELECT COUNT(I.ID_Alumno) as 'TotalHOM' from inscripciontalleres I INNER JOIN talleres T ON I.ID_Taller = T.ID_Taller INNER JOIN alumnos A ON I.ID_Alumno = A.ID_Alumno WHERE T.ID_Sede =  ? AND I.Asistencia = 'Asistio' AND A.Sexo = 'M' AND YEAR(Fecha) = ? AND MONTH(`Fecha`) = ? ");
    $consulta15->execute(array($sede,$yaer,$mes));//Asistencia Real hombres

       while ($fila15=$consulta15->fetch()){	
			 	$TotalHImpacto = $fila15['TotalHOM'];
 }


  $consulta16 = $pdo->prepare("SELECT  COUNT(I.ID_Alumno) as 'TotalMUJ' 
                from inscripciontalleres I
                INNER JOIN talleres T
                ON I.ID_Taller = T.ID_Taller
                INNER JOIN alumnos A
                ON I.ID_Alumno = A.ID_Alumno
                WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND A.Sexo = 'F' AND YEAR(Fecha) = ? AND MONTH(`Fecha`) = ?  ");
 $consulta16->execute(array($sede,$yaer,$mes));//Asistencia real Mujeres

     while ($fila16=$consulta16->fetch()){	
			 	$TotalImpactosM = $fila16['TotalMUJ'];
 }



}








?>



<title>Reporte de talleres por Fecha</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->

<div class="container-fluid text-center">
    <?php 
include 'Modularidad/Menu.php';
?>

       <br>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">Reporte De Talleres</a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="Graficos.php">Reporte Por Taller</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="ReporteFecha.php">Fecha</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="ReporteMensual.php">Mes</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="ReporteCiclo.php">Ciclo</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="ReporteAlumno.php">Por alumno</a>
            </li>
        </ul>
        <!-- Links -->   
    </div>
    <!-- Collapsible content -->
</nav>
<br>



<div class="card" style="margin: 3.5%;  ">
        <div class="dropdown">
            <form id="form" action="MesAsistencia.php" method="POST">
                <div class="row">
                    <div class="col-sm" style="margin:1%;">
                        <select class="browser-default custom-select" name="mes" required>
                        	<option value="" disabled selected class="dropdown-item">Seleccione Mes</option>
                            <option value="01" class="dropdown-item">Enero</option>
                            <option value="02" class="dropdown-item">Febrero</option>
                            <option value="03" class="dropdown-item">Marzo</option>
                            <option value="04" class="dropdown-item">Abril</option>
                            <option value="05" class="dropdown-item">Mayo</option>
                            <option value="06" class="dropdown-item">Junio</option>
                            <option value="07" class="dropdown-item">Julio</option>
                            <option value="08" class="dropdown-item">Agosto</option>
                            <option value="09" class="dropdown-item">Septiembre</option>
                            <option value="10" class="dropdown-item">Octubre</option>
                            <option value="11" class="dropdown-item">Noviembre</option>
                            <option value="12" class="dropdown-item">Diciembre</option>
                     
                         </select>
                    </div>
                    <div class="col-sm" style="margin:1%;">
                        <input type="number" name="year" min="2020" class="form-control" id="F2" placeholder="Seleccione el año" required>   
                    </div>                
                    <div class="col-sm" style="margin: 1%;">
                        <select class="browser-default custom-select" name="Sedes" required >
                        	<option selected disabled value="">Seleccione la sede</option>
                            <option value="SSFT" class="dropdown-item">San Salvador</option>
                            <option value="SAFT" class="dropdown-item">Santa Ana</option>
                            <option value="AHFT" class="dropdown-item">Ahuchapan</option>
                            <option value="SMFT" class="dropdown-item">San Miguel</option>
                     
                         </select>
                    </div>
                    <div class="col-sm" style="margin: 1%;">
                 	<input type="submit" name="btnconsultar" class="btn btn-warning  btn-block" value="Filtrar">
                 </div>
                </div>

                 	  </form>
                </div>
            </div>
       
  

<br>
<div class="card">
		<h5 class="card-header h5 bg-light" style="color: black;">Tabla de asistencia mensual

		<span class="float-right">	
			<?php  if (isset($_POST['btnconsultar'])== null) {

				echo "<button class='btn btn-success px-3' disabled>Descargar</button>";
			}
			else
			{
			echo "<a href='ReportesExcel/ReportesMesTaller.php?id=$sede&id2=$mes&id3=$yaer' class='btn btn-success px-3'>Descargar</a>";	
			} 
			?>
			
		</span>

	
		
	</h5>	
	<div class="card-body">
		<div class="table-responsive">
			<br>
		    <h4 style="color: white;">SEDE: <?php echo  $sede . " -   Mes:"; 
		    if($mes == 01){echo "Enero";}
		    elseif ($mes == 02) { echo "Febrero";}
		    elseif ($mes == 03) { echo "Marzo";}	
		    elseif ($mes == 04) { echo "Abril";} 
		    elseif ($mes == 05) { echo "Mayo";} 
		    elseif ($mes == 06) { echo "Junio";}
		    elseif ($mes == 07) { echo "Julio";}
		    elseif ($mes ==  8) { echo "Agosto";}
		    elseif ($mes == 9) {
                echo "Septiembre";
            }
            elseif ($mes == 10) {
                echo "Octubre";
            }
            elseif ($mes == 11) {
                echo "Noviembre";
            }
            elseif ($mes ==12) {
                echo "Diciembre";
                
            }
		     echo " - Año:" . $yaer;

		      ?>  </h4>
			<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
				<thead class="table-secondary">
					<tr>  
					
						<th scope="col">Fecha</th>
						<th scope="col">Nombre del Taller</th>
						<th scope="col" >Tipo</th>
						<th scope="col">Impactos</th>
						
						<th scope="col">Hombres</th>
						<th scope="col">Mujeres</th>

						
					</tr>
				</tr>
			</thead>
			<tfoot class="table-secondary">
				<tr>
				
					<th scope="col">Fecha</th>
					<th scope="col">Nombre del Taller</th>
					<th scope="col" >Tipo</th>
					<th scope="col" >Impactos</th>
					<!--<th scope="col">Real</th>-->
					<th scope="col">Hombres</th>
					<th scope="col">Mujeres</th>
				
				</tr>
			</tr>
		</tfoot> 
		<tbody>
			

			
			<?php
			
		
 
			while ($fila=$consulta->fetch())
			{	
			  echo "
			  	<tr class='table-light'>
					<td>".$fila['Fecha']."</td>
					<td>".utf8_decode($fila['Titulo']) ."</td>
					<td>".utf8_decode($fila['Tipo']) ."</td>
				";

           //La asistencia de impacto
			$consulta3 = $pdo->prepare("SELECT  COUNT(I.ID_Alumno) as 'Total'
            from inscripciontalleres I
            INNER JOIN talleres T
            ON I.ID_Taller = T.ID_Taller
            WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND T.ID_Taller = ? ");
		    $consulta3->execute(array($fila['ID_Sede'],$fila['ID_Taller']));//Asistencoa de impacto
		    $fila3=$consulta3->fetch();
		    echo "<td>".$fila3['Total']."</td>";

		    

		    $consulta10 = $pdo->prepare("SELECT  COUNT(DISTINCT(I.ID_Alumno)) as 'TotalHOM' 
                from inscripciontalleres I
                INNER JOIN talleres T
                ON I.ID_Taller = T.ID_Taller
                INNER JOIN alumnos A
                ON I.ID_Alumno = A.ID_Alumno
                WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND A.Sexo = 'M' AND T.ID_Taller = ? ");
		    $consulta10->execute(array($fila['ID_Sede'],$fila['ID_Taller']));//Asistencia real
		     $fila5=$consulta10->fetch();
		          echo "<td>".$fila5['TotalHOM']."</td>";

		    $consulta11 = $pdo->prepare("SELECT  COUNT(DISTINCT(I.ID_Alumno)) as 'TotalMUJ' 
                from inscripciontalleres I
                INNER JOIN talleres T
                ON I.ID_Taller = T.ID_Taller
                INNER JOIN alumnos A
                ON I.ID_Alumno = A.ID_Alumno
                WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND A.Sexo = 'F' AND T.ID_Taller = ? ");
		      $consulta11->execute(array($fila['ID_Sede'],$fila['ID_Taller']));//Asistencia real
		     $fila6=$consulta11->fetch();
		          echo "<td>".$fila6['TotalMUJ']."</td>";
 					
				echo "</tr>";
				
				
				
			}	


			 ?>

			
		</tbody>        
	</table> 
	<br>


	<table class="table table-hover table-sm table-bordered table-fixed">
			<thead class="table-secondary">
					<tr >  
					
						<th scope="col">Resultado</th>
						<th scope="col">H</th>
						<th scope="col" >M</th>
						
					</tr>
				</tr>
			</thead>
			<tbody>
				<tr class="table-light">
					<td>Resutado de asistencia real</td>
					<td><?php echo $TotalHombres; ?></td>
					<td><?php echo $TotalMujer; ?></td>
				</tr>
					<tr class="table-light">
					<td>Resutado de asistencia Impactos</td>
					<td><?php echo $TotalHImpacto; ?></td>
					<td><?php echo $TotalImpactosM; ?></td>
				</tr>	
			</tbody>		
	</table>
	<table class="table table-hover table-sm table-bordered table-fixed">
			<thead class="table-secondary">
					<tr>  
					
						<th scope="col">Resultado</th>
						<th scope="col">Imapcto</th>
						<th scope="col" >Real</th>
						
					</tr>
				</tr>
			</thead>
			<tbody>
				<tr class="table-light">
					<td>Resutados de asistencias</td>
					<td><?php echo $TotalImpactos; ?></td>
					<td><?php echo $Totalreal; ?></td>
				</tr>	
			</tbody>		
	</table>

	
		<table class="table table-hover table-sm table-bordered table-fixed">
			<thead class="table-secondary">
					<tr>  
					
						<th scope="col">Resultado</th>
						<th scope="col">Taller</th>
						<th scope="col" >Charla</th>
						<th scope="col" >Foro</th>
						<th scope="col" >Laboratorio</th>
						
					</tr>
				</tr>
			</thead>
			<tbody>
				<tr class="table-light">
					<td>Resutados</td>
					<td><?php echo $TotalTaller; ?></td>
					<td><?php echo $TotalCharla; ?></td>
					<td><?php echo $TotalForos; ?></td>
					<td><?php echo $TotalLab; ?></td>
				</tr>	
			</tbody>		
	</table>



</div> <!--Fin de la caja responsivo de la tabla--> 
</div>
</div>


<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>
