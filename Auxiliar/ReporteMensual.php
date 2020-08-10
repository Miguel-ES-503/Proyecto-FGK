<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
?>
<title>Reporte mensual</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
 
?>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid">
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
                <a class="nav-link active" href="ReporteMensual.php">Mes</a>
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
            <form id="form" action="" method="POST">
                <div class="row">
                    <div class="col-sm" style="margin: 1%;">
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
                             echo "<option class='dropdown-item' selected disabled style='display:none'>Mes</option>";
                         }


                         ?>
                     </select>

                        <!--input id='txtMeses' value="<?php //echo $FMeses?>" class="form-control" type="text"
                            placeholder="Default input" style="width: 35%; margin-top: 5%;"-->

                        </div>
                        <div class="col-sm" style="margin: 1%;">
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
                                 echo "<option class='dropdown-item' selected disabled style='display:none'>Sede</option>";
                             }
                             ?>
                         </select>
                        <!--input id='txtMeses' value="<?php// echo $FSedes?>" class="form-control" type="text"
                            placeholder="Default input" style="width: 35%; margin-top: 5%;"-->
                        </div>
                        <div class="col-sm" style="margin: 1%;">
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
                                 echo "<option class='dropdown-item' selected disabled style='display:none'>Año</option>";
                             }
                             ?>
                         </select>

                     </div>
                     <div class="col-sm" style="margin: 1%;">
                        <button id="btnEnviarForm" onclick="submitformM()" class="btn btn-warning  btn-block">
                        Filtrar</button>
                    </div>

                    
                </div>
            </form>
               <?php
            if (isset($_POST['Meses'])) {
                        $GLOBALS['FMeses'] = $_POST['Meses'];//Variable Global para usar en el filtro

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
            $consulta7=$pdo->prepare("SELECT  COUNT(DISTINCT(I.ID_Alumno)) as 'TotalHOM' 
                from inscripciontalleres I
                INNER JOIN talleres T
                ON I.ID_Taller = T.ID_Taller
                INNER JOIN alumnos A
                ON I.ID_Alumno = A.ID_Alumno
                WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND Date_Format(T.Fecha,'%M') = ? AND Date_Format(T.
                Fecha,'%Y') = ? AND A.Sexo = 'M'");
            $consulta8=$pdo->prepare("SELECT  COUNT(DISTINCT(I.ID_Alumno)) as 'TotalMUJ' 
                from inscripciontalleres I
                INNER JOIN talleres T
                ON I.ID_Taller = T.ID_Taller
                INNER JOIN alumnos A
                ON I.ID_Alumno = A.ID_Alumno
                WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND Date_Format(T.Fecha,'%M') = ? AND Date_Format(T.
                Fecha,'%Y') = ? AND A.Sexo = 'F'");
             $consulta9=$pdo->prepare("SELECT COUNT(E.ID_Alumno) as 'Total'
               from evaluaciontalleres E
               INNER JOIN talleres T 
               ON E.ID_Taller = T.ID_Taller
               where E.Rating = '25' AND  Date_Format(T.Fecha,'%M') = ? AND T.ID_Sede = ? AND Date_Format(T.Fecha,'%Y') = ?");
             $consulta10=$pdo->prepare("SELECT COUNT(E.ID_Alumno) as 'Total'
               from evaluaciontalleres E
               INNER JOIN talleres T 
               ON E.ID_Taller = T.ID_Taller
               where E.Rating = '75' AND  Date_Format(T.Fecha,'%M') = ? AND T.ID_Sede = ? AND Date_Format(T.Fecha,'%Y') = ?");


        //setlocale(LC_TIME, 'es_SV.UTF-8');//PAra que las consultas las devuelva en espanol
        $consulta1->execute(array($FSedes,$FMeses,$FYear));//Asistencia real
        //setlocale(LC_TIME, 'es_SV.UTF-8');
        $consulta2->execute(array($FSedes,$FMeses,$FYear));//Asistencoa de impacto
        $consulta3->execute(array($FMeses,$FSedes,$FYear));//Todal con Rating = 0
        $consulta4->execute(array($FMeses,$FSedes,$FYear));//Todal con Rating = 50
        $consulta5->execute(array($FMeses,$FSedes,$FYear));//Todal con Rating = 100
        $consulta6->execute(array($FMeses,$FSedes,$FYear));//Todal de evaluaciones
        $consulta7->execute(array($FSedes,$FMeses,$FYear));//Total real de hombres que asistieron
        $consulta8->execute(array($FSedes,$FMeses,$FYear));//Total real de mujeres que asistieron
        $consulta9->execute(array($FMeses,$FSedes,$FYear));//Todal con Rating = 25
        $consulta10->execute(array($FMeses,$FSedes,$FYear));//Todal con Rating = 75

        $conteo1;
        $conteo2;
        $conteo3;
        $conteo4;
        $conteo5;
        $conteo6;
        $conteo7;
        $conteo8;
        $conteo9;
        $conteo10;
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
        if ($consulta7->rowCount() >=0)//Para verificar que devuelva algo la consulta
        {
            $fila2=$consulta7->fetch();
            $conteo7 = $fila2['TotalHOM'];
        }
        if ($consulta8->rowCount() >=0)//Para verificar que devuelva algo la consulta
        {
            $fila2=$consulta8->fetch();
            $conteo8 = $fila2['TotalMUJ'];
        }
        if ($consulta9->rowCount() >=0)//Para verificar que devuelva algo la consulta
        {
            $fila2=$consulta9->fetch();
            $conteo9 = $fila2['Total'];
        }
        if ($consulta10->rowCount() >=0)//Para verificar que devuelva algo la consulta
        {
            $fila2=$consulta10->fetch();
            $conteo10 = $fila2['Total'];
        }

        $Prom0 = round(($conteo3*100)/($conteo6),2);
        $Prom50 = round(($conteo4*100)/($conteo6),2);
        $Prom100 = round(($conteo5*100)/($conteo6),2);
        $Prom25 = round(($conteo9*100)/($conteo6),2);
        $Prom75 = round(($conteo10*100)/($conteo6),2);

        ?>
            <div class="row">
                <div class="col-sm"></div>
                
               <div class="col-sm" style="margin: 1%;">
                <?php 
               // echo "<a href='Excel/ExcelMensual.php?id=".$conteo1."&id2=".$conteo2."&id3=".$conteo3."&id4=".$conteo4."&id5=".$conteo5."&id6=".$conteo6."&id7=".$conteo7."&id8=".$conteo8."'>"
               
                echo "<a href='Excel/ExcelMensual.php?id=".$conteo1."&id2=".$conteo2."&id3=".$conteo3."&id4=".$conteo4."&id5=".$conteo5."&id6=".$conteo6."&id7=".$conteo7."&id8=".$conteo8."&id9=".$conteo9."&id10=".$conteo10."' style='text-decoration: none;'>
                <button id='btnGenerarExcel'  class='btn btn-success  btn-block'>
                     <div class='fas fa-file-excel'></div> Excel </button></a>"?>
               
               </div>
               <div class="col-sm">
                 
               </div>
            </div>
           
               <!--a class="dropdown-item" href="javaScript:Meses(4)" value="San">Enereo </a-->
               <script>
                function submitformM() {
                    document.getElementById('form').submit();

                }
            </script>

         
    </div>



                <!--Fin del btnFiltroSedes-->

            </div>
           <!-- Fin del car de los filtros-->

           
        <!--Finaliza Consulta para traer los datos -->
        <!-- Verificacion Datos -->
<div id="ADataA" class="alert alert-danger" role="alert" style="margin: 4%;">

            NO HAY DATOS QUE MOSTRAR DE ASISTENCIA!
            <script type="text/javascript">
                var var1 = "<?php echo $conteo1; ?>";
                var var2 = "<?php echo $conteo2; ?>";
                var var3 = "<?php echo $Prom0; ?>";
                var var4 = "<?php echo $Prom50; ?>";
                var var5 = "<?php echo $Prom100; ?>";
                

                if ((var1 == null || var1 == 0) && (var2 == null || var2 == 0)) {
                    //Lo deja normal con el alert 
    } else {
        document.getElementById('ADataA').style.display = 'none';
    }
</script>
</div>
<div id="imprimir">
<div class="row" style="margin: 3.5%;">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <div class="col-sm" id="GAsistencias">
        <!--Inicio la seccion de grafico-->
        <div  class="GraficosPanel">
            <!--Load the AJAX API-->
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                //Declaramos las variables del chart para poderlas usar fuera de las funciones drawChart, a la hora de generarl el pdf
                var chart ;
                var chart2 ;
                var var1 = "<?php echo $conteo1; ?>";
                var var2 = "<?php echo $conteo2; ?>";
                var Mes = "<?php echo $FMeses;?>";
                var Sede = "<?php echo $FSedes;?>";
                var Years = "<?php echo $FYear;?>";
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
                        ["Asistencia real ", Number(var1), "#b87333"],
                        ["Asistencia de impacto", Number(var2), "silver"]


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
                        width: 475,
                        height: 275,
                        titleTextStyle: {
                            color: 'black',
                            fontName: 15,
                            fontSize: 15,
                            bold: 'true',
                            italic: 'false'
                        },
                        bar: {
                            groupWidth: "95%"
                        },
                        legend: {
                            position: "none"
                        },
                    };
                     chart2 = new google.visualization.BarChart(document.getElementById("barchart_values"));
                    chart2.draw(view, options);
                }
            } else {
                document.getElementById('GAsistencias').style.display = 'none';
         
            }
            //********************Inicio del otro grafico
            var var3 = "<?php echo $conteo3; ?>";
            var var4 = "<?php echo $conteo4; ?>";
            var var5 = "<?php echo $conteo5; ?>";
            var var9 = "<?php echo $conteo9; ?>";
            var var10 = "<?php echo $conteo10; ?>";
           

            if (var3 > 0 || var4 > 0 || var5 > 0 || var9 > 0 || var10 > 0) {

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
                        ['No Satisfecho', Number(var3)],
                        ['Moderadamente Satisfecho', Number(var4)],
                        ['Extremadamente Satisfecho', Number(var5)],
                        ['Poco Satisfecho',Number(var9)],
                        ['Muy Satisfecho',Number(var10)]
                        ]);

                    // Set chart options
                    var options = {
                        'title': 'Promedio  evaluaciones',
                        'width': 475,
                        titleTextStyle: {
                            color: 'black',
                            fontName: 15,
                            fontSize: 15,
                            bold: 'true',
                            italic: 'false'
                        },
                        is3D: true,
                        'height': 275,
                        colors: ['#BF0310', '#B6C72C', '#DB9600','#0030f3','#717175']
                    };


                    // Instantiate and draw our chart, passing in some options.
                     chart = new google.visualization.PieChart(document.getElementById('piechar_3d'));
                     chart.draw(data, options);
                     //LOGICA PARA GENERAR EL PDF
                     var btnSave = document.getElementById('btnGenerarPDF');                     
                     btnSave.addEventListener('click', function () {
                      var doc = new jsPDF('','','letter');
                      doc.text(115, 20,'Reporte talleres de '+ Sede ,'center');
                      doc.text(115, 27,'Año: '+ Years +' y Mes: '+ Mes,'center');

                      doc.text(25,50,'Asistencia');
                      doc.setFontSize(13);
                      doc.text(28,56,'Asistencia Real: '+ var1);
                      doc.text(28,62,'Asistencia Impacto: '+ var2);
                      //doc.line(115, 20, 60, 20); Dibuja la linea
                      doc.text(25,145,'Promedio Evaluaciones');
                     // doc.line(15, 50, 60, 50);
                      doc.setFontSize(13);
                      doc.text(28,151,'Nada satisfecho: '+ var3);
                      doc.text(28,157,'Poco satisfecho: '+ var4);
                      doc.text(28,163,'Muy satisfecho: '+ var5);

                      doc.addImage(chart.getImageURI(), 100, 125);
                      doc.addImage(chart2.getImageURI(), 100, 30);
                      doc.save('chart.pdf');
                  }, false);
                   
                }
            } else {
                document.getElementById('GEvaluaciones').style.display = 'none';
                //alert('si entro 2');
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
            <p class="card-text"><b>Asistencia de impacto:
                </b> <?php 
                echo $conteo2;
					 /*if ($Prom0 == NULL) {
					 		echo $Prom0 .' %';
					 }	
					 else{
					 	echo '0%';
					 }	*/	
					 ?></p>

                    <p class="card-text"><b style="">Asistencia real: </b> <?php
                    echo $conteo1;

                    echo '<br>&emsp; <b> &bull; Hombres: </b>' . $conteo7;
                    echo '<br>&emsp; <b> &bull; Mujeres: </b>' . $conteo8;
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
<div id="ADataE" class="alert alert-danger" role="alert" style="margin: 4%;">

        NO HAY DATOS QUE MOSTRAR DE EVALUACIONES!
       
</div>
<div class="row" style="margin: 3.5%;" >
    <div class="col-sm" id="GEvaluaciones" style="display: ;">
        <!--Inicio la seccion de grafico Asistencia-->
        <div class="GraficosPanel">
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
                <p class="card-text"><b>No Satisfecho: </b> <?php 
                if ($Prom0 >= 0) {
                   echo $Prom0 .' %';
               }	
               else{
                   echo '0%';
               }			
               ?></p>
               <p class="card-text"><b>Poco Satisfecho: </b> <?php 
                if ($Prom25 >= 0) {
                   echo $Prom25 .' %';
               }    
               else{
                   echo '0%';
               }            
               ?></p>
               <p class="card-text"><b>Moderadamente Satisfecho: </b> <?php
               if ($Prom50 >= 0) {
                   echo $Prom50 .'%';
               }	
               else{
                   echo '0%';
               }				
               ?>
           </p>
           <p class="card-text"><b>Muy Satisfecho: </b> <?php 
                if ($Prom75 >= 0) {
                   echo $Prom75 .' %';
               }    
               else{
                   echo '0%';
               }            
               ?></p>
           <p class="card-text"><b>Extremedamente Satisfecho: </b> <?php 
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
<!--SCRIPT para el esconder o mostrar el alert-->
 <script type="text/javascript">
            
            var var6 = "<?php echo $conteo6; ?>";
    // alert(var6);
    if (var6 == 0) {
        // (var1 == null && var2 == null && var3 == null && var4 == null  && var5 == null) || (var1 == 0 && var2 == 0 && var3 == 0 && var4 == 0  && var5 == 0)
        //alert('aaaaaaaaa');
        document.getElementById('GEvaluaciones').style.display = 'none';
    } else {
        document.getElementById('ADataE').style.display = 'none';
    }
    //onclick="printJS('imprimir', 'html')"
</script>

<!--*************************PARA IMPRIMIR EL EXCEL***************************-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js
"></script> 
<script>
    //***********TODO LO QUE ESTA ABAJO ERA PARA DESCAR EL EXCEL MEDIANTE AJAX,PERO DIO PROBLEMA A LA HORA DE QUE SE ESXOJIERA DONDE SE QUERIA GUARDAR EL ARCHIVO, POR LO CUAL UTILIZAMOS EL LLAMADO DEL ARCHIVO DONDE SE GENERA EL EXCEL MEDIANTE LA ETIQUETE <a> DE HTML
    /*var var1 = "<?php// echo $conteo1; ?>";
    var var2 = "<?php// echo $conteo2; ?>";
    var var3 = "<?php// echo $conteo3; ?>";
    var var4 = "<?php //echo $conteo4; ?>";
    var var5 = "<?php //echo $conteo5; ?>";
    var var6 = "<?php //echo $conteo6; ?>";
    var var7 = "<?php //echo $conteo7; ?>";
    var var8 = "<?php //echo $conteo8; ?>";
    var var9 = "<?php //echo $conteo9; ?>";
    var var10 = "<?php //echo $conteo10; ?>";

     $('#btnGenerarExcel').on('click',function(){
         $.ajax({
                    type: 'POST', //aqui puede ser igual get
                     url: 'Excel/ExcelMensual.php',//aqui va tu direccion donde esta tu funcion php
                     data: {id: var1,id2:var2,id3:var3,id4:var4,id5:var5,id6:var6,id7:var7,id8:var8,id9:var9,id10:var10},//aqui tus datos
                    success: function(data) {
                        
                    },
                    error: function(data) {
                        alert(data);
                        //lo que devuelve si falla tu archivo mifuncion.php
                    }
                });
  });*/
</script>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<!--Finaliza SCRIPT para el esconder o mostrar el alert-->
</div>


<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>