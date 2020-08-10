<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
?>
<title>Reportes</title>



<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
$Coont = 0;
?>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid">
    <div class="card" style="margin: 3.5%; ">
        <div class="dropdown">
            <form id="form" action="" method="POST">
                <div class="row">
                    <div class="col-sm">
                        <select class="browser-default custom-select" name="Meses" onchange="">
                            <option value="January" class="dropdown-item">Enero</option>
                            <option value="February" class="dropdown-item">Febrero</option>
                            <option value="March" class="dropdown-item">Marzo</option>
                            <option value="April" class="dropdown-item">Abril</option>
                            <option value="May" class="dropdown-item">Mayo</option>
                            <option value="June" class="dropdown-item">Junio</option>
                            <option value="July" class="dropdown-item">Julio</option>
                            <option value="August" class="dropdown-item">Agosto</option>
                            <option value="September" class="dropdown-item">Septiembre</option>
                            <option value="October" class="dropdown-item">Octubre</option>
                            <option value="November" class="dropdown-item">Noviembre</option>
                            <option value="December" class="dropdown-item">Diciembre</option>
                            <?php 
                       
                                if (isset($_POST['Meses']) != Null) {
                                    $TU = $_POST['Meses'];
                                    echo "<option class='dropdown-item' selected disabled style='display:none'>".$TU."</option>";
                                   
                                } 
                                else{
                                     echo "<option class='dropdown-item' selected disabled style='display:none'>Meses</option>";
                                }
                            
								
								?>
                        </select>

                        <!--input id='txtMeses' value="<?php echo $FMeses?>" class="form-control" type="text"
                            placeholder="Default input" style="width: 35%; margin-top: 5%;"-->

                    </div>
                    <div class="col-sm">
                        <select class="browser-default custom-select" name="Sedes" onchange="">
                               <option value="SSFT" class="dropdown-item">San Salvador</option>
                                <option value="SAFT" class="dropdown-item">Santa Ana</option>
                                <option value="AHFT" class="dropdown-item">Ahuchapan</option>
                                <option value="SMFT" class="dropdown-item">San Miguel</option>
                            

                            <?php 
							   if (isset($_POST['Sedes']) != Null) {
                                if ($_POST['Sedes'] == 'SSFT') {
                                    echo "<option class='dropdown-item' selected disabled style='display:none'>San Salvador</option>";
                                }elseif($_POST['Sedes'] == 'SAFT'){
                                        echo "<option class='dropdown-item' selected disabled style='display:none'>Santa Ana</option>";
                                }elseif($_POST['Sedes'] == 'AHFT'){
                                        echo "<option class='dropdown-item' selected disabled style='display:none'>Ahuchapan</option>";
                                }
                                else{
                                    echo "<option class='dropdown-item' selected disabled style='display:none'>San Miguel</option>";
                                }
                                   
                                    
                                   
                                } 
                                else{
                                     echo "<option class='dropdown-item' selected disabled style='display:none'>Sedes</option>";
                                }
								?>
                        </select>
                        <!--input id='txtMeses' value="<?php echo $FSedes?>" class="form-control" type="text"
                            placeholder="Default input" style="width: 35%; margin-top: 5%;"-->

                    </div>
                    <div class="col-sm">
                        <select class="browser-default custom-select" name="Year">
                            <?php 
								require_once 'Modelo/CargarAnos.php';
								?>
                            <?php 
							   if (isset($_POST['Year']) != Null) {
                                    $TU = $_POST['Year'];
                                    echo "<option class='dropdown-item' selected disabled style='display:none'>".$TU."</option>";
                                   
                                } 
                                else{
                                     echo "<option class='dropdown-item' selected disabled style='display:none'>Anos</option>";
                                }
								?>
                        </select>
                        
                    </div>
                    <div class="col-sm">
            <button id="btnEnviarForm" onclick="submitformM()" class="btn btn-warning btn-lg btn-block"> Filtrar</button>
        </div>
                </div>
            </form>
      
            <!--a class="dropdown-item" href="javaScript:Meses(4)" value="San">Enereo </a-->
            <script>
            function submitformM() {
                document.getElementById('form').submit();

            }
            </script>

            <?php
						if (isset($_POST['Meses'])) {
						$GLOBALS['FMeses'] = $_POST['Meses'];//Variable Global para usar en el filtro

						
						//echo $TU;	

					}
					if (isset($_POST['Sedes'])) {
						$GLOBALS['FSedes'] = $_POST['Sedes'];
							//echo $T; 
					}
					if (isset($_POST['Year'])) {
						$GLOBALS['FYear'] = $_POST['Year'];
							//echo $T; 
					}
					?>
        </div>



        <!--Fin del btnFiltroSedes-->
        
    </div>
</div>

<?php /*
	<div class="card" >
		<div class="card-header">
			Lista de talleres Activos 
		</div>
		<div class="card-body">
			<div class="">
			<div style="margin: 0px 0px 0px 50px;">
				<table class="ui sinlge line  selectable  striped table " id="example" style="width: 100%;" >
					<thead>
						<tr>
							<th scope="col">
								Titulo
							</th>
							<th scope="col">
								Año
							</th>
							<th scope="col">
								Mes
							</th>
							<th scope="col">
								Tipo
							</th>
							<th scope="col">
								Sede
							</th>
							<th scope="col">
								Empresa
							</th>	
							<th scope="col">
								Reporte
							</th>																
						</tr>
					</thead>
					<tbody>

						<?php
						require_once 'Modelo/CargarMesesReporte.php';						
						?>

            </tbody>
            </table>
            </div>
            </div>

            </div>
            <!--Fin de la caja responsivo de la tabla-->
            </div>*/
?>

<!--Consulta para traer los datos -->
<?php 
		$GLOBALS['id'] =  $_GET['id'];
		$consulta1=$pdo->prepare("SELECT  COUNT(DISTINCT(I.ID_Alumno)) as 'Total'
			from inscripciontalleres I
			INNER JOIN talleres T
			ON I.ID_Taller = T.ID_Taller
			WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND Date_Format(T.Fecha,'%M') = ? AND Date_Format(T.Fecha,'%Y') = ?");

		$consulta2 = $pdo->prepare("SELECT  COUNT(I.ID_Alumno) as 'Total'
			from inscripciontalleres I
			INNER JOIN talleres T
			ON I.ID_Taller = T.ID_Taller
			WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND Date_Format(T.Fecha,'%M') = ? AND Date_Format(T.Fecha,'%Y') = ?");


		$consulta3=$pdo->prepare("SELECT COUNT(E.ID_Alumno) as 'Total'
			from evaluaciontalleres E
			INNER JOIN talleres T 
			ON E.ID_Taller = T.ID_Taller
			where E.Rating = '0' AND  Date_Format(T.Fecha,'%M') = ? AND T.ID_Sede = ? AND Date_Format(T.Fecha,'%Y') = ?");

		$consulta4=$pdo->prepare("SELECT COUNT(E.ID_Alumno) as 'Total'
			from evaluaciontalleres E
			INNER JOIN talleres T 
			ON E.ID_Taller = T.ID_Taller
			where E.Rating = '50' AND  Date_Format(T.Fecha,'%M') = ? AND T.ID_Sede = ? AND Date_Format(T.Fecha,'%Y') = ? ");

		$consulta5=$pdo->prepare("SELECT COUNT(E.ID_Alumno) as 'Total'
			from evaluaciontalleres E
			INNER JOIN talleres T 
			ON E.ID_Taller = T.ID_Taller
			where E.Rating = '100' AND  Date_Format(T.Fecha,'%M') = ? AND T.ID_Sede = ? AND Date_Format(T.Fecha,'%Y') = ?");
		$consulta6=$pdo->prepare("SELECT COUNT(E.ID_Alumno) as 'Total' 
			from evaluaciontalleres E
			INNER JOIN talleres T 
			ON E.ID_Taller = T.ID_Taller
			where  Date_Format(T.Fecha,'%M') = ? AND T.ID_Sede = ? AND Date_Format(T.Fecha,'%Y') = ? ");


		$consulta1->execute(array($FSedes,$FMeses,$FYear));//Asistencia de Impacto
		$consulta2->execute(array($FSedes,$FMeses,$FYear));//Asistencoa Real
		$consulta3->execute(array($FMeses,$FSedes,$FYear));//Todal con Rating = 0
		$consulta4->execute(array($FMeses,$FSedes,$FYear));//Todal con Rating = 50
		$consulta5->execute(array($FMeses,$FSedes,$FYear));//Todal con Rating = 100
		$consulta6->execute(array($FMeses,$FSedes,$FYear));//Todal de evaluaciones
		//WHERE I.Asistencia = 'Asistio' AND T.ID_Sede = 'SSFT' AND Date_format(T.Fecha,'%M') ='November'

		$conteo1;
		$conteo2;
		$conteo3;
		$conteo4;
		$conteo5;
		$conteo6;
    	if ($consulta1->rowCount() >=0)//Para verificar que devuelva algo la consulta
    	{
    		$fila2=$consulta1->fetch();
    		$conteo1 = $fila2['Total'];
    	}
    	
    	if ($consulta2->rowCount() >=0)//Para verificar que devuelva algo la consulta
    	{
    		$fila2=$consulta2->fetch();
    		$conteo2 = $fila2['Total'];
    	}
    	if ($consulta3->rowCount() >=0)//Para verificar que devuelva algo la consulta
    	{
    		$fila2=$consulta3->fetch();
    		$conteo3 = $fila2['Total'];
    	}
    	if ($consulta4->rowCount() >=0)//Para verificar que devuelva algo la consulta
    	{
    		$fila2=$consulta4->fetch();
    		$conteo4 = $fila2['Total'];
    	}
    	if ($consulta5->rowCount() >=0)//Para verificar que devuelva algo la consulta
    	{
    		$fila2=$consulta5->fetch();
    		$conteo5 = $fila2['Total'];
    	}
    	if ($consulta6->rowCount() >=0)//Para verificar que devuelva algo la consulta
    	{
    		$fila2=$consulta6->fetch();
    		$conteo6 = $fila2['Total'];
    	}

    	$Prom0 = round(($conteo3*100)/($conteo6),2);
    	$Prom50 = round(($conteo4*100)/($conteo6),2);
    	$Prom100 = round(($conteo5*100)/($conteo6),2);
    	//echo "<script> OcultarDiv();</script";
    	

    	?>
<!--Finaliza Consulta para traer los datos -->
<!-- Verificacion Datos -->

<!-- Verificacion Datos -->
                 <div id= "ADataA" class="alert alert-danger" role="alert" style="margin: 4%;"> 

                    NO HAY DATOS QUE MOSTRAR DE ASISTENCIA!
                    <script type="text/javascript">
                        var var1 = "<?php echo $conteo1; ?>";
                        var var2 = "<?php echo $conteo2; ?>";
                        var var3 = "<?php echo $Prom0; ?>";
                        var var4 = "<?php echo $Prom50; ?>";
                        var var5 = "<?php echo $Prom100; ?>";
                       // alert(var1+var2+var3)
                        if ((var1 == null || var1 ==0) && (var2 ==null || var2 == 0)) {
                            // (var1 == null && var2 == null && var3 == null && var4 == null  && var5 == null) || (var1 == 0 && var2 == 0 && var3 == 0 && var4 == 0  && var5 == 0)
                        }
                        else{
                            document.getElementById('ADataA').style.display = 'none';
                        }
                    </script>
</div>  

<div class="row" style="margin: 3.5%;">
    <div class="col-sm" id="GAsistencias">
        <!--Inicio la seccion de grafico-->
        <div class="GraficosPanel">
            <!--Load the AJAX API-->
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
            var var1 = "<?php echo $conteo1; ?>";
            var var2 = "<?php echo $conteo2; ?>";
            if (var1 > 0 && var2 > 0) {
                //alert(var1);
                //alert(var2);
                //alert(var1 + var2 + var3);
                // Load the Visualization API and the corechart package.
                google.charts.load('current', {
                    'packages': ['corechart']
                });

                // Set a callback to run when the Google Visualization API is loaded.
                google.charts.setOnLoadCallback(drawChart);

                // Callback that creates and populates a data table,
                // instantiates the pie chart, passes in the data and
                // draws it.
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ["Element", "Density", {
                            role: "style"
                        }],
                        ["Asistencia impacto ", Number(var1), "#b87333"],
                        ["Asistencia Real", Number(var2), "silver"]


                    ]);

                    var view = new google.visualization.DataView(data);
                    view.setColumns([0, 1,
                        {
                            calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation"
                        },
                        2
                    ]);

                    var options = {
                        title: "Asistencia",
                        width: 375,
                        height: 275,
                        bar: {
                            groupWidth: "95%"
                        },
                        legend: {
                            position: "none"
                        },
                    };
                    var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
                    chart.draw(view, options);
                }
            } else {
                document.getElementById('GAsistencias').style.display = 'none';
                //alert('si entro');
            }
            </script>
            <!--Div that will hold the pie chart-->
            <div id="barchart_values" style="width: 375px; height: 275px;"></div>
        </div>
        <!-- Finaliza seccion de grafico-->
    </div>
    <div class="col-sm">

        <div class="card">
            <div class="card-header">
                Asistencia
            </div>
            <div class="card-body">
                <!--h5 class="card-title">Special title treatment</h5-->
                <p class="card-text"><b>Asistencia real:
                    </b> <?php 
				echo $conteo2;
					 /*if ($Prom0 == NULL) {
					 		echo $Prom0 .' %';
					 }	
					 else{
					 	echo '0%';
					 }	*/	
					 ?></p>
                <p class="card-text"><b>Asistencia de impacto: </b> <?php
					 echo $conteo1;
					/* if ($Prom50 == NULL) {
					 		echo $Prom50 .' %';
					 }	
					  else{
					 	echo '0%';
					 }		*/		
					 ?></p>
                <!--a href="#" class="btn btn-primary">Go somewhere</a-->
            </div>
        </div>
    </div>
</div>
 <div id= "ADataE" class="alert alert-danger" role="alert" style="margin: 4%;"> 

                    NO HAY DATOS QUE MOSTRAR DE EVALUACIONES!
                    <script type="text/javascript">
                        
                        var var3 = "<?php echo $Prom0; ?>";
                        var var4 = "<?php echo $Prom50; ?>";
                        var var6 = "<?php echo $conteo6; ?>";
                      // alert(var6);
                        if (var6 == 0 ) {
                            // (var1 == null && var2 == null && var3 == null && var4 == null  && var5 == null) || (var1 == 0 && var2 == 0 && var3 == 0 && var4 == 0  && var5 == 0)
                        }
                        else{
                            document.getElementById('ADataE').style.display = 'none';
                        }
                    </script>
</div> 
<div class="row" style="margin: 3.5%;">
    <div class="col-sm" id="GEvaluaciones">
        <!--Inicio la seccion de grafico Asistencia-->
        <div class="GraficosPanel">
            <!--Load the AJAX API-->
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
            var var3 = "<?php echo $Prom0; ?>";
            var var4 = "<?php echo $Prom50; ?>";
            var var5 = "<?php echo $Prom100; ?>";

            if (var3 > 0 || var4 > 0 || var5 > 0) {

                //alert(var2);
                //alert(var1 + var2 + var3);
                // Load the Visualization API and the corechart package.
                google.charts.load('current', {
                    'packages': ['corechart']
                });

                // Set a callback to run when the Google Visualization API is loaded.
                google.charts.setOnLoadCallback(drawChart);

                // Callback that creates and populates a data table,
                // instantiates the pie chart, passes in the data and
                // draws it.
                function drawChart() {

                    // Create the data table.
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Topping');
                    data.addColumn('number', 'Slices');
                    data.addRows([
                        ['Nada Satisfecho', Number(var3)],
                        ['Poco Satisfecho', Number(var4)],
                        ['Muy Satisfecho', Number(var5)]
                    ]);

                    // Set chart options
                    var options = {
                        'title': 'Promedio mensual evaluaciones',
                        'width': 375,
                        titleTextStyle: {
                            color: 'green',
                            fontName: 15,
                            fontSize: 15,
                            bold: 'true',
                            italic: 'false'
                        },
                        is3D: true,
                        'height': 275,
                        colors: ['#BF0310', '#B6C72C', '#DB9600']
                    };


                    // Instantiate and draw our chart, passing in some options.
                    var chart = new google.visualization.PieChart(document.getElementById('piechar_3d'));
                    chart.draw(data, options);
                }
            } else {
                document.getElementById('GEvaluaciones').style.display = 'none';
                //alert('si entro 2');
            }
            </script>
            <!--Div that will hold the pie chart-->
            <div id="piechar_3d"></div>
        </div>
        <!-- Finaliza seccion de grafico-->
    </div>
    <div class="col-sm">
        <div class="card">
            <div class="card-header">
                Promedio de evaluaciones
            </div>
            <div class="card-body">
                <script>
                var var3 = "<?php echo $Prom0; ?>";
                //alert(var3);
                </script>

                <!--h5 class="card-title">Special title treatment</h5-->
                <p class="card-text"><b>Nada satisfecho: </b> <?php 
    		if ($Prom0 >= 0) {
    			echo $Prom0 .' %';
    		}	
    		else{
    			echo '0%';
    		}			
    		?></p>
                <p class="card-text"><b>Poco satisfecho: </b> <?php
    		if ($Prom50 >= 0) {
    			echo $Prom50 .'%';
    		}	
    		else{
    			echo '0%';
    		}				
    		?>
                </p>
                <p class="card-text"><b>Muy satisfecho: </b> <?php 
    	if ($Prom100 >= 0) {
    		echo $Prom100 .'%';
    	}		
    	else{
    		echo '0%';

    	}			
    	?></p>

                <!--a href="#" class="btn btn-primary">Go somewhere</a-->
            </div>
        </div>
    </div>
</div>
</div>


<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>